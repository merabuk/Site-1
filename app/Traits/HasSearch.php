<?php

namespace App\Traits;

trait HasSearch
{
    //Обработка запроса
    private function buildWildCards($question) {
        if ($question == "") {
            return $question;
        }

        // Strip MySQL reserved symbols
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $question = str_replace($reservedSymbols, '', $question);

        $words = explode(' ', $question);
        foreach($words as $id => $word) {
            // Add operators so we can leverage the boolean mode of
            // fulltext indices.
            $words[$id] = "+*" . $word . "*";
        }
        $question = implode(' ', $words);
        return $question;
    }

    //Поиск по полям модели отмеченным в массиве [searchable]
    protected function scopeSearch($query, $question) {
        //Таблица соответствия
        $cyr = [
            'а','б','в','г','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ь','ю','я',
            'А','Б','В','Г','Д','Е','Є','Ж','З','И','І','Ї','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ю','Я',
        ];
        $lat = [
            'f',',','d','u','l','t',"'",';','p','b','s',']','q','r','k','v','y','j','g',
            'h','c','n','e','a','[','w','x','i','o','m','.','z',
            'F','<','D','U','L','T','"',':','P','B','S','}','Q','R','K','V','Y','J','G',
            'H','C','N','E','A','{','W','X','I','O','M','>','Z',
        ];
        $columns = implode(',', $this->searchable);
        // Boolean mode allows us to match john* for words starting with john
        $query->with(['brand'])
        ->whereHas('brand', function($query) use ($question)  {
            $query->where('name', 'LIKE' , '%'.$question.'%');
        })
        ->orWhereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",
                $this->buildWildCards($question)
            )
        ->orWhereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",
            $this->buildWildCards(str_replace($lat, $cyr, $question))
        )
        ->orWhere('name', 'LIKE' , '%'.$question.'%')
        ->orWhere('name', 'LIKE' , '%'.str_replace($lat, $cyr, $question).'%')->distinct();
        return $query;
    }
}

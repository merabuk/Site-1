<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class OrdersExport implements FromArray, WithHeadings
{
    /**
     * Heading
     */
    public function headings(): array
    {
        return [
            '№',
            'Замовник',
            'Телефон',
            'Адреса',
            'Товари',
            'Сума',
            'Статус',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $orders = Order::with(['products'])->get();
        $rows = [];
        foreach ($orders as $key => $order) {
            //ФИО+телефон
            if($order->user()->exists()) {
                $fullname = $order->user->full_name;
                $phone = $order->user->phone;
            } else {
                $fullname = $order->surname.' '.$order->name.' '.$order->patronymic;
                $phone = $order->phone;
            };
            //Адресс доставки или самовывоз
            if($order->pikup) {
                $address = 'Самовивіз';
            } else {
                $address = $order->city.' '.$order->address;
            };
            //Артикл товара и его выбранные характеристики
            $products = '';
            if($order->products->isNotEmpty()) {
                foreach ($order->products as $key => $product) {
                    $products = $products
                    .$product->article
                    .PHP_EOL
                    .'Колір: '.$product->pivot->color
                    .PHP_EOL
                    .'Розмір: '.$product->pivot->size
                    .PHP_EOL
                    .'Матеріал: '.$product->pivot->material
                    .PHP_EOL
                    .'Напрямок: '.$product->pivot->direction
                    .PHP_EOL
                    .'Стать: '.$product->pivot->sex
                    .PHP_EOL
                    .'Сезонність: '.$product->pivot->season
                    .PHP_EOL
                    ;
                }
            };
            array_push($rows, [
                $order->id,
                $fullname,
                $phone,
                $address,
                $products,
                $order->total_price,
                $order->status->name,
            ]);
        };
        return $rows;
    }


}

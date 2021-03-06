<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    protected $seedersBrandPath = '/resources/seeders/';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => '4CITY',
                'title' => '4CITY',
                'details' => '<p>"Міська" лінійка бренду BERING</p>',
                'img' => ['4c.svg', ],
                'img2' => '/images/brand-orange/4city.svg',//не использую но пусть пока побудет
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Acerbis',
                'title' => 'Acerbis',
                'details' => '',
                'img' => ['acerbis-color.svg',],
                'img2' => '/images/brand-orange/acerbis.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'AGV',
                'title' => 'AGV',
                'details' => '',
                'img' => ['agv-color.svg',],
                'img2' => '/images/brand-orange/agv.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'AIROH',
                'title' => 'AIROH',
                'details' =>    '<p>Зарекомендував себе як №1 в мотокросі і ендуро, компанія успішно захоплює і інші сегменти мотоциклетного життя.</p>
                                <p>Відмінні риси шоломів AIROH:</p>
                                <p>- всі без винятку виробляються тільки в Італії;</p>
                                <p>- володіють низькою вагою, в порівнянні з аналогічними інших виробників.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ постачальником бренду AIROH в Укарїну. Ми офіційно забезпечуємо гарантійне та післягарантійне обслуговування товарів AIROH в Україні.</p>',
                'img' => ['airoh-black-black.svg',],
                'img2' => '/images/brand-orange/airoh.svg',
                'src' => ['https://www.youtube.com/embed/fdrZtA1WFGE',],
                'is_active' => true,
            ],
            [
                'name' => 'ALPINESTARS',
                'title' => 'ALPINESTARS',
                'details' =>    '<p>ALPINESTARS (Італія) - визнаний номер 1 у виробництві одягу, взуття, захисту та аксесуарів для мотоциклістів у всьому світі.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним постачальником бренду ALPINESTARS в Україні.</p>
                                <p>Ми працюємо безпосередньо з виробником без посередників і підтримуємо програми гарантійного та післягарантійного обслуговування клієнтів.</p>',
                'img' => ['alpinestars-black.svg', 'photo-brand-1.jpg', 'photo-brand-2.jpg', ],
                'img2' => '/images/brand-orange/alpinestars.svg',
                'src' => ['https://www.youtube.com/embed/OVCX2QxMJC4', 'https://www.youtube.com/embed/XI3LJnxWEpo', 'https://www.youtube.com/embed/7gQxmCQF9Cg'],
                'is_active' => true,
            ],
            [
                'name' => 'BAGSTER',
                'title' => 'BAGSTER',
                'details' =>    '<p>Французький виробник елементів туристичного тюнінгу для мотоциклів. У гамму продукції входять чохли на баки, багажні сумки і рюкзаки.</p>
                                <p>Вся продукція виробляється у Франції.</p>',
                'img' => ['bagster-color.svg', 'img-bagster-3.jpg', 'img-bagster-2.jpg', 'img-bagster.jpg',],
                'img2' => '/images/brand-orange/bagster.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'BERING',
                'title' => 'BERING',
                'details' =>    '<p>BERING (Франція) - одяг, взуття, багажні аксесуари. Іменитий французький бренд, займає перше місце за обсягом продажів у Франції.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним імпортером продукції BERING в Укарїну.</p>',
                'img' => ['bering-color.svg',],
                'img2' => '/images/brand-orange/bering.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'BLH',
                'title' => 'BLH',
                'details' => '<p>Бюджетна лінійка бренду BERING.</p>',
                'img' => ['blh-color.svg',],
                'img2' => '/images/brand-orange/blh.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'CABERG',
                'title' => 'CABERG',
                'details' =>    '<p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним імпортером бренду CABERG в Україні.</p>
                                    <p>Компанія Caberg є виробником і постачальником мотошоломів більше 35 років, успішно зробивши собі ім\'я в даному сегменті, що стало синонімом якості та технічних інновацій.</p>
                                    <p>Caberg - перший італійський бренд, що представив на світовому ринку модель мотошлема конструкції flip-up, і другий за рахунком в світі, який зробив ставку на розвиток мототуризму.</p>
                                    <p>Всі ці роки «точкою опори» продукції компанії Caberg залишалося саме вдале поєднання привабливого дизайну з функціональністю.</p>
                                    <p>Діяльність усіх відділів компанії - відділу виробництва, відділу просування та тест-лабораторій, що базується на сучасних технологіях, спрямована на найвищі результати, що поєднують в собі комфорт і безпеку для мотоцикліста.</p>
                                    <p>Вся продукція Caberg проходить суворий контроль і тести на безпеку, затверджені державними стандартами.</p>
                                    <p>Дилерська мережа Caberg охоплює всі європейські ринки, її продукція представлена ​​в самих різних країнах і частинах світу - в Ізраїлі, Мексиці, Південній Америці, Гонг-Конгу, Тайваню, Індонезії, Малайзії, Туреччини та Марокко.</p>
                                    <p>Бренд може по праву пишатися тим, що чотири найбільш популярних моделі шоломів Caberg отримали високу оцінку за результатами тестів на омологацию по системі SHARP. (Міністерство транспорту Англії прийняв норму, яка називається SHARP (Safety Helmet and Assessment Rating Programme) - програма для безпеки шоломів і оцінка їх надійності.)</p>
                                    <p>Всі без винятку шоломи CABERG виготовлені в Італії</p>',
                'img' => ['caberg-color.svg', 'img-caberg.jpg'],
                'img2' => '/images/brand-orange/caberg.svg',
                'src' => ['https://www.youtube.com/embed/CccniFDOka0',],
                'is_active' => true,
            ],
            [
                'name' => 'HJC',
                'title' => 'HJC',
                'details' =>    '<p>Компанія HJC спеціалізується на виготовленні мотошоломів з 1971 року.</p>
                                <p>Завдяки вдалому поєднанню професійного досвіду, впровадження технологічних інновацій і розумної цінової політики продукція HJC досить швидко отримала заслужене визнання на світовому ринку мотоекіпіровки.</p>
                                <p>У своїх розробках інженери компанії постійно прагнуть до підвищення якості, рівня безпеки і комфорту, зберігаючи при цьому схему помірного ціноутворення. Саме це і стало ключем до популярності шоломів HJC серед мотоциклістів всього світу.</p><br/>
                                <p>HJC був названий найпопулярнішим брендом 1992 року серед виробником шоломів країн Північної Америки (за даними Motorcycle Industry Magazine).</p>
                                <p>Мотоциклісти інших країн також по достоїнству оцінили шоломи HJC і активно їх купують. Адже при гідному рівні якості цінова категорія шоломів не виходить за рамки середнього класу. Саме цей факт і став вирішальним моментом в утвердженні репутації компанії.</p>
                                <p>Вся продукція HJC проходить ретельну перевірку, як в лабораторії, так і в умовах «реального життя» - в місті, на трасі, на треку. Сьогодні компанія HJC є володарем власної тестової установки з аеродинамічною трубою для тестування системи вентиляції шоломів, рівня шумоізоляції, аеродинамічних властивостей, і т.д.</p>
                                <p>Основне виробництво HJC розташоване в Південній Кореї. Продукція охоплює всі сегменти ринку мотоциклетних шоломів - високого, середнього та бюджетного рівня. Це дозволяє задовольнити попит в різних цінових категоріях.</p>
                                <p>Восени 2012 року компанія HJC представила нову модель інтегрального шолома RPS-10 з інноваційними характеристиками: гранично полегшена вага шкаралупи, високий рівень комфорту і відмінні аеродинамічні якості. Також HJC розробили просту і надійну систему фіксації візору. Саме ця модель стала втіленням останніх досягнень інженерів-розробників компанії - тут і особлива система вентиляції і шумоізоляції (новий шолом на 50% більше вентильований і на 4 дБ тихіше, ніж попередні моделі), і унікальний композитний склад шкаралупи (за технологією «Premium Integrated Matrix (PIM)», що включає в себе комбінацію матеріалів: вуглеволокно, арамидное волокно і скловолокно). Згідно HJC, тільки шість спеціально навчених фахівців можуть формувати структуру матеріалу PIM, який виробляється вручну.</p>
                                <p>У розробці шолома RPS-10 взяв участь знаменитий мотогонщик Бен Спис (Ben Spies), учасник Moto GP в складі команди Yamaha, чемпіон світового класу AMA Superbike 2006, 2007, 2008 років, а також переможець змагань World Superbike 2009.</p>
                                <p>При проектуванні було розроблено понад 20 різних тривимірних дослідних зразків, причому з кожним провели ряд випробувань, включаючи тести в аеродинамічній трубі зі швидкістю 130 миль / год (210 км / ч).</p>',
                'img' => ['hjc-color.svg',],
                'img2' => '/images/brand-orange/hjc.svg',
                'src' => ['https://www.youtube.com/embed/dvygj4hTnjQ',],
                'is_active' => true,
            ],
            [
                'name' => 'IXON',
                'title' => 'IXON',
                'details' =>    '<p>IXON (Франція) - виробник одягу та аксесуарів для мотоциклістів.</p>
                                <p>Головна риса модельного ряду IXON - практичність, французький стиль та перехідне співвідношення ЦІНА / ЯКІСТЬ.</p>
                                <p>Компанія ДИНАМОТО є ОФІЦІАЛЬНИМ ЕКСКЛЮЗИВНИМ постачальником бренду IXON в Україні.</p>',
                'img' => ['ixon.svg',],
                'img2' => '/images/brand-orange/ixon.svg',
                'src' => ['https://www.youtube.com/embed/ZS8nXEmAUoM',],
                'is_active' => true,
            ],
            [
                'name' => 'KAPPA',
                'title' => 'KAPPA (Італія)',
                'details' =>    '<p>Провідний світовий виробник багажних кофров, текстильних сумок, вітрового скла, дуг і ін. Аксесуарів для комфортної подорожі на мотоциклі. Кріпильні системи MONOKEY, MONOLOCK, SIDE MONOKEY і ін. Сумісні з GIVI.</p>
                                <p>Вся продукція виготовлена виключно в Італії і відповідає найвищим технічним вимогам.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним постачальником бренду KAPPA в Україні.</p>',
                'img' => ['kappa.png',],
                'img2' => '/images/brand-orange/kappa.svg',
                'src' => ['https://www.youtube.com/embed/x7gbejvyKME',],
                'is_active' => true,
            ],
            [
                'name' => 'MT',
                'title' => 'MT',
                'details' =>    '<p>Іспанська компанія Manufacturas Томас SA, власник бренду розпочала свою комерційну діяльність в 1968 році. В даний час дистриб\'юторська мережа представлена ​​в більш ніж 50-ти країнах світу. З 2014 року шоломи MT будуть офіційно представлені компанією «Дінамото» і в Україні.</p>
                                <p>Основна філософія бренду для покупця: якість за доступними цінами; для дилерської мережі: першокласні послуги та короткий часу доставки.</p>
                                <p>МТ щороку оновлює більшу частину модельного ряду. Всі шоломи мають європейську сертифікацію з безпеки відповідно до нормативів ECE 22.05, а також мають сертифікати DOT, SNELL, NTC4533, NBR7471. Більшість інтегральних шоломів бренду отримали 5-4 зірок за нормативами SHARP. Нові моделі, нові забарвлення, нові безпечні матеріали оболонки, легкий весМТ -МТ робить все, щоб відповідати сучасним вимогам ринку.</p>',
                'img' => ['mt-color.svg', 'img-mt.jpg',],
                'img2' => '/images/brand-orange/mt.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'NEXX',
                'title' => 'NEXX',
                'details' =>    '<p>NEXX (Португалія) - бренд португальської компанії Nexxpro.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним імпортером продукції NEXX в Україні.</p>
                                <p>Компанія, заснована в 2001 році, була першою в Португалии, яка почала виготовляти шоломи з композитних матеріалів. Власне бренд «NEXX» з\'явився лише в 2007 році, змінилася і позиція компанії, тепер вона пропонує яскраві  моделі, в основному для міського використання. Nexx відомий своєю лінійкою шоломів формату «MaxiJet» - це щось середнє між напіввідкритим шоломом і інтегралом, але тільки лише за зовнішнім виглядом. Подбородочная перемичка такого шолома не йде в порівняння з відповідною частиною закритого шолома і служить лише для комфорту і декоративних цілей. Серед моделей Nexx представлені інтеграли, позашляхові і напіввідкриті шоломи, серед яких шоломи-максіджет.</p>
                                <p>Випускає декілька моделей у співпраці з німецьким брендом HUGO BOSS.</p>
                                <p>Всі шоломи 100% виготовлені в Європі. Сертифіковані за стандартами ECE 22.05 і DOT</p>',
                'img' => ['nexx-color.svg', 'img-nexx.jpg',],
                'img2' => '/images/brand-orange/nexx.svg',
                'src' => ['https://www.youtube.com/embed/RBwfXxH62DQ',],
                'is_active' => true,
            ],
            [
                'name' => 'OZONE',
                'title' => 'OZONE',
                'details' => '',
                'img' => ['ozone-color.svg',],
                'img2' => '/images/brand-orange/ozone.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'REBELHORN',
                'title' => 'REBELHORN',
                'details' => '',
                'img' => ['rebelhorn-color.svg',],
                'img2' => '/images/brand-orange/rebelhorn.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'REVIT',
                'title' => 'REV\'IT',
                'details' =>    '<p>З моменту заснування в 1995 році і до сьогоднішніх днів голландскій бренд REV\'IT по праву входить в світову четвірку кращих виробників захисної екіпіровки для мотоциклістів, поряд з італійцями ALPINESTARS, DAINESE і SIDI.</p>
                                <p>Назва фірми походить від англійського виразу «to rev» (обертати), асоціації з цим словом використовувалися і при розробці логотипу Ревит.</p>
                                <p>ТМ «Rev\'it» виробляє тільки мотоекіпіровку вже півтора десятка років. У спортивній екіпіровці цієї марки їздять талановиті гонщики Moto GP.Турінгові моделі ТМ «Rev\'it» перемагають своєю технологічністю в різних конкурсах і високо цінуються мототуристов.</p>
                                <p>Ергономіка, надійність, дизайн стрітбайкерской екіпіровки викликає захоплення у всьому світі. Ренді де Пюнье, Альваро Баутіста, Симон Корсі, а також десятки тисяч мотоциклістів у всьому світі  вважають екіпіровку ТМ «Rev\'it» чудовою, стильною, надійної, функціональної та відповідної своєї вартості адже шкіра і текстиль, які використовуються в екіпіровці Revit, виробляються виключно в Європі з застосуванням різних інноваційних технологій.</p>
                                <p>Сам бренд заснований в Голландії Іваном Возом (Ivan Voz), який багато років працював в компанії Dainese технічним директором. Вироби цієї голландської марки славляться своєю винятковою ергономікою і здатністю переносити будь-які навантаження, при цьому забезпечуючи високий баланс захисту і комфорту для райдера, зберігши при цьому унікальний дизайн.</p>
                                <p>Компанія Rev\'it з кожною новою колекцією прагне до підвищення безпеки, застосовуючи ультрасучасні технології перевірені в таких гонках, як Moto GP і Париж-Дакар.</p>',
                'img' => ['revit-color.svg', 'img-revit.jpg', 'img-revit-2.jpg',],
                'img2' => '/images/brand-orange/revit.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'SCHUBERTH',
                'title' => 'SCHUBERTH',
                'details' => '',
                'img' => ['schuberth.svg',],
                'img2' => '/images/brand-orange/schuberth.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'SCORPION',
                'title' => 'SCORPION',
                'details' =>    '<p>Компанія ДІНАМОТО є офіційним ексклюзивним імпортером бренду SCORPION EXO в Україні.</p>
                                <p>SCORPION EXO (Франція - США). Досить молодий агресивний бренд. Відмітна особливість шоломів - практично всі моделі забезпечені безліччю інноваційних рішень, в т.ч. системою підкачки повітря, що забезпечує щільне і комфортне прилягання шолома до голови пілота.</p>
                                <p>Мото шоломи SCORPION перевершує за своїми показниками захисту, безпеки, огляду і комфорту стандарти SNELL і DOT і сертифіковані у відповідності зі стандартом ECE 22.05. SCORPION виробляє мотошлеми всіх типів: інтеграл, модуляр (трансформери, flip-up), відкриті шоломи (1/2 і 3/4)</p>
                                <p>Мотошоломи SCORPION практичні у використанні, легко миються і мають якісне покриття, стійке до подряпин і сколів, що виникають в процесі нормальної експлуатації. Багато моделей шоломів мають знімну внутрішню частину для полегшення чищення. При цьому мото-шоломи SCORPION EXO коштують недорого щодо інших марок мотошоломів представлених на ринку.</p>
                                <p>Лінійки шоломів представлені на ринку Європи і Північної Америки розрізняються. Відмінності не тільки в кольорах, але і в матеріалах зовнішньої шкаралупи шоломів. Компанія ДІНАМОТО офіційний представник бренду SCORPION EXO в Україні. Ми підтримуємо гарантію виробника на продукцію SCORPION EXO, а також повністю забезпечені запасними частинами до всіх моделей шоломів SCORPION EXO офіційно реалізованим на території України.</p>
                                <p>Інноваційні технології - застосовуються в шоломах SCORPION EXO:</p>
                                <p>Технологія зміни візору SPEEDSHIFT®</p>
                                <p>Зміна візору стала просто дитячою грою. Ця система дозволяє вам змінити визор менш ніж за 10 секунд. Причому визор і його посадка залишається такою ж щільною. Просто відкрийте визор, поверніть фіксатори приблизно на 1/4 обороту і зніміть визор. Встановити визор назад так само просто: поставте його в потрібне положення і натисніть.</p>
                                <p>EVERCLEAR® NO-FOG незапотіваючі візори</p>
                                <p>Тепер ви можете бачити чітко! Хороша видимість необхідна завжди, все візори лінійки шоломів SCORPION EXO (крім EXO-100), включаючи внутрішні сонячні візори і опціональні візори інших квітів, оброблені спеціальним покриттям EVERCLEAR®. Вони робляться за ліцензією канадської компанії, що спеціалізується на обробці поверхонь протитуманними покриттями. Ця компанія в тому числі здійснює поставки для армії США. Все візорви є стійкими до появи подряпин, оброблені спеціальним гідрофобним покриттям. Протитуманний склад наноситься за технологією thermo welding ( "зварювання теплом").</p>
                                <p>Аеродинаміки і ВЕНТИЛЯЦІЯ</p>
                                <p>Аеродинамічні характеристики вкрай важливі для мото-шоломів. Саме тому дорожні шоломи SCORPION EXO були розроблені і тестувалися в аеродинамічній трубі Indy Car. Це дозволило удосконалити форму шоломів, одночасно з вдосконаленням високотехнологічної вентиляції. Настроюється вентиляція в передній частині шолома подає повітря в підкладку шолома і на візор. Вентиляційні отвори в спойлері ззаду шолома випускають повітря, зменшуючи підйомну силу і шум.</p>',
                'img' => ['scorpion-color.svg',],
                'img2' => '/images/brand-orange/scorpion.svg',
                'src' => ['https://www.youtube.com/embed/GCkQYrX8IPA',],
                'is_active' => true,
            ],
            [
                'name' => 'SEGURA',
                'title' => 'SEGURA',
                'details' =>    '<p>SEGURA - найстарший французький бренд, які опікуються виробництвом тільки топової, тільки шкіряній, тільки високоякісного захисного одягу для мотоциклістів.</p>
                                <p>Сегура - бренд пристрасті.</p>
                                <p>Пристрасть до перегонів, пристрасть до якості.</p>
                                <p>Ідеальний крій і техніка і, звичайно, тенденції дизайну і стіля. З моменту свого створення в 1967 році, бренд взяв участь в досягненні слави великих чемпіонів. Багата і престижна історія лежить в основі розробки кожного виробу SEGURA.</p>',
                'img' => ['segura-color.svg', 'img-segura.jpg',],
                'img2' => '/images/brand-orange/segura.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'SHARK',
                'title' => 'SHARK',
                'details' => '',
                'img' => ['shark.svg',],
                'img2' => '/images/brand-orange/shark.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'SHOEI',
                'title' => 'SHOEI',
                'details' => '',
                'img' => ['shoei.svg',],
                'img2' => '/images/brand-orange/shoei.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'TCX',
                'title' => 'TCX',
                'details' =>    '<p>TCX (Італія) Європейський виробник високоякісного взуття для мотоциклістів, всіх напрямків використання.</p>
                                <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним імпортером бренду TCX в Україні.</p>',
                'img' => ['tsx.svg',],
                'img2' => '/images/brand-orange/tcx.svg',
                'src' => ['https://www.youtube.com/embed/8YyfGmvYfFY',],
                'is_active' => true,
            ],
            [
                'name' => 'ZANDONA',
                'title' =>  'ZANDONA',
                'details' =>    '<p>ZANDONA (Італія) - захист для мотоциклістів. Черепахи, спини, наколінники, налокотники та ін. Вся продукція виробляється в ІТАЛІЇ. Вся продукція сертифікована як ПРОФЕСІОНАЛЬНІ засоби індивідуального захисту.</p>
                                <p>Компанія ДИНАМОТО є офіційним ексклюзивним імпортером бренда ZANDONA в Україні.</p>',
                'img' => ['zandona.svg',],
                'img2' => '/images/brand-orange/zandona.svg',
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'SUOMY',
                'title' =>  'SUOMY',
                'details' => '',
                'img' => ['suomy.png',],
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'GIVI',
                'title' =>  'GIVI',
                'details' => '',
                'img' => [],
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Ariete',
                'title' =>  'Ariete',
                'details' => '',
                'img' => [],
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Daytona',
                'title' =>  'Daytona',
                'details' => '',
                'img' => [],
                'src' => [],
                'is_active' => true,
            ],
            [
                'name' => 'EBC',
                'title' =>  'EBC',
                'details' => '',
                'img' => [],
                'src' => [],
                'is_active' => true,
            ],
        ];

        foreach ($brands as $index=>$brand) {
            $record = new Brand();
            $record->name = $brand['name'];
            $record->slug = Str::slug($brand['name']);
            $record->is_active = $brand['is_active'];
            $record->title = $brand['title'];
            $record->details = $brand['details'];
            $record->brand_order = $index;
            $record->save();
            //наполнение картинками
            foreach($brand['img'] as $number=>$nameImage) {
                $image = new Image();
                $image->imageable_type = get_class($record);
                $image->imageable_id = $record->id;
                $path = '/brands/'.$nameImage;
                $pathToFile = Storage::disk('seeders')->path($path);
                $hashPath = Storage::disk('public')->putFile('/images/brands', new File($pathToFile));
                $image->path = $hashPath;
                if ($number == 0) {
                    $image->is_main = true;
                } else {
                    $image->is_main = false;
                    $image->order = $number;
                }
                $image->save();
            }
            //наполнение видео ссылками
            if (count($brand['src'])) {
                foreach($brand['src'] as $number=>$nameVideo) {
                    $video = new Video();
                    $video->videoable_type = get_class($record);
                    $video->videoable_id = $record->id;
                    $video->name = $record->name.'_'.$number;
                    $video->src = $nameVideo;
                    $video->order = $number;
                    $video->save();
                }
            }
        }
    }
}

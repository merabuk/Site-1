<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'content' => 'Дінамото',
                'front_page_id' => 1,
                'num_article' => '0',
            ],
            [
                'content' => '- офіційний дистриб\'ютор високоякісного і високотехнологічного мото-екіпірування та мото-аксесуарів, вже більше 10 років успішно представляє кращі світові бренди:',
                'front_page_id' => 1,
                'num_article' => '1',
            ],
            [
                'content' => 'Ми пропонуємо широкий вибір шоломів, взуття, одягу, а також аксесуарів. У нашому онлайн магазині представлені товари будь-якої цінової категорії - реалізоване нами мото-екіпірування завжди відрізняється високою якістю, так як вироби пройшли тестування, і відповідає вимогам європейських стандартів безпеки.',
                'front_page_id' => 1,
                'num_article' => '2',
            ],
            [
                'content' => 'Успішно протестовані товари мають встановлене маркування, яке гарантує виняткову якість, впевненість, надійність і безпеку.',
                'front_page_id' => 1,
                'num_article' => '3',
            ],
            [
                'content' => 'Компанія "Дінамото" є офіційним дистриб\'ютором',
                'front_page_id' => 1,
                'num_article' => '4',
            ],
            [
                'content' => 'кращих брендів і володіє ексклюзивними правами реалізації на території України.
                    Таким чином, працюючи безпосередньо з виробниками, ми завжди можемо запропонувати нашим клієнтам кращі ціни і умови.',
                'front_page_id' => 1,
                'num_article' => '5',
            ],
            [
                'content' => 'Подані нами бренди охоплюють абсолютно весь спектр мотоциклетних напрямків',
                'front_page_id' => 1,
                'num_article' => '6',
            ],
            [
                'content' => 'і орієнтовані на споживача з будь-яким смаком та можливостями.',
                'front_page_id' => 1,
                'num_article' => '7',
            ],
            [
                'content' => 'Захисна продукція, яка надається нами: шоломи, мото-взуття, мото-одяг',
                'front_page_id' => 1,
                'num_article' => '8',
            ],
            [
                'content' => 'сертифікована відповідно до ЄВРОПЕЙСЬКИХ норм і правил',
                'front_page_id' => 1,
                'num_article' => '9',
            ],
            [
                'content' => '(не США) і офіційно дозволена до реалізації на території Європи.',
                'front_page_id' => 1,
                'num_article' => '10',
            ],
            [
                'content' => 'Весь товар сертифікований, і має відповідне маркування.',
                'front_page_id' => 1,
                'num_article' => '11',
            ],
            [
                'content' => 'При необхідності, завжди можете отримати',
                'front_page_id' => 1,
                'num_article' => '12',
            ],
            [
                'content' => 'кваліфіковану консультацію від нашого менеджера з продажу.',
                'front_page_id' => 1,
                'num_article' => '13',
            ],
            [
                'content' => 'Як правильно підібрати мотошолом?',
                'front_page_id' => 2,
                'num_article' => '0',
            ],
            [
                'content' => 'Щоб визначити свій розмір шолома, зробіть наступне:',
                'front_page_id' => 2,
                'num_article' => '1',
            ],
            [
                'content' => '1. За допомогою сантиметра або м\'якої рулетки виміряйте окружність своєї голови в найширшій частині (якщо немає сантиметра, прикладіть до голови тасьму, мотузку, а потім виміряйте отриману довжину лінійкою). Як правило, вимірювати окружність голови потрібно на відстані 1,5-2,5 сантиметра вище брів, трохи вище вух і в тій точці на потилиці, яка дає вам найбільшу довжину окружності. Виміряйте голову кілька разів, щоб уникнути помилок і знайдіть максимальну довжину окружності. Таким самим методом користуються і продавці-консультанти у будь-якому спеціалізованому магазині. Але до того ж, потрібно чітко знати свій розмір, якщо ви замовляєте шолом за каталогом.',
                'front_page_id' => 2,
                'num_article' => '2',
            ],
            [
                'content' => '2. Тепер зіставте отриманий результат з розмірами шоломів, які вказані в зведених таблицях нижче - кожному розміру шолома відповідає певна довжина окружності голови в сантиметрах і / або дюймах. Потрібно враховувати, що різні виробники випускають жорсткі оболонки абсолютно різних форм і розмірів, вони можуть класифікувати розміри своїх шоломів по-різному. Якщо ви твердо впевнені, що хочете купити шолом конкретної марки, наприклад, Schuberth або Shoei, почитайте рекомендації на сайті виробника або проконсультуйтесь з нашим менеджером.',
                'front_page_id' => 2,
                'num_article' => '3',
            ],
            [
                'content' => '3. Якщо ви бачите, що вам можуть підійти два розміри шоломів, краще орієнтуватися на менший розмір.',
                'front_page_id' => 2,
                'num_article' => '4',
            ],
            [
                'content' => ' 3.1. По-перше, вимоги безпеки полягають в тому, щоб шолом дуже щільно сидів на голові (але не викликав хворобливих відчуттів) - інакше ступінь його захисту буде істотно менше, або під час падіння з мотоцикла шолом взагалі звалиться з голови.',
                'front_page_id' => 2,
                'num_article' => '5',
            ],
            [
                'content' => ' 3.2. По-друге, зараз ви визначайте тільки теоретичний розмір, і в магазині можете вибрати найбільш підходящий (якщо тільки ви не замовляєте шолом за каталогом; про це - нижче).',
                'front_page_id' => 2,
                'num_article' => '6',
            ],
            [
                'content' => 'Таблиці відповідності розмірів мотошоломів в залежності від довжини окружності голови',
                'front_page_id' => 2,
                'num_article' => '7',
            ],
            [
                'content' => 'Примітка:',
                'front_page_id' => 2,
                'num_article' => '8',
            ],
            [
                'content' => 'Розміри відрізняються в залежності від марок мотошоломів. Більш того, навіть один і той же виробник може, час від часу, переглядати свої власні розміри, не кажучи вже про зміну форми твердої оболонки в залежності від моделі, тому якщо ви не впевнені, зв’яжіться з нами і ми вас проконсультуємо за розміром бренду, який вас цікавить, враховуючи довжину окружності вашої голови. Перед дзвінком менеджеру обов’язково зробіть виміри, вказані вище.',
                'front_page_id' => 2,
                'num_article' => '9',
            ],
            [
                'content' => 'Умови оплати та доставки обговорюються із нашим менеджером з продажу після того, як клієнт зробив замовлення на сайті та обрав пункт "Доставка транспортною компанією".',
                'front_page_id' => 3,
                'num_article' => '0',
            ],
            [
                'content' => 'Зв\'язатися з менеджером',
                'front_page_id' => 3,
                'num_article' => '1',
            ],
            [
                'content' => '(050) 495-52-30',
                'front_page_id' => 3,
                'num_article' => '2',
            ],
            [
                'content' => '(048) 777-07-00',
                'front_page_id' => 3,
                'num_article' => '3',
            ],
            [
                'content' => 'shopdinamoto@gmail.com',
                'front_page_id' => 3,
                'num_article' => '4',
            ],
            [
                'content' => 'Оплата проходить зручним для вас способом : готівкою чи кредитною карткою, у магазині за адресою:',
                'front_page_id' => 3,
                'num_article' => '5',
            ],
            [
                'content' => 'Магазин мотоекіпіровки в Одесі',
                'front_page_id' => 3,
                'num_article' => '6',
            ],
            [
                'content' => 'вул. Люстдорфської дороги,',
                'front_page_id' => 3,
                'num_article' => '7',
            ],
            [
                'content' => '96 (р-н "Клюшка")',
                'front_page_id' => 3,
                'num_article' => '8',
            ],
            [
                'content' => '(050) 495-52-30',
                'front_page_id' => 3,
                'num_article' => '9',
            ],
            [
                'content' => '(048) 777-07-00',
                'front_page_id' => 3,
                'num_article' => '10',
            ],
            [
                'content' => 'shopdinamoto@gmail.com',
                'front_page_id' => 3,
                'num_article' => '11',
            ],
            [
                'content' => 'Пн.:  10:00-17:00',
                'front_page_id' => 3,
                'num_article' => '12',
            ],
            [
                'content' => 'Вт.- Пт. 10:00-18:00',
                'front_page_id' => 3,
                'num_article' => '13',
            ],
            [
                'content' => 'Сб.:  11:00-17:00',
                'front_page_id' => 3,
                'num_article' => '14',
            ],
            [
                'content' => 'Вс.: Вихідний',
                'front_page_id' => 3,
                'num_article' => '15',
            ],
            [
                'content' => 'Магазин мотоекіпіровки в Одесі',
                'front_page_id' => 4,
                'num_article' => '0',
            ],
            [
                'content' => 'вул. Люстдорфської дороги,',
                'front_page_id' => 4,
                'num_article' => '1',
            ],
            [
                'content' => '96 (р-н "Клюшка")',
                'front_page_id' => 4,
                'num_article' => '2',
            ],
            [
                'content' => '(050) 495-52-30',
                'front_page_id' => 4,
                'num_article' => '3',
            ],
            [
                'content' => '(048) 777-07-00',
                'front_page_id' => 4,
                'num_article' => '4',
            ],
            [
                'content' => 'shopdinamoto@gmail.com',
                'front_page_id' => 4,
                'num_article' => '5',
            ],
            [
                'content' => 'Пн.:  10:00-17:00',
                'front_page_id' => 4,
                'num_article' => '6',
            ],
            [
                'content' => 'Вт.- Пт. 10:00-18:00',
                'front_page_id' => 4,
                'num_article' => '7',
            ],
            [
                'content' => 'Сб.:  11:00-17:00',
                'front_page_id' => 4,
                'num_article' => '8',
            ],
            [
                'content' => 'Вс.: Вихідний',
                'front_page_id' => 4,
                'num_article' => '9',
            ],
            [
                'content' => '31 жовтня – 1 березня',
                'front_page_id' => 5,
                'num_article' => '0',
            ],
            [
                'content' => 'Понеділок – 10:00 – 17:00',
                'front_page_id' => 5,
                'num_article' => '1',
            ],
            [
                'content' => 'Вівторок – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '2',
            ],
            [
                'content' => 'Середа – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '3',
            ],
            [
                'content' => 'Четвер – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '4',
            ],
            [
                'content' => 'П’ятниця – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '5',
            ],
            [
                'content' => 'Субота  - 11:00 – 17:00',
                'front_page_id' => 5,
                'num_article' => '6',
            ],
            [
                'content' => '31 жовтня – 1 березня',
                'front_page_id' => 5,
                'num_article' => '7',
            ],
            [
                'content' => 'Понеділок – 10:00 – 17:00',
                'front_page_id' => 5,
                'num_article' => '8',
            ],
            [
                'content' => 'Вівторок – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '9',
            ],
            [
                'content' => 'Середа – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '10',
            ],
            [
                'content' => 'Четвер – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '11',
            ],
            [
                'content' => 'П’ятниця – 10:00-18:00',
                'front_page_id' => 5,
                'num_article' => '12',
            ],
            [
                'content' => 'Субота  - 11:00 – 17:00',
                'front_page_id' => 5,
                'num_article' => '13',
            ],
            [
                'content' => 'В разі несправності товару або виявлення виробничих дефектів, покупець має право звернутися в наш магазин з вимогами про повернення товару, обміні, або усунення несправностей і дефектів.
                Для того щоб зробити повернення грошей, достатньо зв\'язатися з нашим менеджером зі збуту, пояснити проблему, слідувати його інструкціям.',
                'front_page_id' => 5,
                'num_article' => '14',
            ],
            [
                'content' => 'Ви має право на обмін товару належної якості протягом 14 днів не рахуючи дня покупки.
                Обмін товару належної якості проводиться, якщо він не був використаний і якщо збережено його товарний вигляд, споживчі властивості, товарний або касовий чек або інші документи, видані споживачеві разом з проданим товаром.',
                'front_page_id' => 5,
                'num_article' => '15',
            ],
            [
                'content' => 'Якщо на момент обміну, аналогічного товару немає у продажу, споживач має право:',
                'front_page_id' => 5,
                'num_article' => '16',
            ],
            [
                'content' => 'Придбати будь-які інші товари з наявного асортименту з відповідним перерахуванням вартості',
                'front_page_id' => 5,
                'num_article' => '17',
            ],
            [
                'content' => 'Отримати назад гроші у розмірі вартості повернутого товару',
                'front_page_id' => 5,
                'num_article' => '18',
            ],
            [
                'content' => 'Здійснити обмін товару на аналогічний при першому ж надходженні відповідного товару в продаж',
                'front_page_id' => 5,
                'num_article' => '19',
            ],
            [
                'content' => 'Ми в свою чергу зобов\'язані в день надходження товару в продаж повідомити про це споживача, який вимагає обміну товару.',
                'front_page_id' => 5,
                'num_article' => '20',
            ],
            [
                'content' => 'Отже, в разі якщо ви зіткнулися з нижчепереліченими проблемами:',
                'front_page_id' => 5,
                'num_article' => '21',
            ],
            [
                'content' => 'Виробничий дефект товару',
                'front_page_id' => 5,
                'num_article' => '22',
            ],
            [
                'content' => 'Невідповідність товару заявленому опису та характеристикам',
                'front_page_id' => 5,
                'num_article' => '23',
            ],
            [
                'content' => 'Якщо товар не підійшов за формою, габаритами, фасоном, кольором, розміром або з інших причин не може бути використаний за призначенням',
                'front_page_id' => 5,
                'num_article' => '24',
            ],
            [
                'content' => 'Зв\'язатися з нашим менеджером зі збуту, повідомити номер карти (в разі відсутності карти, номер гарантійного талона), пред\'явити претензію на товар.',
                'front_page_id' => 5,
                'num_article' => '25',
            ],
            [
                'content' => 'Вислати нам предмет претензії на експертизу',
                'front_page_id' => 5,
                'num_article' => '26',
            ],
            [
                'content' => 'Протягом 5 робочих днів, з Вами зв\'яжеться наш менеджер з продажу, з підтвердженням факту гарантійного випадку.',
                'front_page_id' => 5,
                'num_article' => '27',
            ],
            [
                'content' => 'У разі підтвердження, протягом 14 робочих днів ми надішлемо новий товар або повернемо гроші.',
                'front_page_id' => 5,
                'num_article' => '28',
            ],
            [
                'content' => 'Шановні панове!',
                'front_page_id' => 6,
                'num_article' => '0',
            ],
            [
                'content' => 'В даний час наша компанія «Дінамото» проводить роботу по розширенню дилерської мережі і пропонує Вам розглянути питання можливої співпраці.',
                'front_page_id' => 6,
                'num_article' => '1',
            ],
            [
                'content' => 'Компанія «Дінамото» ОФІЦІЙНО представляє в Україні такі бренди:',
                'front_page_id' => 6,
                'num_article' => '2',
            ],
            [
                'content' => 'ALPINESTARS (Італія)',
                'front_page_id' => 6,
                'num_article' => '3',
            ],
            [
                'content' => 'www.alpinestars.com',
                'front_page_id' => 6,
                'num_article' => '4',
            ],
            [
                'content' => 'Ozone (Польща)',
                'front_page_id' => 6,
                'num_article' => '5',
            ],
            [
                'content' => 'ozone-moto.com',
                'front_page_id' => 6,
                'num_article' => '6',
            ],
            [
                'content' => 'Airoh  (Італія)',
                'front_page_id' => 6,
                'num_article' => '7',
            ],
            [
                'content' => 'www.airoh.com',
                'front_page_id' => 6,
                'num_article' => '8',
            ],
            [
                'content' => 'Rev’it (Голландія)',
                'front_page_id' => 6,
                'num_article' => '9',
            ],
            [
                'content' => 'www.revitsport.com',
                'front_page_id' => 6,
                'num_article' => '10',
            ],
            [
                'content' => 'Acerbis (Італія)',
                'front_page_id' => 6,
                'num_article' => '11',
            ],
            [
                'content' => 'www.acerbis.com',
                'front_page_id' => 6,
                'num_article' => '12',
            ],
            [
                'content' => 'Rebelhorn (Польща)',
                'front_page_id' => 6,
                'num_article' => '13',
            ],
            [
                'content' => 'rebelhorn.com',
                'front_page_id' => 6,
                'num_article' => '14',
            ],
            [
                'content' => 'AGV (Італія)',
                'front_page_id' => 6,
                'num_article' => '15',
            ],
            [
                'content' => 'www.agv.com/us/en',
                'front_page_id' => 6,
                'num_article' => '16',
            ],
            [
                'content' => 'Scorpion (Франція- США)',
                'front_page_id' => 6,
                'num_article' => '17',
            ],
            [
                'content' => 'www.scorpionusa.com',
                'front_page_id' => 6,
                'num_article' => '18',
            ],
            [
                'content' => 'Bering (Франція)',
                'front_page_id' => 6,
                'num_article' => '19',
            ],
            [
                'content' => 'www.bering.fr',
                'front_page_id' => 6,
                'num_article' => '20',
            ],
            [
                'content' => 'Segura (Франція)',
                'front_page_id' => 6,
                'num_article' => '21',
            ],
            [
                'content' => 'segura-moto.fr/index-fr.php',
                'front_page_id' => 6,
                'num_article' => '22',
            ],
            [
                'content' => 'Bagster (Франція)',
                'front_page_id' => 6,
                'num_article' => '23',
            ],
            [
                'content' => 'bagster.com',
                'front_page_id' => 6,
                'num_article' => '24',
            ],
            [
                'content' => 'Shark (Франція)',
                'front_page_id' => 6,
                'num_article' => '25',
            ],
            [
                'content' => 'shark-helmets.com/index-fr.php',
                'front_page_id' => 6,
                'num_article' => '26',
            ],
            [
                'content' => 'BLH Бюджетна лінійка бренду.',
                'front_page_id' => 6,
                'num_article' => '27',
            ],
            [
                'content' => 'BERING',
                'front_page_id' => 6,
                'num_article' => '28',
            ],
            [
                'content' => 'Shoei (Японія)',
                'front_page_id' => 6,
                'num_article' => '29',
            ],
            [
                'content' => 'www.shoei.com/worldwide',
                'front_page_id' => 6,
                'num_article' => '30',
            ],
            [
                'content' => 'Caberg (Італія)',
                'front_page_id' => 6,
                'num_article' => '31',
            ],
            [
                'content' => 'www.caberg.it/en',
                'front_page_id' => 6,
                'num_article' => '32',
            ],
            [
                'content' => 'Schuberth (Німеччина)',
                'front_page_id' => 6,
                'num_article' => '33',
            ],
            [
                'content' => 'www.schuberth.com/en.html',
                'front_page_id' => 6,
                'num_article' => '34',
            ],
            [
                'content' => 'HJC (Корея)',
                'front_page_id' => 6,
                'num_article' => '35',
            ],
            [
                'content' => 'www.hjchelmets.com',
                'front_page_id' => 6,
                'num_article' => '36',
            ],
            [
                'content' => 'TCX (Італія)',
                'front_page_id' => 6,
                'num_article' => '37',
            ],
            [
                'content' => 'www.tcxboots.com/eu_en',
                'front_page_id' => 6,
                'num_article' => '38',
            ],
            [
                'content' => 'KAPPA (Італія)',
                'front_page_id' => 6,
                'num_article' => '39',
            ],
            [
                'content' => 'www.kappamoto.com/My-motorcycle',
                'front_page_id' => 6,
                'num_article' => '40',
            ],
            [
                'content' => '4city "Міська" лінійка бренду BERING',
                'front_page_id' => 6,
                'num_article' => '41',
            ],
            [
                'content' => 'BERING',
                'front_page_id' => 6,
                'num_article' => '42',
            ],
            [
                'content' => 'MT Helmets (Іспанія)',
                'front_page_id' => 6,
                'num_article' => '43',
            ],
            [
                'content' => 'mthelmets.com/en/home',
                'front_page_id' => 6,
                'num_article' => '44',
            ],
            [
                'content' => 'Zandona (Італія)',
                'front_page_id' => 6,
                'num_article' => '45',
            ],
            [
                'content' => 'moto.zandona.net',
                'front_page_id' => 6,
                'num_article' => '46',
            ],
            [
                'content' => 'Nexx (Португалія)',
                'front_page_id' => 6,
                'num_article' => '47',
            ],
            [
                'content' => 'www.nexx-helmets.com/en',
                'front_page_id' => 6,
                'num_article' => '48',
            ],
            [
                'content' => 'вул. Люстдорфської дороги,',
                'front_page_id' => 7,
                'num_article' => '0',
            ],
            [
                'content' => '96 (р-н "Клюшка")',
                'front_page_id' => 7,
                'num_article' => '1',
            ],
            [
                'content' => '380504955230',
                'front_page_id' => 7,
                'num_article' => '2',
            ],
            [
                'content' => '(050) 495-52-30',
                'front_page_id' => 7,
                'num_article' => '3',
            ],
            [
                'content' => '380487770700',
                'front_page_id' => 7,
                'num_article' => '4',
            ],
            [
                'content' => '(048) 777-07-00',
                'front_page_id' => 7,
                'num_article' => '5',
            ],
            [
                'content' => 'shopdinamoto@gmail.com',
                'front_page_id' => 7,
                'num_article' => '6',
            ],
            [
                'content' => 'МОТОСТИЛЬ',
                'front_page_id' => 7,
                'num_article' => '7',
            ],
            [
                'content' => 'вул. Костянтинівська, 71.',
                'front_page_id' => 7,
                'num_article' => '8',
            ],
            [
                'content' => 'ТЦ "Шоколад" (м. Тараса Шевченка)',
                'front_page_id' => 7,
                'num_article' => '9',
            ],
            [
                'content' => '380443210331',
                'front_page_id' => 7,
                'num_article' => '10',
            ],
            [
                'content' => '(044) 321-03-31',
                'front_page_id' => 7,
                'num_article' => '11',
            ],
            [
                'content' => '380677654083',
                'front_page_id' => 7,
                'num_article' => '12',
            ],
            [
                'content' => '(067) 765-40-83',
                'front_page_id' => 7,
                'num_article' => '13',
            ],
            [
                'content' => '380959069339',
                'front_page_id' => 7,
                'num_article' => '14',
            ],
            [
                'content' => '(095) 906-93-39',
                'front_page_id' => 7,
                'num_article' => '15',
            ],
            [
                'content' => '380630482977',
                'front_page_id' => 7,
                'num_article' => '16',
            ],
            [
                'content' => '(063) 048-29-77',
                'front_page_id' => 7,
                'num_article' => '17',
            ],
            [
                'content' => 'callcenter@shlem.com.ua',
                'front_page_id' => 7,
                'num_article' => '18',
            ],
            [
                'content' => 'motostyle.ua',
                'front_page_id' => 7,
                'num_article' => '19',
            ],
            [
                'content' => 'ШОЛОМ',
                'front_page_id' => 7,
                'num_article' => '20',
            ],
            [
                'content' => 'вул. Костянтинівська, 71.',
                'front_page_id' => 7,
                'num_article' => '21',
            ],
            [
                'content' => 'ТЦ "Шоколад" (м. Тараса Шевченка)',
                'front_page_id' => 7,
                'num_article' => '22',
            ],
            [
                'content' => '380443922113',
                'front_page_id' => 7,
                'num_article' => '23',
            ],
            [
                'content' => '(044) 392-21-13',
                'front_page_id' => 7,
                'num_article' => '24',
            ],
            [
                'content' => '380993243027',
                'front_page_id' => 7,
                'num_article' => '25',
            ],
            [
                'content' => '(099) 324-30-27',
                'front_page_id' => 7,
                'num_article' => '26',
            ],
            [
                'content' => '380978675435',
                'front_page_id' => 7,
                'num_article' => '27',
            ],
            [
                'content' => '(097) 867-54-35',
                'front_page_id' => 7,
                'num_article' => '28',
            ],
            [
                'content' => '380633889893',
                'front_page_id' => 7,
                'num_article' => '29',
            ],
            [
                'content' => '(063) 388-98-93',
                'front_page_id' => 7,
                'num_article' => '30',
            ],
            [
                'content' => 'callcenter@shlem.com.ua',
                'front_page_id' => 7,
                'num_article' => '31',
            ],
            [
                'content' => 'shlem.com.ua',
                'front_page_id' => 7,
                'num_article' => '32',
            ],
            [
                'content' => 'КАСТОМ КУЛЬТУРА',
                'front_page_id' => 7,
                'num_article' => '33',
            ],
            [
                'content' => 'вул. Степана Бандери 6',
                'front_page_id' => 7,
                'num_article' => '34',
            ],
            [
                'content' => '380444982926',
                'front_page_id' => 7,
                'num_article' => '35',
            ],
            [
                'content' => '(044) 498-29-26',
                'front_page_id' => 7,
                'num_article' => '36',
            ],
            [
                'content' => 'МАКС АВТО',
                'front_page_id' => 7,
                'num_article' => '37',
            ],
            [
                'content' => 'вул. Калуське шоссе 7д',
                'front_page_id' => 7,
                'num_article' => '38',
            ],
            [
                'content' => '380957362894',
                'front_page_id' => 7,
                'num_article' => '39',
            ],
            [
                'content' => '(095) 736-28-94',
                'front_page_id' => 7,
                'num_article' => '40',
            ],
            [
                'content' => 'Магазин мототехніки та екіпіровки  " МотоR "',
                'front_page_id' => 7,
                'num_article' => '41',
            ],
            [
                'content' => 'вул. Перемоги, .73',
                'front_page_id' => 7,
                'num_article' => '42',
            ],
            [
                'content' => '380612149108',
                'front_page_id' => 7,
                'num_article' => '43',
            ],
            [
                'content' => '(061) 214-91-08',
                'front_page_id' => 7,
                'num_article' => '44',
            ],
            [
                'content' => 'motoekip.zp@gmail.com',
                'front_page_id' => 7,
                'num_article' => '45',
            ],
            [
                'content' => 'Moto-pulse',
                'front_page_id' => 7,
                'num_article' => '46',
            ],
            [
                'content' => 'вул. Космонавтів 81/24,',
                'front_page_id' => 7,
                'num_article' => '47',
            ],
            [
                'content' => '380961613327',
                'front_page_id' => 7,
                'num_article' => '48',
            ],
            [
                'content' => '(096) 161-33-27',
                'front_page_id' => 7,
                'num_article' => '49',
            ],
            [
                'content' => 'motopulse.com.ua',
                'front_page_id' => 7,
                'num_article' => '50',
            ],
            [
                'content' => '«Зеленский А.И.» СПД.',
                'front_page_id' => 7,
                'num_article' => '51',
            ],
            [
                'content' => 'вул.Кропивницкого 184',
                'front_page_id' => 7,
                'num_article' => '52',
            ],
            [
                'content' => '380505555014',
                'front_page_id' => 7,
                'num_article' => '53',
            ],
            [
                'content' => '(050) 555-50-14',
                'front_page_id' => 7,
                'num_article' => '54',
            ],
            [
                'content' => 'Мотоцентр на Пасічної',
                'front_page_id' => 7,
                'num_article' => '55',
            ],
            [
                'content' => 'вул.Пасечна, .129',
                'front_page_id' => 7,
                'num_article' => '56',
            ],
            [
                'content' => '380966565518',
                'front_page_id' => 7,
                'num_article' => '57',
            ],
            [
                'content' => '(096) 656-55-18',
                'front_page_id' => 7,
                'num_article' => '58',
            ],
            [
                'content' => '380674200852',
                'front_page_id' => 7,
                'num_article' => '59',
            ],
            [
                'content' => '(067) 420-08-52',
                'front_page_id' => 7,
                'num_article' => '60',
            ],
            [
                'content' => 'Procar-lemberg',
                'front_page_id' => 7,
                'num_article' => '61',
            ],
            [
                'content' => 'м.Львів Сокольники',
                'front_page_id' => 7,
                'num_article' => '62',
            ],
            [
                'content' => 'ул.Скніловская 23',
                'front_page_id' => 7,
                'num_article' => '63',
            ],
            [
                'content' => '380974012104',
                'front_page_id' => 7,
                'num_article' => '64',
            ],
            [
                'content' => '(097) 401-21-04',
                'front_page_id' => 7,
                'num_article' => '65',
            ],
            [
                'content' => 'Procarlemberg@gmail.com',
                'front_page_id' => 7,
                'num_article' => '66',
            ],
            [
                'content' => 'MY BIKE',
                'front_page_id' => 7,
                'num_article' => '67',
            ],
            [
                'content' => 'ул. Академіка Лазаренка 8',
                'front_page_id' => 7,
                'num_article' => '68',
            ],
            [
                'content' => '380977778485',
                'front_page_id' => 7,
                'num_article' => '69',
            ],
            [
                'content' => '(097) 777-84-85',
                'front_page_id' => 7,
                'num_article' => '70',
            ],
            [
                'content' => '380737778485',
                'front_page_id' => 7,
                'num_article' => '71',
            ],
            [
                'content' => '(073) 777-84-85',
                'front_page_id' => 7,
                'num_article' => '72',
            ],
            [
                'content' => 'info@mybike.ua',
                'front_page_id' => 7,
                'num_article' => '73',
            ],
            [
                'content' => 'mybike.ua',
                'front_page_id' => 7,
                'num_article' => '74',
            ],
            [
                'content' => 'HONDA Ария Моторс',
                'front_page_id' => 7,
                'num_article' => '75',
            ],
            [
                'content' => 'вул.Городоцька, 306.',
                'front_page_id' => 7,
                'num_article' => '76',
            ],
            [
                'content' => '380322323528',
                'front_page_id' => 7,
                'num_article' => '77',
            ],
            [
                'content' => '(032) 232-35-28',
                'front_page_id' => 7,
                'num_article' => '78',
            ],
            [
                'content' => 'МОТОРРАД',
                'front_page_id' => 7,
                'num_article' => '79',
            ],
            [
                'content' => 'вул.Набережна Перемоги 10К.',
                'front_page_id' => 7,
                'num_article' => '80',
            ],
            [
                'content' => '380671117007',
                'front_page_id' => 7,
                'num_article' => '81',
            ],
            [
                'content' => '(067)-111-70-07',
                'front_page_id' => 7,
                'num_article' => '82',
            ],
            [
                'content' => '380630676060',
                'front_page_id' => 7,
                'num_article' => '83',
            ],
            [
                'content' => '(063)-067-60-60',
                'front_page_id' => 7,
                'num_article' => '84',
            ],
            [
                'content' => 'motorrad.com.ua',
                'front_page_id' => 7,
                'num_article' => '85',
            ],
            [
                'content' => 'Мотостиль',
                'front_page_id' => 7,
                'num_article' => '86',
            ],
            [
                'content' => 'вул. Шевченко, 67,',
                'front_page_id' => 7,
                'num_article' => '87',
            ],
            [
                'content' => '2-й поверх (територія салону Honda)',
                'front_page_id' => 7,
                'num_article' => '88',
            ],
            [
                'content' => '380577289331',
                'front_page_id' => 7,
                'num_article' => '89',
            ],
            [
                'content' => '(057) 728-93-31',
                'front_page_id' => 7,
                'num_article' => '90',
            ],
            [
                'content' => '380677654083',
                'front_page_id' => 7,
                'num_article' => '91',
            ],
            [
                'content' => '(067) 765-40-83',
                'front_page_id' => 7,
                'num_article' => '92',
            ],
            [
                'content' => 'ДиНамото',
                'front_page_id' => 7,
                'num_article' => '93',
            ],
            [
                'content' => 'вул. Люстдорфская.дорога, 96',
                'front_page_id' => 7,
                'num_article' => '94',
            ],
            [
                'content' => '380487770700',
                'front_page_id' => 7,
                'num_article' => '95',
            ],
            [
                'content' => '(048) 777-07-00',
                'front_page_id' => 7,
                'num_article' => '96',
            ],
            [
                'content' => '380504955230',
                'front_page_id' => 7,
                'num_article' => '97',
            ],
            [
                'content' => '(050) 495-52-30',
                'front_page_id' => 7,
                'num_article' => '98',
            ],
            [
                'content' => 'Дінамото',
                'front_page_id' => 7,
                'num_article' => '99',
            ],
            [
                'content' => 'вул. Розумовського 24',
                'front_page_id' => 7,
                'num_article' => '100',
            ],
            [
                'content' => '380487098908',
                'front_page_id' => 7,
                'num_article' => '101',
            ],
            [
                'content' => '(048) 709-89-08',
                'front_page_id' => 7,
                'num_article' => '102',
            ],
            [
                'content' => 'ГРАНД-МОТО',
                'front_page_id' => 7,
                'num_article' => '103',
            ],
            [
                'content' => 'вул. Мельницька 30а',
                'front_page_id' => 7,
                'num_article' => '104',
            ],
            [
                'content' => '380672833332',
                'front_page_id' => 7,
                'num_article' => '105',
            ],
            [
                'content' => '(067) 283-33-32',
                'front_page_id' => 7,
                'num_article' => '106',
            ],
            [
                'content' => 'R-ACE YAMAHA',
                'front_page_id' => 7,
                'num_article' => '107',
            ],
            [
                'content' => 'вул. Грушевського, 40',
                'front_page_id' => 7,
                'num_article' => '108',
            ],
            [
                'content' => '380487774628',
                'front_page_id' => 7,
                'num_article' => '109',
            ],
            [
                'content' => '(048) 777-46-28',
                'front_page_id' => 7,
                'num_article' => '110',
            ],
            [
                'content' => 'Мото24',
                'front_page_id' => 7,
                'num_article' => '111',
            ],
            [
                'content' => 'вул. Газова, 8',
                'front_page_id' => 7,
                'num_article' => '112',
            ],
            [
                'content' => '380504945612',
                'front_page_id' => 7,
                'num_article' => '113',
            ],
            [
                'content' => '(050) 494-56-12',
                'front_page_id' => 7,
                'num_article' => '114',
            ],
        ];

        foreach ($articles as $article) {
            $record = new article();
            $record->content = $article['content'];
            $record->front_page_id = $article['front_page_id'];
            $record->num_article = $article['num_article'];
            $record->save();
        }
    }
}

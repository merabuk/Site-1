<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Новый заказ
        $new_order = new Status();
        $new_order->name = 'Нове замовлення';
        $new_order->save();
        //Заказ в обработке
        $working = new Status();
        $working->name = 'Замовлення у обробці';
        $working->save();
        //Заказ оплачен
        $payed = new Status();
        $payed->name = 'Замовлення сплачено';
        $payed->save();
        //Заказ готовится к отправке
        $preparing = new Status();
        $preparing->name = 'Замовлення готується до відправки';
        $preparing->save();
        //Заказ отправлен
        $shipped = new Status();
        $shipped->name = 'Замовлення відправлено';
        $shipped->save();
        //Заказ возвращен
        $placed = new Status();
        $placed->name = 'Замовлення повернено';
        $placed->save();
        //Заказ завершен
        $finished = new Status();
        $finished->name = 'Замовлення завершено';
        $finished->save();
    }
}

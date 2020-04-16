<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Paladyn',
                'description' => 'Określeniem tym w literaturze średniowiecznej nazywano niektórych, archetypicznych wojowników, najczęściej 12 parów Karola Wielkiego (stanowiących zarazem jego drużynę przyboczną). Nazwa pochodzi od łacińskiego słowa comes palatinus (hrabia pałacowy), oznaczającego zarządcę dworu królewskiego, który zastępował monarchę przy wydawaniu sądów. W literaturze, a współcześnie w grach fabularnych i komputerowych znaczenie słowa uległo zmianie, nie odnosząc się do urzędów dworskich, a raczej do klasy obdarzonych magicznymi umiejętnościami wojowników, służących bóstwom. W Pieśni o Rolandzie wymienieni są następujący rycerze, nazywani tam paladynami:',
            ],
            [
                'name' => 'Barbarzyńca',
                'description' => 'człowiek dziki, pierwotny, niecywilizowany, okrutny, o prymitywnych odruchach, nie znający kultury europejskiej. W starożytnej Grecji każdy cudzoziemiec, w Rzymie ten, kto nie był Rzymianinem lub Grekiem. Homer podkreślał obcość Karów (sojuszników Trojan), nazywając ich βάρβαροφονοι/Barbarophonoi, czyli mówiących „bar-bar”, a więc wydających bezsensowne, niezrozumiałe dźwięki'
            ]
        ];

        DB::table('type')->insert($data);
    }
}

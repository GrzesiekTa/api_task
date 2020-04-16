<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
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
                'name' => 'Samochód',
                'description' => 'pojazd silnikowy służący do przewozu osób lub ładunków.',
            ],
            [
                'name' => 'Samolot',
                'description' => 'załogowy bądź bezzałogowy statek powietrzny cięższy od powietrza (aerodyna), utrzymujący się w powietrzu dzięki wytwarzanej sile nośnej za pomocą nieruchomych, w danych warunkach względem statku, skrzydeł. Ciąg potrzebny do utrzymania prędkości w locie poziomym wytwarzany jest przez jeden lub więcej silników.'
            ],
            [
                'name' => 'Czołg',
                'description' => 'gąsienicowy wóz bojowy, przeznaczony do walki z siłami przeciwnika na krótkich i średnich dystansach za pomocą prowadzenia ognia na wprost. Ciężki pancerz i duża mobilność zapewniają czołgom przetrwanie na polu bitwy, a napęd gąsienicowy pozwala na przemieszczanie się z dużą prędkością w trudnym terenie. Czołg jest zasadniczym środkiem prowadzenia walki lądowej, zwłaszcza natarcia.'
            ],
            [
                'name' => 'Rower',
                'description' => 'jedno- lub wielośladowy pojazd drogowy napędzany siłą mięśni poruszających się nim osób za pomocą przekładni mechanicznej, wprawianej w ruch (najczęściej) nogami[1].'
            ]
        ];

        DB::table('vehicle')->insert($data);
    }
}

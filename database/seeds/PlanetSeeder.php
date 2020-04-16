<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanetSeeder extends Seeder
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
                'name' => 'Mercury',
                'description' => 'najmniejsza i najbliższa Słońca planeta Układu Słonecznego. Jako planeta dolna znajduje się dla ziemskiego obserwatora zawsze blisko Słońca, dlatego jest trudna do obserwacji. Mimo to należy do planet widocznych gołym okiem i była znana już w starożytności. Merkurego dojrzeć można jedynie tuż przed wschodem lub tuż po zachodzie Słońca.',
            ],
            [
                'name' => 'Venus',
                'description' => 'druga pod względem odległości od Słońca planeta Układu Słonecznego. Jest trzecim pod względem jasności ciałem niebieskim widocznym na niebie, po Słońcu i Księżycu. Jej obserwowana wielkość gwiazdowa sięga −4,6m i jest wystarczająca, aby światło odbite od Wenus powodowało powstawanie cieni. Ponieważ Wenus jest bliżej Słońca niż Ziemia, zawsze jest widoczna w niewielkiej odległości kątowej od niego; jej maksymalna elongacja to 47,8°. Odległość Wenus od Ziemi zmienia się w zakresie od około 40 mln km do około 259 mln km',
            ],
            [
                'name' => 'Ziemia',
                'description' => ' trzecia, licząc od Słońca, oraz piąta pod względem wielkości planeta Układu Słonecznego. Pod względem średnicy, masy i gęstości jest to największa planeta skalista Układu Słonecznego. Ziemia jest zamieszkana przez miliony gatunków, w tym przez człowieka[9]. Jest jedynym znanym miejscem we Wszechświecie, w którym występuje życie[10]. Według danych zebranych metodą datowania izotopowego, planeta uformowała się ok. 4,54 ± 0,05 mld lat temu[',
            ],
            [
                'name' => 'Mars',
                'description' => 'zwarta od Słońca planeta Układu Słonecznego. Nazwana od imienia rzymskiego boga wojny – Marsa, zawdzięcza ją barwie, która przy obserwacji z Ziemi wydaje się rdzawo-czerwona i kojarzyła się starożytnym Rzymianom z pożogą wojenną. Odcień bierze się od tlenków żelaza pokrywających powierzchnię. Mars jest planetą wewnętrzną z cienką atmosferą, o powierzchni usianej kraterami uderzeniowymi, podobnie jak powierzchnia Księżyca i wielu innych ciał Układu Słonecznego. Występują na nim różne rodzaje terenu, podobne do ziemskich: wulkany, doliny, pustynie i polarne czapy lodowe. Okres obrotu wokół własnej osi jest niewiele dłuższy niż ziemski i wynosi 24,6229 godziny (24h 37m 22s). Na Marsie znajduje się najwyższa góra w Układzie Słonecznym – Olympus Mons i największy kanion – Valles Marineris. Gładki obszar równinny Vastitas Borealis na półkuli północnej, który obejmuje 40% powierzchni planety, może być pozostałością ogromnego uderzenia[2][3]. W przeciwieństwie do Ziemi, Mars jest geologicznie i tektonicznie nieaktywny.',
            ]
        ];

        DB::table('planet')->insert($data);
    }
}

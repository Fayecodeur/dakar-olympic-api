<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nation;

class NationSeeder extends Seeder
{
    public function run(): void
    {
        $nations = [
            ['code' => 'SEN', 'name' => 'Sénégal'],
            ['code' => 'MLI', 'name' => 'Mali'],
            ['code' => 'CIV', 'name' => "Côte d'Ivoire"],
            ['code' => 'GHA', 'name' => 'Ghana'],
            ['code' => 'NGA', 'name' => 'Nigeria'],
            ['code' => 'CMR', 'name' => 'Cameroun'],
            ['code' => 'COD', 'name' => 'République démocratique du Congo'],
            ['code' => 'CGO', 'name' => 'République du Congo'],
            ['code' => 'GAB', 'name' => 'Gabon'],
            ['code' => 'BEN', 'name' => 'Bénin'],
            ['code' => 'TGO', 'name' => 'Togo'],
            ['code' => 'GIN', 'name' => 'Guinée'],
            ['code' => 'GNB', 'name' => 'Guinée-Bissau'],
            ['code' => 'MRT', 'name' => 'Mauritanie'],
            ['code' => 'MAR', 'name' => 'Maroc'],
            ['code' => 'ALG', 'name' => 'Algérie'],
            ['code' => 'TUN', 'name' => 'Tunisie'],
            ['code' => 'EGY', 'name' => 'Égypte'],
            ['code' => 'RSA', 'name' => 'Afrique du Sud'],
            ['code' => 'KEN', 'name' => 'Kenya'],
            ['code' => 'ETH', 'name' => 'Éthiopie'],

            ['code' => 'FRA', 'name' => 'France'],
            ['code' => 'GER', 'name' => 'Allemagne'],
            ['code' => 'ESP', 'name' => 'Espagne'],
            ['code' => 'ITA', 'name' => 'Italie'],
            ['code' => 'POR', 'name' => 'Portugal'],
            ['code' => 'GBR', 'name' => 'Royaume-Uni'],
            ['code' => 'BEL', 'name' => 'Belgique'],
            ['code' => 'NED', 'name' => 'Pays-Bas'],
            ['code' => 'SUI', 'name' => 'Suisse'],
            ['code' => 'GRE', 'name' => 'Grèce'],

            ['code' => 'USA', 'name' => 'États-Unis'],
            ['code' => 'CAN', 'name' => 'Canada'],
            ['code' => 'MEX', 'name' => 'Mexique'],
            ['code' => 'BRA', 'name' => 'Brésil'],
            ['code' => 'ARG', 'name' => 'Argentine'],
            ['code' => 'COL', 'name' => 'Colombie'],
            ['code' => 'CHI', 'name' => 'Chili'],

            ['code' => 'CHN', 'name' => 'Chine'],
            ['code' => 'JPN', 'name' => 'Japon'],
            ['code' => 'KOR', 'name' => 'Corée du Sud'],
            ['code' => 'IND', 'name' => 'Inde'],
            ['code' => 'PAK', 'name' => 'Pakistan'],
            ['code' => 'THA', 'name' => 'Thaïlande'],
            ['code' => 'VIE', 'name' => 'Vietnam'],

            ['code' => 'AUS', 'name' => 'Australie'],
            ['code' => 'NZL', 'name' => 'Nouvelle-Zélande'],
        ];
        foreach ($nations as $nation) {
            Nation::create($nation);
        }
    }
}

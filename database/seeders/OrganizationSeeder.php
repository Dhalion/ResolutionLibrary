<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            "Bundesebene",
            "Rheinland-Pfalz",
            "Baden-Württemberg",
            "Hessen",
            "Bayern",
            "Nordrhein-Westfalen",
            "Niedersachsen",
            "Schleswig-Holstein",
            "Mecklenburg-Vorpommern",
            "Brandenburg",
            "Sachsen",
            "Sachsen-Anhalt",
            "Thüringen",
            "Berlin",
            "Hamburg",
            "Bremen",
            "Saarland",
        ];
        foreach ($names as $name) {
            Organization::create([
                "name" => $name,
                "shortName" => $this->getShortName($name),
            ]);
        }
    }

    private function getShortName(string $name): string
    {
        $shortName = "";
        $words = explode(" ", $name);
        foreach ($words as $word) {
            $shortName .= ucfirst($word[0]);
        }
        return $shortName;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(['France', 'Italie', 'Espagne', 'Portugal', 'Belgique', 'Suisse', 'Allemagne', 'Angleterre', 'Pays-Bas', 'Autriche', 'Pologne', 'République Tchèque', 'Hongrie', 'Slovaquie', 'Slovénie', 'Croatie', 'Bosnie-Herzégovine', 'Serbie', 'Monténégro', 'Albanie', 'Macédoine du Nord', 'Grèce', 'Turquie', 'Bulgarie', 'Roumanie', 'Moldavie', 'Ukraine', 'Biélorussie', 'Russie', 'Estonie', 'Lettonie', 'Lituanie', 'Finlande', 'Suède', 'Norvège', 'Danemark', 'Irlande', 'Islande', 'Malte', 'Chypre', 'Luxembourg', 'Andorre', 'Monaco', 'Liechtenstein', 'Saint-Marin', 'Vatican', 'Maroc']);   
       
        $categories->each(fn ($category) => Category::create([
                'name' => $category,
                'slug' =>Str::slug($category),
            ]));
    }
}
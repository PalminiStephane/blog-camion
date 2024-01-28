<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['#AventureEnFamille', '#ConseilsDeVoyage', '#RencontresLocales', '#CampingSauvage', '#Itinéraires', '#ConseilsTechniques', '#GastronomieLocale', '#ActivitésEnPleinAir', '#AnimauxDeCompagnie', '#InspirationVoyage ', '#VuesPanoramiques', '#BudgetVoyage', '#HistoiresLocales', '#DefisDuVoyage', '#RetourÀLaNature', '#Galères', '#EcoleEnVoyage']);
   
        $tags->each(fn ($tag) => Tag::create([
            'name' => $tag,
            'slug' =>Str::slug($tag),
        ]));
    }
    
}

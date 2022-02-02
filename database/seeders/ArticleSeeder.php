<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        // nous pourrions ici écrire du SQL pour la création de notre contenu

        // exemple avec la facade DB
        // création de 10 articles 
        for ($i=0; $i < 10; $i++) { 
            DB::table('articles')->insert([
                'title' => Str::random(10),
                'content' => Str::random(100),
            ]);
        }

        // exemple avec le modèle Eloquent Article
        for ($i=0; $i < 10; $i++) {
            Article::create([
                'title' => Str::random(10),
                'content' => Str::random(100),
            ]);
        }

        // Regardez la différence entre les deux fonction en base de données
    }
}

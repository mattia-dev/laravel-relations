<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            $article = new Article();
            $article->title = $faker->sentence(7);

            $authors = Author::all();
            $authorsID = [];
            foreach ($authors as $author) {  
                $authorsID[] = $author->id;
            }
            $randAuthorKey = array_rand($authorsID, 1);
            $authorID = $authorsID[$randAuthorKey];
            $article->author_id = $authorID;

            $article->image = $faker->imageUrl(250, 250, 'article', true);
            $article->body = $faker->paragraphs(30, true);
            $article->save();
        }
    }
}

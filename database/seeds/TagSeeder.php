<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsArray = [
            'Politics',
            'Sport',
            'World',
            'Economics',
            'Science',
            'Art',
            'Gossip',
            'Cinema',
            'Local News',
            'Tech'
        ];

        foreach ($tagsArray as $tag) {
            $tagObject = new Tag();
            $tagObject->name = $tag;
            $tagObject->save();
        }
    }
}

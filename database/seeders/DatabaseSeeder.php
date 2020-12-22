<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(3)->create();
        User::factory(10)->create();
        Tag::factory(20)->create();
        $arrCate= array('milk','snack','candy','toothpaste', 'socola');
        for($i=0;$i<=4;$i++)
        DB:: table('categories')->insert(
            [
                'type'=>$arrCate[$i],
           

        ]);

        Article::factory(50)->create()->each(function($article){
            $ids = range(1, 20);
            shuffle($ids);//trộn
            $sliced = array_slice($ids, 1, 10);
            $article->tags()->attach($sliced);
        });
        //categories

                 
                    DB::table('article_tag')->insert(
                        [
                            'article_id' => random_int(1, 10),
                            'tag_id' => random_int(1, 11),
                            'total_quatity' => random_int(1, 11),
                            'total_price' => rand(1000000, 10000000),
                        ]
                                  
                    );
                    
      
    }
}

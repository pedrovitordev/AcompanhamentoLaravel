<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([

            'title' => 'Primeiro titulo',
            'description' => 'Primeira descrição',
            'content' => 'Primeiro conteudo ',
            'is_active' => 1,
            'slug' => 'Primeiro slug ',
            'user_id' => 1
        ]);
    }
}

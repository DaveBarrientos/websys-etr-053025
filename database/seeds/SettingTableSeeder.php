<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"Welcome to National Bookstore Website, your premier destination for books and educational essentials. Discover a curated collection of books, school supplies, and stationery designed to inspire learning and creativity. Dive into a world of knowledge, quality, and convenience—where every purchase fuels your passion for reading and growth.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"McArthur Highway, Urdaneta, Philippines",
            'email'=>"nationalbookstore@gmail.com",
            'phone'=>"639273425459",
        );
        DB::table('settings')->insert($data);
    }
}

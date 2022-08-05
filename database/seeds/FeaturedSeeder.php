<?php

use App\Featured;
use Illuminate\Database\Seeder;

class FeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Featured::create([
            "judul"=>"Data",
            "deskripsi"=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour",
            "link"=>"https://google.com"
        ]);
        Featured::create([
            "judul"=>"Project",
            "deskripsi"=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour",
            "link"=>"https://google.com"
        ]);
        Featured::create([
            "judul"=>"Issue",
            "deskripsi"=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour",
            "link"=>"https://google.com"
        ]);
        Featured::create([
            "judul"=>"Courses",
            "deskripsi"=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour",
            "link"=>"https://google.com"
        ]);
    }
}

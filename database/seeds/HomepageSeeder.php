<?php

use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homepage = array(
            array(
                'homepage_banner' => 'homepage/banner-img1.jpg',
                'homepage_text1_picture' => 'homepage/banner-icon1.png',
                'homepage_text1' => 'Lorem ipsum dolor sit amet',
                'homepage_text2_picture' => 'homepage/banner-icon1.png',
                'homepage_text2' => 'Lorem ipsum dolor sit amet',
                'homepage_text3_picture' => 'homepage/banner-icon1.png',
                'homepage_text3' => 'Lorem ipsum dolor sit amet',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\HomePageContent::insert($homepage);
    }
}

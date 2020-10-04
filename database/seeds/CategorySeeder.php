<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            array(
                'url_name' => 'health-care',
                'name' => 'Health <span>Care</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'business-management',
                'name' => 'Business <span>Management</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'real-estate',
                'name' => 'Real <span>Estate</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'accounting-taxation',
                'name' => 'Accounting & <span>Taxation</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'human-resources',
                'name' => 'Human <span>Resources</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'food-beverage',
                'name' => 'Food & <span>Beverage</span>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'url_name' => 'construction',
                'name' => 'Construction',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\Category::insert($category);
    }
}

<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            array(
                'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@upskill.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'profile_picture' => 'admin/admin.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\Admin::insert($admin);
    }
}

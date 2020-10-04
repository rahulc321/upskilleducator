<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = array(
            array(
                'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
                'fullname' => 'Application User',
                'username' => 'appuser',
                'email' => 'user@upskill.com',
                'password' => \Illuminate\Support\Facades\Hash::make('user123'),
                'mobile_no' => 1234567890,
                'job_title' => 'test title',
                'profile_picture' => 'users/user.png',
                'company_name' => 'test company',
                'company_address' => 'test address',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\Users::insert($user);
    }
}


<?php

use Illuminate\Database\Seeder;

class OurSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ourSpeakers = array(
            array(
                'title' => 'Joel Garfinkle',
                'image' => 'speaker/speaker-img.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur et ex et
                            faucibus. Aenean ultricies sapien vel ligula blandit, venenatis facilisis lorem
                            pellentesque. ',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'title' => 'Joel Garfinkle',
                'image' => 'speaker/speaker-img.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur et ex et
                            faucibus. Aenean ultricies sapien vel ligula blandit, venenatis facilisis lorem
                            pellentesque. ',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'title' => 'Joel Garfinkle',
                'image' => 'speaker/speaker-img.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur et ex et
                            faucibus. Aenean ultricies sapien vel ligula blandit, venenatis facilisis lorem
                            pellentesque. ',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\OurSpeaker::insert($ourSpeakers);
    }
}

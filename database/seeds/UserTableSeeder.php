<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // this will authomatically generate a user for us
        $user = App\User::create([
            'name' => 'usman',
            'email' => 'usman.basharmal123@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => 1
        ]);

            App\Profile::create([
                'user_id' => $user->id,
                'avatar' => 'uploads/avatars/usman.jpg',
                'about' => 'This is autho generated about text',
                'facebook' => 'facebook.com',
                'youtube' => 'youtube.com'

            ]);

    }
}

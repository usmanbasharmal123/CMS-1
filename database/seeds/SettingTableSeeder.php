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
        //
        \App\Setting::create([
            'site_name'=>'Blog_created_by_Usman',
            'contact_number'=>'0093-789818532',
            'contact_email'=>'info@laravel.com',
            'address'=>'Kabul_Afghanistan'
        ]);
    }
}

<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\SetupPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SetupPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setup_pages = array(
            array('slug' => 'home','title' => 'Home','url' => '/','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL),

            array('slug' => 'about','title' => 'About','url' => '/about','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL),

            array('slug' => 'service','title' => 'Service','url' => '/service','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL),

            array('slug' => 'web-journal','title' => 'Web Journal','url' => '/journal','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL),

            array('slug' => 'developer','title' => 'Developer','url' => '/developer','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL),

            array('slug' => 'contact','title' => 'Contact','url' => '/contact','last_edit_by' => '1','status' => '1','created_at' => '2024-01-30 04:00:08','updated_at' => NULL)
        ); 

        SetupPage::insert($setup_pages);
    }
}

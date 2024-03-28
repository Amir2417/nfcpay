<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\NFCPayConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NFCPayConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data       = [
            array('admin_id' => 1,'slug'    => 'nfc-pay-config','name' => 'NFCPay Payment Gateway','image'  => null ,'env' => 'TEST', 'version' => '1.0.0','created_at' => '2024-03-28 11:02:46','updated_at' => '2024-03-28 11:02:46')
        ];
        NFCPayConfig::insert($data);

    }
}

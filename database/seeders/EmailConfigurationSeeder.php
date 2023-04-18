<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\DB;

class EmailConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('email_configurations')->insert([
            "driver"        =>    'null',
            "host"          =>    'null',
            "port"          =>    'null',
            "encryp tion"    =>   'null',
            "user_name"     =>    'null',
            "password"      =>    'null',
            "sender_name"   =>    'null',
            "sender_email"  =>    'null'
        ]);
    }
}

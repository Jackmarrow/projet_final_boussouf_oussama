<?php

namespace Database\Seeders;

use App\Models\AdminInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminInfo::create([
            'city'=>'Buttonwood, California.',
            'address'=> 'Rosemead, CA 91770',
            'phone_number'=> '00 (440) 9865 562',
            'email'=> 'support@colorlib.com'
        ]);
    }
}

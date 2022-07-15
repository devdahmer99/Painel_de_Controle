<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Visitor::create([
            'visitor' => '10.0.0.2',
            'data_access' => '2022-07-14 22:59:01',
            'page' => '/logout'
        ]);

    }
}

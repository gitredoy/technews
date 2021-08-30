<?php

use Illuminate\Database\Seeder;
use App\Roleper;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roleper::truncate();
        Roleper::create(['name'=>'admin']);
        Roleper::create(['name'=>'author']);
        Roleper::create(['name'=>'user']);
    }
}

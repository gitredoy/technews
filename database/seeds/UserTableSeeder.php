<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roleper;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Roleper::where('name','admin')->first();
        $authorRole = Roleper::where('name','author')->first();
        $userRole   = Roleper::where('name','user')->first();

        $admin = User::create([
            'name' => 'Mr Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234')
        ]);
        $admin->roles()->attach($adminRole);

        $author = User::create([
            'name' => 'Mr Author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('author1234')
        ]);
        $author->roles()->attach($authorRole);

        $user = User::create([
            'name' => 'Mr User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234')
        ]);
        $user->roles()->attach($userRole);
    }
}

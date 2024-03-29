<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Factory::create();
//
//        $user1 = User::create(['name' => 'Ahmed Samy', 'username' => 'AhmedSamy', 'email' => 'ahmed@gmail.com', 'mobile' => '01000000000', 'email_verified_at' => Carbon::now(), 'password' => bcrypt('123123123'), 'status' => 1,]);
//
//        for ($i = 0; $i <10; $i++) {
//            $user = User::create([
//                'name' => $faker->name,
//                'username' => $faker->userName,
//                'email' => $faker->email,
//                'mobile' => '01' . random_int(100000000, 999999999),
//                'email_verified_at' => Carbon::now(),
//                'password' => bcrypt('123123123'),
//                'status' => 1
//            ]);
//        }
        $faker = Factory::create();


        $adminRole = Role::create(['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'System Administrator', 'allowed_route' => 'admin']);
        $editorRole = Role::create(['name' => 'editor', 'display_name' => 'Supervisor', 'description' => 'System Supervisor', 'allowed_route' => 'admin']);
        $userRole = Role::create(['name' => 'user', 'display_name' => 'User', 'description' => 'Normal User', 'allowed_route' => null]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@amirican-university.test',
            'mobile' => '966500000001',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $admin->attachRole($adminRole);


        $editor = User::create([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@amirican-university.test',
            'mobile' => '966500000002',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $editor->attachRole($editorRole);


        $user1 = User::create(['name' => 'Ahmed Samy', 'username' => 'AhmedSamy', 'email' => 'ahmed@amirican-university.test', 'mobile' => '01000000000', 'email_verified_at' => Carbon::now(), 'password' => bcrypt('123123123'), 'status' => 1,]);
        $user1->attachRole($userRole);

        for ($i = 0; $i <10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => '9665' . random_int(10000000, 99999999),
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123123123'),
                'status' => 1
            ]);
            $user->attachRole($userRole);
        }

    }
}

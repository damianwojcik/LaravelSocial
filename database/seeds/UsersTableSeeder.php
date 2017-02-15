<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        /*================ Constants ================*/

        $usersCount = 20;
        $usersPassword = 'pass';

        /*===========================================*/

        for ($i = 1; $i<=$usersCount; $i++){

            $date = $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get());

            if ($i === 1){

                DB::table('users')->insert([
                    'name' => 'Damian Wójcik',
                    'sex' => 'male',
                    'email' => 'khamian@gmail.com',
                    'password' => bcrypt($usersPassword),
                    'created_at' => $date,
                    'updated_at' => $date
                ]);

            }else{

                $sex = $faker->randomElement(['male', 'female']);

                switch ($sex){

                    case 'male':
                        $name = $faker->firstNameMale . ' ' . $faker->lastNameMale;
                        break;

                    case 'female':
                        $name = $faker->firstNameFemale . ' ' . $faker->lastNameFemale;
                        break;

                }

                DB::table('users')->insert([
                    'name' => $name,
                    'sex' => $sex,
                    'email' => str_replace('-', '', str_slug($name)) . '@' . $faker->safeEmailDomain,
                    'password' => bcrypt($usersPassword),
                    'created_at' => $date,
                    'updated_at' => $date
                ]);

            }

        }


    }
}
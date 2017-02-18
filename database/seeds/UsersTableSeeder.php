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
                    'firstName' => 'Damian',
                    'lastName' => 'Wójcik',
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
                        $firstName = $faker->firstNameMale;
                        $lastName = $faker->lastNameMale;
                        $avatar_link = json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large;
                        break;

                    case 'female':
                        $avatar_link = json_decode(file_get_contents('https://randomuser.me/api/?gender=female'))->results[0]->picture->large;
                        $firstName = $faker->firstNameFemale;
                        $lastName = $faker->lastNameFemale;
                        break;

                }

                DB::table('users')->insert([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'avatar' => $avatar_link,
                    'sex' => $sex,
                    'email' => $firstName . $lastName . '@' . $faker->safeEmailDomain,
                    'password' => bcrypt($usersPassword),
                    'created_at' => $date,
                    'updated_at' => $date
                ]);

            }

        }


    }
}

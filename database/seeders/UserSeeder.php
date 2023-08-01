<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $gender = ['Male', 'Female'];
        for($i=1; $i<=15; $i++)
        {
            $index = $i %2;
            if($i % 2 == 0){
                $index = 1;
            }

            $imageUrl = 'https://source.unsplash.com/450x250/?' . urlencode($gender[$index - 1]);

            $type = ['Introvert', 'Extrovert'];
            // Download the image and store it in the storage folder
            $imagePath = $this->downloadImage($imageUrl);
            if($imagePath) {
                $data = [
                    'name' => $faker->name($gender[$index - 1]),
                    'email' => $faker->email,
                    'password' => Hash::make('1234'),
                    'gender' => $gender[$index - 1],
                    'hobby' => implode(', ', $faker->words(5)),
                    'instagram_id' => $faker->userName,
                    'phone' => $faker->phoneNumber,
                    'type' => $type[$index - 1],
                    'price_regist' => $faker->numberBetween(100000, 125000),
                    'payment_status' => 'done',
                    'picture' => $imagePath,
                ];

                DB::table('users')->insert($data);
            }
        }
    }

    private function downloadImage(string $imageUrl)
    {
        $imageData = file_get_contents($imageUrl);
        if ($imageData) {
            // Generate a random filename for the image
            $filename = 'unsplash_' . uniqid() . '.jpg';

            // Save the image in the storage folder
            $imagePath = 'public/uploads/user/' . $filename;
            Storage::put($imagePath, $imageData);

            return $filename; // Return the image path relative to the storage folder
        }

        return false;
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Room;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'surname'=>'adminovic',
            'email' => 'admin@example.com',
            'phone' => '20000000',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
            User::factory()->create([
            'name' => 'user',
            'surname'=>'userovic',
            'email' => 'user@example.com',
            'phone' => '21111111',
            'role' => 'user',
            'password' => bcrypt('password1')

        ]);


        Room::create([
            'title' => 'Double Deluxe',
            'description' => 'Šis numurs ir ideāli piemērots pāriem, kas vēlas izbaudīt īpašu un relaksējošu uzturēšanos. Tas ietver plašu guļamistabu ar lielu divvietīgu gultu, mini bāru, kā arī kafijas automātu. Deluxe numurā ir moderna vannas istaba ar džakuzi, dušu, luksusa piederumiem un mīkstiem dvieļiem',
            'image' => 'images/Deluxe.jpg',
            'price' => 230,
            'type' => 'Deluxe',
            'breakfast' => 'Iekļauts',
        ]);

        Room::create([
            'title' => 'Double Standard',
            'description' => 'Šis komfortablais un funkcionālais standarta numurs ir lieliski piemērots pārim vai diviem ceļotājiem,
             kas meklē ērtu atpūtu. 
            Numurā ir divas atsevišķas gultas vai viena liela gulta. Ir bezmaksas Wi-Fi interneta pieslēgums, leduskapis un  ērts rakstāmgalds. Numurā ir privāta vannas istaba ar dušu , tualetes piederumiem un dvieļiem.',
            'image' => 'images/standarts.jpg',
            'price' => 150,
            'type' => 'Standard',
            'breakfast' => 'Iekļauts',
        ]);


        Review::create([
            'user_id' => '2',
            'rating' => '4',
            'comment' => 'Numurs bija ļoti ērts un mājīgs. Viss bija ļoti tīrs un kārtīgs. Mēs izbaudījām mūsu uzturēšanos šeit. Gulta bija ērta, un vannas istaba bija ļoti labi aprīkota. Vienīgais, kas varētu būt uzlabojams, ir skaņas izolācija, jo reizēm bija dzirdama troksnis no kāpņu telpas. Tomēr kopumā ļoti patīkama pieredze. Paldies!'
        ]);
    }
}

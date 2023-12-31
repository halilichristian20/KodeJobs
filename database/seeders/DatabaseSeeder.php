<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            "name" => "Tropang Charat",
            "email" => "charat@gmail.com",
        ]);

        // $user = factory(6)->create([
        //     "user_id" => $user->$id
        // ]);

        Listing::factory(6)->create([
            "user_id" => $user->id
        ]);


        // Listing::create([
        // 'title' => 'Laravel Senior Developer',
        // 'tags' => 'laravel, javascript',
        // 'company' => 'Acme Corp',
        // 'location' => 'Makati, PH',
        // 'email' => 'email1@email.com',
        // 'website' => 'https://www.acme.com',
        // 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
        // Listing::create([
        // 'title' => 'Full-Stack Engineer',
        // 'tags' => 'laravel, backend ,api',
        // 'company' => 'Stark Industries',
        // 'location' => 'Cebu, PH',
        // 'email' => 'email2@email.com',
        // 'website' => 'https://www.starkindustries.com',
        // 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //     ]);
    }
}

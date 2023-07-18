<?php
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
  
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Kamran",
            "email" => "kamran@aisoftwares.co.in",
            "password" => bcrypt("123456"),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),

        ]);

        User::create([
            "name" => "shekhar",
            "email" => "shekhar@aisoftwares.co.in",
            "password" => bcrypt("123456"),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),

        ]);

        User::create([
            "name" => "akash",
            "email" => "akash@aisoftwares.co.in",
            "password" => bcrypt("123456"),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),

        ]);

        


    }
}
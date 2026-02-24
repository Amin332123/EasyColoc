<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
             RoleSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => Role::where('name', 'admin')->first()->id,
            'password' => '12341234'
        ]);
        User::factory(100)->create();
         $this->call([
           
            ColocationSeeder::class
        ]);
    }
}

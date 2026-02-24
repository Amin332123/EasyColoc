<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\Expense;
use App\Models\Membership;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class ColocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        Colocation::factory(10)->create()->each(function ($house) use ($users) {
            $roommates = $users->random(10);
            foreach ($roommates as $roommate) {
                Membership::create([
                    'user_id' => $roommate->id,
                    'colocation_id' => $house->id,
                    'role' => 'member',
                    'joined_at' => now(),
                ]);
            }
            $categories = Categorie::factory(5)->create(['colocation_id' => $house->id]);
            Expense::factory(10)
                ->recycle([$house])
                ->recycle($categories)
                ->recycle($roommates)
                ->create();



            $Expenses = Expense::where('colocation_id', $house->id)->get();
            foreach ($Expenses as $Expense) {

               Payment::factory(2)->create([
                'expense_id' => $Expense->id,
                'user_id' => $roommates->random()->id,
                'amount' => $Expense->amount / 2
               ]);
            }
        });



    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Column;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //   \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'surname'=>'Sh',
             'email' => 'test@example.com',
         ]);
         Column::factory()->create([
             'id'=>'1',
             'title'=>'Отложено',
         ]);
        Column::factory()->create([
            'id'=>'2',
            'title'=>'В процессе',
        ]);
        Column::factory()->create([
            'id'=>'3',
            'title'=>'Завершено',
        ]);
    }
}

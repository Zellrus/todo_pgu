<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
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
         Group::factory()->create([
            'group_name'=>'Администратор',
         ]);
        Group::factory()->create([
            'group_name'=>'Редактор',
        ]);
        Group::factory()->create([
            'group_name'=>'Может смотреть',
        ]);
    }
}

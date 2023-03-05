<?php

namespace Database\Seeders;

use app\Models\DefaultMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'message' => 'Привет, Танечка этот бот для тебя',
                'code' => 'start',
            ],
            [
                'message' => 'Стихи на сегодня закончились:(',
                'code' => 'poetry',
            ],
            [
                'message' => 'Картинки на сегодня закончились:(',
                'code' => 'image',
            ],
            [
                'message' => 'Какая то ошибка:(',
                'code' => 'error',
            ],
        ];

        foreach ($messages as $message) {
            DB::table('default_messages')->insert($message);
        }
    }
}

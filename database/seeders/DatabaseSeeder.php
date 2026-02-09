<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public $clients = [
        'Вкусвилл',
        'Четыре лапы',
        'Иван-поле',
        'Look Green',
        'Вкусвилл',
        'Четыре лапы',
        'Иван-поле',
        'Look Green',
    ];


    public $projects = [
        [
            'title' => 'Вкусвилл',
            'services' => ['Нарратив бренда', 'Линейка продуктов'],
            'summary' => 'Разработка локального бренда',
            'cover' => 'project-1.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Ямал',
            'services' => ['Дизайн бренда', 'Указка продуктов'],
            'summary' => 'Переработка фикального тренда',
            'cover' => 'project-2.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Вкусвилл',
            'services' => ['Нарратив бренда', 'Линейка продуктов'],
            'summary' => 'Разработка локального бренда',
            'cover' => 'project-1.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Ямал',
            'services' => ['Дизайн бренда', 'Указка продуктов'],
            'summary' => 'Переработка фикального тренда',
            'cover' => 'project-2.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Вкусвилл',
            'services' => ['Нарратив бренда', 'Линейка продуктов'],
            'summary' => 'Разработка локального бренда',
            'cover' => 'project-1.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Ямал',
            'services' => ['Дизайн бренда', 'Указка продуктов'],
            'summary' => 'Переработка фикального тренда',
            'cover' => 'project-2.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Ямал',
            'services' => ['Дизайн бренда', 'Указка продуктов'],
            'summary' => 'Переработка фикального тренда',
            'cover' => 'project-2.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Вкусвилл',
            'services' => ['Нарратив бренда', 'Линейка продуктов'],
            'summary' => 'Разработка локального бренда',
            'cover' => 'project-1.png',
            'description' => 'Описание проекта'
        ],
        [
            'title' => 'Ямал',
            'services' => ['Дизайн бренда', 'Указка продуктов'],
            'summary' => 'Переработка фикального тренда',
            'cover' => 'project-2.png',
            'description' => 'Описание проекта'
        ]
    ];

    public function run(): void
    {

        foreach ($this->clients as $client) {
            $client = Client::create(['name' => $client]);
            $rnd = rand(1, 2);
            $client->addMedia(public_path("fixed/test/client-{$rnd}.png"))
                ->preservingOriginal()
                ->toMediaCollection('cover');
        };

        foreach ($this->projects as $project) {
            $newProject = Project::create([
                'title' => $project['title'],
                'services' => $project['services'],
                'summary' => $project['summary'],
                'description' => $project['description'] . $project['title'],
            ]);
            $newProject->addMedia(public_path("fixed/test/{$project['cover']}"))
                ->preservingOriginal()
                ->toMediaCollection('cover');
        };

        \App\Models\User::firstOrCreate([
            'name' => 'Admin Name',
            'email' => config('app.admin.email'),
            'email_verified_at' => now(),
            'password' => Hash::make(config('app.admin.password'))
        ]);
    }
}

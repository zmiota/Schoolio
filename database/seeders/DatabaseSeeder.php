<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //subjects
        $subjects = [
            'Matematyka',
            'Język polski',
            'Język angielski',
            'Fizyka',
            'Chemia',
            'Biologia',
            'Historia',
            'Geografia',
            'Informatyka',
        ];

        foreach ($subjects as $name) {
            Subject::create([
                'name' => $name,
            ]);
        }

        $subjectIds = Subject::pluck('id')->toArray();

        //schoolClasses
        $classes = [
            ['name' => '1A', 'year' => '2024/2025'],
            ['name' => '1B', 'year' => '2024/2025'],
            ['name' => '2A', 'year' => '2024/2025'],
            ['name' => '2B', 'year' => '2024/2025'],
            ['name' => '3A', 'year' => '2024/2025'],
        ];

        foreach ($classes as $class) {
            SchoolClass::create($class);
        }

        //admin user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('WSB2026!wsb'),
            'role' => 'admin',
        ]);

        //teachers
        User::factory()->create([
            'name' => 'Adam Wiśniewski',
            'email' => 'adamwisniewski@example.com',
            'password' => bcrypt('WSB2026!wsb'),
            'role' => 'teacher',
        ])->subjects()->sync(
            collect($subjectIds)
                ->random(min(rand(1, 3), count($subjectIds)))
                ->toArray()
        );

        User::factory()->count(5)->create([
            'password' => bcrypt('WSB2026!wsb'),
            'role' => 'teacher',
        ])->each(function (User $teacher) use ($subjectIds) {
            $count = min(rand(1, 3), count($subjectIds));

            $teacher->subjects()->sync(
                collect($subjectIds)->random($count)->toArray()
            );
        });

        //students
        User::factory()->create([
            'name' => 'Jan Kowalski',
            'email' => 'jankowalski@example.com',
            'password' => bcrypt('WSB2026!wsb'),
            'class_id' => SchoolClass::first()->id,
            'role' => 'student',
        ])->subjects()->sync(
            collect($subjectIds)
                ->random(min(rand(3, 6), count($subjectIds)))
                ->toArray()
        );

        User::factory()->count(10)->create([
            'password' => bcrypt('WSB2026!wsb'),
            'role' => 'student',
        ])->each(function (User $student) use ($subjectIds) {
            $student->class_id = SchoolClass::inRandomOrder()->value('id');
            $student->save();

            $count = min(rand(3, 6), count($subjectIds));

            $student->subjects()->sync(
                collect($subjectIds)->random($count)->toArray()
            );
        });
    }
}

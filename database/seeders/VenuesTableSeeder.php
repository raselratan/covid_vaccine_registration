<?php

namespace Database\Seeders;

use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @noinspection PhpExpressionResultUnusedInspection
     */
    public function run(): void
    {
        $venues = [
            [
                "name" => 'Dhaka',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Chittagong',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Khulna',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Rajshahi',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Rangpur',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Barishal',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Sylhet',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Mymensingh',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Kushtia',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Rajbari',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Faridpur',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Cumilla',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Noakhali',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Chandpur',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Joypurhat',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Dinajpur',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => 'Hobiganj',
                "capacity_per_day" => rand(10, 20),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Venue::truncate();
        Schema::enableForeignKeyConstraints();
        Venue::insert($venues);
    }
}

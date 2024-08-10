<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        return [
          'admin_name' => "admin-".Str::random(2),
          'admin_password' => Hash::make("user01"),
          'first_name' => fake()->firstName(),
          'last_name' => fake()->lastName(),
          'email' => fake()->unique()->safeEmail(),
          'phone' => '0846262588',
          'birth' => "$dateNow",
          'salt' => 'salt',
          'is_admin' => true,
          'status' => 1,
          'created_at' => "$dateNow",
          'updated_at' => "$dateNow",
          'deleted_at' => "$dateNow",
          'created_by' => "user01",
          'updated_by' => "user01",
          'deleted_by' => "",
        ];
      }
    }
}

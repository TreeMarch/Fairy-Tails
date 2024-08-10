<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $dt = Carbon::now();
      $dateNow = $dt->toDateTimeString();
      return [
        'account_id' => "141601" . Str::random(4),
        'user_name' => "user01",
        'user_password' => Hash::make("user01"),
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->unique()->safeEmail(),
        'phone_number' => '0846262588',
        'favourite' => 'Reading',
        'birth' => "$dateNow",
        'user_name' => "user01", //
        'user_password' => static::$password ??= Hash::make("user01"),//
        'first_name' => fake()->firstName(),//
        'last_name' => fake()->lastName(),//
        'email' => fake()->unique()->safeEmail(),//
        'phone_number' => '0846262588',//
        'favourite' => 'Reading',//
        'birth' => "$dateNow",//
        'salt' => 'salt',
        'current_coin' => 100,
        'is_admin' => false,
        'status' => 1,
        'created_at' => "$dateNow",
        'updated_at' => "$dateNow",
        'deleted_at' => "$dateNow",
        'created_by' => "user01",
        'updated_by' => "user01",
        'created_by' => "user_name",// LAY TU USER NAME NG DUNG NHAP VAO
        'updated_by' => "user_name",// LAY TU USER NAME NG DUNG NHAP VAO
        'deleted_by' => "",
      ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
          'password' => static::$password ??= Hash::make('password'),

        ]);
    }
}

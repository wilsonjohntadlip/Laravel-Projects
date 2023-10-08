<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'company' => fake()->company(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'user_id' => fake()->numberBetween($min=1, $max=5),
        ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::dropIfExists('contacts');
        Schema::dropIfExists('users');
        
    }
}
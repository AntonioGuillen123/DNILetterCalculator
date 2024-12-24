<?php

namespace Tests\Feature\Api;

use App\Models\DniLetter;
use Database\Seeders\DniLetterSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DniLetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfItCalculatesTheLetterOfTheIdWhenEnteringItsNumber(): void
    {
        $this->seed(DniLetterSeeder::class);

        $data = [
            'fullDNI' => '99999999R'
        ];

        $response = $this->post(route('index'), [
            'dni' => 99999999
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfItReturnsTheErrorMessageForRequiredFieldValidation(): void
    {
        $this->seed(DniLetterSeeder::class);

        $data = [
            'dni' => 'The dni field is required'
        ];

        $response = $this->postJson(route('index'), [
            'dni' => null
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($data);
    }

    public function test_CheckIfItReturnsTheErrorMessageOfIntegerValidation(): void
    {
        $this->seed(DniLetterSeeder::class);

        $data = [
            'dni' => 'The dni field must be an integer, try again'
        ];

        $response = $this->postJson(route('index'), [
            'dni' => 'text'
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($data);
    }

    public function test_CheckIfItReturnsTheErrorMessageForValidationOfNumberGreaterThan0(): void
    {
        $this->seed(DniLetterSeeder::class);

        $data = [
            'dni' => 'The dni field must be at least 0'
        ];

        $response = $this->postJson(route('index'), [
            'dni' => -1
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($data);
    }

    public function test_CheckIfItReturnsTheErrorMessageForValidationOfNumberLessThan99999999(): void
    {
        $this->seed(DniLetterSeeder::class);

        $data = [
            'dni' => 'The dni field must be a maximum 99999999'
        ];

        $response = $this->postJson(route('index'), [
            'dni' => 999999999
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($data);
    }
}
<?php

namespace Tests\Unit\Authentication;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_successful_registration()
    {
        $data = [
            'name' => 'Visal Rukmal',
            'email' => 'visal@gmail.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'User registered successfully',
                ]);

        $this->assertDatabaseHas('users', [
            'email' => 'visal@gmail.com',
        ]);
    }

    public function test_validation_failure_missing_name()
    {
        $data = [
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name']);
    }

    public function test_validation_failure_invalid_email()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    public function test_validation_failure_email_already_exists()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'navodkamilka@gmail.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

}

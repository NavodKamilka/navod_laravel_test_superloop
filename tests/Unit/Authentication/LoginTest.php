<?php

namespace Tests\Unit\Authentication;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_successful_login()
    {
        $data = [
            'email' => 'navodkamilka@gmail.com',
            'password' => 'password123',
        ];
    
        $response = $this->postJson('/api/login', $data);
    
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Login successful',
                 ]);
    
        $this->assertArrayHasKey('token', $response->json());
        $this->assertArrayHasKey('user', $response->json());
    }

    public function test_validation_failure_missing_email()
    {
        $data = [
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    public function test_invalid_credentials_wrong_password()
    {

        $data = [
            'email' => 'navodkamilka@gmail.com',
            'password' => 'wrongpassword',
        ];

        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(401)
                ->assertJson([
                    'message' => 'Invalid credentials',
                ]);
    }


    
}

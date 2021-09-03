<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var \App\Http\Requests\LoginRequest
     */
    private $rules;

    /**
     * @var \Illuminate\Validation\Validator
     */
    private $validator;

    /**
     * @var
     */
    private $faker;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->validator = app()->get('validator');
        //$this->rules = (new LoginRequest())->rules();
        $this->faker = Factory::create();
    }

    /**
     * Reset the migrations
     */
    public function tearDown(): void
    {
        //$this->artisan('migrate:reset');
        parent::tearDown();
    }
    /**
     * Create a new role
     * @test
     */
    public function can_create_a_new_rol()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user,'api');

        $response = $this->postJson(route('role.store'),[
            'name' => 'Super User'
        ]);

        $response->assertStatus(200);
    }
}

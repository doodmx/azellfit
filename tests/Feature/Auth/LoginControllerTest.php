<?php

namespace Tests\Feature\Auth;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginControllerTest extends TestCase
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
        $this->rules = (new LoginRequest())->rules();
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
     * @return array
     */
    public function validationProvider()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            'request_should_fail_when_no_email_is_provided'         => [
                'passed' => false,
                'data'   => [
                    'password' => $faker->password()
                ]
            ],
            'request_should_fail_when_a_no_valid_email_is_provided' => [
                'passed' => false,
                'data'   => [
                    'email' => $faker->userName()
                ]
            ],
            'request_should_fail_when_no_password_is_provided'      => [
                'passed' => false,
                'data'   => [
                    'email' => $faker->email()
                ]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider validationProvider
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function role_validation_results_as_expected($shouldPass, $mockedRequestData)
    {
        $this->assertEquals(
            $shouldPass,
            $this->validate($mockedRequestData)
        );
    }

    /**
     * @param $mockedRequestData
     * @return mixed
     */
    protected function validate($mockedRequestData)
    {
        return $this->validator
            ->make($mockedRequestData, $this->rules)
            ->passes();
    }

    /**
     * A super admin can sign in
     * @test
     * @return void
     */
    public function a_super_admin_can_sign_in()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('api/users/login', [
            "email"    => "superadmin@azellft.com",
            "password" => "123456"
        ]);

        $response->assertStatus(200);
        //Verify json structure only
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at',
            'user' => [
                'profile'
            ]
        ]);
    }

    /**
     * @test
     */
    public function request_should_fail_when_no_credentials_correctly_are_provided()
    {
        $response = $this->postJson(route('login'), [
            'email'    => $this->faker->email(),
            'password' => $this->faker->password()
        ]);

        $response->assertStatus(
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'email'
            ]
        ]);
    }

    /**
     * @test
     */
    public function when_a_user_sign_in_returns_their_role_and_permissions()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('api/users/login', [
            "email"    => "superadmin@azellft.com",
            "password" => "123456"
        ]);

        $response->assertStatus(200);
        //Verify json structure only
        $response->assertJsonStructure([
            'role',
            'permission'
        ]);
    }
}

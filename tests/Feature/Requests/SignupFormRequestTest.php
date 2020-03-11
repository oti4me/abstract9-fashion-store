<?php


namespace Tests\Feature\Requests;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\SignupFormRequest;
use Tests\TestCase;

class SignupFormRequestTest extends TestCase
{
    public function test_login_validates_using_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            RegisterController::class,
            'register',
            SignupFormRequest::class
        );
    }

    public function test_validation_rules()
    {
        $this->assertEquals([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
        ], (new SignupFormRequest())->rules());
    }
}

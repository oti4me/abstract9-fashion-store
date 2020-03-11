<?php


namespace Tests\Feature\Requests;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\LoginFormRequest;
use Tests\TestCase;

class LoginFormRequestTest extends TestCase
{
    public function test_login_validates_using_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            LoginController::class,
            'login',
            LoginFormRequest::class
        );
    }

    public function test_validation_rules()
    {
        $this->assertEquals([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4']
        ], (new LoginFormRequest())->rules());
    }
}

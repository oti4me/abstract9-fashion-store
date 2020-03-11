<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param string $controller
     * @param string $method
     * @param string $formRequest
     * @return void
     * @see https://jasonmccreary.me/articles/test-validation-laravel-form-request-assertion/
     */
    public function assertActionUsesFormRequest(string $controller, string $method, string $formRequest): void
    {
        $this->assertTrue(
            is_subclass_of($formRequest, 'Illuminate\\Foundation\\Http\\FormRequest'),
            $formRequest . ' is not a type of Form Request'
        );

        try {
            $reflector = new \ReflectionClass($controller);
            $action = $reflector->getMethod($method);
        } catch (\ReflectionException $exception) {
            $this->fail('Controller action could not be found: ' . $controller . '@' . $method);
        }

        $this->assertTrue(
            $action->isPublic(),
            'Action "' . $method . '" is not public, controller actions must be public.'
        );

        $actual = collect($action->getParameters())->contains(function ($parameter) use ($formRequest) {
            return $parameter->getType() instanceof \ReflectionNamedType
                && $parameter->getType()->getName() === $formRequest;
        });

        $this->assertTrue(
            $actual,
            'Action "' . $method . '" does not have validation using the "' . $formRequest . '" Form Request.'
        );
    }
}

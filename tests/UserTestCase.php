<?php

namespace Tests;

class UserTestCase extends TestCase
{
    use CreatesApplication;

    protected function withoutAuthentication()
    {
        $this->app['auth']->guard('andelan')->unsetUser();

        return $this;
    }

    /**
     * Login a default user
     */
    protected function withDefaultAuthentication()
    {
        return $this->actingAs();
    }
}

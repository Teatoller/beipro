<?php

namespace Tests;

class UserTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withDefaultAuthentication();
    }
}

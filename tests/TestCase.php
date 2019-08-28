<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public static $hasRefreshedDatabase = false;

    protected function setUp(): void
    {
        parent::setUp();

        if(!static::$hasRefreshedDatabase){
            $this->refreshMainDatabase();
        };
    }

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

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[RefreshDatabase::class])) {
            static::$hasRefreshedDatabase = false;
        }

        return $uses;
    }

    /**
     * Define hooks to migrate the database before and after each test.
     */
    public function refreshMainDatabase()
    {
        if (! static::$hasRefreshedDatabase) {
            $this->artisan('migrate:fresh');
            $this->app[Kernel::class]->setArtisan(null);
            static::$hasRefreshedDatabase = true;
        }
    }
}

<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Fixtures\DataGeneration;
use Tests\Fixtures\TestData;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DataGeneration;

    public static $hasRefreshedDatabase = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (! static::$hasRefreshedDatabase) {
            $this->refreshMainDatabase();
        }

        $this->testData = TestData::$testData;
    }

    /**
     * Define hooks to migrate the database before and after each test.
     */
    public function refreshMainDatabase()
    {
        if (! static::$hasRefreshedDatabase) {
            $this->artisan('migrate:fresh');
            $this->app[Kernel::class]->setArtisan(null);
            $this->generateData();
            static::$hasRefreshedDatabase = true;
        }
    }

    protected function withoutAuthentication()
    {
        $this->app['auth']->guard('api')->unsetUser();
        return $this;
    }

    /**
     * Login a default user
     */
    protected function withDefaultAuthentication()
    {
        return $this->actingAs($this->testData['testuser']);
    }

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[RefreshDatabase::class])) {
            static::$hasRefreshedDatabase = false;
        }

        return $uses;
    }
}

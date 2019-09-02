<?php

namespace Tests\Fixtures;

trait DataGeneration
{
    public $fixtures = [
        UsersFixture::class,
    ];

    public $testData = [];

    /**
     * Generates the global test data from all the test data fixtures defined.
     * The global test data is data that can be reused across multiple tests, minimizing the need to generate test data
     * specific to a test or test suite.
     */
    public function generateData()
    {
        TestData::$testData = [];

        foreach ($this->fixtures as $fixture) {
            TestData::$testData = array_merge(
                TestData::$testData,
                app($fixture)->execute()
            );
        }
    }
}

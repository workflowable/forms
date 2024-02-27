<?php

namespace Workflowable\Form\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Workflowable\Form\FormServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [];
    }

    public function getEnvironmentSetUp($app)
    {

    }
}

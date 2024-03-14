<?php

namespace Workflowable\Forms\Tests\Unit;

use Workflowable\Forms\Fields\Email;
use Workflowable\Forms\Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_that_we_can_add_a_pattern_for_the_telephone()
    {
        $field = Email::make('Email', 'email')
            ->pattern(".+@example\.com");

        $this->assertEquals(".+@example\.com", $field->toArray()['metaData']['pattern']);
    }
}

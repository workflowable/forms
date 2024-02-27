<?php

namespace Workflowable\Form\Tests\Unit;

use Workflowable\Form\Fields\Telephone;
use Workflowable\Form\Tests\TestCase;

class TelephoneTest extends TestCase
{
    public function test_that_we_can_add_a_pattern_for_the_telephone()
    {
        $field = Telephone::make('Telephone', 'tel')
            ->pattern('[0-9]{3}-[0-9]{3}-[0-9]{4}');

        $this->assertEquals('[0-9]{3}-[0-9]{3}-[0-9]{4}', $field->toArray()['metaData']['pattern']);
    }
}

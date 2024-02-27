<?php

namespace Workflowable\Form\Tests\Unit;

use Workflowable\Form\Fields\Text;
use Workflowable\Form\Tests\TestCase;

class TextTest extends TestCase
{
    public function test_that_we_can_set_a_minimum_number_of_characters()
    {
        $textField = Text::make('Text', 'text')
            ->min(10)
            ->toArray();

        $this->assertEquals(10, $textField['metaData']['min']);
    }

    public function test_that_we_can_set_a_maximum_number_of_characters()
    {
        $textField = Text::make('Text', 'text')
            ->max(10)
            ->toArray();

        $this->assertEquals(10, $textField['metaData']['max']);
    }

    public function test_that_we_can_set_a_placeholder()
    {
        $textField = Text::make('Text', 'text')
            ->placeholder('Placeholder')
            ->toArray();

        $this->assertEquals('Placeholder', $textField['metaData']['placeholder']);
    }
}

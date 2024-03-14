<?php

namespace Workflowable\Forms\Tests\Unit;

use Workflowable\Forms\Fields\Select;
use Workflowable\Forms\Tests\TestCase;

class SelectTest extends TestCase
{
    public function test_we_can_directly_pass_options()
    {
        $options = [
            'sm' => 'Small',
            'md' => 'Medium',
            'lg' => 'Large',
        ];

        $field = Select::make('Select', 'select')
            ->options($options);

        $this->assertEqualsCanonicalizing($options, $field->toArray()['metaData']['options']);
    }

    public function test_that_we_can_pass_a_url_to_fetch_data_from()
    {
        $field = Select::make('Select', 'select')
            ->url('localhost');

        $this->assertEqualsCanonicalizing([
            'url' => 'localhost',
            'value' => 'id',
            'label' => 'label',
        ], $field->toArray()['metaData']);
    }
}

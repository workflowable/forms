<?php

namespace Workflowable\Form\Tests\Unit;

use Workflowable\Form\Fields\Field;
use Workflowable\Form\Tests\TestCase;

class FieldTest extends TestCase
{
    protected Field $field;

    protected function setUp(): void
    {
        $this->field = new class('Field Label', 'Field Key') extends Field
        {
        };

        parent::setUp();
    }

    public function test_that_we_can_fill_a_field()
    {
        $field = $this->field->fillUsing(function ($value) {
            return $value + 1;
        })->fill(1);

        $this->assertEquals(2, $field->getValue());
    }

    public function test_that_we_can_directly_set_the_fields_value()
    {
        $field = $this->field->setValue(1);

        $this->assertEquals(1, $field->getValue());
    }

    public function test_that_we_can_modify_the_value_for_display_to_a_user()
    {
        $field = $this->field->setValue(1)->displayUsing(function ($value) {
            return "Value is $value";
        });

        $this->assertEquals('Value is 1', $field->resolveForDisplay());
    }

    public function test_that_we_can_assign_meta_data()
    {
        $field = $this->field->withMetaData([
            'options' => ['option'],
        ]);

        $this->assertArrayHasKey('options', $field->getMetaData());
        $this->assertEqualsCanonicalizing([
            'options' => ['option'],
        ], $field->getMetaData());
    }

    public function test_that_we_can_add_help_text()
    {
        $field = $this->field->helpText('Help text');
        $this->assertEquals('Help text', $field->getHelpText());
    }

    public function test_that_we_can_add_rules_as_a_string()
    {
        $field = $this->field->rules('required');
        $this->assertEquals('required', $field->getRules());
    }

    public function test_that_we_can_add_rules_as_an_array()
    {
        $field = $this->field->rules(['required']);
        $this->assertEquals(['required'], $field->getRules());
    }
}

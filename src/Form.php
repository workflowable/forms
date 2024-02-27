<?php

namespace Workflowable\Form;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator as Validator;
use Workflowable\Form\Fields\Field;

class Form
{
    use Macroable;

    /**
     * The given fields needed to build out a workflow component
     */
    protected Collection $fields;

    public function __construct()
    {
        $this->fields = collect([]);
    }

    /**
     * Sets the fields to be used on the form.
     */
    public static function make(array $fields = []): Form
    {
        $form = new Form();
        foreach ($fields as $field) {
            if ($field instanceof Field) {
                $form->addField($field);
            }
        }

        return $form;
    }

    /**
     * Receives an associative array of field values and sets the values of matching fields on the builder if they exist.
     *
     * @return $this
     */
    public function fill(array $fieldValues = []): self
    {
        foreach ($fieldValues as $name => $value) {
            if ($this->fields->has($name)) {
                /** @var Field $currentField */
                $currentField = $this->fields->get($name);
                $currentField->fill($value);
            }
        }

        return $this;
    }

    /**
     * Adds a new field to the form
     *
     * @return $this
     */
    protected function addField(Field $field, ?callable $builderCallback = null): self
    {
        if ($builderCallback !== null) {
            $builderCallback($field);
        }

        $this->fields->put($field->getKey(), $field);

        return $this;
    }

    /**
     * Validates the parameters
     *
     * @throws ValidationException
     */
    public function validate(): array
    {
        return $this->getValidator()->validate();
    }

    public function isValid(): bool
    {
        return $this->getValidator()->passes();
    }

    /**
     * Returns an array of validation rules for the form fields
     */
    public function getRules(): array
    {
        return $this->fields->map(function (Field $field) {
            return $field->getRules();
        })->toArray();
    }

    /**
     * Get all values from the form fields
     */
    public function getValues(): array
    {
        return $this->fields->map(function (Field $field) {
            return $field->getValue();
        })->toArray();
    }

    /**
     * Creates a validator with the values and the rules for the form fields
     */
    public function getValidator(): Validator
    {
        return ValidatorFacade::make($this->getValues(), $this->getRules());
    }

    /**
     * Convert the contents of the form to an array
     */
    public function toArray(): array
    {
        return $this->fields->map(function (Field $field) {
            return $field->toArray();
        })->toArray();
    }
}

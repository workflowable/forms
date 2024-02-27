<?php

namespace Workflowable\Form\Fields;

use Closure;
use Illuminate\Support\Traits\Macroable;
use Workflowable\Form\Contracts\FieldContract;

abstract class Field implements FieldContract
{
    use Macroable;

    /**
     * The label of the field
     */
    protected string $label;

    /**
     * The key of the field
     */
    protected string $key;

    /**
     * @var mixed The value of the field.
     */
    protected mixed $value = null;

    /**
     * The validation rules for the field.
     */
    protected array|string|Closure $rules = [];

    /**
     * The component to be used when rendering the field.
     */
    protected string $component = 'field';

    /**
     * The help text to be displayed with the field.
     */
    protected ?string $helpText = null;

    protected ?Closure $fillUsingCallback = null;

    protected ?Closure $displayUsingCallback = null;

    /**
     * Additional data about the field to be passed to the component.
     */
    protected array $metaData = [];

    public function __construct(string $label, string $key)
    {
        $this->label = $label;
        $this->key = $key;
    }

    public static function make(string $label, string $key): static
    {
        return new static($label, $key);
    }

    /**
     * The key for the field
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The label to be displayed for the field
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    public function fill(mixed $value): self
    {
        if ($this->fillUsingCallback) {
            $value = call_user_func($this->fillUsingCallback, $value);
        }

        $this->setValue($value);

        return $this;
    }

    public function fillUsing(Closure $fillUsing): self
    {
        $this->fillUsingCallback = $fillUsing;

        return $this;
    }

    public function displayUsing(callable $displayUsing): self
    {
        $this->displayUsingCallback = $displayUsing;

        return $this;
    }

    public function resolveForDisplay(): mixed
    {
        if ($this->displayUsingCallback) {
            return call_user_func($this->displayUsingCallback, $this->value);
        }

        return $this->value;
    }

    /**
     * Set the value of the field
     *
     * @return $this
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of the field
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Get additional meta information to merge with the element payload.
     *
     * @return array<string, mixed>
     */
    public function getMetaData(): array
    {
        return $this->metaData;
    }

    /**
     * Set additional meta information for the element.
     *
     * @return $this
     */
    public function withMetaData(array $metaData): self
    {
        $this->metaData = array_merge($this->metaData, $metaData);

        return $this;
    }

    /**
     * Used to validate the data for the field.
     *
     * @return $this
     */
    public function rules(array|string|Closure $rules): Field
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get the validation rules for the field
     */
    public function getRules(): array|string|Closure
    {
        return $this->rules;
    }

    /**
     * Set the component to be used when rendering the field
     *
     * @return $this
     */
    public function helpText(string $helpText): self
    {
        $this->helpText = $helpText;

        return $this;
    }

    /**
     * Get the help text for the field
     */
    public function getHelpText(): ?string
    {
        return $this->helpText ?? null;
    }

    /**
     * Convert the field to an array.
     */
    public function toArray(): array
    {
        return [
            'component' => $this->component,
            'label' => $this->label,
            'key' => $this->key,
            'value' => $this->value,
            'display_as' => $this->resolveForDisplay(),
            'helpText' => $this->getHelpText(),
            'metaData' => $this->getMetaData(),
        ];
    }
}

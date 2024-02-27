<?php

namespace Workflowable\Form\Fields;

use Workflowable\Form\Contracts\CheckboxContract;

class Checkbox extends Field implements CheckboxContract
{
    protected string $component = 'checkbox';
}

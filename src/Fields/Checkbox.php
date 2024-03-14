<?php

namespace Workflowable\Forms\Fields;

use Workflowable\Forms\Contracts\CheckboxContract;

class Checkbox extends Field implements CheckboxContract
{
    protected string $component = 'checkbox';
}

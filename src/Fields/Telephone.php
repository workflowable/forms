<?php

namespace Workflowable\Forms\Fields;

use Workflowable\Forms\Contracts\TelephoneContract;

class Telephone extends Text implements TelephoneContract
{
    protected string $component = 'telephone';

    public function pattern(string $pattern): Telephone
    {
        $this->withMetaData([
            'pattern' => $pattern,
        ]);

        return $this;
    }
}

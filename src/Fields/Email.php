<?php

namespace Workflowable\Forms\Fields;

use Workflowable\Forms\Contracts\EmailContract;

class Email extends Text implements EmailContract
{
    protected string $component = 'email';

    public function pattern(string $pattern): Email
    {
        $this->withMetaData([
            'pattern' => $pattern,
        ]);

        return $this;
    }
}

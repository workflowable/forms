<?php

namespace Workflowable\Form\Fields;

use Workflowable\Form\Contracts\EmailContract;

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

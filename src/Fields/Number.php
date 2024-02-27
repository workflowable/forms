<?php

namespace Workflowable\Form\Fields;

use Workflowable\Form\Contracts\NumberContract;

class Number extends Text implements NumberContract
{
    protected string $component = 'number';

    /**
     * The step value for the number field
     *
     * @return $this
     */
    public function step(float|int $step): self
    {
        $this->withMetaData([
            'step' => $step,
        ]);

        return $this;
    }
}

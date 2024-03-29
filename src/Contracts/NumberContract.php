<?php

namespace Workflowable\Forms\Contracts;

interface NumberContract extends TextContract
{
    /**
     * The step value for the number field
     *
     * @return $this
     */
    public function step(float|int $step): self;
}

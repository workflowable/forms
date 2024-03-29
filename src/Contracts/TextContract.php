<?php

namespace Workflowable\Forms\Contracts;

interface TextContract extends FieldContract
{
    /**
     * The minimum number of characters
     *
     * @return $this
     */
    public function min(int $min): self;

    public function max(int $max): self;

    public function placeholder(string $placeholder): self;
}

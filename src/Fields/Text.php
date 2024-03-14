<?php

namespace Workflowable\Forms\Fields;

use Workflowable\Forms\Contracts\TextContract;

class Text extends Field implements TextContract
{
    protected string $component = 'text';

    /**
     * The minimum number of characters
     *
     * @return $this
     */
    public function min(int $min): self
    {
        $this->withMetaData([
            'min' => $min,
        ]);

        return $this;
    }

    public function max(int $max): self
    {
        $this->withMetaData([
            'max' => $max,
        ]);

        return $this;
    }

    public function placeholder(string $placeholder): self
    {
        $this->withMetaData([
            'placeholder' => $placeholder,
        ]);

        return $this;
    }
}

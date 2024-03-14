<?php

namespace Workflowable\Forms\Fields;

use Workflowable\Forms\Contracts\SelectContract;

class Select extends Field implements SelectContract
{
    protected string $component = 'select';

    /**
     * Defines the options for a select field
     *
     * @return $this
     */
    public function options(array $options): self
    {
        $this->withMetaData([
            'options' => $options,
        ]);

        return $this;
    }

    public function route(string $route, string $value = 'id', string $label = 'label'): SelectContract
    {
        return $this->url(route($route), $value, $label);
    }

    public function url(string $url, string $value = 'id', string $label = 'label'): SelectContract
    {
        $this->withMetaData([
            'url' => $url,
            'value' => $value,
            'label' => $label,
        ]);

        return $this;
    }
}

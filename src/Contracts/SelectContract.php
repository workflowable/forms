<?php

namespace Workflowable\Form\Contracts;

interface SelectContract extends FieldContract
{
    /**
     * Defines the options for a select field
     *
     * @return $this
     */
    public function options(array $options): SelectContract;

    /**
     * Defines a URL to go and fetch data from, and what keys to use for the values and Labels for each option
     */
    public function url(string $url, string $value = 'id', string $label = 'label'): SelectContract;
}

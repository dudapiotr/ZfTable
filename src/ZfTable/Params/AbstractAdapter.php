<?php

namespace ZfTable\Params;

use ZfTable\Options\ModuleOptions;
use ZfTable\Table\Exception;

abstract class AbstractAdapter
{

    /**
     * Module options object
     * @var ModuleOptions
     */
    protected $options;

    /**
     * Set module options
     *
     * @param  array|Traversable|ModuleOptions $options
     * @return AbstractTable
     */
    public function setOptions(ModuleOptions $options)
    {
        if (!$options instanceof ModuleOptions) {
            throw new Exception\InvalidArgumentException;
        }

        $this->options = $options;
        return $this;
    }

    /**
     * Get all module options
     *
     * @return ModuleOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

}

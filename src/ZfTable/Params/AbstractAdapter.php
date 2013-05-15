<?php

namespace ZfTable\Params;

use ZfTable\Options\ModuleOptions;
use ZfTable\AbstractCommon;

abstract class AbstractAdapter extends AbstractCommon
{

    /**
     * Module options object
     * @var ModuleOptions
     */
    protected $options;

    

    /**
     * Get all module options
     *
     * @return ModuleOptions
     */
    public function getOptions()
    {
        if(!$this->options){
            $this->options = $this->getTable()->getOptions();
        }
        return $this->options;
    }

}

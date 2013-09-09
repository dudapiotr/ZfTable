<?php

namespace ZfTable\Params;

use ZfTable\AbstractCommon;
use ZfTable\Config;

abstract class AbstractAdapter extends AbstractCommon
{
    
    

    /**
     * Get configuration of table
     *
     * @return Config
     */
    public function getConfig()
    {
        return $this->getTable()->getConfig();
    }

}

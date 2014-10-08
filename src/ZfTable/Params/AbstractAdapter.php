<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Params;

use ZfTable\AbstractCommon;
use ZfTable\Config;

abstract class AbstractAdapter extends AbstractCommon
{

    /**
     * Get configuration of table
     *
     * @return \ZfTable\Options\ModuleOptions
     */
    public function getOptions()
    {
        return $this->getTable()->getOptions();
    }
}

<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Source;

use ZfTable\AbstractCommon;
use ZfTable\Source\SourceInterface;

abstract class AbstractSource extends AbstractCommon implements SourceInterface
{

    abstract protected function limit();

    abstract protected function order();
    
    abstract protected function quickSearch();
}

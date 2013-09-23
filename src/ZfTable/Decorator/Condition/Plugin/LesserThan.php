<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Condition\Plugin;

use ZfTable\Decorator\Condition\AbstractCondition;

class LesserThan extends AbstractCondition
{
    
    /**
     * Name of column
     * @var string
     */
    protected $column;

    /**
     * Value
     * @var array
     */
    protected $value;

    /**
     * 
     * @param array $options
     */
    public function __construct($options)
    {
        $this->column = $options['column'];
        $this->value = $options['value'];
    }

    /**
     * Check if the condition is valid
     * @return boolean
     */
    public function isValid()
    {
        $row = $this->getActulRow();
        return ($row[$this->column] < $this->value) ? true : false;
    }

    
    
}

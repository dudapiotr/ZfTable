<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Condition\Plugin;

use ZfTable\Decorator\Condition\AbstractCondition;

class NotEqual extends AbstractCondition
{

    /**
     * Name of column
     * @var string
     */
    protected $column;

    /**
     * List of values to compare
     * @var array
     */
    protected $values;

    /**
     *
     * @param array $options
     */
    public function __construct($options)
    {
        $this->column = $options['column'];
        $this->values = is_array($options['values']) ? $options['values'] : array($options['values']);
    }

    /**
     * Check if the condition is valid
     * @return boolean
     */
    public function isValid()
    {
        $row = $this->getActulRow();
        foreach ($this->values as $value) {

            if ($row[$this->column]  == $value) {
                return false;
            }
        }
        return true;
    }
}

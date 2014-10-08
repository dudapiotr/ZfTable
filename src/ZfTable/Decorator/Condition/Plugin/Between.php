<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Condition\Plugin;

use ZfTable\Decorator\Condition\AbstractCondition;

class Between extends AbstractCondition
{

    /**
     * Name of column
     * @var string
     */
    protected $column;

    /**
     *
     * @var float | int
     */
    protected $min;

    /**
     *
     * @var float | int
     */
    protected $max;

    /**
     *
     * @param array $options
     */
    public function __construct($options)
    {
        $this->column = $options['column'];
        $this->min = $options['min'];
        $this->max = $options['max'];
    }

    /**
     * Check if the condition is valid
     *
     * (if arrays given as values it's enough to find only one elements equal to pattern)
     *
     * @return boolean
     */
    public function isValid()
    {
        $row = $this->getActulRow();

        if ($row[$this->column] >= $this->min  && $row[$this->column] <= $this->max) {
            return true;
        }
        return false;
    }

    /**
     *
     * @return float | int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     *
     * @return float | int
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     *
     * @return float | int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     *
     * @return float | int
     */
    public function setMax($max)
    {
        $this->max = $max;
    }
}

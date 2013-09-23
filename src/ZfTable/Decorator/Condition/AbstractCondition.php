<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Condition;

use ZfTable\Decorator\AbstractDecorator;

abstract class AbstractCondition implements ConditionInterface
{

    /**
     * Decorator
     * @var AbstractDecorator 
     */
    protected $decorator;

    /**
     * Get decorator
     * @return AbstractDecorator
     */
    public function getDecorator()
    {
        return $this->decorator;
    }

    /**
     * Set decorator
     * @param DataAccessInterface $decorator
     * @return \ZfTable\Decorator\Condition\AbstractCondition
     */
    public function setDecorator($decorator)
    {
        $this->decorator = $decorator;
        return $this;
    }

    
    /**
     * 
     * @return type
     */
    public function getActulRow(){
        return $this->decorator->getActualRow();
    }
}

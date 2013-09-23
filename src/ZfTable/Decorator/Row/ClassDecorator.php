<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Row;

class ClassDecorator extends AbstractRowDecorator
{

    /**
     * Class
     * @var string
     */
    protected $class;

    public function __construct($options)
    {
        $this->setClass($options['class']);
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        if (count($this->class) > 0) {
            foreach ($this->class as $class) {
                $this->getRow()->addClass($class);
            }
        }
        return $context;
    }

    /**
     * 
     * @param string $class
     * @return \ZfTable\Decorator\Row\ClassDecorator
     */
    public function setClass($class)
    {
        $this->class = (is_array($class)) ? $class : explode(' ', $class);
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

}
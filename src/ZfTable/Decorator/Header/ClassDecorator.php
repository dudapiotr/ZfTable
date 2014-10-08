<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Cell;

class ClassDecorator extends AbstractCellDecorator
{

    /**
     * Class
     * @var array
     */
    protected $class;

    public function __construct($options)
    {
        $this->setClass($options['class']);
    }

    /**
     * Rendering decorator
     *
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        if (count($this->class) > 0 && is_array($this->class)) {
            foreach ($this->class as $class) {
                $this->getCell()->addClass($class);
            }
        }
        return $context;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = (is_array($class)) ? $class : explode(' ', $class);
        return $this;
    }

    /**
     * Get class
     *
     * @return null|array
     */
    public function getClass()
    {
        return $this->class;
    }
}

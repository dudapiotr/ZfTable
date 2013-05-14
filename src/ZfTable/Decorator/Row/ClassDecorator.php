<?php

namespace ZfTable\Decorator\Cell;

class ClassDecorator extends AbstractCellDecorator
{

    protected $class;

    public function __construct($options)
    {
        $this->setClass($options['class']);
    }

    public function render($context)
    {
        if (count($this->class) > 0) {
            foreach ($this->class as $class) {
                $this->getCell()->addClass($class);
            }
        }
        return $context;
    }

    public function setClass($class)
    {
        $this->class = (is_array($class)) ? $class : explode(' ', $class);
        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

}
<?php

namespace ZfTable\Decorator\Cell;

class AttrDecorator extends AbstractCellDecorator
{

    protected $attr;
    
    
    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct($attributes)
    {
        $this->setAttr($attributes);
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        if (count($this->attr) > 0) {
            foreach ($this->attr as $name => $value) {
                $this->getCell()->addAttr($name, $value);
            }
        }
        return $context;
    }
    
    public function getAttr()
    {
        return $this->attr;
    }

    public function setAttr($attr)
    {
        $this->attr = $attr;
    }


    
}
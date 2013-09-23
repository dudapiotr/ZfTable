<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Cell;

class VarAttrDecorator extends AbstractCellDecorator
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
                $this->getCell()->addVarAttr($name, $value);
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
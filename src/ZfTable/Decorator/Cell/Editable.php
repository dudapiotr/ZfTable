<?php

namespace ZfTable\Decorator\Cell;

class Editable extends AbstractCellDecorator
{

    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct($options = array())
    {
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
      
        $this->getCell()->addClass('editable');
        $this->getCell()->addAttr('data-column', $this->getCell()->getHeader()->getName());
        return $context;
    }


}
<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Mapper extends AbstractCellDecorator
{

    /**
     * Array of options mapping 
     * @var array
     */
    protected $options;
    
    
    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if(count($options) == 0){
            throw new Exception\InvalidArgumentException('Array is empty');
        }
        $this->options = $options;
        
    }
    
    /**
     * 
     * @param type $context
     * @return type
     */
    public function render($context)
    {
        return (isset($this->options[$context])) ? $this->options[$context] :    $context;
    }

}
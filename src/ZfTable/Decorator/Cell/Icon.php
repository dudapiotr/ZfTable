<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Icon extends AbstractCellDecorator
{

    /**
     * Path to file
     * @var string
     */
    protected $path;
    
    /**
     * Alt attribute (optional)
     * @var string
     */
    protected $alt;

    /**
     * Place a decorator
     * @var type 
     */
    protected $place = null;
    
    
    
    public function __construct(array $options = array())
    {
        if(!isset($options['path'])){
            throw new Exception\InvalidArgumentException('path key in options argument requred');
        }
        $this->path = $options['path'];
        $this->alt = (isset($options['alt'])) ? $options['alt'] : null;
        $this->place = (isset($options['place'])) ? $options['place'] : null;
    }
    
    
    public function render($context)
    {
        if($this->place || $this->place == self::RESET_CONTEXT){
            return sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt);
        }
        elseif($this->place == self::PRE_CONTEXT){
            return sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt) . $context;
        }
        else{
            return $context . sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt);
        }
    }

}
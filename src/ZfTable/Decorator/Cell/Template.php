<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Template extends AbstractCellDecorator
{

    /**
     * Template
     * @var string
     */
    protected $template;

    /**
     * Array of variables
     * @var null | array
     */
    protected $vars;

    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if(!isset($options['template'])){
            throw new Exception\InvalidArgumentException('path key in options argument requred');
        }
        $this->template = $options['template'];
        $this->vars = is_array($options['vars']) ? $options['vars'] : array($options['vars']);
        $this->place = (isset($options['place'])) ? $options['place'] : self::POST_CONTEXT;
    }
    
    /**
     * See parent
     * @param type $context
     * @return type
     */
    public function render($context)
    {
        $values = array();
        foreach ($this->vars as $var) {
            $actualRow = $this->getCell()->getActualRow();
            $values[] = $actualRow[$var];
        }
        $value = vsprintf($this->template, $values);
        
        if($this->place == self::RESET_CONTEXT){
            return $value;
        }
        else{
            return ($this->place == self::PRE_CONTEXT) ? $value . $context :  $context . $value;
        }
    }
    
}
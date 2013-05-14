<?php

namespace ZfTable;

use ZfTable\AbstractElement;
use ZfTable\Decorator\DecoratorFactory;

class Cell extends AbstractElement
{

    protected $header;

    public function __construct($header)
    {
        $this->header = $header;
    }

    /**
     * 
     * @param type $name
     * @param type $options
     * @return \ZfTable\Decorator\Cell\AbstractCell
     */
    public function addDecorator($name, $options)
    {
        $decorator = DecoratorFactory::factoryCell($name, $options);
        $this->attachDecorator($decorator);
        $decorator->setCell($this);
        return $decorator;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function render()
    {

        $row = $this->getTable()->getRow()->getActualRow();
        $value = $row[$this->getHeader()->getName()];

        foreach ($this->decorators as $decorator) {
            //if ($decorator->checkCondition()) {
            $value = $decorator->render($value);
            //}
        }



        $render = sprintf("<td %s>%s</td>", $this->getAttributes(), $value);
        return $render;
    }

}

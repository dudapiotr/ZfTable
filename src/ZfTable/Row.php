<?php

namespace ZfTable;

use ZfTable\AbstractElement;

class Row extends AbstractElement
{

    /**
     *
     * @var array
     */
    protected $defaultClass = array('row');
    
    protected $actualRow;

    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\Header\AbstractHeaderDecorator
     */
    public function addDecorator($name, $options)
    {
        $decorator = DecoratorFactory::factoryRow($name, $options);
        $this->attachDecorator($decorator);
        $decorator->setRow($this);
        return $decorator;
    }

    public function getActualRow()
    {
        return $this->actualRow;
    }

    public function setActualRow($actualRow)
    {
        $this->actualRow = $actualRow;
    }

    public function renderRows()
    {

        $data = $this->getTable()->getData();
        $headers = $this->getTable()->getHeaders();
        $render = '';

        foreach ($data as $rowData) {
            $this->setActualRow($rowData);
            $rowRender = '';
            foreach ($headers as $name => $options) {
                $rowRender .= $this->getTable()->getHeader($name)->getCell()->render();
            }
//            foreach($this->_decorator as $decorator){
//                $decorator->render('');
//            } 

            $render .= sprintf('<tr %s>%s</tr>', $this->getAttributes(), $rowRender);
        }
        return $render;
    }

}

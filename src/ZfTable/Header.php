<?php

namespace ZfTable;

use ZfTable\AbstractElement;
use ZfTable\Cell;

class Header extends AbstractElement
{

    protected $name;
    protected $title;
    protected $width;

    /**
     *
     * @var Cell
     */
    protected $cell;
    protected static $orderReverse = array(
        'asc' => 'desc',
        'desc' => 'asc'
    );

    public function __construct($name, $options = array())
    {
        $this->name = $name;
        $this->setOptions($options);
        $this->cell = new Cell($this);
    }

    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\Header\AbstractHeaderDecorator
     */
    public function addDecorator($name, $options)
    {
        $decorator = DecoratorFactory::factoryHeader($name, $options);
        $this->attachDecorator($decorator);
        $decorator->setHeader($this);
        return $decorator;
    }

    public function setOptions($options)
    {
        $this->title = (isset($options['title'])) ? $options['title'] : '';
        $this->width = (isset($options['width'])) ? $options['width'] : '';
        $this->order = (isset($options['order'])) ? $options['order'] : true;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * 
     * @return Cell
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * 
     * @param Cell $cell
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setParams($params)
    {
        $this->title = $params['title'];
    }

    public function setTable($table)
    {
        $this->table = $table;
        $this->getCell()->setTable($table);
    }

    protected function initOrdering()
    {
        $paramColumn = $this->getTable()->getParamAdapter()->getColumn();
        $paramOrder = $this->getTable()->getParamAdapter()->getOrder();
        $order = ($paramColumn == $this->getName()) ? static::$orderReverse[$paramOrder] : 'asc';
        $this->addAttr('data-order', $order);
        $this->addAttr('data-column', $this->getName());
    }

    public function render()
    {
        $this->initOrdering();

        $render = $this->getTitle();
        foreach ($this->decorators as $decorator) {
            $render = $decorator->render($render);
        }
        return sprintf('<th %s >%s</th>', $this->getAttributes(), $render);
    }

}
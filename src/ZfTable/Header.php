<?php

namespace ZfTable;

use ZfTable\AbstractElement;
use ZfTable\Cell;

class Header extends AbstractElement
{
    /**
     * Name of header (should be the same like name in database)
     * @var string
     */
    protected $name;
    
    /**
     * Title of header
     * @var string
     */
    protected $title;
    
    /**
     * Width of the column
     * @var int
     */
    protected $width;

    /**
     * Cell object
     * @var Cell
     */
    protected $cell;
    
    /**
     * Static array exchanging ordering (when column is ascending, in data-ordering should be desc)
     * @var array
     */
    protected static $orderReverse = array(
        'asc' => 'desc',
        'desc' => 'asc'
    );
    
    /**
     * Flag to inform if column should be sortable
     * @var type 
     */
    protected $sortable = true;

    /**
     * Array of options
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options = array())
    {
        $this->name = $name;
        $this->setOptions($options);
        $this->cell = new Cell($this);
    }

    /**
     * Set options like title, width, order, sortable
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

    /**
     * Set options like title, width, order
     * @param array $options
     * @return \ZfTable\Header
     */
    public function setOptions($options)
    {
        $this->title = (isset($options['title'])) ? $options['title'] : '';
        $this->width = (isset($options['width'])) ? $options['width'] : '';
        $this->order = (isset($options['order'])) ? $options['order'] : true;
        $this->sortable = (isset($options['sortable'])) ? $options['sortable'] : true;
        
        
        return $this;
    }

    /**
     * Get width of column
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set width of column
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Retrun cell object
     * @return Cell
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set cell object
     * @param Cell $cell
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
    }

    /**
     * Set name of header 
     * @param string $name
     * @return \ZfTable\Header
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name of header
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set header title
     * @param string $title
     * @return \ZfTable\Header
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get header title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Get sortable flag
     * @return boolean
     */
    public function getSortable()
    {
        return $this->sortable;
    }

    /**
     * Set flat to inform about sortable
     * @param boolean $sortable
     */
    public function setSortable($sortable)
    {
        $this->sortable = $sortable;
    }
    
    /**
     * Set reference to table
     * @param AbstractTable $table
     */
    public function setTable($table)
    {
        $this->table = $table;
        $this->getCell()->setTable($table);
    }

    /**
     * Init header (like asc, desc, column name )
     */
    protected function initRendering()
    {
        $paramColumn = $this->getTable()->getParamAdapter()->getColumn();
        $paramOrder = $this->getTable()->getParamAdapter()->getOrder();
        $order = ($paramColumn == $this->getName()) ? self::$orderReverse[$paramOrder] : 'asc';
        
        if($this->getSortable()){
            $classSorting = ($paramColumn == $this->getName()) ? 'sorting_' . self::$orderReverse[$paramOrder] : 'sorting';
            $this->addClass($classSorting);
            $this->addClass('sortable');
            $this->addAttr('data-order', $order);
            $this->addAttr('data-column', $this->getName());
        }
        
        
        if($this->width){
            $this->addAttr('width', $this->width);
        }
    }
    
    
    /**
     * Rendering header element
     * @return string
     */
    public function render()
    {
        $this->initRendering();
        $render = $this->getTitle();
        
        foreach ($this->decorators as $decorator) {
            $render = $decorator->render($render);
        }
        return sprintf('<th %s >%s</th>', $this->getAttributes(), $render);
    }

}
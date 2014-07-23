<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable;

use ZfTable\Table\TableInterface;
use ZfTable\Params\AdapterInterface as ParamAdapterInterface;
use ZfTable\Params\AdapterArrayObject;
use ZfTable\Table\Exception;
use ZfTable\Options\ModuleOptions;

use ZfTable\Config;

abstract class AbstractTable extends AbstractElement implements TableInterface
{

    /**
     * Collection on headers objects
     * @var array
     */
    protected $headersObjects;

    /**
     * List of headers with title and width option
     * @var array
     */
    protected $headers;

    /**
     * Datbase adapter
     * @var Zend\Db\Adapter\Adapter 
     */
    protected $adapter;

    /**
     *
     * @var \ZfTable\Source\SourceInterface
     */
    protected $source;

    /**
     *
     * @var Row 
     */
    protected $row;

    /**
     * Data after execute of query 
     * @var array | \Zend\Paginator\Paginator
     */
    protected $data;

    /**
     * Render object responsible for rendering
     * @var Render
     */
    protected $render;

    /**
     * Params adapter which responsible for universal mapping parameters from diffrent 
     * source (default params, Data Table params, JGrid params)
     * @var ParamAdapterInterface 
     */
    protected $paramAdapter;

    /**
     * Flag to know if table has been initializable
     * @var boolean
     */
    private $tableInit = false;


    /**
     * Default classes for table
     * @var array
     */
    protected $class = array('table', 'table-bordered', 'table-condensed', 'table-hover', 'table-striped', 'dataTable');
    
    /**
     * Array configuration of table
     * @var array 
     */
    protected $config;
    
    
    /**
     * Options base ond ModuleOptions and config array
     * @var \ZfTable\Options\ModuleOptions 
     */
    protected $options = null;
    
    
    /**
     * Check if table has benn initializable
     * @return boolean
     */
    public function isTableInit()
    {
        return $this->tableInit;
    }

    /**
     * Set module options
     *
     * @param  array|Traversable|ModuleOptions $options
     * @return AbstractTable
     */
    public function setOptions(ModuleOptions $options)
    {
        if (!$options instanceof ModuleOptions) {
            $options = new ModuleOptions($options);
        }

        $this->options = $options;
        return $this;
    }

    /**
     * Return Params adapter which responsible for universal mapping parameters from diffrent 
     * source (default params, Data Table params, JGrid params)
     * @return ParamAdapterInterface
     */
    public function getParamAdapter()
    {
        return $this->paramAdapter;
    }
    
    
    
    /**
     * 
     * @param \ZfTable\Params\AdapterInterface $paramAdapter
     * @throws \InvalidArgumentException
     */
    public function setParamAdapter($params)
    {
        if ($params instanceof \ZfTable\Params\AdapterInterface) {
            $this->paramAdapter = $params;
        } elseif ($params instanceof \Zend\Stdlib\Parameters) {
            $this->paramAdapter = new AdapterArrayObject($params);
        } else {
            throw new Excpetion\InvalidArgumentException('Parameter must be isntance of AdapterInterface or \Zend\Stdlib\Parameters');
        }
        $this->paramAdapter->setTable($this);
        $this->paramAdapter->init();
    }

    /**
     * 
     * @return array | \Zend\Paginator\Paginator
     * @throws \LogicException
     */
    public function getData()
    {
        if (!$this->data) {
            $source = $this->getSource();
            if (!$source) {
                throw new Exception\LogicException('Source data is required');
            }
            return $source->getData();
        }
    }

    /**
     * 
     * @return \ZfTable\Source\SourceInterface
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * 
     * @param \Zend\Db\Sql\Select |  $source
     * @return \ZfTable\AbstractTable
     * @throws \LogicException
     */
    public function setSource($source)
    {

        if ($source instanceof \Zend\Db\Sql\Select) {
            $source = new \ZfTable\Source\SqlSelect($source);
        } elseif ($source instanceof \Doctrine\ORM\QueryBuilder) {
            $source = new \ZfTable\Source\DoctrineQueryBuilder($source);
        } elseif(is_array($source)) {
            $source = new \ZfTable\Source\ArrayAdapter($source);
        } else {
            throw new \LogicException('This type of source is undefined');
        }

        $source->setTable($this);
        $this->source = $source;
        return $this;
    }

    /**
     * Get database adapter
     * @return Zend\Db\Adapter\Adapter 
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set database adapter
     * @param Zend\Db\Adapter\Adapter $adapter
     * @return \ZfTable\AbstractTable
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Rendering table 
     * @return string
     * @param string (html | dataTableAjaxInit | dataTableJson)
     */
    public function render($type = 'html', $template = null)
    {
        if (!$this->isTableInit()) {
            $this->initializable();
        }
        if ($type == 'html') {
            return $this->getRender()->renderTableAsHtml();
        } elseif ($type == 'dataTableAjaxInit') {
            return $this->getRender()->renderDataTableAjaxInit();
        } elseif ($type == 'dataTableJson') {
            return $this->getRender()->renderDataTableJson();
        } elseif ($type == 'custom') {
            return $this->getRender()->renderCustom($template);
        }
        
    }

    /**
     * Init configuration like setting header, decorators, filters and others 
     * (call in render method as well)
     */
    protected function initializable()
    {
        if(!$this->getParamAdapter()){
            throw new Exception\LogicException('Param Adapter is required');
        }
        if(!$this->getSource()){
            throw new Exception\LogicException('Source data is required');
        }
        
        $this->init = true;
        if (count($this->headers)) {
            $this->setHeaders($this->headers);
        }
        $this->init();
        
        $this->initFilters($this->getSource()->getSource());
    }
    
    
    /**
     * @deprecated since version 2.0
     * Function replace by initFilters 
     */
    protected function initQuickSearch()
    {
        
    }
    
    /**
     * Init filters for quick serach or filters for each column
     * @param \Zend\Db\Sql\Select $query
     */
    protected function initFilters($query)
    {
        
    }
    
    /**
     * 
     * @param array $headers
     * @return \ZfTable\AbstractTable
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        foreach ($headers as $name => $options) {
            $this->addHeader($name, $options);
        }

        return $this;
    }

    /**
     * Return array of headers
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * 
     * @param type $name
     * @return Header | boolean
     * @throws LogicException
     */
    public function getHeader($name)
    {
        if (!count($this->headersObjects)) {
            throw new LogicException('Table hasnt got defined headers');
        }
        if (!isset($this->headersObjects[$name])) {
            throw new \RuntimeException('Header name doesnt exist');
        }
        return $this->headersObjects[$name];
    }

    /**
     * Add new header
     * @param string $name
     * @param array $options
     */
    public function addHeader($name, $options)
    {

        $header = new Header($name, $options);
        $header->setTable($this);
        $this->headersObjects[$name] = $header;
    }

    /**
     * Get Row object
     * @return Row
     */
    public function getRow()
    {
        if (!$this->row) {
            $this->row = new \ZfTable\Row($this);
        }
        return $this->row;
    }

    /**
     * Set row object
     * @param Row $row
     * @return \ZfTable\AbstractTable
     */
    public function setRow($row)
    {
        $this->row = $row;
        return $this;
    }

    /**
     * Get Render object
     * @return Render
     */
    public function getRender()
    {
        if (!$this->render) {
            $this->render = new Render($this);
        }
        return $this->render;
    }

    /**
     * Get render object
     * @param \ZfTable\Render $render
     */
    public function setRender(Render $render)
    {
        $this->render = $render;
    }

    /**
     * Rendering tablae
     */
    public function __toString()
    {
        return $this->render();
    }
    
    /**
     * 
     * @return ModuleOptions
     * @throws Zend_Exception
     */
    public function getOptions()
    {
        if(is_array($this->config)){
            $this->config = new ModuleOptions($this->config); 
        } else if(!$this->config instanceof  ModuleOptions){
            throw new Zend_Exception('Config class problem');
        } 
        return $this->config;
        
    }
    
}
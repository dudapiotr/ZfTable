<?php

namespace ZfTable;

use ZfTable\Table\TableInterface;
use ZfTable\Params\AdapterInterface as ParamAdapterInterface;
use ZfTable\Params\AdapterArrayObject;
use ZfTable\Table\Excpetion;
use ZfTable\Options\ModuleOptions;

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
     * Module options object
     * @var ModuleOptions
     */
    protected $options;

    
    /**
     * Flag to know if table has been initializable
     * @var boolean
     */
    private $tableInit = false;
    
    
    
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
     * Get all module options
     *
     * @return ModuleOptions
     */
    public function getOptions()
    {
        if (null === $this->options) {
            $this->setOptions(new ModuleOptions());
        }
        return $this->options;
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
            $this->paramAdapter = new AdapterArrayObject($params, $this->getOptions());
        } else {
            throw new Excpetion\InvalidArgumentException('Parameter must be isntance of AdapterInterface or \Zend\Stdlib\Parameters');
        }
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
                throw new Excpetion\LogicException('Source data is required');
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
     */
    public function render()
    {
        if(!$this->isTableInit()){
            $this->initializable();
        }
        return $this->getRender()->renderTable();
    }
    
    
    
    /**
     * Init configuration like setting header, decorators, filters and others (call in render method as well)
     */
    public function initializable(){
        $this->init = true;
        if(count($this->headers)){
            $this->setHeaders($this->headers);
        }
        $this->init();
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
     * @return \ZfTable\Header\Header | boolean
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
}
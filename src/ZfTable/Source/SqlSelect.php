<?php

namespace ZfTable\Source;


use ZfTable\Source\AbstractSource;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\DbSelect;

;



class SqlSelect extends AbstractSource{
    
    
    /**
     *
     * @var \Zend\Db\Sql\Select 
     */
    protected $select;
    
    /**
     *
     * @var  \Zend\Paginator\Paginator
     */
    protected $paginator;
    
    
    /**
     *
     * @var \Zend\Db\Sql\Sql 
     */
    protected $sql;
    
    
    /**
     *
     * @var \ZfTable\Params\AdapterInterface 
     */
    protected $paramAdapter;
    
    /**
     * 
     * @param \Zend\Db\Sql\Select $select
     */
    public function __construct($select) {
        $this->select = $select;
    }
    
    
    /**
     * 
     * @return \Zend\Db\Sql\Select
     */
    public function getSelect(){
        return $this->select;
    }
    
    
    
    
    /**
     * 
     * @return \Zend\Paginator\Paginator
     */
    public function getData(){
        
        
        $paginator = $this->getPaginator();
        //$this->renderPaginator();
        
        return $paginator;
        
    }
    
    
    /**
     * Return data as PDO statemant
     * not-used
     * @return type
     */
    private function getDataAsPdoStatement(){
        $statement = $this->getSql()->prepareStatementForSqlObject($this->select);
        return $statement->execute();
    }
    
   
    
    
    /**
     * 
     * @return \Zend\Db\Sql\Sql
     */
    public function getSql(){
        if(!$this->sql){
            $this->sql = new \Zend\Db\Sql\Sql($this->getTable()->getAdapter());
        }
        return $this->sql;
    }
    
    
    /**
     *  
     * @return \Zend\Paginator\Paginator
     */
    public function getPaginator() {
        if(!$this->paginator){
             $adapter = new DbSelect($this->getSelect(),$this->getTable()->getAdapter());
             $this->paginator = new Paginator($adapter);
             $this->initQuery();
             $this->initPaginator();
        }
        return $this->paginator;
    }

    
    /**
     * 
     * @param \ZfTable\Source\Zend\Paginator\Paginator $paginator
     */
    public function setPaginator(Zend\Paginator\Paginator $paginator) {
        $this->paginator = $paginator;
    }

    
    /**
     *
     * @var \ZfTable\Params\AdapterInterface 
     */
    public function getParamAdapter() {
        if(!$this->paramAdapter){
            $this->paramAdapter = $this->getTable()->getParamAdapter();
        }
        return $this->paramAdapter;
    }

    
    /**
     * 
     * @param \ZfTable\Params\AdapterInterface $paramAdapter
     */
    public function setParamAdapter(\ZfTable\Params\AdapterInterface $paramAdapter) {
        $this->paramAdapter = $paramAdapter;
    }

        
    
    protected function initPaginator(){
        $this->paginator->setItemCountPerPage($this->getParamAdapter()->getItemCountPerPage());
        $this->paginator->setCurrentPageNumber($this->getParamAdapter()->getPage());
        
    }
    
    private function initQuery(){
        $this->order();
    }
    
    protected function limit(){
    }
    
    protected function offset(){
    }
    
    protected function order(){
        $column = $this->getParamAdapter()->getColumn();
        $order =  $this->getParamAdapter()->getOrder();
        if($column){
            $this->select->order($column .' '.$order);
        }
    }
    
}
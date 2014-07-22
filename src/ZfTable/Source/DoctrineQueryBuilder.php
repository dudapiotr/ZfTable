<?php
namespace ZfTable\Source;

use ZfTable\Source\AbstractSource;
use Zend\Paginator\Paginator;

 use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
 use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;


class DoctrineQueryBuilder extends AbstractSource
{
    
    /**
     *
     * @var \Doctrine\ORM\QueryBuilder 
     */
    protected $query;
    
    
    /**
     *
     * @var  \Zend\Paginator\Paginator
     */
    protected $paginator;
    
    /**
     * 
     * @param \Doctrine\ORM\QueryBuilder $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }
    
    /**
     *  
     * @return \Zend\Paginator\Paginator
     */
    public function getPaginator()
    {
        if (!$this->paginator) {
             $this->initQuery();
             $adapter = new DoctrineAdapter(new ORMPaginator($this->query));
             $this->paginator = new Paginator($adapter);
            $this->initPaginator();
           
        }
        return $this->paginator;
    }
    
    protected function limit()
    {
        
    }
    
    /**
     * Init query like ordering and quicksearching
     */
    private function initQuery()
    {
        $this->order();
        $this->quickSearch();
    }
    
    /**
     * Init paginator
     */
    protected function initPaginator()
    {
        $this->paginator->setItemCountPerPage($this->getParamAdapter()->getItemCountPerPage());
        $this->paginator->setCurrentPageNumber($this->getParamAdapter()->getPage());
    }
    
    
    
    protected function order()
    {
        $column = $this->getParamAdapter()->getColumn();
        $order = $this->getParamAdapter()->getOrder();
        
        if(!$column){
            return;
        }
        
        $header = $this->getTable()->getHeader($column);
        $tableAlias = ($header) ? $header->getTableAlias() : 'q';
        
        if ($column) {
            $this->query->orderBy($tableAlias.'.'.$column , $order);
        }
    }

    protected function quickSearch()
    {
        
    }

    public function getData()
    {
        $paginator = $this->getPaginator();
        return $paginator;
    }

    public function getSelect()
    {
        
    }

    public function setQuickSearchQuery(\Zend\Db\Sql\Select $quickSearchQuery)
    {
        
    }    //put your code here
}

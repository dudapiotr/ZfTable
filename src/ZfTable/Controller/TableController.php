<?php
namespace ZfTable\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use ZfTable\TableExample;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;


class TableController extends AbstractActionController
{
    
    /**
     *
     * @var ResultSet
     */
    protected $resultSet;
    
    /**
     *
     * @var Sql
     */
    protected $sql;
    
    
    
    protected $albumTable;
    
    /**
     *
     * @var Zend\Db\Adapter\Adapter
     */
    protected $dbAdapter;
    
    
    
    
    private function table(){
        $source = $this->getAlbumTable()->fetchAllSelect();
        
        $table = new TableExample\Table1();
        $table->setAdapter($this->getDbAdapter())
              ->setSource($source)  
              ->setParamAdapter($this->getRequest()->getPost())  
                ;
        
        return $table;
        
    }
    
    public function indexAction(){
        
        
        $table = $this->table();
        return new ViewModel(array(
            'table' => $table
        ));
        
    }
    
    
    public function ajaxTableAction(){
         $table = $this->table();

         $response = $this->getResponse();
         $response->setStatusCode(200);
         $response->setContent($table->render());
         return $response;
    
    
         
    }
    
    public function aAction()
    {
        
       
    }
    
    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
    
    
    /**
     * 
     * @return Zend\Db\Adapter\Adapter
     */
    public function getDbAdapter()
    {
        if (!$this->dbAdapter) {
            $sm = $this->getServiceLocator();
            $this->dbAdapter = $sm->get('zfdb_adapter');
        }
        return $this->dbAdapter;
    }
    
}
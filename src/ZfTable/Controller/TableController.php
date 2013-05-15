<?php

namespace ZfTable\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use ZfTable\Example\TableExample;
use Zend\View\Model\ViewModel;
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
     * @var 
     */
    protected $albumTable;

    /**
     *  
     * @var Zend\Db\Adapter\Adapter
     */
    protected $dbAdapter;

    
    /**
     * 
     * @return type
     */
    private function getSource(){
        return $this->getAlbumTable()->fetchAllSelect();
    }
    
    private function tableBase()
    {
        $source = $this->getSource();

        $table = new TableExample\Base();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $table;
    }
    
    private function tableDataTable()
    {
        $source = $this->getSource();

        $table = new TableExample\DataTable();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $table;
    }

    public function indexAction()
    {
        $tableDataTable = $this->tableDataTable();
        
        return new ViewModel(array(
            'tableDataTable' => $tableDataTable,
        ));
    }

    public function ajaxBaseAction()
    {
        $table = $this->tableBase();

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($table->render());
        return $response;
    }

    public function ajaxDataTableAction()
    {
        $table = $this->tableDataTable();

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($table->render('dataTableJson'));
        return $response;
    }
    
    
    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('ZfTable\Example\Model\AlbumTable');
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
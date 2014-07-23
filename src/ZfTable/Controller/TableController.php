<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */

namespace ZfTable\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use ZfTable\Example\TableExample;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;
use ZfTable\Params\AdapterDataTables;
use ZfTable\Options\ModuleOptions;
use ZfTable\AbstractTable;
use Doctrine\ORM\EntityManager; 

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
    protected $customerTable;

    /**
     *  
     * @var Zend\Db\Adapter\Adapter
     */
    protected $dbAdapter;

    /**
     *
     * @var ModuleOptions
     */
    protected $moduleOptions;
    
    
    
    
     /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function changesAction()
    {
        
    }
     
    public function bootstrapAction()
    {
    }
    
    /**
     * ********* Additional Params *******************
     * ***********************************
     */
    public function additionalParamsAction()
    {
    }
    public function ajaxadditionalParamsAction()
    {
        $table = new TableExample\AdditionalParams();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    /**
     * ********* Javascript Events *******************
     * ***********************************
     */
    public function javascriptEventsAction()
    {
    }
    public function ajaxJavascriptEventsAction()
    {
        $table = new TableExample\JavascriptEvents();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Array Adapter *******************
     * *****************************************
     */
    public function arrayAction()
    {
    }
    
    public function ajaxArrayAction()
    {   
        $table = new TableExample\ArrayAdapter();
        
        $sql = new \Zend\Db\Sql\Sql($this->getDbAdapter());
        
        $stmt = $sql->prepareStatementForSqlObject($this->getSource());
        $res = $stmt->execute();
        
        $resultSet = new \Zend\Db\ResultSet\ResultSet();
        $resultSet->initialize($res);
        
        $source = $resultSet->toArray();
        
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Doctrine Adapter *******************
     * *****************************************
     */
    public function doctrineAction()
    {
    }
    public function ajaxDoctrineAction()
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        
        $queryBuilder->add('select', 'p , q')
              ->add('from', '\ZfTable\Entity\Customer q')
              ->leftJoin('q.product', 'p')
                
        ;
        
        $table = new TableExample\Doctrine();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($queryBuilder)
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Closure *******************
     * *****************************************
     */
    public function closureAction()
    {
    }
    public function ajaxClosureAction()
    {
        $table = new TableExample\Closure();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    
    /**
     * ********* Column filtering *******************
     * ***********************************
     */
    public function columnFilteringAction()
    {
    }
    public function ajaxColumnFilteringAction()
    {
        $table = new TableExample\ColumnFiltering();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }    
       
    
    /**
     * ********* Editable tabble *******************
     * ***********************************
     */
    public function editableAction()
    {
    }
    public function ajaxEditableAction()
    {
        $table = new TableExample\Editable();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    } 
    
    public function updateRowAction()
    {
        $param = $this->getRequest()->getPost();
        $this->getCustomerTable()->update(array($param['column'] => $param['value']) ,array('idcustomer' => $param['row']));
        return $this->jsonResponse(array('succes' => 1));
    }
       
    
    /**
     * ********* Export To CSV *******************
     * *****************************************
     */
    public function csvExportAction()
    {
    }
    public function ajaxCsvExportAction()
    {
        $table = new TableExample\CsvExport();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    /**
     * ********* SEPARATABLE *******************
     * *****************************************
     */
    public function separatableAction()
    {
    }
    public function ajaxSeparatableAction()
    {
        $source = $this->getSource();
        $source->order('city ASC');
        
        $table = new TableExample\Separatable();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    /**
     * ********* Variable Row Attr *******************
     * *****************************************
     */
    public function variableAttrRowAction()
    {
        
    }
    
    /**
     * ********* New plugin condition *******************
     * *****************************************
     */
    public function newPluginConditionAction()
    {
        
    }
    public function ajaxNewPluginConditionAction()
    {
        $table = new TableExample\NewPluginCondition();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    
    /**
     * ********* Base *******************
     * ***********************************
     */
    public function baseAction()
    {
    }
    public function ajaxBaseAction()
    {
        $table = new TableExample\Base();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Mapper *******************
     * ***********************************
     */
    public function mapperAction()
    {
        
    }

    public function ajaxMapperAction()
    {
        $table = new TableExample\Mapper();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
        
    }
    
    /**
     * ********* Link *******************
     * ***********************************
     */
    public function linkAction()
    {
        
    }

    public function ajaxLinkAction()
    {
        $table = new TableExample\Link();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
     /**
     * ********* Template *******************
     * ***********************************
     */
    public function templateAction()
    {
        
    }

    public function ajaxTemplateAction()
    {
        $table = new TableExample\Template();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
     /**
     * ********* Attr *******************
     * ***********************************
     */
    public function attrAction()
    {
        
    }

    public function ajaxAttrAction()
    {
        $table = new TableExample\Attr();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Condition *******************
     * ***********************************
     */
    public function conditionAction()
    {
        
    }

    public function ajaxConditionAction()
    {
        $table = new TableExample\Condition();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
    
    /**
     * ********* Mix *******************
     * ***********************************
     */
    public function mixAction()
    {
        
    }

    public function ajaxMixAction()
    {
        $table = new TableExample\Mix();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render());
    }
    
     /**
     * ********* Advance *******************
     * ***********************************
     */
    public function advanceAction()
    {
        
    }

    public function ajaxAdvanceAction()
    {
        $table = new TableExample\Advance();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getSource())
                ->setParamAdapter($this->getRequest()->getPost())
        ;
        return $this->htmlResponse($table->render('custom' , 'custom-b3'));
        
    }
    
    
    
    
    
    
    
    /************************************************ */
    /*************** EXAMPLE DATA TABLE ************* */

    public function dataTableAction()
    {
        $source = $this->getSource();
        $table = new TableExample\DataTable();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter(new AdapterDataTables($this->getRequest()->getPost()))
        ;

        return new ViewModel(array(
            'tableDataTable' => $table,
        ));
    }

    public function ajaxDataTableAction()
    {
        $source = $this->getSource();
        $table = new TableExample\DataTable();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setParamAdapter(new AdapterDataTables($this->getRequest()->getPost()))
        ;

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($table->render('dataTableJson'));
        return $response;
    }
    
    
    public function htmlResponse($html)
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($html);
        return $response;
    }
    
    public function jsonResponse($data)
    {
        if(!is_array($data)){
            throw new Exception('$data param must be array');
        }
        
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($data));
        return $response;
    }
    
    
    /**
     * 
     * @return \ZfTable\Example\Model\CustomerTable
     * 
     */
    public function getCustomerTable()
    {
        if (!$this->customerTable) {
            $sm = $this->getServiceLocator();
            $this->customerTable = $sm->get('ZfTable\Example\Model\CustomerTable');
        }
        return $this->customerTable;
    }
    
    /**********************My codes*********************/
    
    
    
    public function institutionRequestsAction()
    {
    }
    
    public function ajaxInstitutionRequestsAction()
    {
        $table = new TableExample\InstitutionRequests();
        $table->setAdapter($this->getDbAdapter())
                ->setSource($this->getInstitutionRequests())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($table->render());
    }
 
    /**
     * 
     * @return type
     */
    private function getInstitutionRequests()
    {
        return $this->getCustomerTable()->fetchAllInstitutionRequests();
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

    /**
     * 
     * @return \Zend\Db\Sql\Select
     */
    private function getSource()
    {
        return $this->getCustomerTable()->fetchAllSelect();
    }
    
    

}
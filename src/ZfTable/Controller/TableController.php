<?php

namespace ZfTable\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use ZfTable\Example\TableExample;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;
use ZfTable\Params\AdapterDataTables;
use ZfTable\Options\ModuleOptions;
use ZfTable\AbstractTable;

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
    
    
    public function changesAction()
    {
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
                ->setOptions($this->getModuleOptions())
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
                ->setOptions($this->getModuleOptions())
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
                ->setOptions($this->getModuleOptions())
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
                ->setOptions($this->getModuleOptions())
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
                ->setOptions($this->getModuleOptions())
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
        return $this->getCommonTableAjax(new TableExample\Base());
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
        return $this->getCommonTableAjax(new TableExample\Mapper());
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
        return $this->getCommonTableAjax(new TableExample\Link());
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
        return $this->getCommonTableAjax(new TableExample\Template());
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
        return $this->getCommonTableAjax(new TableExample\Attr());
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
        return $this->getCommonTableAjax(new TableExample\Condition());
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
        return $this->getCommonTableAjax(new TableExample\Mix());
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
        return $this->getCommonTableAjax(new TableExample\Advance() , 'custom' , 'custom');
    }
    
    
    
    
    
    
    
    /*     * ********************************************** */
    /*     * ************* EXAMPLE DATA TABLE ************* */

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
    
    
    
    /*     * ********************************************** */
    /*     * ********************************************** */

    protected function getCommonTableAjax(AbstractTable $table,  $renderType = 'html', $renderTemplate = null)
    {
        $source = $this->getSource();

        $table->setAdapter($this->getDbAdapter())
                ->setSource($source)
                ->setOptions($this->getModuleOptions())
                ->setParamAdapter($this->getRequest()->getPost())
        ;

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($table->render($renderType , $renderTemplate));
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

    public function getModuleOptions()
    {
        if (!$this->moduleOptions) {
            $sm = $this->getServiceLocator();
            $config = $sm->get('Config');
            $this->moduleOptions = new ModuleOptions(isset($config['zftable']) ? $config['zftable'] : array());
        }
        return $this->moduleOptions;
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
     * @return type
     */
    private function getSource()
    {
        return $this->getCustomerTable()->fetchAllSelect();
    }

}
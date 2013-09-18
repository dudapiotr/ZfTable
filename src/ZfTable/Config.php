<?php

namespace ZfTable;

use Zend\Stdlib\AbstractOptions;
use ZfTable\Options\ModuleOptions;

class Config extends AbstractOptions
{
 
    
    protected $name = '';
    
    protected $showPagination = true;
    
    protected $showQuickSearch = false;
    
    protected $showItemPerPage = true;
    
    protected $itemCountPerPage = 50;
    
    protected $areFilters = false;
    
    protected $rowAction = false;
    
    protected $showExportToCSV = false;
    
    public function __construct($options = null)
    {
        $moduleOptions = $this->getModuleOptions();
        //db($options);
        //db($moduleOptions);
        $options = array_merge($moduleOptions->toArray() ,   $options );
        
        parent::__construct($options);
    }
    
    /**
     * Value to specify items per page (pagination)
     * @var array
     */
    protected $valuesOfItemPerPage = array(5, 10, 20, 50);
    
     /**
     * Default item count per page (pagination)
     * @var int
     */
    protected $defaultItemCountPerPage = 2;
    
     /**
    * Get maximal rows to returning. Data tables can use
    * pagination, but also can get data by ajax, and use
    * java script to pagination (and variable destiny for this case)
    *
    * @var int
    */
    protected $dataTablesMaxRows = 999;
    
    public function getShowExportToCSV()
    {
        return $this->showExportToCSV;
    }

    public function setShowExportToCSV($showExportToCSV)
    {
        $this->showExportToCSV = $showExportToCSV;
    }
    
    public function getRowAction()
    {
        return $this->rowAction;
    }

    public function setRowAction($rowAction)
    {
        $this->rowAction = $rowAction;
    }

        
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getShowPagination()
    {
        return $this->showPagination;
    }

    public function setShowPagination($showPagination)
    {
        $this->showPagination = $showPagination;
    }

    public function getShowItemPerPage()
    {
        return $this->showItemPerPage;
    }

    public function setShowItemPerPage($showItemPerPage)
    {
        $this->showItemPerPage = $showItemPerPage;
    }

    public function getItemCountPerPage()
    {
        return $this->itemCountPerPage;
    }

    public function setItemCountPerPage($itemCountPerPage)
    {
        $this->itemCountPerPage = $itemCountPerPage;
    }

    public function getAreFilters()
    {
        return $this->areFilters;
    }

    public function setAreFilters($areFilters)
    {
        $this->areFilters = $areFilters;
    }
    
    public function getShowQuickSearch()
    {
        return $this->showQuickSearch;
    }

    public function setShowQuickSearch($showQuickSearch)
    {
        $this->showQuickSearch = $showQuickSearch;
    }
    
    public function getValuesOfItemPerPage()
    {
        return $this->valuesOfItemPerPage;
    }

    public function setValuesOfItemPerPage($valuesOfItemPerPage)
    {
        $this->valuesOfItemPerPage = $valuesOfItemPerPage;
    }
    
    public function getDefaultItemCountPerPage()
    {
        return $this->defaultItemCountPerPage;
    }

    public function setDefaultItemCountPerPage($defaultItemCountPerPage)
    {
        $this->defaultItemCountPerPage = $defaultItemCountPerPage;
    }
    
    public function getDataTablesMaxRows()
    {
        return $this->dataTablesMaxRows;
    }

    public function setDataTablesMaxRows($dataTablesMaxRows)
    {
        $this->dataTablesMaxRows = $dataTablesMaxRows;
    }
    
    /**
     * Set template map
     * @param array $templateMap
     */
    public function setTemplateMap($templateMap)
    {
        $this->templateMap = $templateMap;
    }

    
    /**
     * Set template map
     * @return array
     */
    public function getTemplateMap(){
        
        return $this->templateMap;
    }
    
    /**
     * Get all module options
     *
     * @return ModuleOptions
     */
    public function getModuleOptions()
    {
        return new ModuleOptions();
    }

    
    
}
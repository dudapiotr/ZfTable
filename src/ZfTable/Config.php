<?php

namespace ZfTable;

use Zend\Stdlib\AbstractOptions;
use ZfTable\Options\ModuleOptions;

class Config extends AbstractOptions
{
 
    /**
     * Name of table 
     * @var null | string
     */
    protected $name = '';
    
    /**
     * Show or hide pagination view
     * @var boolean 
     */
    protected $showPagination = true;
    
    /**
     * Show or hide quick search view
     * @var boolean
     */
    protected $showQuickSearch = false;
    
    
    /**
     * Show or hide item per page view
     * @var boolean
     */
    protected $showItemPerPage = true;
    
    /**
     * @todo item and default cout per page
     * Default value for item count per page
     * @var int
     */
    protected $itemCountPerPage = 50;
    
    /**
     * Default item count per page (pagination)
     * @var int
     */
    protected $defaultItemCountPerPage = 2;
    
    
    /**
     * Flag to show row with filters (for each column)
     * @var boolean
     */
    protected $areFilters = false;
    
    /**
     * Definition of 
     * @var string | boolean
     */
    protected $rowAction = false;
    
    
    /**
     * Show or hide exporter to CSV
     * @var boolean
     */
    protected $showExportToCSV = false;
    
    
    
    /**
     * Value to specify items per page (pagination)
     * @var array
     */
    protected $valuesOfItemPerPage = array(5, 10, 20, 50);
    
     
    
     /**
    * Get maximal rows to returning. Data tables can use
    * pagination, but also can get data by ajax, and use
    * java script to pagination (and variable destiny for this case)
    *
    * @var int
    */
    protected $dataTablesMaxRows = 999;
    
    
    
    public function __construct($options = null)
    {
        $moduleOptions = $this->getModuleOptions();
        $options = array_merge($moduleOptions->toArray() ,   $options );
        parent::__construct($options);
    }
    
    
    
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
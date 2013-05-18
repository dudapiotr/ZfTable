<?php

namespace ZfTable\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements 
TableOptionsInterface,
DataTableInterface,
RenderInterface,
PaginatorInterface
{

    /**
     * Value to specify items per page (pagination)
     * @var array
     */
    protected $valuesOfItemPerPage = array(1, 2, 10, 20);
    
    
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
    
    
    /**
     * Template Map
     * @var array
     */
    protected $templateMap = array();
    
    
    
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
        if(!count($this->templateMap)){
            $this->templateMap = array(
                'paginator-slide' => __DIR__ . '/../../../view/templates/slide-paginator.phtml',
                'default-params' => __DIR__ . '/../../../view/templates/default-params.phtml',
                'container' => __DIR__ . '/../../../view/templates/container.phtml',
                'data-table-init' => __DIR__ . '/../../../view/templates/data-table-init.phtml',
                'custom' => __DIR__ . '/../../../view/templates/custom.phtml',
            );
        }
        return $this->templateMap;
    }
    
    /**
     * Get maximal rows to returning 
     * 
     * @return int
     */
    public function getDataTablesMaxRows()
    {
        return $this->dataTablesMaxRows;
    }

    /**
     * Set maximal rows to returning.
     * 
     * @param int $dataTablesMaxRows
     * @return \ZfTable\Options\ModuleOptions
     */
    public function setDataTablesMaxRows($dataTablesMaxRows)
    {
        $this->dataTablesMaxRows = $dataTablesMaxRows;
        return $this;
    }
    
    /**
     * Item count per page (for pagination)
     * @return int
     */
    public function getDefaultItemCountPerPage()
    {
        return $this->defaultItemCountPerPage;
    }

    
     /**
     * Item count per page (for pagination)
     * @return int
     */
    public function setDefaultItemCountPerPage($defaultItemCountPerPage)
    {
        $this->defaultItemCountPerPage = $defaultItemCountPerPage;
        return $this;
    }
    
    
    /**
     * Get Array of values to set items per page
     * @return array
     */
    public function getValuesOfItemPerPage()
    {
        return $this->valuesOfItemPerPage;
    }

    /**
     * 
     * Set Array of values to set items per page
     * 
     * @param array $valuesOfItemPerPage
     * @return \ZfTable\Options\ModuleOptions
     */
    public function setValuesOfItemPerPage($valuesOfItemPerPage)
    {
        $this->valuesOfItemPerPage = $valuesOfItemPerPage;
        return $this;
    }

}

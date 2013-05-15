<?php

namespace ZfTable\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements TableOptionsInterface
{

    protected $valuesOfItemPerPage = array(1, 2, 10, 20);
    
    protected $defaultItemCountPerPage = 2;
    
    protected $dataTablesMaxRows = 999;
    
    
    
    public function getDataTablesMaxRows()
    {
        return $this->dataTablesMaxRows;
    }

    public function setDataTablesMaxRows($dataTablesMaxRows)
    {
        $this->dataTablesMaxRows = $dataTablesMaxRows;
    }

    public function getDefaultItemCountPerPage()
    {
        return $this->defaultItemCountPerPage;
    }

    public function setDefaultItemCountPerPage($defaultItemCountPerPage)
    {
        $this->defaultItemCountPerPage = $defaultItemCountPerPage;
    }

    public function getValuesOfItemPerPage()
    {
        return $this->valuesOfItemPerPage;
    }

    public function setValuesOfItemPerPage($valuesOfItemPerPage)
    {
        $this->valuesOfItemPerPage = $valuesOfItemPerPage;
        return $this;
    }

}

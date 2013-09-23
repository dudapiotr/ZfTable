<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace Application\Table;

use ZfTable\AbstractTable;

class ImportListTable extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Lista importów',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'areFilters' => true,
        'rowAction' => 'updateRow'
    );
    
    //Definition of headers
    protected $headers = array(
        'category_title' => array('title' => 'Marka' , 'filters' => 'text' , 'sortable' => true  , 'separatable' => true),
        'created_at' => array('title' => 'Data importu' , 'filters' => 'text' , 'editable' => true ),
        'goto-not-voted' => array('title'  => 'Nie ocenione', 'sortable' => false),
        'goto-all' => array('title'  => 'Wszystkie', 'sortable' => false),
        'report' => array('title' => 'Report', 'sortable' => false)
    );

    protected function init()
    {
        $this->getRow()->addDecorator('separator', array('defaultColumn' => 'category_title'));
        $this->getRow()->addDecorator('varattr', array('name' => 'data-row' , 'value' => '%s' , 'vars' => array('id')));
        
        $this->getHeader('category_title')->getCell()->addDecorator('editable', array());
        
        $this->getHeader('goto-all')->getCell()->addDecorator('template', array(
            'template' => '<a href="/application/index/index/%s/1" target="_blank">Click (%s)</a>',
            'vars' => array('id', 'count-all')
        ));
        
        $this->getHeader('goto-not-voted')->getCell()->addDecorator('template', array(
            'template' => '<a href="/application/index/index/%s/2" target="_blank">Click (%s)</a>',
            'vars' => array('id' , 'count-not-voted')
        ));
        
        $this->getHeader('report')->getCell()->addDecorator('template', array(
            'template' => '<a href="/application/index/report/%s" target="_blank">Generate </a>',
            'vars' => array('id')
        ));
    }

    
    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
        if ($value = $this->getParamAdapter()->getValueOfFilter('zff_category_title')) {
            $query->where("c.title like '%".$value."%' ");
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('zff_created_at')) {
            $query->where("i.created_at like '%".$value."%' ");
            
        }
        
    }
    
    
}
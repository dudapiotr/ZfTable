<?php

namespace ZfTable;

use Zend\View\Resolver;
use Zend\View\Renderer\PhpRenderer;
use ZfTable\Options\ModuleOptions;

class Render extends AbstractCommon
{

    /**
     * PhpRenderer object
     * @var PhpRenderer 
     */
    protected $renderer;

    
    /**
     *
     * @var ModuleOptions
     */
    protected $options;
    
    
    
    /**
     * 
     * @param AbstractTable $table
     */
    public function __construct($table)
    {
        $this->setTable($table);
    }

    /**
     * Rendering paginator
     * @return string
     */
    public function renderPaginator()
    {
        $paginator = $this->getTable()->getSource()->getPaginator();
        $paginator->setView($this->getRenderer());
        $res = $this->getRenderer()->paginationControl($paginator, 'Sliding', 'paginator-slide');
        return $res;
    }
    
     /**
     * Rentering json for dataTable
     * @return string 
     */
    public function renderDataTableJson()
    {
        $res = array();
        $render = $this->getTable()->getRow()->renderRows('array');
        $res['sEcho'] = $render;
        $res['iTotalDisplayRecords'] = $this->getTable()->getSource()->getPaginator()->getTotalItemCount();
        $res['aaData'] = $render;
        
        return json_encode($res);
    }
    
    
    /**
     * Rentering init view for dataTable
     * @return string 
     */
    public function renderDataTableAjaxInit()
    {
        $renderedHeads = $this->renderHead();
        
        $view = new \Zend\View\Model\ViewModel();
        $view->setTemplate('data-table-init');
        $view->setVariable('headers', $renderedHeads);
        $view->setVariable('attributes', $this->getTable()->getAttributes());
        
        return $this->getRenderer()->render($view);
        
    }
    
    
    public function renderCustom($template){
        
        $rowsArray = $this->getTable()->getRow()->renderRows('array_assc');
        
        $view = new \Zend\View\Model\ViewModel();
        $view->setTemplate($template);

        $view->setVariable('rows', $rowsArray);
        $view->setVariable('paginator', $this->renderPaginator());
        $view->setVariable('paramsWrap', $this->renderParamsWrap());
        $view->setVariable('itemCountPerPageValues', $tableConfig->getValuesOfItemPerPage());
        $view->setVariable('itemCountPerPage', $this->getTable()->getParamAdapter()->getItemCountPerPage());
        $view->setVariable('quickSearch', $this->getTable()->getParamAdapter()->getQuickSearch());

        return $this->getRenderer()->render($view);
    }
    
    /**
     * Rentering table
     * @return string 
     */
    public function renderTableAsHtml()
    {
        $render = '';
        $tableConfig = $this->getTable()->getConfig();
        
        if($tableConfig->getAreFilters()){
            $render .= $this->renderFilters();
        }
        
        dbs($render);
        
        
        $render = '';
        $render .= $this->renderHead();
        $render  = sprintf('<thead>%s</thead>',$render);
        $render .= $this->getTable()->getRow()->renderRows();
        $table = sprintf('<table %s>%s</table>', $this->getTable()->getAttributes(), $render);

        $view = new \Zend\View\Model\ViewModel();
        $view->setTemplate('container');

        $view->setVariable('table', $table);
        $view->setVariable('name', $tableConfig->getName());
        $view->setVariable('paginator', $this->renderPaginator());
        $view->setVariable('paramsWrap', $this->renderParamsWrap());
        $view->setVariable('itemCountPerPageValues', $tableConfig->getValuesOfItemPerPage());
        $view->setVariable('itemCountPerPage', $this->getTable()->getParamAdapter()->getItemCountPerPage());
        $view->setVariable('quickSearch', $this->getTable()->getParamAdapter()->getQuickSearch());
        $view->setVariable('showQuickSearch', $tableConfig->getShowQuickSearch());
        $view->setVariable('showPagination', $tableConfig->getShowPagination());

        return $this->getRenderer()->render($view);
    }
    
    
    /**
     * Rendering filters
     * @return string
     */
    public function renderFilters()
    {
        $headers = $this->getTable()->getHeaders();
        $render = '';
        foreach ($headers as $name => $params) {
            if (isset($params['filters'])) {
                $id =  'zff_'.$name;
                $value = $this->getTable()->getParamAdapter()->getValueOfFilter($id);
                
                
                if (is_string($params['filters'])) {
                    $element = new \Zend\Form\Element\Text($id);
                    
                    //$el = Base_Form_Abstract::simplefactoryElement('text',$id, array('value' => $value , 'class' => 'filter'));
                    
                    
                } else {
                    $el = Base_Form_Abstract::simplefactoryElement('select', $id, array('multiOptions' => $params['filters'] , 'value' => $value , 'class' => 'filter'));
                }
                
                $view = new \Zend\View\Model\ViewModel();
                
                dbs($view->layout());
                
                
                $render .= sprintf('<td>%s</td>', $e->render($element));
            } else {
                $render .= '<td></td>';
            }
        }
        return sprintf('<tr>%s</tr>', $render);
    }
    
    
    
    /**
     * Rentering table
     * @return string 
     */
//    public function renderTableAsHtml()
//    {
//        
//        $render = '';
//        $tableConfig = $this->getTable()->getConfig();
//        
//        if($tableConfig->getAreFilters()){
//            $render .= $this->renderFilters();
//        }
//        $render .= $this->renderHead();
//        $render  = sprintf('<thead>%s</thead>',$render);
//        $render .= $this->getTable()->getRow()->renderRows();
//        $table = sprintf('<table %s>%s</table>', $this->getTable()->getAttributes(), $render);
//
//        $view = $this->createView();
//        
//        
//        //$this->assignToViewTableConfig($view);
//        
//        $view->assign('table', $table);
//        $view->assign('name', $tableConfig->getName());
//        $view->assign('paginator', $this->renderPaginator());
//        $view->assign('paramsWrap', $this->renderParamsWrap());
//        $view->assign('itemCountPerPageValues', $this->getOptions()->getValuesOfItemPerPage());
//        $view->assign('itemCountPerPage', $this->getTable()->getParamAdapter()->getItemCountPerPage());
//        $view->assign('showQuickSearch', $tableConfig->getShowQuickSearch());
//        $view->assign('showPagination', $tableConfig->getShowPagination());
//        $view->assign('showItemPerPage', $tableConfig->getShowItemPerPage());
//        $view->assign('quickSearch', $this->getTable()->getParamAdapter()->getQuickSearch());
//
//        
//        return $view->render('container.phtml');
//    }
    
    
    
    /**
     * Rendering head
     * @return string
     */
    public function renderHead()
    {
        $headers = $this->getTable()->getHeaders();
        $render = '';
        foreach ($headers as $name => $title) {
            $render .= $this->getTable()->getHeader($name)->render();
        }
        
        $render = sprintf('<tr>%s</tr>', $render);
        

        return $render;
    }

    /**
     * Rendering params wrap to ajax comunication
     * @return string
     */
    public function renderParamsWrap()
    {
        $view = new \Zend\View\Model\ViewModel();

        $view->setTemplate('default-params');
        $view->setVariable('column', $this->getTable()->getParamAdapter()->getColumn());
        $view->setVariable('itemCountPerPage', $this->getTable()->getParamAdapter()->getItemCountPerPage());
        $view->setVariable('order', $this->getTable()->getParamAdapter()->getOrder());
        $view->setVariable('page', $this->getTable()->getParamAdapter()->getPage());
        $view->setVariable('quickSearch', $this->getTable()->getParamAdapter()->getQuickSearch());


        return $this->getRenderer()->render($view);
    }

    /**
     * Init renderer object
     */
    protected function initRenderer()
    {
        $renderer = new PhpRenderer();
        $resolver = new Resolver\AggregateResolver();
        $map = new Resolver\TemplateMapResolver($this->getTable()->getConfig()->getTemplateMap());
        $resolver->attach($map);

        $renderer->setResolver($resolver);
        $this->renderer = $renderer;
    }

    /**
     * Get PHPRenderer 
     * @return PhpRenderer
     */
    public function getRenderer()
    {
        if (!$this->renderer) {
            $this->initRenderer();
        }
        return $this->renderer;
    }

    /**
     * Set PhpRenderer
     * @param \Zend\View\Renderer\PhpRenderer $renderer
     */
    public function setRenderer(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    
}


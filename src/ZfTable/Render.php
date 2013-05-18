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
        $view->setVariable('itemCountPerPageValues', $this->getTable()->getOptions()->getValuesOfItemPerPage());
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
        $render .= $this->renderHead();
        $render  = sprintf('<thead>%s</thead>',$render);
        $render .= $this->getTable()->getRow()->renderRows();
        $table = sprintf('<table %s>%s</table>', $this->getTable()->getAttributes(), $render);

        $view = new \Zend\View\Model\ViewModel();
        $view->setTemplate('container');

        $view->setVariable('table', $table);
        $view->setVariable('paginator', $this->renderPaginator());
        $view->setVariable('paramsWrap', $this->renderParamsWrap());
        $view->setVariable('itemCountPerPageValues', $this->getTable()->getOptions()->getValuesOfItemPerPage());
        $view->setVariable('itemCountPerPage', $this->getTable()->getParamAdapter()->getItemCountPerPage());
        $view->setVariable('quickSearch', $this->getTable()->getParamAdapter()->getQuickSearch());

        return $this->getRenderer()->render($view);
    }

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

        $map = new Resolver\TemplateMapResolver($this->getOptions()->getTemplateMap());
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

    /**
     * 
     * @return ModuleOptions
     */
    public function getOptions(){
        if(!$this->options){
            $this->options = $this->getTable()->getOptions();
        }
        return $this->options;
    }
    
}


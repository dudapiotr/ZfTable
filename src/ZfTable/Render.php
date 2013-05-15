<?php

namespace ZfTable;

use Zend\View\Resolver;
use Zend\View\Renderer\PhpRenderer;

class Render extends AbstractCommon
{

    /**
     *
     * @var PhpRenderer 
     */
    protected $renderer;

    
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
        $res['iTotalDisplayRecords'] = 40;
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
    
    /**
     * Rentering table
     * @return string 
     */
    public function renderTableAsHtml()
    {

        $render = '';
        $render .= $this->renderHead();
        $render .= $this->getTable()->getRow()->renderRows();
        $table = sprintf('<table %s >%s</table>', $this->getTable()->getAttributes(), $render);

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

        $map = new Resolver\TemplateMapResolver(array(
            'paginator-slide' => __DIR__ . '/../../view/templates/slide-paginator.phtml',
            'default-params' => __DIR__ . '/../../view/templates/default-params.phtml',
            'container' => __DIR__ . '/../../view/templates/container.phtml',
            'data-table-init' => __DIR__ . '/../../view/templates/data-table-init.phtml',
        ));
        $stack = new Resolver\TemplatePathStack(array(
            'script_paths' => array(
                __DIR__ . '/../../view'
            )
        ));
        $resolver->attach($map)
                ->attach($stack);

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


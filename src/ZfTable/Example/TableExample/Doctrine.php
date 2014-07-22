<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Doctrine extends AbstractTable
{

    protected $config = array(
        'name' => 'Doctrine',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' =>     array('tableAlias' => 'q', 'title' => 'Id', 'width' => '50') ,
        'doctrine' =>       array('tableAlias' => 'q', 'title' => 'Doctrinq contact'),
        'product' =>        array('tableAlias' => 'p', 'title' => 'Product'),
        'name' =>           array('tableAlias' => 'q', 'title' => 'Name' , 'separatable' => true),
        'surname' =>        array('tableAlias' => 'q', 'title' => 'Surname' ),
        'street' =>         array('tableAlias' => 'q', 'title' => 'Street'),
        'city' =>           array('tableAlias' => 'q', 'title' => 'City' , 'separatable' => true),
        'active' =>         array('tableAlias' => 'q', 'title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
        $this->getHeader('doctrine')->getCell()->addDecorator('closure', array(
            'closure' => function($context, $record){
                return $record->name . ' ' . $record->surname;
            }
        ));
        
        
        $this->getHeader('product')->getCell()->addDecorator('closure', array(
            'closure' => function($context, $record){
            
                if(is_object($record->product)){
                    return $record->product->product;
                }else{
                    return '';
                }
            }
        ));
    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}
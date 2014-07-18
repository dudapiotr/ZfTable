<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

class CustomerTable extends AbstractTableGateway {

    
    protected $table = 'customer';

    
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Customer());
        
        $this->initialize();
    }

    
     public function fetchAllSelect(){
        $sql = new Sql($this->adapter);

        $select = $sql->select();
        $select->from('customer')
            ->columns(array('*'))
        ;
        
        return $select;
        
    }
    
    public function fetchAllInstitutionRequests()
    {

        $sql = new Sql($this->adapter);
        $select = $sql->select()
                ->from(array('i' => 'institution'), array('address'))
                ->join(array('u' => 'user'), 'i.user_id = u.id', array('name'));

        return $select;
    }
}

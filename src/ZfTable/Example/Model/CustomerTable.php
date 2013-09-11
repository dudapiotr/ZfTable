<?php

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
}

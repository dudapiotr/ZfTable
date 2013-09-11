<?php
/**
 * Description of AbstractTable
 *
 * @author  HYPERmediaISOBAR 2013, pduda001 Piotr Duda (dudapiotrek@gmail.com)
 */

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

class AbstractTable extends AbstractTableGateway
{
    
    protected $model = 'ArrayObject';
    
    protected $keyName = 'id';
     
     
    
    public function getSql()
    {
        return new Sql($this->getAdapter());
    }

    public function beginTransaction()
    {
        $this->getAdapter()->getDriver()->getConnection()->beginTransaction();
    }
    
    public function commit()
    {
        $this->getAdapter()->getDriver()->getConnection()->commit();
    }
    
    public function rollback()
    {
        $this->getAdapter()->getDriver()->getConnection()->rollback();
    }
    
     public function findRow($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array($this->keyName => $id));
        $row = $rowset->current();
        return $row;
    }
    
    public function getRow($id)
    {
        return $this->findRow($id);
    }
    
    public function fetchRow(\Zend\Db\Sql\Select $query, $setPrototype = false){
        
        $stmt = $this->getSql()->prepareStatementForSqlObject($query);
        $res = $stmt->execute();
        
        $resultSet = new \Zend\Db\ResultSet\ResultSet();
        if($setPrototype){
            $resultSet->setArrayObjectPrototype(new $this->model());
        }
        $resultSet->initialize($res);
        
        return $resultSet->current();
    }
    
    public function fetchAll(\Zend\Db\Sql\Select $query , $setPrototype = false){
        
        $stmt = $this->getSql()->prepareStatementForSqlObject($query);
        $res = $stmt->execute();
        
        $resultSet = new \Zend\Db\ResultSet\ResultSet();
        if($setPrototype){
            $resultSet->setArrayObjectPrototype(new $this->model());
        }
        $resultSet->initialize($res);
        
        return $resultSet;
    }
    
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $model = $this->model;
        $this->resultSetPrototype->setArrayObjectPrototype(new $model());
        $this->initialize();
        
    }
    
}
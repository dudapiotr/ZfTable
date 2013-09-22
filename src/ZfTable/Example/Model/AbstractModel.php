<?php


namespace Application\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

abstract class AbstractModel implements InputFilterAwareInterface
{
    
    protected $inputFilter;

    protected $data;
    
    
    public function __call($name, $arguments)
    {
        $setOrGet = lcfirst(substr($name, 0,3));
        $nameOfColumn = lcfirst(substr($name, 3));
        
        if($setOrGet != 'get' && $setOrGet != 'set'){
            throw new \Exception('Method must start with set or get prefix ');
        }
        $nameOfColumn = strtolower(  preg_replace('/([A-Z])/', '_$1', $nameOfColumn) ) ;
        if(!array_key_exists($nameOfColumn ,$this->data)){
            throw new \Exception(' Variable doesnt exist  : ' . $nameOfColumn);
        }
        
        return $this->data[$nameOfColumn];
        
    }
    
    /**
     * Used by ResultSet to pass each database row to the entity
     */
    public function exchangeArray($data)
    {
        $this->data = $data;
    }
    
    public function toArray()
    {
        return $this->getData();
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    }
    
    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
    
}
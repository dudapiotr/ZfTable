<?php
namespace ZfTable\Source;

use ZfTable\Source\AbstractSource;
use Zend\Paginator\Paginator;

class ArrayAdapter extends AbstractSource
{

    /**
     *
     * @var \ArrayObject
     */
    protected $arraySource;

    /**
     *
     * @var  \Zend\Paginator\Paginator
     */
    protected $paginator;

    /**
     *
     * @param \ArrayObject $arraySource
     */
    public function __construct($arraySource)
    {
        $this->arraySource = new \ArrayObject($arraySource)   ;
    }

    /**
     *
     * @return \Zend\Paginator\Paginator
     */
    public function getPaginator()
    {
        if (!$this->paginator) {

            $this->arraySource  = (array) $this->arraySource;
            $this->order();

             $adapter = new \Zend\Paginator\Adapter\ArrayAdapter((array) $this->arraySource);
             $this->paginator = new Paginator($adapter);
             $this->initPaginator();

        }
        return $this->paginator;
    }


    protected function order()
    {

        $column = $this->getParamAdapter()->getColumn();
        $order = $this->getParamAdapter()->getOrder();

        if (!$column) {
            return;
        }

        uasort($this->arraySource, function ($i, $j) use ($column, $order) {

            $a = $i[$column];
            $b = $j[$column];

            $condition = ($order == 'asc') ? $a > $b : $a < $b;

            if ($a == $b) {
                return 0;
            } elseif ($condition) {
                return 1;
            } else {
                return -1;
            }
        });
    }


    public function getSource()
    {
        return $this->arraySource;
    }
}

<?php
namespace ZfTable\Decorator\Row;

class Separatable extends AbstractRowDecorator
{
    /**
     * Flag to inform if iterable is just started
     * @var boolean
     */
    protected $isStarted = true;
    
    /**
     *
     * @var Value of previous iterated
     */
    protected $previousColumnValue = null;
    
    /**
     * Default column value
     * @var string
     */
    protected $defaultColumn = null;
    
    
    public function getIsStarted()
    {
        return $this->isStarted;
    }

    public function setIsStarted($isStarted)
    {
        $this->isStarted = $isStarted;
    }

    public function getPreviousColumnValue()
    {
        return $this->previousColumnValue;
    }

    public function setPreviousColumnValue($previousColumnValue)
    {
        $this->previousColumnValue = $previousColumnValue;
    }

    public function __construct($options = array())
    {
        $this->defaultColumn = (isset($options['defaultColumn'])) ? $options['defaultColumn'] : null;
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        $column = $this->getRow()->getTable()->getParamAdapter()->getColumn();
        if (!$column && !$this->getDefaultColumn()) {
            return $context;
        }elseif(!$column && $this->getDefaultColumn()){
            $column = $this->getDefaultColumn();
        }
        $actualRow = $this->getRow()->getActualRow();
        $valueOfColumn = $actualRow[$column];

        if ($this->getIsStarted()) {
            $this->setIsStarted(false);
            $this->setPreviousColumnValue($valueOfColumn);
            return $context;
        }
        if ($valueOfColumn !== $this->getPreviousColumnValue() && $this->getRow()->getTable()->getHeader($column)->getSeparatable() ) {
            $this->getRow()->addVarClass('separatable');
        }
        $this->setPreviousColumnValue($valueOfColumn);
    }
    
    public function getDefaultColumn()
    {
        return $this->defaultColumn;
    }



}
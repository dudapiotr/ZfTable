<?php

namespace ZfTable\Decorator\Condition;

use Zend\ServiceManager\AbstractPluginManager;

class ConditionPluginManager extends AbstractPluginManager
{

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $invokableClasses = array(
        'equal' => '\ZfTable\Decorator\Condition\Plugin\Equal',
        'notequal' => '\ZfTable\Decorator\Condition\Plugin\NotEqual',
        
    );

    /**
     * Don't share header by default
     *
     * @var bool
     */
    protected $shareByDefault = false;
    
    
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractCondition) {
            return;
        }
        throw new \DomainException('Invalid Condition Implementation');
    }

}
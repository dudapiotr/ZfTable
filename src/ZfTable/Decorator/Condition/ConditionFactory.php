<?php

namespace ZfTable\Decorator\Condition;

class ConditionFactory
{

    /**
     * The decorator manger
     *
     * @var null| ConditionPluginManager
     */
    protected static $conditionManager = null;

    
    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\Condition\AbstractCondition
     */
    public static function factory($name, $options)
    {
        $condition = static::getPluginManager()->get($name, $options);
        return $condition;
    }
    
    
    /**
     * Get the condition plugin manager
     *  
     * @return ConditionPluginManager
     */
    public static function getPluginManager()
    {
        if (static::$conditionManager === null) {
            static::$conditionManager = new ConditionPluginManager();
        }
        return static::$conditionManager;
    }

}

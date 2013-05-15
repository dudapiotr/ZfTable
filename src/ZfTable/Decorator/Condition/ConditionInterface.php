<?php

namespace ZfTable\Decorator\Condition;

interface ConditionInterface
{
    
    /**
     * Check if the condition is valid
     * @return boolean
     */
    public function isValid();
   
}

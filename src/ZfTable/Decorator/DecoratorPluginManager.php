<?php

namespace ZfTable\Decorator;

use Zend\ServiceManager\AbstractPluginManager;

class DecoratorPluginManager extends AbstractPluginManager
{

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $invokableClasses = array(
        
        'cellclass' => '\ZfTable\Decorator\Cell\ClassDecorator',
        'cellicon' => '\ZfTable\Decorator\Cell\Icon',
        'cellmapper' => '\ZfTable\Decorator\Cell\Mapper',
        'celllink' => '\ZfTable\Decorator\Cell\Link',
        'celltemplate' => '\ZfTable\Decorator\Cell\Template',
        
        'rowclass' => '\ZfTable\Decorator\Row\ClassDecorator',
    );

    /**
     * Don't share header by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    
    
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractDecorator) {
            return;
        }
        throw new \DomainException('Invalid Decorator Implementation');
    }

}

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
    );

    /**
     * Don't share header by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * 
     * @param type $name
     * @return \ZfTable\Decorator\AbstractDecorator
     */
    public function addCellDecorator($name, $options)
    {

        $decorator = $this->get('cell' . $name, $options);
        return $decorator;
    }

    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractDecorator) {
            return;
        }
        throw new \DomainException('Invalid Decorator Implementation');
    }

}

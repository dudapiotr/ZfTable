<?php

namespace ZfTable\Decorator;

class DecoratorFactory
{

    /**
     * The decorator manger
     *
     * @var null|DecoratorPluginManager
     */
    protected static $decoratorManager = null;

    CONST CELL_PREFIX = 'cell';
    CONST HEADER_PREFIX = 'header';
    CONST ROW_PREFIX = 'row';

    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\AbstractDecorator
     */
    public static function factoryCell($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::CELL_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\AbstractDecorator
     */
    public static function factoryRow($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::CELL_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     * 
     * @param string $name
     * @param array $options
     * @return \ZfTable\Decorator\AbstractDecorator
     */
    public static function factoryHeader($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::ROW_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     * Get the pattern plugin manager
     *  
     * @return DecoratorPluginManager
     */
    public static function getPluginManager()
    {
        if (static::$decoratorManager === null) {
            static::$decoratorManager = new DecoratorPluginManager();
        }
        return static::$decoratorManager;
    }

}

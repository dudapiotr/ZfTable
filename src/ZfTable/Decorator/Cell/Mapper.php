<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */


namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Mapper extends AbstractCellDecorator
{

    /**
     * Array of options mapping
     * @var array
     */
    protected $options;


    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if (count($options) == 0) {
            throw new Exception\InvalidArgumentException('Array is empty');
        }

        $this->options = $options;
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        return (isset($this->options[$context])) ? $this->options[$context] :    $context;
    }
}

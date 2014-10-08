<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Row;

class VarAttr extends AbstractRowDecorator
{

    /**
     * Class
     * @var string
     */
    protected $name;

    protected $value;

    protected $vars;

    public function __construct($options)
    {
        $this->name = $options['name'];
        $this->value = $options['value'];
        $this->vars = $options['vars'];
    }

    /**
     * Rendering decorator
     *
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        $values = array();

        foreach ($this->vars as $var) {
            $actualRow = $this->getRow()->getActualRow();
            $values[] = $actualRow[$var];
        }
        $value = vsprintf($this->value, $values);

        $this->getRow()->addVarAttr($this->name, $value);
        return $context;
    }
}

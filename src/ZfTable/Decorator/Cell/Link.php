<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Link extends AbstractCellDecorator
{

    /**
     * Array of variable attibute for link
     * @var array
     */
    protected $vars;

    /**
     * Link url
     * @var string
     */
    protected $url;

    
    /**
     * Constructor
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if (!isset($options['url'])) {
            throw new Exception\InvalidArgumentException('Url key in options argument required');
        }

        $this->url = $options['url'];

        if (isset($options['vars'])) {
            $this->vars = is_array($options['vars']) ? $options['vars'] : array($options['vars']);
        }
    }

    public function render($context)
    {
        $values = array();
        if (count($this->vars)) {
            $actualRow = $this->getCell()->getActualRow();
            foreach ($this->vars as $var) {
                $values[] = $actualRow[$var];
            }
        }
        $url = vsprintf($this->url, $values);
        return sprintf('<a  href="%s">%s</a>', $url, $context);
    }

}
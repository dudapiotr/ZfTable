<?php

namespace ZfTable\Source;

use ZfTable\AbstractCommon;
use ZfTable\Source\SourceInterface;

abstract class AbstractSource extends AbstractCommon implements SourceInterface
{

    abstract protected function limit();

    abstract protected function order();
}

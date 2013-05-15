<?php

namespace ZfTable\Table;

interface TableInterface {
    
    public function init();
    
    public function render();
    
    public function initQuickSearch();
    
}

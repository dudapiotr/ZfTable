<?php

namespace ZfTable\Decorator;

interface DataAccessInterface
{
    
   /**
    * Interface dedicated for Cells and Rows decorators,
    * used to retrieve actual row in rendering process
    * Header decorators are not taken into consideration
    * 
    */
   public function getActualRow();
}

?>

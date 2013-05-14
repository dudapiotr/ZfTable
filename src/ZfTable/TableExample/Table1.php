<?php

namespace ZfTable\TableExample;
use ZfTable\AbstractTable;


class Table1 extends AbstractTable {
    
    
   protected $headers = array(
       'artist' => array('title' => 'Artist'),
       'title' => array('title' => 'Title')
    );
    
    
    
   public function init(){
       $this->getHeader('artist')->addAttr('ss','dd');
       $this->getHeader('artist')->getCell()->addDecorator('class', array('class' => 'sss'));
       
   }
 
   
}

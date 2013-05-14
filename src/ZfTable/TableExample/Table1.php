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
       
       $this->getRow()->addAttr('test', 'test');
       $this->getRow()->addClass('class', 'testets');
       
       $this->getRow()->addDecorator('class', array('class' => 'tttt'));
       
//       $this->getHeader('artist')->getCell()->addDecorator('icon', array(
//            'path' => '/img/zf2-logo.png',
//            'place' => \ZfTable\Decorator\AbstractDecorator::RESET_CONTEXT
//        ));
       
       
//        $this->getHeader('artist')->getCell()->addDecorator('mapper', array(
//            'Adele' => 'aaaeee',
//            'Gotye' => 'ee'
//        ));
       
//        $this->getHeader('artist')->getCell()->addDecorator('link', array(
//            'url' => 'link\%s\%s',
//            'vars' => array('artist','title')
//         ));
       
       
        $this->getHeader('artist')->getCell()->addDecorator('template', array(
            'template' => 'eeeeeeeeeeeeeeeeeeeelink\%s\%s',
            'vars' => array('artist','title')
         ))->addCondition('notequal', array('column' => 'artist', 'values' => 'Adele'));
       
       
   }
 
   
}

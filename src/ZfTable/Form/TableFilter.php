<?php

namespace ZfTable\Form;
 
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
 
 
class TableFilter extends InputFilter
{
 
	public function __construct($column_fields = null)
	{
		//Create an input to filter the items of a generic table
		$this->add(array(
			'name'     => 'zfTableItemPerPage',
			'allowEmpty' => true,
			'required' => false,
            'filters'  => array(
            	array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
           	),
            'validators' => array(
            	array(
                	'name'    => 'StringLength',
                    'options' => array(
                    	'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 30,
                   	),
				),
			),
		));
		$this->add(array(
			'name'     => 'zfTableQuickSearch',
			'allowEmpty' => true,
			'required' => false,
            'filters'  => array(
            	array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
           	),
            'validators' => array(
            	array(
                	'name'    => 'StringLength',
                    'options' => array(
                    	'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 40,
                   	),
				),
			),
		));
		$this->add(array(
			'name'     => 'zfTableOrder',
			'allowEmpty' => true,
			'required' => false,
            'filters'  => array(
            	array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
           	),
            'validators' => array(
            	array(
                	'name'    => 'StringLength',
                    'options' => array(
                    	'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 10,
                   	),
				),
			),
		));
		$this->add(array(
			'name'     => 'zfTableColumn',
			'allowEmpty' => true,
			'required' => false,
            'filters'  => array(
            	array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
           	),
            'validators' => array(
            	array(
                	'name'    => 'StringLength',
                    'options' => array(
                    	'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 30,
                   	),
				),
			),
		));
		//Creates a filter for each of the input fields
		foreach ($column_fields as $field_name) {
			$this->add(array(
				'name'     => 'zff_' . $field_name,
				'allowEmpty' => true,
				'required' => false,
            	'filters'  => array(
            		array('name' => 'StripTags'),
                	array('name' => 'StringTrim'),
           		),
            	'validators' => array(
	            	array(
    	            	'name'    => 'StringLength',
        	            'options' => array(
            	        	'encoding' => 'UTF-8',
                	        'min'      => 0,
                    	    'max'      => 30,
                   		),
					),
				),
			));
		}
    }
}
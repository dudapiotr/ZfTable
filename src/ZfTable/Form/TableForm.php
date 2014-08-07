<?php
namespace ZfTable\Form;

use Zend\Form\Form;

class TableForm extends Form
{
    public function __construct($columnFields = null)
    {
    	//Create the generic fields for the table
        parent::__construct('ZFTable');
        $this->setAttribute('method', 'post');
		$this->add(array(
            'name' => 'zfTableItemPerPage',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		$this->add(array(
            'name' => 'zfTableQuickSearch',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		$this->add(array(
            'name' => 'zfTableOrder',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		$this->add(array(
            'name' => 'zfTableColumn',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));

		//Creates a field for each of the columns in the table
		foreach ($columnFields as $fieldName) {
	        $this->add(array(
	            'name' => 'zff_' . $fieldName,
	            'attributes' => array(
	                'type'  => 'text',
	            ),
	        ));
		}
    }
}

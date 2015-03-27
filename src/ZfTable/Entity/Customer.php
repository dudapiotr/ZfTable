<?php

namespace ZfTable\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="zftable_customer")
 * @property string $name
 * @property int $idcustomer
 */
class Customer implements InputFilterAwareInterface
{
    protected $inputFilter;


    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="idcustomer", referencedColumnName="customer_id")
     */
    protected $product;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idcustomer;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

     /**
     * @ORM\Column(type="string")
     */
    protected $surname;

    /**
     * @ORM\Column(type="string")
     */
    protected $street;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $active;

    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {

    }
}

<?php

namespace AppBundle\Entity;


class Doctor
{
	private $id;

	private $name;
        
        private $patients;
        
        public function __construct()
        {
            $this->patients = new ArrayCollection();
        }

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return Doctor
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return Doctor
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

}
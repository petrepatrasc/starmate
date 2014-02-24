<?php

namespace PetreP\StarmateBundle\Entity;


class Player
{

    /**
     * @var string
     */
    protected $_ingameName;

    /**
     * @param string $ingameName
     * @return $this
     */
    public function setIngameName($ingameName)
    {
        $this->_ingameName = $ingameName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIngameName()
    {
        return $this->_ingameName;
    }
}
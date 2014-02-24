<?php

namespace PetreP\StarmateBundle\Entity;


class AhglPlayer extends Player
{

    /**
     * @var string
     */
    protected $_ahglProfileUrl;


    /**
     * @var string
     */
    protected $_ahglRecord;


    /**
     * @param string $url
     * @return $this
     */
    public function setAhglProfileUrl($url)
    {
        $this->_ahglProfileUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getAhglProfileUrl()
    {
        return $this->_ahglProfileUrl;
    }

    /**
     * @param string $ahglRecord
     * @return $this
     */
    public function setAhglRecord($ahglRecord)
    {
        $this->_ahglRecord = $ahglRecord;
        return $this;
    }

    /**
     * @return string
     */
    public function getAhglRecord()
    {
        return $this->_ahglRecord;
    }




}
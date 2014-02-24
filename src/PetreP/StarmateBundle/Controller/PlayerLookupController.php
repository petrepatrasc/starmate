<?php

namespace PetreP\StarmateBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlayerLookupController extends Controller
{

    public function indexAction()
    {
        return $this->render('@Starmate/PlayerLookup/index.html.twig');
    }
}
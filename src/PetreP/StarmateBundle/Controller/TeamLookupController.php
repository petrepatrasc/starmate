<?php

namespace PetreP\StarmateBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeamLookupController extends Controller
{

    public function ahglAction()
    {
//        if ($this->get('request')->isMethod('post')) {
//            $teamName = $this->get('request')->get('teamName');

        $playerList = $this->get('ahgl.service')->crawlTeamWebPageAndReturnPlayerList();

        foreach ($playerList as $player) {
            $this->get('ahgl.service')->retrieveDetailsFromPlayerPage($player);
        }

        var_export($playerList);die;
//        } else {
//            return new Response('Method needs to be a POST request.');
//        }
    }
}
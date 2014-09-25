<?php

namespace Acme\CashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($limit)
    {
       return new Response('<html><body>Number: '.rand(1, $limit).'</body></html>');	
       #return $this->render('AcmeCashBundle:Default:index.html.twig', array('name' => $name));
    }
}

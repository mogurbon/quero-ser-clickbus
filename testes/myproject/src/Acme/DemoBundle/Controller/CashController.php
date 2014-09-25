<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class CashController
{
    public function indexAction($number)
    {
		$entrada=$number;
		if ($entrada < 0 ){
	
			try {
				throw new InvalidArgumentException('no se puyo solo numeros positivos :( ');

			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		else if($entrada==null){
			$billetes=array();
			print_r($billetes);
		}
		else{
			
			while ($entrada > 0){
				if (($entrada % 100) == 0){
					$entrada= $entrada -100;
					$billetes[]=100;
				}
				else if(($entrada % 50)==0){
					$entrada= $entrada -50;
					$billetes[]=50;
				}
				else if(($entrada % 20)==0){
					$entrada= $entrada -20;
					$billetes[]=20;
				}
				else if(($entrada % 10)==0){
					$entrada= $entrada -10;
					$billetes[]=10;
				}
			}
		}
		$response='';
		$response.='<table>';
		$response.='<tr><th>Billetes</th></tr>';
		foreach($billetes as $billete){
			$response.='<tr><td>'.$billete.'</td></tr>';
		}
		$response.='</table>';

        return new Response('<html><body>'.$response.'</body></html>');


    }
}

<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class OrderController
{
	public function burbuja($A,$n){
        for($i=1;$i<$n;$i++){
            for($j=0;$j<$n-$i;$j++){
                if($A[$j]>$A[$j+1])
                    {$k=$A[$j+1]; $A[$j+1]=$A[$j]; $A[$j]=$k;}
                }
            }
        return $A;
    }
    public function indexAction($number)
    {
		
	
		$arreglo = array(10, 1, -20,  14, 99, 136, 19, 20, 117, 22, 93, 120, 131);
     	$burbuja = $this->burbuja($arreglo,count($arreglo));
		$rango=$number;
		
		   
		
		   
		//obtener la cantida de grupos posibles
		$listGroups = []; 

		$grupoAnterior = ceil($burbuja[0]/$rango); //redondear hacia arriba
		$indiceGrupo = 0;

		#$listGroups[$indiceGrupo] = [];
		foreach($burbuja as &$element)
		{
		   
		   $grupo = ceil($element/$rango); //redondear hacia arriba
		   
		   
		   if ($grupo != $grupoAnterior)
		   {
			   $indiceGrupo++;
			   
			   #$listGroups[$indiceGrupo] = [];
		   }
		   $listGroups[$indiceGrupo][] = $element;
		   $grupoAnterior = $grupo;
		   
		}

        return new Response('<html><body>'.print_r($listGroups).'</body></html>');


    }
}

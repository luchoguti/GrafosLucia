<?php
/**
 *	Dijkstra's algorithm in PHP by  Maria Lucia Rojas
 * 
 *
 */

function dijkstra($graphs, $source, $target){

	//initialize the array for storing
	$S = array();//the nearest path with its parent and weight
	$Q = array();//the left nodes without the nearest path
	$result ='';
	foreach(array_keys($graphs) as $val){ 	

		$Q[$val] = 99999;
		$Q[$source] = 0;
		
	}

	//start calculating
	while(!empty($Q)){
		$min = array_search(min($Q), $Q);//the most min weight, el min busca el valor minimo mas bajo dentro de mi arreglo y el array search busca la clave de mi arreglo es decir la posición
		if($min == $target){
			break;
		}
		foreach($graphs[$min] as $key=>$val){
			if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
				$Q[$key] = $Q[$min] + $val;
				$S[$key] = array($min, $Q[$key]);

			}
		}
		unset($Q[$min]);// borra la posicion dentro de un arreglo
		
	}
					echo "<pre>";
	print_r($S);
	if (!array_key_exists($target, $S)) { //Verifica si el valor ingresado como nodo final no existe dentro de mi arreglo S que es el que contiene el peso del vertice entre nodo inicial y nodo final
	    $result.="Found no way.";
	    return $result;
	}

	//list the path
	$path = array();
	$pos = $target;
	while($pos != $source){
		$path[] = $pos;
		$pos = $S[$pos][0];
	}
	$path[] = $source;
	$path = array_reverse($path);
echo "<pre>";
print_r($path); 
	//print result
	$result.="From $source to $target";
	$result.="<br />The length is ".$S[$target][1];
	$result.="<br />Path is ".implode('->', $path); //esta convirtiendo el arreglo Path que contiene el camino mas corto y lo muestra como string

	return $result;
	
}


//set the distance array
/*$graphs = array();
$graphs[1][2] = 7;
$graphs[1][3] = 9;
$graphs[1][6] = 14;
$graphs[2][1] = 7;
$graphs[2][3] = 10;
$graphs[2][4] = 15;
$graphs[3][1] = 9;
$graphs[3][2] = 10;
$graphs[3][4] = 11;
$graphs[3][6] = 2;
$graphs[4][2] = 15;
$graphs[4][3] = 11;
$graphs[4][5] = 6;
$graphs[5][4] = 6;
$graphs[5][6] = 9;
$graphs[6][1] = 14;
$graphs[6][3] = 2;
$graphs[6][5] = 9;

echo "<pre>";
print_r($graphs);
//the start and the end
$source = 1;
$target = 6;

echo dijkstra($graphs,$source,$target);*/
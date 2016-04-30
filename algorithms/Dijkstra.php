<?php
//Se tiene el metodo que calcula el camino mas corto de llegar de un nodo a otro, este método recibe como parametro de entrada graph, nodo
//iinicial y nodo final, como salida se tiene el camino mas corto.
function dijstra($graphs, $source, $target){

	$vertices = array();
	$neighbours = array();
	$path = array();

	foreach ($graphs as $edge) {
		//Esta funcion lo que hace es agregar posiciones a un arreglo
		array_push($vertices, $edge[0],$edge[1]);
		//Esta linea de codigo lo que se hace es buscar los posibles caminos y los valores de lso pesos de cada vertice
		$neighbours[$edge[0]][] = array ('endEdge' => $edge[1], 'cost' => $edge[2]);

	}
echo '<pre>';
print_r($neighbours);

		//Eliminar las vertices repetidas que se ingresaron en la función array_push 
	$vertices = array_unique($vertices);

	foreach ($vertices as $vertex) {
		
		$dist[$vertex] = INF;
		$previous[$vertex] = NULL;

	}

	$dist[$source] = 0;
	$g = $vertices;

	while (count($g) > 0) {
		$min = INF;
		foreach ($g as $vertex) {
			if ($dist[$vertex] < $min) {
				$min = $dist[$vertex];
				$u = $vertex;
			}
		}
echo $min.'||'.$u.'<br>';
		//Compara los arreglos y retorna la diferencia entre las posisiciones o valores que existen en el primer arreglo y no en el segundo arreglo
		$g = array_diff($g, array($u));

		if ($dist[$u] == INF or $u == $target) {
			break;
		}

		if (isset($neighbours[$u])) {
			foreach ($neighbours[$u] as $arr) {
				$alt = $dist[$u] + $arr["cost"];
				echo 'vecino-'.$alt.'<br>';
				$dist[$arr["endEdge"]] = $alt;
				$previous[$arr["endEdge"]] = $u;
			}
		}
		echo '<pre>';
		print_r($previous);
		echo '<pre>';
		print_r($dist);
	}
//final 
echo 'final<pre>';
print_r($dist);
echo '<pre>';
print_r($previous);
	
	//buscar el camino de los nodos visitados y que encontro como el camino corto
	$u = $target;
	while (isset($previous[$u])) {
		array_unshift($path, $u);
		$u = $previous[$u];
	}

	array_unshift($path,$u);

	print_r($path);
	return $path;
}

	$graph = array(
		array("a","b",8),
		array("a","c",9),
		array("a","f",13),
		array("b","c",10),
		array("b","d",5),
		array("c","d",11),
		array("c","f",32),
		array("d","e",23),
		array("e","f",9),
	);

/*echo "<pre>";
print_r($graph);*/
	$path = dijstra($graph,"a","d");

	echo "The path is [".implode(", ", $path)."]\n";

	$p= INF;
	$j= 0;

	if($p < $j){
		echo 'true';
	}
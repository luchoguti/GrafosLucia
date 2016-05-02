<?php
<<<<<<< 24a170e25744a3f3418877a5e37033a9a6d74e6f

	if(isset($_GET['numExecute'])){

		echo $_GET['numExecute'];
=======
//opcion 1 generar con lo hecho anteriormente un array con el grafo especificado para cada algoritmo esto implica modifiacar lo hecho anteriormente para que se pueda incluir un peso entre cada transicion -- este punto dura mas tiempo en ser desarrollada.
//opcion 2 olvidarnos de lo hecho y dejar un grafo predeterminado para las ejecuciones de todos los metodos no veo q en la documentacion exijan tener encuenta la entraga anterior -- este punto duran menos tiempo en ser desarrollada
include("create_graph/ExitGraph.php");
include("algorithms/Dijkstra.php");

	if(isset($_GET['numExecute'])){

		switch ($_GET['numExecute']) {
			case 0:
				
				$cycle=9;
				$graph=1;
				$newExitGraph = new ExitGraph();

				$newExitGraph->setCreateFile($cycle,$graph);

				/*echo '<pre>';
				
				print_r($newExitGraph->getMatrizGraph());

				print_r($newExitGraph->getListGrade());*/


				//echo $newExitGraph->getCreateFile();
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

				echo "<pre>";
				print_r($graph);
			break;
			case 5:
				
				
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

				$path = dijstra($graph,"a","d");

				echo "The path is [".implode(", ", $path)."]\n";

				$p= INF;
				$j= 0;

				if($p < $j){
					echo 'true';
				}			

			break;
			
			default:
				# code...
			break;
		}
		
>>>>>>> se generan pruebas de impresion de cada algoritmo

	}


?>
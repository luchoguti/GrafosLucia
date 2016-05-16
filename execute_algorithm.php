<?php

//opcion 1 generar con lo hecho anteriormente un array con el grafo especificado para cada algoritmo esto implica modifiacar lo hecho anteriormente para que se pueda incluir un peso entre cada transicion -- este punto dura mas tiempo en ser desarrollada.
//opcion 2 olvidarnos de lo hecho y dejar un grafo predeterminado para las ejecuciones de todos los metodos no veo q en la documentacion exijan tener encuenta la entraga anterior -- este punto duran menos tiempo en ser desarrollada
include("create_graph/ExitGraph.php");
include("create_graph/GraphProcessingAlgorithms.php");
include("algorithms/Dijkstra.php");

	if(isset($_GET['numExecute'])){
		$dimensions=5;
		$num_graph=1;
				
		switch ($_GET['numExecute']) {
			case 0:
				
				//$newExitGraph = new ExitGraph($dimensions,$num_graph);
				$graphDijstr= new GraphProcessingAlgorithms($dimensions,$num_graph);
				$graphDijstr->setGraphAlgDijkstra();
				echo "<pre>";
				print_r($graphDijstr->getGraphAlgDijkstra());

/*				$newExitGraph->setCreateFile_output();
				echo $newExitGraph->getCreateFile(); */


			break;
			case 5:
				
				
				$graph = array(
					array("a","b",8),
					array("a","c",9),
					array("b","a",7),
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

echo "--------------------------------";

/*				$graphDijstr= new GraphProcessingAlgorithms($dimensions,$num_graph);
				$graphDijstr->setGraphAlgDijkstra();
				$graph=$graphDijstr->getGraphAlgDijkstra();
echo "<pre>";
print_r($graph);
 				$path = dijstra($graph,0,4);

				echo "The path is [".implode(", ", $path)."]\n";

				$p= INF;
				$j= 0;

				if($p < $j){
					echo 'true';
				}	*/

			break;
			
			default:
				
			break;
		}
		
}
?>
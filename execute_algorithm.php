<?php

session_start();
include("create_graph/ExitGraph.php");
include("create_graph/dataAlgorithmsDijkstra.php");
include("create_graph/dataAlgorithmsBFS.php");
include("create_graph/dataAlgorithmsFloyd_Warshall.php");
include("create_graph/dataAlgorithmsDijkstraPriorityQueue.php");
include("algorithms/Dijkstra_2.php");
include("algorithms/BFS.php");
include("algorithms/DFS_recursion.php");
include("algorithms/DFS_stack.php");
include('algorithms/Floyd&Warshall.php');
include('algorithms/Dijkstra_PriorityQueue.php');

if($_GET['statechangeGraph']==1){
	session_destroy();
}
echo "<button onclick='location.href=\"index.html\";'><<-Regresar</button><br>";
	if(isset($_GET['numExecute'])){
		
		$dimensions=5;
		$num_graph=1;
		$source = 1;
		$target = 4;		
		
		if(count($_SESSION['fileGraph'])<=0){
		
			$newExitGraph = new ExitGraph($dimensions,$num_graph);
			$fileData=$newExitGraph->getCreateFile();
			$_SESSION['fileGraph']=$fileData;
			$_SESSION['costGraph']=$newExitGraph->getCostGraphs();
			$_SESSION['graphAdject']=$newExitGraph->getGraphAdject();
		}
		switch ($_GET['numExecute']) {
			case 0:
				
				echo $_SESSION['fileGraph'];


			break;
			case 1:
				echo $_SESSION['fileGraph'];

				if(count($_SESSION['BFSGraph'])<=0){
					$graphBFS= new dataAlgorithmsBFS($dimensions,$num_graph);
					$graph=$graphBFS->getGraphAlgBFS();
					$_SESSION['BFSGraph']=$graph;
				}else{
					$graph=$_SESSION['BFSGraph'];	
				}
				echo "<pre>";
				print_r($graph);
				//bfs($graph,$source,$target);
			
				echo(bfs_path($graph,$source,$target));
				
			
			break;
			case 2:
				echo $_SESSION['fileGraph'];

				if(count($_SESSION['DFSGraph'])<=0){
				
					$newExitGraph = new ExitGraph($dimensions,$num_graph);
					$graph=$newExitGraph->getMatrizGraph();
					$_SESSION['DFSGraph']=$graph;

				}else{
					$graph=$_SESSION['	'];
				}	

				for ($k=0; $k<$num_graph; $k++) { 
					$graphDFS_recursion= new DFS_recursion($graph[$k]);
					$graphDFS_recursion->getDepthFirst($source);
					echo "<br>";
				}

			break;
			case 3:
				echo $_SESSION['fileGraph'];

				if(count($_SESSION['DFSGraph'])<=0){
				
					$newExitGraph = new ExitGraph($dimensions,$num_graph);
					$graph=$newExitGraph->getMatrizGraph();
					$_SESSION['DFSGraph']=$graph;

				}else{
					$graph=$_SESSION['DFSGraph'];
				}	
				
				for ($k=0; $k<$num_graph; $k++) { 
					$graphDFS_recursion= new DFS_stack($graph[$k]);
					$graphDFS_recursion->getDepthFirst($source);
					echo "<br>";
				}

			break;
			case 4:
				
				if(count($_SESSION['DFSGraph'])<=0){
				
					$graphFloyd_Warshall= new dataAlgorithmsFloyd_Warshall($dimensions,$num_graph);
					$graph=$graphFloyd_Warshall->getGraphFloyd_Warshall();
					$nodes=$graphFloyd_Warshall->getNodesFloyd_Warshall();
					$_SESSION['FloydWarshall'][0]=$graph;
					$_SESSION['FloydWarshall'][1]=$nodes;

				}else{

					$graph=$_SESSION['FloydWarshall'][0];
					$nodes=$_SESSION['FloydWarshall'][1];
				}
				
			    $fw = new FloydWarshall($graph, $nodes);
			    //$fw->print_path(0,2);
			    /*$fw->print_graph();
			    $fw->print_dist();
			    $fw->print_pred();*/

			    $sp = $fw->get_path($source,$target);

			    echo 'The sortest path from '.$source.' to '.$target.' is: <strong>';
			    foreach ($sp as $value) {
			        echo $nodes[$value] . ' ';
			    }
			    echo '</strong><br>';
				echo 'The length is <b>'.$fw->get_distance($source,$target).'</b>';

			break;

			case 5:
				
			
			break;
			case 6:
				echo $_SESSION['fileGraph'];
			
				if(count($_SESSION['DijkstraGraph'])<=0){
					$graphDijstr= new dataAlgorithmsDijkstra($dimensions,$num_graph);
					$graph=$graphDijstr->getGraphAlgDijkstra();
					$_SESSION['DijkstraGraph']=$graph;
				}else{
					$graph=$_SESSION['DijkstraGraph'];
				}

				echo dijkstra($graph,$source,$target);
				
				
			break;
			
			case 7:
				
				echo $_SESSION['fileGraph'];
				
				$costGraph=$_SESSION['costGraph'];
				$graphAdject=$_SESSION['graphAdject'];

/*				$graphDijstrPritQue= new dataAlgorithmsDijkstraPriorityQueue($dimensions,$num_graph,$graphAdject,$costGraph);
				$graph=$graphDijstrPritQue->getGraphAlgDijkstraPriorityQueue();

				echo "<pre>";
				print_r($graph);

				$algorithm = new dijkstraPriorityQueue($graph);

				$algorithm->shortestPath($source,$target);*/

				$graphss = array(
    '0' => array('3' =>1),
  	'1' => array('0' =>5, '2' => 7),
  	'2' => array('0' =>7, '1' => 9,'3' =>9),
  	'3' => array('1' =>'5', '2' => 1),
  );

			$algorithm = new dijkstraPriorityQueue($graphss);

				$algorithm->shortestPath('0','2');




			/*	$graphss = array(
  'A' => array('B' => 3, 'D' => 3, 'F' => 6),
  'B' => array('A' => 3, 'D' => 1, 'E' => 3),
  'C' => array('E' => 2, 'F' => 3),
  'D' => array('A' => 3, 'B' => 1, 'E' => 1, 'F' => 2),
  'E' => array('B' => 3, 'C' => 2, 'D' => 1, 'F' => 5),
  'F' => array('A' => 6, 'C' => 3, 'D' => 2, 'E' => 5),
  );

			$algorithm = new dijkstraPriorityQueue($graphss);

				$algorithm->shortestPath('C','A');*/


			break;
			
			default:
				
			break;
		}
		
}
?>
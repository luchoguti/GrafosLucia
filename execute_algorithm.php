<?php

session_start();
include("create_graph/ExitGraph.php");
include("create_graph/dataAlgorithmsDijkstra.php");
include("create_graph/dataAlgorithmsBFS.php");
include("algorithms/Dijkstra_2.php");
include("algorithms/BFS.php");
include("algorithms/DFS_recursion.php");
include("algorithms/DFS_stack.php");

if($_GET['statechangeGraph']==1){
	session_destroy();
}
echo "<button onclick='location.href=\"index.html\";'><<-Regresar</button><br>";
	if(isset($_GET['numExecute'])){
		
		$dimensions=5;
		$num_graph=1;
		$source = 1;
		$target = 4;		
		
		if(count($_SESSION['dataGraph'])<=0){
		
			$newExitGraph = new ExitGraph($dimensions,$num_graph);
			$newExitGraph->setCreateFile_output();
			$fileData=$newExitGraph->getCreateFile();
			$_SESSION['dataGraph']=$fileData;
		}
		switch ($_GET['numExecute']) {
			case 0:
				
				echo $_SESSION['dataGraph'];


			break;
			case 1:
				echo $_SESSION['dataGraph'];

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
				echo $_SESSION['dataGraph'];

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
				echo $_SESSION['dataGraph'];

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
				
			break;
			case 6:
				echo $_SESSION['dataGraph'];
			
				if(count($_SESSION['DijkstraGraph'])<=0){
					$graphDijstr= new dataAlgorithmsDijkstra($dimensions,$num_graph);
					$graph=$graphDijstr->getGraphAlgDijkstra();
					$_SESSION['DijkstraGraph']=$graph;
				}else{
					$graph=$_SESSION['DijkstraGraph'];
				}

				echo dijkstra($graph,$source,$target);
				
				
			break;
			
			default:
				
			break;
		}
		
}
?>
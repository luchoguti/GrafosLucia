<?php

include_once("ExitGraph.php");

class dataAlgorithmsDijkstraPriorityQueue
{
	private $graphDijkPriQueue = array();

	public function __construct($dimensions,$num_graph,$graphAdject,$costGraph){
		$this->setGraphAlgDijkstraPriorityQueue($dimensions,$num_graph,$graphAdject,$costGraph);
    }

	private function setGraphAlgDijkstraPriorityQueue($dimensions,$num_graph,$graphAdject,$costGraph){
		
		for ($d=0; $d < $num_graph; $d++) { 
			for ($e=0; $e < $dimensions; $e++) { 	
				for ($f=0; $f < $dimensions; $f++) { 
					if($graphAdject[$d][$e][$f]!=0){
						//cost porsitive in [0]
						$this->graphDijkPriQueue[$f][$e]=$costGraph[0][$d][$e][$f];
					}
				}
			}
		}
	
	}

	public function getGraphAlgDijkstraPriorityQueue(){
		
		return $this->graphDijkPriQueue;

	}

}

?>

?>
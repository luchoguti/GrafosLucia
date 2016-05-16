<?php

include_once("ExitGraph.php");

class GraphProcessingAlgorithms extends ExitGraph
{
	protected $graphDijkstra = array();

	public function setGraphAlgDijkstra(){
		
		for ($d=0; $d < $this->valueNum_graph; $d++) { 
			$g=0;
			for ($e=0; $e < $this->valueDimensions; $e++) { 		
				for ($f=0; $f < $this->valueDimensions ; $f++) { 
				 	if(isset($this->costGraphPositive[$d][$e][$f])){
					 	$this->graphDijkstra[$g][0]=$e;
						$this->graphDijkstra[$g][1]=$f;
						$this->graphDijkstra[$g][2]=$this->costGraphPositive[$d][$e][$f];
						$g++;
					}
				}
			}
		}
	
	}

	public function getGraphAlgDijkstra(){
		
		return $this->graphDijkstra;

	}

}

?>
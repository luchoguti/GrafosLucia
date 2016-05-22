<?php

include_once("ExitGraph.php");

class dataAlgorithmsDijkstra extends ExitGraph
{
	private $graphDijkstra = array();

	public function __construct($dimensions,$num_graph){
		parent::__construct($dimensions,$num_graph);
		$this->setGraphAlgDijkstra();
    }

	private function setGraphAlgDijkstra(){
		
		for ($d=0; $d < $this->valueNum_graph; $d++) { 
			$g=0;
			for ($e=0; $e < $this->valueDimensions; $e++) { 		
				for ($f=0; $f < $this->valueDimensions ; $f++) { 
				 	if(isset($this->costGraphPositive[$d][$e][$f])){
					 	$this->graphDijkstra[$e][$f]=$this->costGraphPositive[$d][$e][$f];
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
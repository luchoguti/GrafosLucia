<?php

include_once("ExitGraph.php");

class dataAlgorithmsFloyd_Warshall extends ExitGraph
{
	private $graphFloyd_Warshall  = array();
	private $nodesFloyd_Warshall = array();

	public function __construct($dimensions,$num_graph){
		parent::__construct($dimensions,$num_graph);
		$this->setGraphFloyd_Warshall();
    }

	private function setGraphFloyd_Warshall(){
		
		for ($d=0; $d < $this->valueNum_graph; $d++) { 
			$g=0;
			for ($e=0; $e < $this->valueDimensions; $e++) { 		
				$this->nodesFloyd_Warshall[]=$e;
				for ($f=0; $f < $this->valueDimensions ; $f++) { 
				 	if(isset($this->costGraphPositive[$d][$e][$f])){
					 	$this->graphFloyd_Warshall[$e][$f]=$this->costGraphPositive[$d][$e][$f];
						$g++;
					}else{
						$this->graphFloyd_Warshall[$e][$f]=0;
						$g++;
					}
				}
			}
		}
	
	}

	public function getGraphFloyd_Warshall(){
			
		return $this->graphFloyd_Warshall;

	}

	public function getNodesFloyd_Warshall(){
			
		return $this->nodesFloyd_Warshall;

	}

}

?>
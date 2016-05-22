<?php

/**
* 
*/
include_once("ExitGraph.php");

class dataAlgorithmsBFS extends ExitGraph
{
	private $graphBFS = array();
	
	public function __construct($dimensions,$num_graph){
		parent::__construct($dimensions,$num_graph);
		$this->setGraphAlgBFS();
    }

	private function setGraphAlgBFS(){
		
		for ($d=0; $d < $this->valueNum_graph; $d++) { 
			for ($e=0; $e < $this->valueDimensions; $e++) { 	
				$g=0;
				for ($f=0; $f < $this->valueDimensions ; $f++) { 
					if($this->adjectMatriz[$d][$e][$f]!=0){
						$this->graphBFS[$e][$g]=$f;
						$g++;
					}
				}
			}
		}
	
	}

	public function getGraphAlgBFS(){
		
		return $this->graphBFS;

	}

}

?>
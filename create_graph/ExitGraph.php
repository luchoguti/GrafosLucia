<?php

	include_once("Graph.php");

/**
* 
*/
class ExitGraph extends Graph
{
	
	public $objectMatriz = array();
	public $matrizListGrade = array();

	protected $matrizGraph;
	protected $matrizExit = array();
	protected $file;
	protected $valueDimensions;
	protected $valueNum_graph;
	protected $adjectMatriz = array();
	protected $costGraphPositive = array();
	protected $costGraphPositiveOrNega = array();

	private $matrizGrade = array();
	
	
	public function __construct($dimensions,$num_graph){

		$constMatriz = new Graph();		

		for ($f=0; $f < $num_graph; $f++) { 
		
			$constMatriz->setMatriz($dimensions);
			
			$dataMatriz =$constMatriz->getMatriz();
			
			$this->objectMatriz[] = $dataMatriz;

			self::listGrade($dataMatriz);

			$this->matrizListGrade[] = self::getGrade();
		
			$this->matrizGrade = array();
		}

		$getAdjectMatriz=(self::getMatrizGraph());

		$this->adjectMatriz = $getAdjectMatriz;
		$this->valueDimensions =$dimensions;
		$this->valueNum_graph =$num_graph;

		self::setArtist_graph();
    
  	}

  	protected function setArtist_graph(){

  		$costGrahp1=array();
  		$costGrahp2=array();
  		for ($j=0; $j < $this->valueNum_graph; $j++) { 
  			for ($k=0; $k < $this->valueDimensions; $k++) {  					
	  			for ($l=0; $l < $this->valueDimensions; $l++) { 
	  				
	  				if($this->adjectMatriz[$j][$k][$l]==1){
 					
 						$costGrahp1[$j][$k][$l]=rand(1,10);
 						$costGrahp2[$j][$k][$l]=rand(-10,10);

	  				}

	  			}

		  	}
	  	}
	  	$this->costGraphPositive=$costGrahp1;
	  	$this->costGraphPositiveOrNega=$costGrahp2;
	  		

  	}

	protected function listGrade($matriz){


		$this->matrizGraph = $matriz;

		for ($i=0; $i < count($this->matrizGraph) ; $i++) { 
			
			$countGradeColumn = 0;
			$countGradeRow = 0;
			for ($j=0; $j < count($this->matrizGraph); $j++) { 
				
				if($this->matrizGraph[$i][$j]==1){

					$countGradeRow+=count($this->matrizGraph[$i][$j]);
				}
				if($this->matrizGraph[$j][$i]==1){

					$countGradeColumn+=count($this->matrizGraph[$j][$i]);

				}
			}

			$this->matrizGrade[]=$countGradeRow;
			$this->matrizGrade[]=$countGradeColumn;

		}
		rsort($this->matrizGrade);


	}

	public function getGrade(){

		return $this->matrizGrade;

	}

	public function getListGrade(){

		return $this->matrizListGrade;

	}

	public function getMatrizGraph(){

		return $this->objectMatriz;
	}

	public function getCreateFile(){

		return $this->file;

	}

	public function setCreateFile_output(){

		$node = $this->valueDimensions*2;
		$this->file = $this->valueNum_graph.'<br>';
		$this->file .= $this->valueDimensions.'x'.$this->valueDimensions.'<br>';
		$this->file .= $node;

		$listMatrizGrade=(self::getListGrade());
		echo "<pre>";
		print_r($this->adjectMatriz);
		for ($q=0; $q < count($this->adjectMatriz); $q++) { 

			for ($r=0; $r < count($this->adjectMatriz[$q]); $r++) { 
				
				$stringAdject='';
				for ($s=0; $s < count($this->adjectMatriz[$q][$r]) ; $s++) { 
					
					$stringAdject .= $this->adjectMatriz[$q][$s][$r];

				}
				$this->file .= '<br>'.$stringAdject;
			}
			$stringGrade='';

			for ($t=0; $t <= count($listMatrizGrade[$q]); $t++) { 
			
				$stringGrade .= $listMatrizGrade[$q][$t];

			}
			$this->file .= '<br>'.$stringGrade;

		}		

		
	}

}
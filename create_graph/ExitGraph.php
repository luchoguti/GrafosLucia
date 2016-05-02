<?php

	include_once("Graph.php");

/**
* 
*/
class ExitGraph extends Graph
{
	
	protected $matrizGraph;
	public $objectMatriz = array();
	private $matrizGrade = array();
	public $matrizListGrade = array();

	protected $matrizExit = array();

	protected $file;
		
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

	public function setConstructFile($size,$cycle){

		$constMatriz = new Graph();		

		for ($f=0; $f < $cycle ; $f++) { 
		
			$constMatriz->setMatriz($size);
			
			$dataMatriz =$constMatriz->getMatriz();
			
			$this->objectMatriz[] = $dataMatriz;

			self::listGrade($dataMatriz);

			$this->matrizListGrade[] = self::getGrade();
		
			$this->matrizGrade = array();
		}

	}

	public function getMatrizGraph(){

		return $this->objectMatriz;
	}

	public function getCreateFile(){

		return $this->file;

	}

	public function setCreateFile($size,$cycle){

		$node = $size*2;
		$this->file = $cycle.'<br>';
		$this->file .= $size.'x'.$size.'<br>';
		$this->file .= $node;

		self::setConstructFile($size,$cycle);

		$adjectMatriz=(self::getMatrizGraph());
		echo "<pre>";
		print_r($adjectMatriz);

		$listMatrizGrade=(self::getListGrade());

		for ($q=0; $q < count($adjectMatriz); $q++) { 

			for ($r=0; $r < count($adjectMatriz[$q]); $r++) { 
				
				$stringAdject='';
				for ($s=0; $s < count($adjectMatriz[$q][$r]) ; $s++) { 
					
					$stringAdject .= $adjectMatriz[$q][$s][$r];

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
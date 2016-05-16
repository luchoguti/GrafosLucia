<?php

	include("GraphMain.php");
	

	/**
	* 
	*/
	class Graph extends GraphMain{
		
		protected $matrizAdjacency = array();
		
		public $objectClass;
		/**
		* this method  represent
		* @param string $message
	    * @param array $context       
	    * @return null 
		*/
	
		
		public function createEdge(int $x , int $y){

			$this->matrizAdjacency[$x][$y]=1;

		}


		public function deleteEdge(int $x , int $y){

			$this->matrizAdjacency[$x][$y]=0;

		}

		public function setMatriz($size){
			
			$objectClass = new GraphMain();
			$this->matrizAdjacency = $objectClass->getRandomGraph($size);
			
		}

		public function getMatriz(){

			return $this->matrizAdjacency;

		}


	}

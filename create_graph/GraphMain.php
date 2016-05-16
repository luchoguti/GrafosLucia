<?php

/**
	* 
	*/

	class GraphMain{


		private $numberRandom;

		private $matrizMemory = array();

		public function randomFloat($min = 0, $max = 1) {
 			
 			   return $min + mt_rand() / mt_getrandmax() * ($max - $min);
		

		}


		public function getRandomGraph($size){

			for ($j=0; $j < $size; $j++) { 
				
				for ($k=0; $k < $size ; $k++) { 
					
					$numberRandom=self::randomFloat();
					//the main diagonal always have zeros
					if($j!=$k){
						$egde=($numberRandom <= '0.5')?0:1;
					}else{
						$egde=0;
					}
					$matrizMemory[$j][$k]=$egde;

				}

			}

			return $matrizMemory;
		}


	}

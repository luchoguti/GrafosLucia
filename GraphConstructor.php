<?php

	include("ExitGraph.php");

	$cycle=4;
	$graph=4;
	$newExitGraph = new ExitGraph();

	$newExitGraph->setCreateFile($graph,$cycle);

	/*echo '<pre>';
	
	print_r($newExitGraph->getMatrizGraph());

	print_r($newExitGraph->getListGrade());*/

	echo $newExitGraph->getCreateFile();



	
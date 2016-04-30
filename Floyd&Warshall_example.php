<?php

    include('algorithms/Floyd&Warshall.php');

    $graph = array(array(0,0,0,0,5,12),
                   array(15,0,9,0,0,0),
                   array(0,0,0,5,0,0),
                   array(0,2,0,0,0,0),
                   array(0,0,10,0,0,4),
                   array(0,0,17,20,0,0));
    $nodes = array("a", "b", "c", "d", "e", "f");

    $fw = new FloydWarshall($graph, $nodes);
    //$fw->print_path(0,2);
    $fw->print_graph();
    $fw->print_dist();
    $fw->print_pred();

    $sp = $fw->get_path(0,2);

    echo 'The sortest path from a to c is: <strong>';
    foreach ($sp as $value) {
        echo $nodes[$value] . ' ';
    }
    echo '</strong>';

    $sp = $fw->get_path(1,3);

    echo 'The sortest path from a to c is: <strong>';
    foreach ($sp as $value) {
        echo $nodes[$value] . ' ';
    }
    echo '</strong>';

    

    print_r($fw->get_distance(0,2));

?>

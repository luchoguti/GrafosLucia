<?php

define('INFINITY', 10000000);
 
$matrix = array(
    0 => array( 0,  3,  4),
    1 => array( 0,  0,  2),
    2 => array( 0,  -2, 0),
);
 
$len = count($matrix);
 
$dist = array();
 
function BellmanFord(&$matrix, &$dist, $start)
{
    global $len;
 
    foreach (array_keys($matrix) as $vertex) {
        $dist[$vertex] = INFINITY;
        if ($vertex == $start) {
            $dist[$vertex] = 0;
        }
    }
 
    for ($k = 0; $k < $len - 1; $k++) {
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($dist[$i] > $dist[$j] + $matrix[$j][$i]) {
                    $dist[$i] = $dist[$j] + $matrix[$j][$i];
                }
            }
        }
    }
}
 
BellmanFord($matrix, $dist, 0);
 
// [0, 2, 4]
print_r($dist);
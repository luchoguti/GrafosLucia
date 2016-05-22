<?php
class Dijkstra
{
  protected $graph;

  public function __construct($graph) {
    $this->graph = $graph;
  }

  public function shortestPath($source, $target) {
    // array of best estimates of shortest path to each
    // vertex
    $d = array();
    // array of predecessors for each vertex
    $pi = array();
    // queue of all unoptimized vertices
    $Q = new SplPriorityQueue();

    /*Se recore el grafo, en $v se tienen los nodos y en $adj se tienen el arreglo con que nodos se comunican y cuanto pesan*/
    foreach ($this->graph as $v => $adj) {
      $d[$v] = INF; // set initial distance to "infinity"
      $pi[$v] = null; // no known predecessors yet
      /* En el parametro $w se tiene la posicion del nodo con el que se comunica, y en $cost se tiene el valor del peso*/

      foreach ($adj as $w => $cost) {
        // use the edge cost as the priority
        // Inserta de acuerdo al peso que tiene cada arista, y respecto al orden en que se estan insertando
        $Q->insert($w, $cost);
      }

    }

    // Count the elements print PriorityQueue insert 
/*    echo "count ->" . $Q->count() . PHP_EOL;

    $Q->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

    // Go at the node from the top of the queue
    $Q->top();

    // Iterate the queue (by priority) and display each element
    while ($Q->valid()) {
      echo "<pre>";
        print_r($Q->current());
        echo PHP_EOL;
        $Q->next();
    }*/
    // initial distance at source is 0
    $d[$source] = 0;
    /* Este ciclo termina cuando no tenga nodos en la cola, es decir se extraigan todos sus nodos de la cola.*/
     while (!$Q->isEmpty()) {
      // extract min cost
      $u = $Q->extract();
     // echo $u.'<br>';
      if (!empty($this->graph[$u])) {
        // "relax" each adjacent vertex
        //
        foreach ($this->graph[$u] as $v => $cost) {
          // alternate route length to adjacent neighbor
          $alt = $d[$u] + $cost;//3
        //  echo $u.'---'.$d[$u].'-----'.$cost.'<br>';
          // if alternate route is shorter
          //3 < Inf
          //Esta condicional asegura que cada vez que se realice la iteración exista un camino minimo el nodo.
          if ($alt < $d[$v]) {
            $d[$v] = $alt; // update minimum length to vertex
            $pi[$v] = $u;  // add neighbor to predecessors
                           //  for vertex
          }
        }
      }
    }
echo "<pre>";
print_r($d);
print_r($pi);
    // we can now find the shortest path using reverse
    // iteration
    $S = new SplStack(); // shortest path with a stack
    $u = $target;
    $dist = 0;
    // traverse from target to source
    while (isset($pi[$u]) && $pi[$u]) {
      $S->push($u);
      $dist += $this->graph[$u][$pi[$u]]; // add distance to predecessor
      $u = $pi[$u];
    }

    // stack will be empty if there is no route back
    if ($S->isEmpty()) {
      echo "No route from $source to $targetn";
    }
    else {
      // add the source node and print the path in reverse
      // (LIFO) order
      $S->push($source);
      echo "$dist:";
      $sep = '';
      foreach ($S as $v) {
        echo $sep, $v;
        $sep = '->';
      }
      //  echo "n";
    }
  }
}

$graph = array(
  'A' => array('B' => 3, 'D' => 3, 'F' => 6),
  'B' => array('A' => 3, 'D' => 1, 'E' => 3),
  'C' => array('E' => 2, 'F' => 3),
  'D' => array('A' => 3, 'B' => 1, 'E' => 1, 'F' => 2),
  'E' => array('B' => 3, 'C' => 2, 'D' => 1, 'F' => 5),
  'F' => array('A' => 6, 'C' => 3, 'D' => 2, 'E' => 5),
  );

$g = new Dijkstra($graph);

$g->shortestPath('D', 'C'); echo "<br>";  // 3:D->E->C
/*$g->shortestPath('C', 'A'); echo "<br>"; // 6:C->E->D->A
$g->shortestPath('B', 'F'); echo "<br>"; // 3:B->D->F
$g->shortestPath('F', 'A'); echo "<br>"; // 5:F->D->A 
$g->shortestPath('A', 'C');  // No route from A to G*/
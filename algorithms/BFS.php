<?php
/*
 * A simple iterative Breadth-First Search implementation.
 * http://en.wikipedia.org/wiki/Breadth-first_search
 *
 * 1. Start with a node, enqueue it and mark it visited.
 * 2. Do this while there are nodes on the queue:
 *     a. dequeue next node.
 *     b. if it's what we want, return true!
 *     c. search neighbours, if they haven't been visited,
 *        add them to the queue and mark them visited.
 *  3. If we haven't found our node, return false.
 *
 * @returns bool
 */
//esta función lo que hace es buscar un nodo dentro del grafo
function bfs($graph, $start, $end) {
//Esta es una clase propia de PHP que se utiliza para trabajar colas
    $queue = new SplQueue();
//El metodo enqueue es propio de la clase SpLQueue, lo que hace el metodo es agregar elementos a la cola
    $queue->enqueue($start);

    $visited[] = $start;
    
    while ($queue->count() > 0) {
        //Este metodo tambien es propio de la clase SqlQueue, lo que hace este metodo es eliminar elementos de la cola.
        $node = $queue->dequeue();  
        # We've found what we want
        if ($node === $end) {
            return true;
        }
        if(isset($graph[$node])){
            foreach ($graph[$node] as $neighbour) {

                if (!in_array($neighbour, $visited)) {
                    # Mark neighbour visited
                    $visited[] = $neighbour;
                    # Enqueue node
                    $queue->enqueue($neighbour);
                }
            }
        }else{
            return false;
        }
        
    }
    return false;

}
/*
 * Same as bfs() except instead of returning a bool, it returns a path.
 *
 * Implemented by enqueuing a path, instead of a node, for each neighbour.
 *
 * @returns array or false
 */

function bfs_path($graph, $start, $end) {
    $queue = new SplQueue();
    # Enqueue the path
    $queue->enqueue([$start]);
    $visited = [$start];
    while ($queue->count() > 0) {
        $path = $queue->dequeue();
        # Get the last node on the path
        # so we can check if we're at the end
        //print_r($path);
        $node = $path[sizeof($path) - 1];
        if ($node === $end) {
            $stringdataPath='Path is ';
            $a=0;
            foreach ($path as $data_Path) {
               $stringdataPath.=($a==0) ?  $data_Path: '-->'.$data_Path;
               $a++;
            }
            return $stringdataPath;
        }
        if(isset($graph[$node])){
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
                    # Build new path appending the neighbour then and enqueue it
                    $new_path = $path;
                    $new_path[] = $neighbour;
                    $queue->enqueue($new_path);
                }
            }
        }else{
            $stringdataPath='Found no way.';
            return $stringdataPath;
        }
    }
    return false;
}


/*$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D'],
    'D' => ['B'],
    'C' => ['A',],
];
bfs($graph, 'A', 'D'); // true
bfs($graph, 'A', 'G'); // false
echo '<pre>';
print_r(bfs_path($graph, 'A', 'D')); // ['A', 'B', 'D']*/
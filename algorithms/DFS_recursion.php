<?php

class DFS_recursion 
{
    protected $_len = 0;
    protected $_g = array();
    protected $_visited = array();
 
    public function __construct($dfsGraph)
    {

        $this->_g = $dfsGraph;
 
        $this->_len = count($this->_g);
 
        $this->_initVisited();
    }
 
    protected function _initVisited()
    {
        for ($i = 0; $i < $this->_len; $i++) {
            $this->_visited[$i] = 0;
        }
    }
 
    public function getDepthFirst($vertex)
    {
        $this->_visited[$vertex] = 1;
        echo $vertex . "\n";
 
        for ($i = 0; $i < $this->_len; $i++) {
            if ($this->_g[$vertex][$i] == 1 && !$this->_visited[$i]) {
                $this->getDepthFirst($i);
            }
        }
    }
}
 
/*        $gf = array(
            array(0, 1, 1, 0, 0, 0),
            array(1, 0, 0, 1, 0, 0),
            array(1, 0, 0, 1, 1, 1),
            array(0, 1, 1, 0, 1, 0),
            array(0, 0, 1, 1, 0, 1),
            array(0, 0, 1, 0, 1, 0),
        );
$g = new DFS_recursion($gf);
// 2 0 1 3 4 5
$g->getDepthFirst(2);*/
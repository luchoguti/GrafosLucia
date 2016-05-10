<?php

/**
* @package FloydWarshall
* @author Janne Mikkonen <janne dot mikkonen at julmajanne dot com>
* @date $Date: 2013/03/23 05:10:48 $
* @version $Revision: 1.1.1 $
* @license GNU General Public License, version 2 http://www.opensource.org/licenses/GPL-2.0
**/

error_reporting(E_STRICT);
define('INFINITE', pow(2, (20 * 8 - 2)-1));

class FloydWarshall {

    /**
    * Distances array
    * @var array
    */
    private $dist = array(array());
    /**
    * Predecessor array
    * @var array
    */
    private $pred = array(array());
    /**
    * Weights array
    * @var array
    */
    private $weights;
    /**
    * Number of nodes
    * @var integer
    */
    private $nodes;
    /**
    * Node names array
    * @var array
    */
    private $nodenames;
    /**
    * Temporary table for various stuff.
    * @var array
    */
    private $tmp = array();

    /**
    * Constructor
    * @param array $graph Graph matrice.
    * @param array $nodenames Node names as an array.
    */
    public function __construct($graph, $nodenames='') {

        $this->weights = $graph;
        $this->nodes   = count($this->weights);
        if ( ! empty($nodenames) && $this->nodes == count($nodenames) ) {
            $this->nodenames = $nodenames;
        }
        $this->__floydwarshall();

    }

    /**
    * The actual PHP implementation of Floyd-Warshall algorithm.
    * @return void
    */
    private function __floydwarshall () {

        // Initialization
        for ( $i = 0; $i < $this->nodes; $i++ ) {
            for ( $j = 0; $j < $this->nodes; $j++ ) {
                if ( $i == $j ) {
                    $this->dist[$i][$j] = 0;
                } else if ( $this->weights[$i][$j] > 0 ) {
                    $this->dist[$i][$j] = $this->weights[$i][$j];
                } else {
                    $this->dist[$i][$j] = INFINITE;
                }
                $this->pred[$i][$j] = $i;
            }
        }

        // Algorithm

        for ( $k = 0; $k < $this->nodes; $k++ ) {
            for ( $i = 0; $i < $this->nodes; $i++ ) {
                for ( $j = 0; $j < $this->nodes; $j++ ) {
                    if ($this->dist[$i][$j] > ($this->dist[$i][$k] + $this->dist[$k][$j])) {
                        $this->dist[$i][$j] = $this->dist[$i][$k] + $this->dist[$k][$j];
                        $this->pred[$i][$j] = $this->pred[$k][$j];
                    }
                }
            }
        }

    }

    /**
    * Private method to get the path.
    *
    * Get graph path from predecessor matrice.
    * @param integer $i
    * @param integer $j
    * @return void
    */
    private function __get_path($i, $j) {

        if ( $i != $j ) {
            $this->__get_path($i, $this->pred[$i][$j]);
        }
        array_push($this->tmp, $j);
    }

    /**
    * Public function to access get path information.
    *
    * @param ingeger $i Starting node.
    * @param integer $j End node.
    * @return array Return array of nodes.
    */
    public function get_path($i, $j) {
        $this->tmp = array();
        $this->__get_path($i, $j);
        return $this->tmp;
    }

    /**
    * Print nodes from a and b.
    * @param ingeger $i Starting node.
    * @param integer $j End node.
    * @return void
    */
    public function print_path($i, $j) {

        if ( $i != $j ) {
            $this->print_path($i, $this->pred[$i][$j]);
        }

        if (! empty($this->nodenames) ) {
            print($this->nodenames[$j]) . ' ';
        } else {
            print($j) . ' ';
        }

    }

    /**
    * Get total cost (distance) between point a to b.
    *
    * @param integer $i
    * @param ingeger $j
    * @return array Returns an array of costs.
    */
    public function get_distance($i, $j) {
        return $this->dist[$i][$j];
    }

    /************************************************************
    ***                    DEBUG FUNCTIONS                    ***
    ***                    - print_graph                      ***
    ***                    - print_dist                       ***
    ***                    - print_pred                       ***
    *************************************************************/

    /**
    * Print out the original Graph matrice.
    * @return void
    */
    public function print_graph () {


        if ( empty($_SERVER['argv']) ) {
            echo '<strong>Graph</strong><br />';
            echo '<table border="1" cellpadding="4">';
            if (! empty($this->nodenames) ) {
                echo '<tr>';
                echo '<td>&nbsp;</td>';
                for ($n = 0; $n < $this->nodes; $n++) {
                    echo '<td width="15" align="center"><strong>' .
                         $this->nodenames[$n] .
                        '</strong></td>';
                }
            }
            echo '</tr>';
            for ($i = 0; $i < $this->nodes; $i++) {
                echo '<tr>';
                if (! empty($this->nodenames) ) {
                    echo '<td width="15" align="center"><strong>' .
                         $this->nodenames[$i] .
                        '</strong></td>';
                }
                for ($j = 0; $j < $this->nodes; $j++) {
                    echo '<td width="15" align="center">' .
                     $this->weights[$i][$j] . '</td>';
                }   
                echo '</tr>';
            }
            echo '</table><br />';

        } else {

        }
    }

    /**
    * Print out distances matrice.
    * @return void
    */
    public function print_dist () {

        if ( empty($_SERVER['argv']) ) {
            echo '<strong>Distances</strong><br />';
            echo '<table border="1" cellpadding="4">';
            if (! empty($this->nodenames) ) {
                echo '<tr>';
                echo '<td>&nbsp;</td>';
                for ($n = 0; $n < $this->nodes; $n++) {
                    echo '<td width="15" align="center"><strong>' .
                        $this->nodenames[$n] .
                        '</strong></td>';
                }
            }
            echo '</tr>';
            for ($i = 0; $i < $this->nodes; $i++) {
                echo '<tr>';
                if (! empty($this->nodenames) ) {
                    echo '<td width="15" align="center"><strong>' .
                         $this->nodenames[$i] .
                        '</strong></td>';
                }
                for ($j = 0; $j < $this->nodes; $j++) {
                    echo '<td width="15" align="center">' .
                         $this->dist[$i][$j] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table><br />';
        } else {
            echo "cmd line not yet completed!\n";
        }

    }

    /**
    * Print out predecessors matrice.
    * @return void
    */
    public function print_pred () {

        if ( empty($_SERVER['argv']) ) {
            echo '<strong>Predecessors</strong><br />';
            echo '<table border="1" cellpadding="4">';
            if (! empty($this->nodenames) ) {
                echo '<tr>';
                echo '<td>&nbsp;</td>';
                for ($n = 0; $n < $this->nodes; $n++) {
                    echo '<td width="15" align="center"><strong>' .
                         $this->nodenames[$n] .
                        '</strong></td>';
                }
            }
            echo '</tr>';
            for ($i = 0; $i < $this->nodes; $i++) {
                echo '<tr>';
                if (! empty($this->nodenames) ) {
                    echo '<td width="15" align="center"><strong>' .
                         $this->nodenames[$i] .
                        '</strong></td>';
                }
                for ($j = 0; $j < $this->nodes; $j++) {
                    echo '<td width="15" align="center">' .
                    $this->pred[$i][$j] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table><br />';
        } else {
            echo "cmd line not yet completed!\n";
        }

    }

} // End of class
?>

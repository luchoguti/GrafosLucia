<?php
 
class Graph{
 
    private $len = 0;
    private $graph = array();
    private $visited = array();
 
    public function __construct(){
<<<<<<< e742090003f18761b25ab9ce163e81978ef4635c
 
        $this->graph = array(
=======
 //Se crea el grafo aleatoreamente
        /*$this->graph = array(
>>>>>>> Nuevos algoritmo
                            array(0, 1, 1, 0, 0, 0),
                            array(1, 0, 0, 1, 0, 0),
                            array(1, 0, 0, 1, 1, 1),
                            array(0, 1, 1, 0, 1, 0),
                            array(0, 0, 1, 1, 0, 1),
                            array(0, 0, 1, 0, 1, 0)
<<<<<<< e742090003f18761b25ab9ce163e81978ef4635c
                        );
 
        $this->len = count($this->graph);
        $this->init();
    }
 
    function init(){
 
=======
                        );*/
        $this->graph = array(
                            array(0, 1, 1, 0),
                            array(1, 0, 0, 1),
                            array(1, 0, 0, 0),
                            array(0, 1, 0, 0)
                        );
 //Se realiza el conteo de las niveles del grafo
        $this->len = count($this->graph);
 //Se hace instancia del metodo int
        $this->init();
    }
 
    protected function init(){
 //Se hace el conteo de los niveles y en se metodo asigna al atributo visited en cada posicion de nivel asigna un 0.
 //0= No visitado y 1=Visitado
>>>>>>> Nuevos algoritmo
        for ($i = 0; $i < $this->len; $i++) {
            $this->visited[$i] = 0;
        }
    }
<<<<<<< e742090003f18761b25ab9ce163e81978ef4635c
 
    function depthFirst($vertex){
 
        $this->visited[$vertex] = 1;
 
        for ($i = 0; $i < $this->len; $i++) {
 
=======
 //En este metodo lo primero que se hace es la instancia al atributo visited en el nivel dado en el parametro y se le 
 //asigna un uno.
    public function depthFirst($vertex){
       /*echo "<pre>";
        print_r($this->graph);
        echo "Grafo------------------";
        echo "<pre>";
        print_r($this->visited);*/

        $this->visited[$vertex] = 1;
 //Se realiza el conteo haciendo instancia del atributo len que contiene el conteo de los niveles.
        for ($i = 0; $i < $this->len; $i++) {
 //se realiza la busqueda dentro de la instancia del atributo  graph y busca el nivel y luego se recorre cada nodo del nivel 
 // y se compara que el valor sea igual a uno, si este no es igual a uno se sigue recorriendo de los nivel.
 // Si es igual a uno se verifica la siguiente parte de la condicional, donde si la posicion del atributo es igual a 0 es verdadero
 // Si el y(&&) se cumple se llama a si mismo enviando como parametro el nivel visitado.
>>>>>>> Nuevos algoritmo
            if ($this->graph[$vertex][$i] == 1 && !$this->visited[$i]) {
                $this->depthFirst($i);
            }
        }
<<<<<<< e742090003f18761b25ab9ce163e81978ef4635c
        echo "$vertex <br>";
    }
}
 
=======
 //Imprime el orden de consulta de los niveles en forma de pila "Primero en entrar primero en salir" (Alias el First in first out "FIFO")
        echo "$vertex <br>";
    }
}
 //Instancia de la clase graph y accede al objeto principal depthFirst= desde que nivel se quiere que empiece la busqueda parametro
>>>>>>> Nuevos algoritmo
$g = new Graph();
$g->depthFirst(2);
 
?>
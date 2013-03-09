<?php

$a = glob('*.php',GLOB_BRACE);
$palabra="//todo";

foreach($a as $aactual){
    if($aactual!="test.php"){
        $lineas = file($aactual);

        $pos = 0;
        $pos2 = 0;
        // Podemos mostrar / trabajar con todas las líneas:

        echo "------------------------------<br/>Tareas en ".$aactual."<br/>";
        foreach($lineas as $linea){
            if (strstr($linea,$palabra)){
                $lineam = str_replace("//todo: ", "", $linea);
                $posT=$pos+1;
                echo "- ".ucfirst($lineam)." [Linea: ".$posT."]<br/><br/>";
                $pos2++;
            }
            $pos++;
        }
    }
}

echo "<br/><br/>Total de tareas: ".$pos2;
?>
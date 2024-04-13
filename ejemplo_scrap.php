<?php
    $url = "https://example.com"; //cambiar a la url de la pagina que quieres scrapear
    $html = file_get_contents($url);
    
    $doc = new DOMDocument;  
    libxml_use_internal_errors(true);
    $doc->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXpath($doc);    
    $queryExample = "*//span[@class='field-content']//h2"; //(Esto es un ejemplo, ya que va a depender de la pagina que quieres scrapear)
    $items = $xpath->query($queryExample); 

    $indice = 1;
    echo "Titulo de la lista de datos obtenidos de la pagina: \n";
    foreach($items as $item){         
        
        $nodes = $item->childNodes;
        foreach ($nodes as $node) { 
            echo $indice.") ".$node->nodeValue. "\n";
            $indice=$indice + 1;
        }
    }


?>
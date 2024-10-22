<?php 
    // On inclut la librairie simple_html_dom
    include("simple_html_dom.php");
    // On récupère l'url du film
    $url = $_POST['url'];
    $title = strtolower($url);
    // On récupère le contenu de la page
    $html = file_get_html($url);
    // On récupère l'url de la vidéo
    foreach($html->find('iframe[class=aspect-video !w-full !h-auto rounded-lg]') as $video) {
            $src = $video->src;
            $html2 = file_get_html($src);
            foreach($html2->find('source') as $source) {
                $src = $source->src;
                // On retourne l'url de la vidéo
                echo $src;
            }
    }
?>
<?php 
    include("simple_html_dom.php");
    $url = $_POST['url'];
    $title = strtolower($url);
    $html = file_get_html($url);
    foreach($html->find('source') as $video) {
            $src = $video->src;
            echo "$src";
    }
?>
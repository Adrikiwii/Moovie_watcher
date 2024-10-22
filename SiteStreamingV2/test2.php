<?php
    $film_rechercher = $_POST['search'];
    $json_file = file_get_contents('result.json');
    $data = json_decode($json_file);
    
    $liste_films = "<header>\n<h1>Streaming</h1>\n<div class='search'>\n<input type='text' id='search' value='' placeholder='Rechercher un film'>\n<button class='BT_search' onclick=recherche()>Rechercher</button>\n</div>\n<button class='Refresh_Moovie' onclick=refresh()>actualiser la liste de film</button>\n</header>\n";
    $recherche = "<div class='res_recherche'><button class='annuler' onClick=window.location.reload();>X</button><h2>Recherche : $film_rechercher</h2></div><div class='liste_films'>\n";
    $liste_films .= $recherche;
    foreach ($data as $elmennt) {
        if (str_contains($elmennt->title, str_replace(" ","-",$film_rechercher))) {
            $html = $element = "<a href='".$elmennt->src."'><div class='col-lg-2'><img src='".$elmennt->img."'/></div></a>";
            $liste_films .= $html."\n";
        }
    }
    $liste_films .= "</div>\n";
    echo $liste_films."\n";
?>
<?php
    // On inclut la librairie simple_html_dom
    include("simple_html_dom.php");

    $liste_url = ['https://top-stream.tv/sitemap_post_2.xml','https://top-stream.tv/sitemap_post_1.xml'];
    $json_file = file_get_contents('result.json');
    $data = json_decode($json_file);
    $Moovie_Existe = false;
    foreach ($liste_url as $url) {
        $html = file_get_html($url);
        foreach($html->find('loc') as $film) {
            $href_a = $film->plaintext;
            $title = str_replace("https://top-stream.tv/movie/","",$href_a);
            if (str_contains($href_a, 'movie')) {
                foreach ($data as $elmennt) {
                    if ($elmennt->title == $title) {
                        $Moovie_Existe = true;
                        break;
                    }else{
                        $Moovie_Existe = false;
                    }
                }
                if ($Moovie_Existe == false) {
                    $html2 = file_get_html($href_a);
                    foreach($html2->find('iframe[class=aspect-video !w-full !h-auto rounded-lg]') as $src) {
                        $html3 = file_get_html($src->src);
                        foreach($html3->find('source') as $source) {
                            $src = $source->src;
                        }
                    }
                    foreach($html2->find('img[class=absolute  h-full w-full object-cover]') as $img) {
                        $img = $img->src;
                    }
                    $data[] = array(
                        "title" => $title,
                        "img" => $img,
                        "src" => $src
                    );   
                }
            }
        }
    }
    $json_data = json_encode($data);
    $liste_films = "<header>\n<h1>Streaming</h1>\n<div class='search'>\n<input type='text' id='search' value='' placeholder='Rechercher un film'>\n<button class='BT_search' onclick=recherche()>Rechercher</button>\n</div>\n<button class='Refresh_Moovie' onclick=refresh()>actualiser la liste de film</button>\n</header>\n<div class='liste_films'>\n";
    foreach ($data as $elmennt) {
        $html = $element = "<a href='".$elmennt->src."'><div class='col-lg-2'><img src='".$elmennt->img."'/></div></a>";
        $liste_films .= $html."\n";
    }
    $liste_films .= "</div>\n";
    echo $liste_films."\n";
    file_put_contents('result.json', $json_data);
?>
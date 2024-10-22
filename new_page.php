
    <?php
    // On inclut la librairie simple_html_dom
    include("simple_html_dom.php");
    // On récupère l'url de la page
    $url = $_POST['url'];
    // On récupère le numéro de la page
    $page = $_POST['page'];
    // On récupère le contenu de la page
    $html = file_get_html($url);
    $liste_films = "<div class='liste_films'>\n";
    // On récupère les films
    foreach($html->find('div[class=relative group overflow-hidden]') as $film) {
        $href_a = $film->find('a')[0]->href;
        $titre = $film->find('img')[0]->alt;
        $img_href = $film->find('img')[0]->{'data-src'};
        $element = "<a onclick=save('".$href_a."')><div class='col-lg-2'><img src='".$img_href."'/></div></a>";
        $liste_films .=  $element."\n";
    }
    $liste_films .= "</div>\n<div class='nav'>\n<button  class='prevPage' onclick=new_page(0)>Previous</button>\n<button class='nextPage' onclick=new_page(1)>Next</button>\n</div>\n<p id='page' hidden>$page</p>\n";
    echo $liste_films."\n";
    ?>

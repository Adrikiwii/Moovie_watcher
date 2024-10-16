
    <?php
    include("simple_html_dom.php");
    $url = $_POST['url'];
    $html = file_get_html($url);
    $liste_films = "<div class='liste_films'>\n";
    foreach($html->find('div[class=col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6]') as $film) {
        $new_a = str_replace('href="'.$film->find('a')['0']->href.'"', 'onclick=save("'.$film->find('a')['0']->href.'")', $film);
        $liste_films .= $new_a."\n";
    }
    $liste_films .= "</div>\n";
    $nav = $html->find('div[class=col-xs-12]')[0];
    foreach($nav->find('a') as $a) {
        $new_a = str_replace('href="'.$a->href.'"', 'onclick=new_page("'.$a->href.'")', $nav);
        $nav = $new_a;
    }
    echo $liste_films."\n".$nav;
    ?>

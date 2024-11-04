<?php
    // On inclut la librairie simple_html_dom
    include("simple_html_dom.php");

    $liste_url = ['https://top-stream.tv/sitemap_post_2.xml','https://top-stream.tv/sitemap_post_1.xml'];
    $servername = 'sql112.infinityfree.com';
    $username = 'if0_37526750';
    $password = '';

    try {
        $BDD = new PDO("mysql:host=$servername;dbname=if0_37526750_db_moovie", $username, $password);
        $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    foreach ($liste_url as $url) {
        $html = file_get_html($url);
        foreach($html->find('loc') as $film) {
            $href_a = $film->plaintext;
            $title = str_replace("https://top-stream.tv/movie/","",$href_a);
            if (str_contains($href_a, 'movie')){
                $sql = "SELECT moovieName FROM moovie WHERE moovieName = '".$title."'";
                $req = $BDD->query($sql);
                $rep = $req->fetch();
                if ($rep['moovieName'] == $title) {
                    continue;
                }
                else{
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
                    $sql = "INSERT INTO moovie (moovieName, moovieSrc, moovieImg) VALUES ('".$title."', '".$src."', '".$img."')";
                    $BDD->exec($sql);
                }
            }
                
        }
    }
    $liste_films = "<header>\n<div class='logo'></div>\n<div class='search'>\n<input type='text' id='search' value='' placeholder='Rechercher un film'>\n<button class='BT_search' onclick=recherche()>Rechercher</button>\n</div>\n<button class='Refresh_Moovie' onclick=refresh()>actualiser la liste de film</button>\n</header>\n<div class='liste_films'>\n";
    $sql = "SELECT * FROM moovie";
    $req = $BDD->query($sql);
    while($row = $req->fetch()) {
        $element = "<a href='".$row['moovieSrc']."'><div class='col-lg-2'><img src='".$row['moovieImg']."'/></div></a>";
        $liste_films .= $element."\n";
    }
    $liste_films .= "</div>\n<footer><a>create by adrikiwii</a></footer>";
    echo $liste_films."\n";
?>
<?php
    $servername = 'sql112.infinityfree.com';
    $username = 'if0_37526750';
    $password = 'Adri65ktm';
    try {
        $BDD = new PDO("mysql:host=$servername;dbname=if0_37526750_db_moovie", $username, $password);
        $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $film_rechercher = $_POST['search'];
    $film_rechercher = strtolower(str_replace(" ","-", $film_rechercher));
    $liste_films = "<header>\n<div class='header_main'>\n<div class='logo'></div>\n<div class='search' onclick=search()></div>\n<button class='Refresh_Moovie' onclick=refresh()><div class='img_refresh'></button>\n</div>\n";
    $recherche = "<div class='res_recherche'><button class='annuler' onClick=window.location.reload();>X</button><a style='margin-left: 5%;'>Recherche :". $_POST['search']."</a></div>\n</header>\n<div class='popup_blur' id='popup_blur' onclick=close_search()></div><div class='popup_search' id='popup_search'><div class='bt_search' onclick=recherche()></div><input class='input_search' id='input_search' type='text' placeholder='Search...'></div><div class='liste_films'>\n";
    $liste_films .= $recherche;
    $sql = 'SELECT * FROM moovie WHERE moovieName LIKE "%'.$film_rechercher.'%"';
    $req = $BDD->query($sql);
    while($row = $req->fetch()) {
        $html = "<a href='".$row['moovieSrc']."'><div class='col-lg-2'><img src='".$row['moovieImg']."'/></div></a>";
        $liste_films .= $html."\n";
    }
    $liste_films .= "</div>\n<footer><a>create by adrikiwii</a></footer>";
    echo $liste_films."\n";
?>

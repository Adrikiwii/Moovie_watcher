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
    $liste_films = "<header>\n<div class='logo'></div>\n<div class='search'>\n<input type='text' id='search' value='' placeholder='Rechercher un film'>\n<button class='BT_search' onclick=recherche()>Rechercher</button>\n</div>\n<button class='Refresh_Moovie' onclick=refresh()>actualiser la liste de film</button>\n</header>\n";
    $recherche = "<div class='res_recherche'><button class='annuler' onClick=window.location.reload();>X</button><h2>Recherche :". $_POST['search']."</h2></div><div class='liste_films'>\n";
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

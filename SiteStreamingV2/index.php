<!DOCTYPE html>
<html>
    <head>
        <title>Streaming</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <style>
            body {
                background:
      conic-gradient(from 0deg at calc(500%/6) calc(100%/3),#9c9797 0 120deg,#0000 0),
      conic-gradient(from -120deg at calc(100%/6) calc(100%/3),#696464 0 120deg,#0000 0),
      conic-gradient(from 120deg at calc(100%/3) calc(500%/6),#353232 0 120deg,#0000 0),
      conic-gradient(from 120deg at calc(200%/3) calc(500%/6),#353232 0 120deg,#0000 0),
      conic-gradient(from -180deg at calc(100%/3) 50%,#696464  60deg,#353232 0 120deg,#0000 0),
      conic-gradient(from 60deg at calc(200%/3) 50%,#353232  60deg,#9c9797 0 120deg,#0000 0),
      conic-gradient(from -60deg at 50% calc(100%/3),#353232 120deg,#696464 0 240deg,#9c9797 0);
background-size: 111px 64px;

            }
            header {
                opacity: 0.9;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                background-color: #333;
                color: white;
                border-radius: 25px;
            }
            header h1 {
                font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                margin: 0;
            }
            header input {
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }
            header button {
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
                background-color: #333;
                color: white;
            }
            .res_recherche {
                opacity: 0.9;
                display: flex;
                align-items: center;
                flex-direction: row;
                background-color: #333;
                justify-content: center;
                border-bottom-right-radius: 25px;
                border-bottom-left-radius: 25px;
                width: 50%;
                position: relative;
                margin: auto;
                color: white;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .res_recherche h2 {
                margin: 10px;
            }
            .liste_films {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .liste_films a {
                text-decoration: none;
                color: black;
            }
            .liste_films a:hover {
                background-color: #ccc;
                border-radius: 25px;
                cursor: pointer;
            }
            .col-lg-2 {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 10px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fffff8;
            }
            .col-lg-2 img {
                width: 300px;
                height: 450px;
            }
            .nav{
                display: flex;
                justify-content: center;
                margin: 10px;
            }
            .nav button {
                margin: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                line-height: 1;
                text-decoration: none;
                color: #333333;
                font-size: 18px;
                border-radius: 0px;
                width: 200px;
                height: 40px;
                font-weight: bold;
                border: 2px solid #333333;
                transition: 0.3s;
                box-shadow: 5px 5px 0px 0px rgba(51, 51, 51, 1);
                background-color: #ffffff;
            }
            .nav button:hover {
                box-shadow: 0 0 #333;
                color: #fff;
                background-color: #333;
            }
        </style>
        <script type="text/javascript">
        function refresh(){
            $.ajax({
                url : "actu_film.php", 
                type: 'POST', 
                success: function (data) {   
                    document.body.innerHTML = data;
                    alert('La liste des films a été actualisée');
                }
            });
        }
        function recherche(){
            var search = document.getElementById('search').value;
            $.ajax({
                url : "test2.php", 
                data: {  
                    search : search  
                },
                type: 'POST', 
                success: function (data) {   
                    document.body.innerHTML = data;
                }
            });
        }
    </script>
    </head>
    <body>
    <header>
        <h1>Streaming</h1>
        <div class="search">
            <input type="text" id="search" value='' placeholder="Rechercher un film">
            <button class="BT_search" onclick=recherche()>Rechercher</button>
        </div>
        <button class="Refresh_Moovie" onclick=refresh()>actualiser la liste de film</button>
    </header>
    <?php
    $json_file = file_get_contents('result.json');
    $data = json_decode($json_file);
    // Récupération des éléments de la page
    $liste_films = "<div class='liste_films'>\n";
    // Récupération des films
    foreach ($data as $elmennt) {
        $html = $element = "<a href='".$elmennt->src."'><div class='col-lg-2'><img src='".$elmennt->img."'/></div></a>";
        $liste_films .= $html."\n";
    }
    $liste_films .= "</div>\n";
    // Affichage de la liste des films
    echo $liste_films."\n";//.$nav;
    ?>
</body>
</html>

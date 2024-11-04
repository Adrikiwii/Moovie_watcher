<!DOCTYPE html>
<html>
    <head>
        <title>Streaming</title>
        <link rel="icon" href="image/icon.png"type="image/x-icon" />
        <link rel="apple-touch-icon" href="image/icon.png">
        <link rel="apple-touch-icon" href="image/icon.png">
        <link rel="apple-touch-icon" sizes="152x152" href="image/icon.png">
        <link rel="apple-touch-icon" sizes="180x180" href="image/icon.png">
        <link rel="apple-touch-icon" sizes="167x167" href="image/icon.png">
        <meta name="apple-mobile-web-app-title" content="FreeStreaming">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Regardez des films et séries en streaming gratuitement sur FreeStreaming. Profitez d'un large choix de contenus sans inscription. Streaming HD, films gratuits, séries en ligne." />
        <meta name="keywords" content="streaming gratuit, films en streaming, séries en streaming, films HD gratuits, regarder films en ligne, séries TV en ligne, FreeStreaming" />
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
            header
            {
                display:flex;
                justify-content:center;
                align-items:center;
                flex-direction: column;
                width:98%;
                position:fixed;
                top:0;
            }
            .header_main {
                opacity: 0.9;
                width:98%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                background-color: #333;
                color: white;
                border-radius: 25px;
            }
           .logo {
                margin:0;
                width: 250px;
                height: 45px;
                background: url('image/logo.png') no-repeat center center;
                background-size:cover;
            }
            header button {
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
                background-color: #333;
                color: white;
                cursor: pointer;
            }
            .search {
                width: 50px;
                height: 50px;
                background: url('https://img.icons8.com/?size=100&id=7695&format=png&color=FFFFFF');
                background-position: center;
                background-size: cover;
                cursor: pointer;
            }
            .search:hover{
                width: 50px;
                height: 50px;
                background: url('https://img.icons8.com/?size=100&id=7695&format=png&color=868686');
                background-position: center;
                background-size: cover;
            }
            .popup_blur {
                display: none;
                position: fixed;
                backdrop-filter: blur(5px);
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            .popup_search {
                width: 90%;
                display: none;
                position: fixed;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start;
                background-color: white;
                left: 50%;
                top: 15%;
                transform: translate(-50%, -50%);
                padding: 20px;
                z-index: 1000;
                border-radius: 50px;
            }
            .bt_search
            {
                width: 50px;
                height: 50px;
                background: url('https://img.icons8.com/?size=100&id=7695&format=png&color=3D3D3D');
                background-position: center;
                background-size: cover;
                cursor: pointer;
            }
            .bt_search:hover
            {
                background: url('https://img.icons8.com/?size=100&id=7695&format=png&color=000000');
                background-position: center;
                background-size: cover;
            }
            .input_search {
                width: 100%;
                background-color: transparent;
                border-style: none;
                border: transparent;
                font-size:20px;
                font-family: "Asap", sans-serif;
            }
            .input_search:focus {
                outline: none;
            }
            .Refresh_Moovie{
                display:flex;
                align-items:center;
                width:50px;
                height:50px;
                border-radius:100%;
            }
            .img_refresh
            {
                width:100%;
                height:100%;
                background: url('https://img.icons8.com/?size=100&id=59872&format=png&color=FFFFFF');
                background-size: cover;
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
                color: white;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .res_recherche a {
                margin: 10px;
            }
            .annuler{
                border-radius: 100%;
            }
            .liste_films {
                padding-top:8%;
                padding-bottom:3%;
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
            footer {
                opacity: 0.9;
                width:99%;
                border-radius:25px;
                display: flex;
                background-color: #333;
                color: white;
                height: 50px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                position: fixed;
                bottom: 0;
                justify-content: center;
                align-items: center;
            }

            @media (max-width: 480px) {
                .header_main {
                    width:90%;
                }
                .liste_films {
                    margin-top: 25%;
                }
                .Refresh_Moovie{
                    width:45px;
                    height:45px;
                }
                .img_refresh
                {
                    width:30px;
                    height:30px;
                    background: url('https://img.icons8.com/?size=100&id=59872&format=png&color=FFFFFF');
                    background-size: cover;
                }
                .bt_search
                {
                    width:25px;
                    height:25px;
                }
                .input_search
                {
                    font-size:10px;
                }
                .col-lg-2 img {
                width: 150px;
                height: 225px;
                }
            }
        </style>
        <script type="text/javascript">
        function search() {
            document.getElementById('popup_blur').style.display = 'block';
            document.getElementById('popup_search').style.display = 'flex';
            const recherche = document.getElementById('input_search');
            recherche.addEventListener('keypress', (event) => {
                if (event.key === 'Enter') {
                    recherche();
                }
            });
        }
        function close_search() {
            document.getElementById('popup_blur').style.display = 'none';
            document.getElementById('popup_search').style.display = 'none';
        }
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
            var search = document.getElementById('input_search').value;
            document.getElementById('input_search').value = '';
            close_search();
            $.ajax({
                url : "rechercher.php", 
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
        <div class="header_main">
            <div class="logo"></div>
            <div class="search" onclick=search()></div>
            <button class="Refresh_Moovie" onclick=refresh()><div class='img_refresh'></div></button>
        </div>
    </header>
    <div class="popup_blur" id="popup_blur" onclick=close_search()></div>
        <div class="popup_search" id="popup_search">
            <div class="bt_search" onclick=recherche()></div>
            <input class="input_search" id="input_search" type="text" placeholder="Search...">
    </div>
    <?php
    $servername = 'sql112.infinityfree.com';
    $username = 'if0_37526750';
    $password = '';

    try {
        $BDD = new PDO("mysql:host=$servername;dbname=if0_37526750_db_moovie", $username, $password);
        $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    // Récupération des éléments de la page
    $liste_films = "<div class='liste_films'>\n";
    $sql = "SELECT * FROM moovie";
    $req = $BDD->query($sql);
    // Récupération des films
    while($row = $req->fetch()) {
        $element = "<a href='".$row['moovieSrc']."'><div class='col-lg-2'><img src='".$row['moovieImg']."'/></div></a>";
        $liste_films .= $element."\n";
    }
    $liste_films .= "</div>\n";
    // Affichage de la liste des films
    echo $liste_films."\n";
    ?>
<footer>
    <a>create by adrikiwii</a>
</footer>
</body>
</html>

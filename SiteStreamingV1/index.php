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
        // Fonction pour récupérer l'url du film
        function save(get_url){
            console.log(get_url);
            $.ajax({
                url : "moovie.php", 
                data: {  
                    url : get_url  
                },
                type: 'POST', 
                success: function (data) {   
                    window.open(data);
                }
            });
        }
        // Fonction pour naviguer entre les pages
        function new_page(previous_or_next){
            var page = parseInt(document.getElementById('page').innerHTML);
            if(previous_or_next == 1){
                    page += 1;
                }else{
                    if(page > 1){
                        page -= 1;
                    }
                }
            $.ajax({
                url : "new_page.php", 
                data: {  
                    url : "https://top-stream.tv/movies?type=movie&page="+page,
                    page: page
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
    <?php
    // Appel de la librairie
    include("simple_html_dom.php");
    // Récupération du contenu de la page
    $html = file_get_html('https://top-stream.tv/movies?pages=1');
    // Récupération des éléments de la page
    $liste_films = "<div class='liste_films'>\n";
    // Récupération des films
    foreach($html->find('div[class=relative group overflow-hidden]') as $film) {
        $href_a = $film->find('a')[0]->href;
        $titre = $film->find('img')[0]->alt;
        $img_href = $film->find('img')[0]->{'data-src'};
        $element = "<a onclick=save('".$href_a."')><div class='col-lg-2'><img src='".$img_href."'/></div></a>";
        $liste_films .=  $element."\n";
    }
    $liste_films .= "</div>\n";
    // Affichage de la liste des films
    echo $liste_films."\n";//.$nav;
    ?>
    <!-- Naviguation entre les page -->
    <div class='nav'>
        <button  class="prevPage" onclick=new_page(0)>Previous</button>
        <button class="nextPage" onclick=new_page(1)>Next</button>
    </div>
    <!-- Num page -->
    <p id='page' hidden>1</p>
</body>
</html>

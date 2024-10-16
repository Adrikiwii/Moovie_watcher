<!DOCTYPE html>
<html>
    <head>
        <title>Streaming</title>
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/megamenu.css">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/ionicons.css">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/color-style/style-three.css" id="theme">
        <link rel="stylesheet" href="https://xalaflix.eu/site_assets/css/responsive.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <style>
            .liste_films {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .col-lg-2 {
                margin: 10px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fffff8;
            }
            .col-lg-2 img {
                width: 100%;
                height: auto;
            }
        </style>
        <script type="text/javascript">
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
        function new_page(get_url){
            $.ajax({
                url : "new_page.php", 
                data: {  
                    url : get_url  
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
    include("simple_html_dom.php");
    $html = file_get_html('https://xalaflix.eu/movies?page=1');
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
</body>
</html>

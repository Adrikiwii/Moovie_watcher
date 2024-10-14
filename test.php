<!DOCTYPE html>
<html>
    <head>
        <title>Test PHP</title>
    </head>
    <body>
    <?php
    include("simple_html_dom.php");
    $html = file_get_html('https://xalaflix.eu/movies?page=1');
    foreach($html->find('div[class=col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6]') as $film) {
        foreach($film->find('a') as $link) {
            $url = $link->href;
            $title = strtolower($link->title);
            $html2 = file_get_html($url);
            foreach($html2->find('source[id=video-source]') as $video) {
                echo "<p>$video->src // $title</p>";
            }
        }
    }
    ?>
</body>
</html>

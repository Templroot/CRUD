<?php
$homepage = file_get_contents('Menu.html');
echo $homepage;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Карта</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Frame/M_css_for_map.css" />
    <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css" />
</head>

<body>
    <header></header>

    </header>
    <div class="cards">

        <div class="col-xs-12 col-sm-12	col-md-12 col-lg-8 col-xl-12">
            <div id="map"></div>
        </div>
        <div class="col-xs-12 col-sm-12	col-md-12 col-lg-12 col-xl-12">
            <div id="infobox">
                <iframe id="info" name="info"  frameborder="no" src="M_default.html" hspase="5">
				</iframe>
            </div>
        </div>
    </div>
    <script src="https://maps.api.2gis.ru/2.0/loader.js"></script>
    <script type="text/javascript" src="M_js_for_map.js"></script>
</body>
<footer>
</footer>
</html>
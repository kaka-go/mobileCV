<!DOCTYPE HTML>
<html>
<head>
	<title>App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/themes/jquery.mobile-1.3.1.min.css"/>
<!--	<link rel="stylesheet" href="css/app.css"/> -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.mobile-1.3.1.min.js"></script>
</head>

<body>

<?php
include "data.php";

if(isset($_GET["name"]) && array_key_exists($_GET["name"], $applist)){
    $name = $_GET["name"];
    $app = $applist[$name];
}
else{
    $url = "applist.php?=".$lang_str;
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
    exit;
}
?>

<div data-role="page">
  <div data-role="header" class="header_bar"> 
    <?php 
    echo "<a href='index.php?lang=$lang_str' data-icon='bars' class='ui-btn-left'>";
    echo $cv[$lang]; 
    echo "</a>"; 
    echo "<a href='applist.php?lang=$lang_str' data-icon='bars' class='ui-btn-right'>";
    echo $myapps[$lang]; 
    echo "</a>"; 
    ?>
    <h1><?=$applist[$name]["name"]?></h1>
  </div>
  <!-- /header -->
  <div data-role="content">

    <div class="ui-grid-a" id="title">
    <?php
    echo "<div class='ui-block-a' style='width:25%; text-align:center;' ><img src='".$app['icon']."'/></div>";
    echo "<div class='ui-block-b' style='width:75%; text-align:center;' ><h3>".$app['name']."</h3><p>".$app['desc']."</p></div>";
    ?>
    </div>

<?php
    echo "<a href='".$app['download']."' data-role='button'>";
    echo "$download[$lang] (".$app['size'].")";
    echo "</a>\n";

    echo "<div style='text-align: center;' >";
    foreach($app['snap'] as $i=>$snap){
    	echo "<a href='#popSnap$i' data-rel='popup' data-position-to='window' data-transition='fade'>";
        echo "<img src='$snap' style='max-width:75%; margin: 2px;' />";
	echo "</a>";
	echo "<div data-role='popup' id='popSnap$i' data-overlay-theme='a' data-corners='false'>";
	echo "<a href='#' data-rel='back' data-role='button' data-theme='a' data-icon='delete' data-iconpos='notext' class='ui-btn-left'></a>";
	echo "<img src='$snap' />"; 
	echo "</div>";
    }
    
    echo "</div>";
?>
  </div>
  <!-- /content -->

  <div data-role="navbar" data-position="fixed">
	<ul>		
	<?php 
	echo "<li><a href='?lang=CN&name=$name'><img src='img/chinese.png'/></a></li>";
	echo "<li><a href='?lang=EN&name=$name'><img src='img/english.png'/></a></li>";
	?>
	</ul>
  </div>
</div>

</body>
</html>

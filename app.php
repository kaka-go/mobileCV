<!DOCTYPE HTML>
<html>
<head>
	<title>App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/themes/jquery.mobile-1.3.1.min.css"/>
	<link rel="stylesheet" href="css/app.css"/>
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
    echo "<a href='applist.php?lang=$lang_str' data-icon='bars' class='ui-btn-left'>";
    echo $title[$lang]; 
    echo "</a>"; 
    
    echo "<a href='index.php?lang=$lang_str' data-icon='bars' class='ui-btn-right'>";
    echo $cv[$lang]; 
    echo "</a>"; 
    ?>
    <h1><?=$applist[$name]["name"]?></h1>
  </div>
  <!-- /header -->
  <div data-role="content">
<ul data-role="listview" data-inset="true">
<?php
	echo "<li><a href='".$app['url']."'>";
	echo "<img src='".$app['src']."' >";
	echo "<h2>".$app['name']."</h2>";
	echo "<p>".$app['desc']."</p>";
	echo "<p>".$app['size']."</p>";
	echo "</a></li>\n";
?>
</ul>
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

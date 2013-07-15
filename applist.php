<!DOCTYPE HTML>
<html>
<head>
	<title>My Apps</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/themes/jquery.mobile-1.3.1.min.css"/>
	<link rel="stylesheet" href="css/applist.css"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.mobile-1.3.1.min.js"></script>
</head>

<body>

<?php
include "data.php";
?>

<div data-role="page">
  <div data-role="header" class="header_bar"> 
    <?php 
    echo "<a href='index.php?lang=$lang_str' data-icon='bars' class='ui-btn-left'>";
    echo $cv[$lang]; 
    echo "</a>"; ?>
    <h1><?=$myapps[$lang]?></h1>
  </div>
  <!-- /header -->
  <div data-role="content">
<ul data-role="listview" data-inset="true">
<?php
foreach ($applist as $i=>$app){
	echo "<li><a href='".$app['url']."'>";
	echo "<img src='".$app['icon']."' class='appicon' style='margin-top:8px; margin-left:8px;' />";
	echo "<h2>".$app['name']."</h2>";
	echo "<p>".$app['desc']."</p>";
	echo "<p>".$app['size']."</p>";
	echo "</a></li>\n";
}
?>
</ul>
  </div>
  <!-- /content -->
  <div data-role="navbar" data-position="fixed">
	<ul>		
		<li><a href="?lang=CN"><img src="img/chinese.png"/></a></li>
		<li><a href="?lang=EN"><img src="img/english.png"/></a></li>
	</ul>
  </div>
</div>

</body>
</html>

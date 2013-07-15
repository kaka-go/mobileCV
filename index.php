<!DOCTYPE HTML>
<html>

<?php
include "data.php";
?>

<head>
	<title>WU KEJIA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/themes/jquery.mobile-1.3.1.min.css"/>
	<link rel="stylesheet" href="css/cv.css"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.mobile-1.3.1.min.js"></script>
</head>

<body>

<div data-role="page" id="englishpage"> 
  <div data-role="header" class="header_bar"> 
    <h1><?=$wkj[$lang]?></h1>
    <?php
    echo "<a href='applist.php?lang=".$lang_str."' data-icon='bars' class='ui-btn-right'>$myapps[$lang]</a>";
    ?>
  </div>
  <!-- /header -->
  <div data-role="content">
	
		<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$education[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2009.9 — 2013.6 </li>
				<li>
					<h3><?=$beihang[$lang]?></h3>
					<p><?=$cst[$lang]?></p>
					<p><strong><?=$bachelor[$lang]?></strong></p>
				</a>
				</li>
				<li data-role="list-divider"> 2012.12 — 2013.4 </li>
				<li>
					<h3><?=$tsukuba[$lang]?></h3>
					<p><?=$is[$lang]?></p>
					<p><strong><?=$exchange[$lang]?></strong></p>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$intership[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.7 – 2012.10 </li>
				<li><a href="#popMS" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$msra[$lang]?></h3>
					<p><strong><?=$sdet[$lang]?></strong></p>
				</a>
				<div data-role="popup" id="popMS" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$bingiton[$lang]?>
				<img src="img/bingiton.jpg" />
				<a href="http://www.bingiton.com" data-role="button" target="_blank"><?=$visit_bingiton[$lang]?></a>
				</div>
				</li>

				<li data-role="list-divider"> 2011.4 – 2012.3 </li>
				<li><a href="#popApps" data-rel="popup" data-transition="pop" data-inline="true">  <!-- TODO -->
					<h3><?=$kungang[$lang]?></h3>
					<p><strong><?=$android_dev[$lang]?></strong></p>
				</a>

				<div data-role="popup" id="popApps" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$dev_apps[$lang]?>

	<?php
	$kungang_apps = array("OAB","BS","IJ","TB","MS","AB");
	foreach($kungang_apps as $i=>$app){
	echo "<div class='ui-grid-a'>";
	echo "<div class='ui-block-a'><img src='".$applist[$app]["icon"]."'/></div>";
	echo "<div class='ui-block-b'><a href='".$applist[$app]["url"]."' data-role='button'>".$applist[$app]["name"]."</a></div>";
	echo "</div>\n";
	}

	echo "<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
	echo $view_apps[$lang]."</a>";
	?>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$project[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2011.12 – 2012.11 </li>
				<li><a href="#popPaper" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$ubsoa[$lang]?></h2>
					<p><?=$publish[$lang]?></p>
				</a>

				<div data-role="popup" id="popPaper" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$paper_info[$lang]?>
<a href="http://ieeexplore.ieee.org/stamp/stamp.jsp?tp=&arnumber=6223488" data-role="button" target="_blank"><?=$view_paper[$lang]?></a>
				</div>
				</li>

				<li data-role="list-divider"> 2012.6 – 2012.7 </li>
				<li><a href="#popRSS" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$applist["NR"]["name"]?></h3>
					<p><?=$applist["NR"]["desc"]?></p>
				</a>

				<div data-role="popup" id="popRSS" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$rss_info[$lang]?>

	<?php
	echo "<div class='ui-grid-a'>";
	echo "<div class='ui-block-a'><img src='".$applist["NR"]["icon"]."'/></div>";
	echo "<div class='ui-block-b'><a href='".$applist["NR"]["url"]."' data-role='button'>".$applist["NR"]["name"]."</a></div>";
	echo "</div>\n";

	echo "<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
	echo $view_apps[$lang]."</a>";
	?>
				</div>
				</li>

				<li data-role="list-divider"> 2011.11 – 2012.4 </li>
				<li><a href="#popKinect" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$gesture[$lang]?></h3>
					<p><?=$kinect[$lang]?></p>
				</a>

				<div data-role="popup" id="popKinect" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$gesture_info[$lang]?>
				<img src="img/kinect.jpg" />
				</div>
				</li>

				<li data-role="list-divider"> 2012.4 – 2012.5 </li>
				<li><a href="#popMetro" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$metro[$lang]?></h3>
					<p><?=$win8_metro[$lang]?></p>
				</a>

				<div data-role="popup" id="popMetro" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$metro_info[$lang]?>
				<img src="img/metro_workbook.jpg" />
				</div>
				</li>

				<li data-role="list-divider"> 2011.8 – 2012.3 </li>
				<li><a href="#popSubway" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$applist["BSI"]["name"]?></h3>
					<p><?=$subway_desc[$lang]?></p>
				</a>

				<div data-role="popup" id="popSubway" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$subway_info[$lang]?>

		<?php
echo "<div class='ui-grid-a'>";
echo     "<div class='ui-block-a'><img src='".$applist["BSI"]["icon"]."' /></div>";
echo     "<div class='ui-block-b'><a href='".$applist["BSI"]["url"]."' data-role='button'>".$applist["BSI"]["name"]."</a></div>";
echo	"</div>";

echo	"<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
echo    $view_apps[$lang]."</a>";
		?>
				</div>
				</li>

				<li data-role="list-divider"> 2010.9 – 2010.10 </li>
				<li><a href="#popBullet" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$applist["BE"]["name"]?></h3>
					<p><?=$applist["BE"]["desc"]?></p>
				</a>

				<div data-role="popup" id="popBullet" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$bullet_info[$lang]?>

		<?php
echo "<div class='ui-grid-a'>";
echo     "<div class='ui-block-a'><img src='".$applist["BE"]["icon"]."' /></div>";
echo     "<div class='ui-block-b'><a href='".$applist["BE"]["url"]."' data-role='button'>".$applist["BE"]["name"]."</a></div>";
echo	"</div>";

echo	"<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
echo    $view_apps[$lang]."</a>";
		?>
				</div>
				</li>

				<li data-role="list-divider"> 2010.9 – 2010.12 </li>
				<li><a href="#popMagazine" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$hacker[$lang]?></h3>
					<p><?=$translation[$lang]?></p>
				</a>

				<div data-role="popup" id="popMagazine" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$hacker_info[$lang]?>
				<img src="img/hacker_monthly.jpg" />
				<a href="http://.pdf" data-role="button" target="_blank"><?=$view_hacker[$lang]?></a>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$awards[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.12 </li>
				<li><a href="#popBeetle" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$google_android[$lang]?></h3>
					<p><strong><?=$n3p[$lang]?></strong></p>
					<p><?=$app_BG[$lang]?></p>
				</a>

				<div data-role="popup" id="popBeetle" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$BG_info[$lang]?>

		<?php
echo "<div class='ui-grid-a'>";
echo     "<div class='ui-block-a'><img src='".$applist["BG"]["icon"]."' /></div>";
echo     "<div class='ui-block-b'><a href='".$applist["BG"]["url"]."' data-role='button'>".$applist["BG"]["name"]."</a></div>";
echo	"</div>";

		?>
		
				<a href="https://github.com/edward9145/BeetleGo" data-role="button" target="_blank" ><?=$view_code[$lang]?></a>
				<a href="http://www.google.cn/university/androidchallenge/2012/gallery.html#tab=d1-5" data-role="button"  target="_blank"><?=$view_prize[$lang]?></a>`
		<?php
echo	"<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
echo    $view_apps[$lang]."</a>";
		?>
				</div>
				</li>

				<li data-role="list-divider"> 2012.5 </li>
				<li>
					<h3><?=$blue_bridge[$lang]?></h3>
					<p><strong><?=$n3pj[$lang]?></strong></p>
				</li>


				<li data-role="list-divider"> 2011.11 </li>
				<li><a href="#popGlass" data-rel="popup" data-transition="pop" data-inline="true">
					<h3><?=$google_android[$lang]?></h3>
					<p><strong><?=$prize_excellent[$lang]?><strong></p>
					<p><?=$app_GS[$lang]?></p>
				</a>

				<div data-role="popup" id="popGlass" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<?=$GS_info[$lang]?>

		<?php
echo "<div class='ui-grid-a'>";
echo     "<div class='ui-block-a'><img src='".$applist["GS"]["icon"]."' /></div>";
echo     "<div class='ui-block-b'><a href='".$applist["GS"]["url"]."' data-role='button'>".$applist["GS"]["name"]."</a></div>";
echo	"</div>";

echo	"<a href='applist.php?lang=$lang_str' data-role='button' data-icon='bars'>";
echo    $view_apps[$lang]."</a>";
		?>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$qualification[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2013.7 </li>
				<li><h3><?=$toeic[$lang]?></h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2013.6 </li>
				<li><h3><?=$jtest[$lang]?><h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2010.12 </li>
				<li><h3><?=$cet6[$lang]?></h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2010.5 </li>
				<li><h3><?=$prog[$lang]?></h3></a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-inset="false" class="openMe">
			<h2><?=$contact[$lang]?></h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li><a href="http://weibo.com/edward9145?from=profile&wvr=5&loc=infdomain" target="_blank">
				<?=$sina[$lang]?></a></li>
				<li><a href="#popEmail" data-rel="popup" data-inline="true">Email: edward9145@126.com</a>
				<div data-role="popup" id="popEmail" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<h1>edward9145@126.com</h1>
<!--				<a href="#" data-rel="back" data-role="button" onclick="window.clipboardData.setData('text','edward9145@126.com');">Copy address</a>
-->
				<a href="mailto:edward9145@126.com" data-role="button"><?=$send_email[$lang]?></a>
				</div>
				</li>

			</ul>
		</div>

	
	<a href="#popPhoto" data-rel="popup" data-position-to="window" data-transition="fade">
	<img src="img/photo_thumb.jpg" width="100%"/>
	</a>
	<div data-role="popup" id="popPhoto" data-overlay-theme="a" data-corners="false">
		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
		<img src="img/popphoto.jpg" style="max-width:100%;"/>
		<p><?=$fav[$lang]?></p>
		<p><?=$skill[$lang]?></p>
		
	</div>
	
  </div>
  <!-- /content -->
  <div data-role="navbar" data-position="fixed">
	<ul>		
		<li><a href="?lang=CN"> <img src="img/chinese.png"/></a></li>
		<li><a href="?lang=EN"> <img src="img/english.png"/></a></li>
<!--		<li><a href="?lang=JP"> <img src="img/japanese.png"/></a></li> -->
	</ul>
  </div>
</div>

</body>
</html>

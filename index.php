<!DOCTYPE HTML>
<html>

<?php
$langs = array("EN","CN","JP");
$lang = $langs[0];
if(isset($_GET["lang"]) && array_search($_GET["lang"], $langs)) 
    $lang=$_GET["lang"];

$wkj = array("WU KEJIA","吴可嘉");
$education = array("Education","教育背景");
/* <?php echo $education[$lang]; ?> */ 
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
    <h1>WU KEJIA</h1>
    <a href="applist.php" data-icon="bars" class="ui-btn-right">my apps</a>
  </div>
  <!-- /header -->
  <div data-role="content">

	<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
	
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>Education</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2009.9 — 2013.6 </li>
				<li>
					<h3>Beihang University</h3>
					<p>Computer Science and Technology</p>
					<p><strong>Bachelor</strong></p>
				</a>
				</li>
				<li data-role="list-divider"> 2012.12 — 2013.4 </li>
				<li>
					<h3>Tsukuba University</h3>
					<p>Information Science</p>
					<p><strong>Exchange</strong></p>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>Internship Experience</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.7 – 2012.10 </li>
				<li><a href="#popMS" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>MSRA STC<br />(Microsoft Research Asia <br />Search Technology Center)</h3>
					<p><strong>SDET Intern</strong></p>
				</a>
				<div data-role="popup" id="popMS" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Implemented Web Analytics Tools on <strong>"Bing It On"</strong> website, and fix bugs. <br /><br />
				<img src="img/bingiton.png" />
				<a href="http://www.bingiton.com" data-role="button" target="_blank">Visit BING IT ON</a>
				</div>
				</li>

				<li data-role="list-divider"> 2011.4 – 2012.3 </li>
				<li><a href="#popApps" data-rel="popup" data-transition="pop" data-inline="true">  <!-- TODO -->
					<h3>Kungang Creative Studio</h3>
					<p><strong>Android App Developer (Part-time)</strong></p>
				</a>

				<div data-role="popup" id="popApps" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Developed Apps: Audio books, Music searcher, One-arm-bandit, Best scorer and etc. <br /><br />

	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/one_arm_bandit_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">One Arm Bandit</a></div>
	</div>
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/best_scorer_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Best Scorer</a></div>
	</div>
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/jump_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Infinity Jump</a></div>
	</div>
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/turnbrand_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Turn Brand</a></div>
	</div>
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/music_searcher_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Music Searcher</a></div>
	</div>
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/audio_book_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Audio Book</a></div>
	</div>

				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>Project Experience</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2011.12 – 2012.11 </li>
				<li><a href="#popPaper" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>User-based Slope One Algorithm</h3>
					<p>published papers</p>
				</a>

				<div data-role="popup" id="popPaper" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
Published papers <strong>"User-based Slope One Algorithm", "A new Slope One algorithm based on modified user similarity"</strong> in IEEE Xplore. <br />
Mainly implemented the algorithm and test the algorithm <br /><br />
<a href="http://ieeexplore.ieee.org/stamp/stamp.jsp?tp=&arnumber=6223488" data-role="button" target="_blank">View my paper</a>
				</div>
				</li>

				<li data-role="list-divider"> 2012.6 – 2012.7 </li>
				<li><a href="#popRSS" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Ninjai RSS reader</h3>
					<p>Android/iOS app</p>
				</a>

				<div data-role="popup" id="popRSS" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Developed Android and iOS app "Ninjai RSS reader" with PhoneGap
	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/ninjai_rss_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Ninjai RSS</a></div>
	</div>

				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>

				<li data-role="list-divider"> 2011.11 – 2012.4 </li>
				<li><a href="#popKinect" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Gesture Controllor</h3>
					<p>Kinect sensor project</p>
				</a>

				<div data-role="popup" id="popKinect" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Participated in project "Identification and application of 3D vision-based posture movements". <br /> 
				Mainly used the Kinect sensor to capture the motion sequence, and recognized the patterns from the sequence <br /><br />

				<img src="img/kinect.jpg" />
				</div>
				</li>

				<li data-role="list-divider"> 2012.4 – 2012.5 </li>
				<li><a href="#popMetro" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Metro Wordbook</h3>
					<p>Win8 Metro app</p>
				</a>

				<div data-role="popup" id="popMetro" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Developed a Win8 Metro app "Metro Wordbook" <br />
				Participated in Imagine Cup 2012 Metro Style Challenge, and Windows 8 Campus Application Pioneer Project <br /><br />
				<img src="img/metro_workbook.jpg" />
				</div>
				</li>

				<li data-role="list-divider"> 2011.8 – 2012.3 </li>
				<li><a href="#popSubway" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Beijing Subway inquiry in real time</h3>
					<p>Android app (lab project)</p>
				</a>

				<div data-role="popup" id="popSubway" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Participated in project of Engineering Center Lab "Beijing Subway inquiry in real time". <br />
				Developed a subway inquiry app on Android, implemented "traffic query", "line query", "last train query" and etc. <br /><br />

	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/beijing_subway_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Beijing Subway</a></div>
	</div>

				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>

				<li data-role="list-divider"> 2010.9 – 2010.10 </li>
				<li><a href="#popBullet" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Bullet Evader</h3>
					<p>J2ME flight shooting game</p>
				</a>

				<div data-role="popup" id="popBullet" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Developed a flight shooting game "Bullet Evader" with J2ME <br />
				Participated in "Nokia applications and game development contest" <br />
				Published the game in Nokia Ovi store <br /><br />

	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/bullet_evader_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Bullet Evader</a></div>
	</div>

				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>

				<li data-role="list-divider"> 2010.9 – 2010.12 </li>
				<li><a href="#popMagazine" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Hacker Monthly</h3>
					<p>magazine Chinese translation project</p>
				</a>

				<div data-role="popup" id="popMagazine" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				Joined the "Hacker Monthly" magazine Chinese translation project team. <br />
				Mainly responsible for the translation and typesetting. <br />
				Completed 3 Chinese translation magazines <br /><br />
				<img src="img/hacker_monthly.jpg" />
				<a href="http://.pdf" data-role="button" target="_blank">View Magazine</a>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="false" class="openMe">
			<h2>Awards</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.12 </li>
				<li><a href="#popBeetle" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Google Android Application Development Challenge </h3>
					<p><strong>National 3rd Prize</strong></p>
					<p>Android app: Beetle Go</p>
				</a>

				<div data-role="popup" id="popBeetle" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				"The Third Android Application Development Challenge" <br /> 
				National 3rd Prize by developing Android game "Beetle Go" <br /><br />

	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/beetle_go_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Beetle Go</a></div>
	</div>
				<a href="https://github.com/edward9145/BeetleGo" data-role="button" target="_blank" >View code on github</a>
				<a href="http://www.google.cn/university/androidchallenge/2012/gallery.html#tab=d1-5" data-role="button"  target="_blank">View prize page</a>`
				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>

				<li data-role="list-divider"> 2012.5 </li>
				<li>
					<h3>Blue Bridge Cup software professionals design contest</h3>
					<p><strong>National 3rd Prize (Java)</strong></p>
				</li>


				<li data-role="list-divider"> 2011.11 </li>
				<li><a href="#popGlass" data-rel="popup" data-transition="pop" data-inline="true">
					<h3>Google Android Application Development Challenge </h3>
					<p><strong>Prize of Excellent</strong></p>
					<p>Android app: Sunglasses Show</p>
				</a>

				<div data-role="popup" id="popGlass" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				"The Second Android Application Development Challenge" <br />
				Prize of Excellent App by developing Android app "Sunglasses Show" <br /><br />

	<div class="ui-grid-a">
	    <div class="ui-block-a"><img src="img/sunglass_icon.png" /></div>
            <div class="ui-block-b"><a href="applist.php" data-role="button">Sunglasses Show</a></div>
	</div>
				<a href="applist.php" data-role="button" data-icon="bars">View all of my apps</a>
				</div>
				</li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>Qualifications</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2013.7 </li>
				<li><h3>TOEIC 705</h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2013.6 </li>
				<li><h3>J.TEST 596 (D)<h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2010.12 </li>
				<li><h3>CET-6 (College English Test Band 6 Certificate)</h3></a></li>
			</ul>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2010.5 </li>
				<li><h3>Programmer Certification - National Computer Technology and Software Professional and Technical Qualifications</h3></a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>Contact</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li><a href="http://weibo.com/edward9145?from=profile&wvr=5&loc=infdomain" target="_blank">
				Sina Weibo</a></li>
				<li><a href="#popEmail" data-rel="popup" data-inline="true">Email: edward9145@126.com</a>
				<div data-role="popup" id="popEmail" class="ui-content" data-overlay-theme="a" data-theme="e"> 
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
				<a href="#" data-rel="back" data-role="button" onclick="window.clipboardData.setData('text','edward9145@126.com');">Copy address</a>
				<a href="mailto:edward9145@126.com" data-role="button">Send Email</a>
				</div>
				</li>

			</ul>
		</div>

	</div>
	
	<a href="#popPhoto" data-rel="popup" data-position-to="window" data-transition="fade">
	<img src="img/photo_thumb.jpg" width="100%"/>
	</a>
	<div data-role="popup" id="popPhoto" data-overlay-theme="a" data-corners="false">
		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left"></a>
		<img src="img/popphoto.jpg" style="max-width:100%;"/>
		<p><strong>Favorites</strong>: reading, painting, ping-pong, roller skating.</p>
		<p><strong>Other skills</strong>: Flash, Photoshop (more than 5 years of experience)</p>
		
	</div>
	
  </div>
  <!-- /content -->
  <div data-role="navbar" data-position="fixed">
	<ul>		
		<li><a href="?lang=CN"> <img src="img/chinese.png"/></a></li>
		<li><a href="?lang=EN"> <img src="img/english.png"/></a></li>
		<li><a href="?lang=JP"> <img src="img/japanese.png"/></a></li>
	</ul>
  </div>
</div>
<!-- /englishpage -->

<div data-role="page" id="chinesepage"> 
  <div data-role="header" class="header_bar"> 
    <h1>吴可嘉</h1>
  </div>
  <!-- /header -->
  <div data-role="content">
    
	<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
	
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>教育背景</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2009.9 — 2013.6 </li>
				<li><a href="http://scse.buaa.edu.cn" target="_blank">
					<h3>北京航空航天大学</h3>
					<p>计算机科学与技术</p>
					<p><strong>本科</strong></p>
				</a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>实习经历</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.7 – 2012.10 </li>
				<li><a href="http://www.bingiton.com" target="_blank" >
					<h3>微软亚洲研究院 STC部门</h3>
					<p>Bing It On站点页面分析的实现，及相关bug的修复</p>
					<p><strong>实习软件测试工程师</strong></p>
				</a></li>
				<li data-role="list-divider"> 2011.4 – 2012.3 </li>
				<li><a href="#applist">  <!-- TODO -->
					<h3>昆岗创意工作室</h3>
					<p>开发的应用: 音乐搜客，有声读物，老虎机，篮球得分王</p>
					<p><strong>Android应用开发</strong></p>
				</a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>项目经历</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2011.12 – 2012.4 </li>
				<li><a href="http://ieeexplore.ieee.org/stamp/stamp.jsp?tp=&arnumber=6223488" target="_blank" >
					<h3>User-based Slope One Algorithm</h3>
					<p><strong>2012 ICSAI(International Conference on Systems and Informatics)</strong></p>
				</a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>获奖情况</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2012.12 </li>
				<li><a href="http://www.google.cn/university/androidchallenge/2012/gallery.html#tab=d1-5" target="_blank" >
					<h3>Android 应用开发中国大学生挑战赛 </h3>
					<p>参赛作品 Beetle Go</p>
					<p><strong>全国三等奖</strong></p>
				</a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>证书</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider"> 2010.12 </li>
				<li><h3>CET-6</h3></a></li>
			</ul>
		</div>
		
		<div data-role="collapsible" data-collapsed="true" class="openMe">
			<h2>联系方式</h2>
			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<li><a href="http://weibo.com/edward9145?from=profile&wvr=5&loc=infdomain" target="_blank">
				新浪微博</a></li>
				<li><a href="mailto:edward9145@126.com">Email: edward9145@126.com</a></li>
			</ul>
		</div>

	</div>
	
	<img src="img/photo.jpg" width="100%"/>	
	
  </div>
  <!-- /content -->
  <div data-role="navbar" data-position="fixed">
	<ul>		
		<li><a href="#chinesepage"> <img src="img/chinese.png"/> 中文</a></li>
		<li><a href="#englishpage"> <img src="img/english.png"/> English</a></li>
		<li><a href="#japanesepage"> <img src="img/japanese.png"/> 日本語</a></li>
	</ul>
  </div>
</div>
<!-- /chinesepage -->

</body>
</html>

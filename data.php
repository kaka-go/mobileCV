<?php
$langs = array("EN"=>0,"CN"=>1);
$lang = $langs["EN"];
$lang_str = "EN";
if(isset($_GET["lang"]) && array_key_exists($_GET["lang"], $langs)){
    $lang_str = $_GET["lang"];
    $lang = $langs[$lang_str];
}

$education = array("Education","教育背景");
$beihang = array("Beihang University","北京航空航天大学");
$cst = array("Computer Science and Technology","计算机科学与技术(计算机应用)");
$bachelor = array("Bachelor","本科");
$tsukuba = array("Tsukuba University","日本筑波大学");
$is = array("Information Science","信息科学");
$exchange = array("Exchange","交流学习");

$intership = array("Intership Experience","实习经历");
$msra = array("MSRA STC<br />(Microsoft Research Asia <br />Search Technology Center)","微软亚洲研究院(MSRA)<br />搜索技术中心(STC)");
$sdet = array("SDET Intern","实习 软件测试工程师(SDET)");
$bingiton = array("Implemented Web Analytics Tools on <strong>\"Bing It On\"</strong> website, and fix bugs. <br /><br />","主要负责Bing It On站点页面分析的实现，以及相关bug的修复<br /><br />");
$visit_bingiton = array("Visit BING IT ON","访问 BING IT ON");
$kungang = array("Kungang Creative Studio","昆岗创意工作室");
$android_dev= array("Android App Developer (Part-time)","兼职 Android应用开发");
$dev_apps= array("Developed Apps: Audio books, Music searcher, One-arm-bandit, Best scorer and etc. <br /><br />","开发的应用: 音乐搜客，有声读物，老虎机，篮球得分王<br /><br />");
$view_apps = array("View all of my apps","查看所有的应用");

$project = array("Project Experience","项目经验");
$ubsoa = array("User-based Slope One Algorithm","基于用户关系Slope One算法");
$publish = array("published papers","发表论文");
$paper_info = array("Published papers <strong>\"User-based Slope One Algorithm\", \"A new Slope One algorithm based on modified user similarity\"</strong> in IEEE Xplore. <br />Mainly implemented the algorithm and test the algorithm <br /><br />","发表论文<strong>《User-based Slope One Algorithm》，《A new Slope One algorithm based on modified user similarity》</strong>，进入IEEE检索<br />提出了基于Slope-One算法的改进算法，主要负责算法实现与测试<br /><br />");
$view_paper = array("View my paper","查看论文");
$rss_info = array("Developed Android and iOS app \"Ninjai RSS reader\" with PhoneGap
","开发Android与iOS平台应用Ninjai RSS阅读器");
$gesture = array("Gesture Controllor","姿态运动识别及应用");
$kinect = array("Kinect sensor project","Kinect 项目");
$gesture_info = array("Participated in project \"Identification and application of 3D vision-based posture movements\". <br /> Mainly used the Kinect sensor to capture the motion sequence, and recognized the patterns from the sequence <br /><br />","参与项目“基于三维视觉的姿态运动识别及应用”，主要使用了Kinect摄像头捕获肢体的运动轨迹，并对运动序列进行模式识别<br /><br />");

$metro = array("Metro Wordbook","Metro单词本");
$win8_metro = array("Win8 Metro app","Win8 Metro 应用");
$metro_info = array("Developed a Win8 Metro app \"Metro Wordbook\" <br />Participated in Imagine Cup 2012 Metro Style Challenge, and Windows 8 Campus Application Pioneer Project <br /><br />","参与制作Win8 Metro应用“Metro单词本” (Metro Wordbook) <br />参加Imagine Cup 2012-Metro Style Challenge，以及Windows 8校园应用先锋计划<br /><br />");

$subway_desc = array("Android app (lab project)","Android 应用 (实验室项目)");
$subway_info = array("Participated in project of Engineering Center Lab \"Beijing Subway inquiry in real time\". <br />	Developed a subway inquiry app on Android, implemented \"traffic query\", \"line query\", \"last train query\" and etc. <br /><br />","参与工程中心实验室项目<strong>“北京地铁综合实时查询”</strong>, <br />开发Android手机上的地铁查询应用，主要功能包括流量查询，线路查询，末班车查询等<br /><br />");
$bullet_info = array("Developed a flight shooting game \"Bullet Evader\" with J2ME <br />Participated in \"Nokia applications and game development contest\" <br />Published the game in Nokia Ovi store <br /><br />","开发J2ME飞行射击类游戏Bullet Evader，<br />参加“诺基亚酷玩应用游戏开发活动”，并在Ovi商店发布游戏<br /><br />");

$hacker = array("Hacker Monthly","黑客月刊(Hacker Monthly)");
$translation = array("Chinese translation project","翻译汉化项目");
$hacker_info = array("Joined the \"Hacker Monthly\" magazine Chinese translation project team. <br />Mainly responsible for the translation and typesetting. <br />Completed 3 Chinese translation magazines <br /><br />","加入《Hacker Monthly》杂志中文翻译项目组，<br />负责翻译、排版等工作，<br />参与完成三期中文杂志<br /><br />");
$view_hacker = array("View Magazine","查看杂志");

$awards = array("Awards","获奖情况");
$google_android = array("Google Android Application Development Challenge","Android 应用开发中国大学生挑战赛");
$n3p = array("National 3rd Prize","全国 三等奖");
$app_BG = array("Android app: Beetle Go","Android游戏Beetle Go");
$BG_info = array("\"The Third Android Application Development Challenge\" <br />National 3rd Prize by developing Android game \"Beetle Go\" <br /><br />","“第三届 Android 应用开发中国大学生挑战赛”全国 三等奖<br />开发Android手机游戏Beetle Go<br /><br />");
$view_code = array("View code on github","查看Github上源代码");
$view_prize = array("View prize page","查看获奖页面");

$blue_bridge = array("Blue Bridge Cup software professionals design contest","“蓝桥杯”全国软件大赛");
$n3pj = array("National 3rd Prize (Java)","Java软件开发本科组 三等奖");
$prize_excellent = array("Prize of Excellent","优秀奖");
$app_GS = array("Android app: Glasses Show","Android应用 眼镜秀");
$GS_info = array("\"The Second Android Application Development Challenge\" <br />Prize of Excellent App by developing Android app \"Glasses Show\" <br /><br />","“第二届 Android 应用开发中国大学生挑战赛”北京赛区 优秀奖<br />开发Android手机应用“眼镜秀”(Glasses Show)<br /><br />");

$qualification = array("Qualifications","资格证书");
$toeic = array("TOEIC 705","TOEIC 705");
$jtest = array("J.TEST 596 (D)","J.TEST 596 (D)");
$cet6 = array("CET-6 (College English Test Band 6 Certificate)","大学英语六级 CET-6");
$prog = array("Programmer Certification - National Computer Technology and Software Professional and Technical Qualifications","程序员 计算机技术与软件专业技术资格（水平）");

$contact = array("Contact","联系方式");
$sina = array("Sina Weibo","新浪微博");

$send_email = array("Send Email","发送邮件");

$fav = array("<strong>Favorites</strong>: reading, painting, ping-pong, roller skating.","<strong>爱好</strong>：读书，绘画，乒乓球，轮滑");
$skill = array("<strong>Other skills</strong>: Flash, Photoshop (more than 5 years of experience)","<strong>其他</strong>：Flash, Photoshop使用较为熟练，5年以上使用经验");


$myapps = array("My Apps","我的应用");
$cv = array("My CV","简历");
$back = array("back","返回");
$download = array("Download","下载");
$wkj = array("WU KEJIA","吴可嘉");

$BG = array("Beetle Go","Beetle Go");
$NR = array("Ninjai RSS","Ninjai RSS");
$BS = array("Best Scorer","篮球得分王");
$IJ = array("Infinity Jump","无限跳跃");
//$MB = array("Monster Bandit","小怪兽老虎机");
$OAB= array("One Arm Bandit","老虎机");
$TB = array("Turn Brand","翻牌对对碰");
$MS = array("Music Searcher","音乐搜客");
$AB = array("Audio Book","有声读物");
$GS = array("Glasses Show","眼镜秀");
$BE = array("Bullet Evader","躲弹者");
$BSI = array("Beijing Subway inquiry in real time","北京地铁综合实时查询");
$MW = array("Metro Wordbook","Metro单词本");

$BE_desc = array("J2ME flight shooting game","J2ME飞行射击游戏");

$applist = array(
"BG"=>
array("name"=>$BG[$lang], "desc"=>"Android", "size"=>"3.70 MB", "url"=>"app.php?name=BG&lang=$lang_str","icon"=>"img/beetle_go_icon.png",
"download"=>"",
"snap"=>array("img/beetle_go_1.jpg","img/beetle_go_2.jpg")),
"NR"=>
array("name"=>$NR[$lang], "desc"=>"Android/iOS app", "size"=>"502.91 KB", "url"=>"app.php?name=NR&lang=$lang_str","icon"=>"img/ninjai_rss_icon.png",
"snap"=>array("img/ninjai_rss_1.jpg","img/ninjai_rss_2.jpg")),
"BS"=>
array("name"=>$BS[$lang], "desc"=>"Android", "size"=>"1.05 MB", "url"=>"app.php?name=BS&lang=$lang_str","icon"=>"img/best_scorer_icon.png",
"snap"=>array("img/best_scorer_1.jpg","img/best_scorer_2.jpg")),
"IJ"=>
array("name"=>$IJ[$lang], "desc"=>"Android", "size"=>"1.24 MB", "url"=>"app.php?name=IJ&lang=$lang_str","icon"=>"img/jump_icon.png",
"snap"=>array("img/jump_1.jpg","img/jump_2.jpg")),
"OAB"=>
array("name"=>$OAB[$lang], "desc"=>"Android", "size"=>"2.69 MB", "url"=>"app.php?name=OAB&lang=$lang_str","icon"=>"img/one_arm_bandit_icon.png",
"snap"=>array("img/one_arm_bandit_1.jpg","img/one_arm_bandit_2.jpg")),
"TB"=>
array("name"=>$TB[$lang], "desc"=>"Android", "size"=>"1.99 MB", "url"=>"app.php?name=TB&lang=$lang_str","icon"=>"img/turnbrand_icon.png",
"snap"=>array("img/turnbrand_1.jpg","img/turnbrand_2.jpg")),
"MS"=>
array("name"=>$MS[$lang], "desc"=>"Android", "size"=>"MB", "url"=>"app.php?name=MS&lang=$lang_str","icon"=>"img/music_searcher_icon.png",
"snap"=>array("img/music_searcher_1.jpg","img/music_searcher_2.jpg")),
"AB"=>
array("name"=>$AB[$lang], "desc"=>"Android", "size"=>"15.24 MB", "url"=>"app.php?name=AB&lang=$lang_str","icon"=>"img/audio_book_icon.png",
"snap"=>array("img/audio_book_1.jpg","img/audio_book_2.jpg")),
"GS"=>
array("name"=>$GS[$lang], "desc"=>"Android", "size"=>"378.51 KB", "url"=>"app.php?name=GS&lang=$lang_str","icon"=>"img/glasses_show_icon.png",
"snap"=>array("img/glasses_show_1.jpg","img/glasses_show_2.jpg")),
"BE"=>
array("name"=>$BE[$lang], "desc"=>$BE_desc[$lang], "size"=>"516 KB", "url"=>"app.php?name=BE&lang=$lang_str","icon"=>"img/bullet_evader_icon.png",
"snap"=>array("img/bullet_evader_1.jpg","img/bullet_evader_2.jpg")),
"BSI"=>
array("name"=>$BSI[$lang], "desc"=>"Android", "size"=>"3.20 MB", "url"=>"app.php?name=BSI&lang=$lang_str","icon"=>"img/beijing_subway_icon.png",
"snap"=>array("img/beijing_subway_1.jpg","img/beijing_subway_2.jpg")),
"MW"=>
array("name"=>$MW[$lang], "desc"=>$win8_metro[$lang], "size"=>"...", "url"=>"app.php?name=MW&lang=$lang_str","icon"=>"img/metro_wordbook_icon.png",
"snap"=>array("img/metro_wordbook_1.jpg","img/metro_wordbook_2.jpg")),
);

?>


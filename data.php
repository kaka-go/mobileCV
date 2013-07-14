<?php
$langs = array("EN"=>0,"CN"=>1);
$lang = $langs["EN"];
$lang_str = "EN";
if(isset($_GET["lang"]) && array_key_exists($_GET["lang"], $langs)){
    $lang_str = $_GET["lang"];
    $lang = $langs[$lang_str];
}

$title = array("My Apps","应用");
$cv = array("My CV","简历");
$back = array("back","返回");
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

$applist = array(
"BG"=>
array("name"=>$BG[$lang], "desc"=>"Android", "size"=>"3.70 MB", "url"=>"app.php?name=BG","src"=>"img/beetle_go_icon.png",
"snap"=>array("img/beetle_go_1.jpg","img/beetle_go_2.jpg")),
"NR"=>
array("name"=>$NR[$lang], "desc"=>"Android/iOS", "size"=>"502.91 KB", "url"=>"app.php?name=NR","src"=>"img/ninjai_rss_icon.png",
"snap"=>array("img/ninjai_rss_1.jpg","img/ninjai_rss_2.jpg")),
"BS"=>
array("name"=>$BS[$lang], "desc"=>"Android", "size"=>"1.05 MB", "url"=>"app.php?name=BS","src"=>"img/best_scorer_icon.png",
"snap"=>array("img/best_scorer_1.jpg","img/best_scorer_2.jpg")),
"IJ"=>
array("name"=>$IJ[$lang], "desc"=>"Android", "size"=>"1.24 MB", "url"=>"app.php?name=IJ","src"=>"img/jump_icon.png",
"snap"=>array("img/jump_1.jpg","img/jump_2.jpg")),
"OAB"=>
array("name"=>$OAB[$lang], "desc"=>"Android", "size"=>"2.69 MB", "url"=>"app.php?name=OAB","src"=>"img/one_arm_bandit_icon.png",
"snap"=>array("img/one_arm_bandit_1.jpg","img/one_arm_bandit_2.jpg")),
"TB"=>
array("name"=>$TB[$lang], "desc"=>"Android", "size"=>"1.99 MB", "url"=>"app.php?name=TB","src"=>"img/turnbrand_icon.png",
"snap"=>array("img/turnbrand_1.jpg","img/turnbrand_2.jpg")),
"MS"=>
array("name"=>$MS[$lang], "desc"=>"Android", "size"=>"MB", "url"=>"app.php?name=MS","src"=>"img/music_searcher_icon.png",
"snap"=>array("img/music_searcher_1.jpg","img/music_searcher_2.jpg")),
"AB"=>
array("name"=>$AB[$lang], "desc"=>"Android", "size"=>"15.24 MB", "url"=>"app.php?name=AB","src"=>"img/audio_book_icon.png",
"snap"=>array("img/audio_book_1.jpg","img/audio_book_2.jpg")),
"GS"=>
array("name"=>$GS[$lang], "desc"=>"Android", "size"=>"378.51 KB", "url"=>"app.php?name=GS","src"=>"img/glasses_show_icon.png",
"snap"=>array("img/glasses_show_1.jpg","img/glasses_show_2.jpg")),
"BE"=>
array("name"=>$BE[$lang], "desc"=>"J2ME", "size"=>"KB", "url"=>"app.php?name=BE","src"=>"img/bullet_evader_icon.png",
"snap"=>array("img/bullet_evader_1.jpg","img/bullet_evader_2.jpg")),
);

?>


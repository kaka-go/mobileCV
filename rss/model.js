/************************************************************************
 * data part
 ************************************************************************/
function isWifiConnection() {
    return navigator.network.connection.type == Connection.WIFI;
}

function isOnline() {
    var connection = navigator.network.connection.type;
    return connection != Connection.NONE && 
	connnection != Connection.UNKNOWN;
}

var DisplayImage = true;

var UseProxy = false;
var ProxyUrl = "";
var ProxyPort = 0;

var OfflineRead = false;

const DatabaseName = "RSS_DB";
const DatabaseSize = 1 * 1024 * 1024;
var DataBase;

var weather;
var City="Beijing";
var Theme;

var FileCache=true;
const RootDirName="ninjai_reader";

var CUR_URL;
var CUR_FEED = 0;
var CUR_ITEMS = new Array();
var CUR_ITEM_ID;
var FAVOR_ITEMS = new Array();


var DATA = [
            	new Category("新闻", [
            		new Channel("头条新闻",  "http://news.163.com/special/00011K6L/rss_newstop.xml"),
            		new Channel("国内新闻",  "http://news.163.com/special/00011K6L/rss_gn.xml"),
            		new Channel("国际新闻",  "http://news.163.com/special/00011K6L/rss_gj.xml"),
            		new Channel("社会新闻",  "http://news.163.com/special/00011K6L/rss_sh.xml"),
            		new Channel("军事新闻",  "http://news.163.com/special/00011K6L/rss_war.xml"),
            		new Channel("深度新闻",  "http://news.163.com/special/00011K6L/rss_hotnews.xml"),
            		new Channel("评论新闻",  "http://news.163.com/special/00011K6L/rss_newsspecial.xml"),
            		new Channel("图片新闻",  "http://news.163.com/special/00011K6L/rss_photo.xml"),
            		new Channel("探索新闻",  "http://news.163.com/special/00011K6L/rss_discovery.xml"),
            		]
            	),
            	new Category("体育", [
            		new Channel("NBA",  "http://sports.163.com/special/00051K7F/rss_sportslq.xml"),
            		new Channel("CBA",  "http://sports.163.com/special/00051K7F/rss_sportscba.xml"),
            		new Channel("英超",  "http://sports.163.com/special/00051K7F/rss_sportsyc.xml"),
            		new Channel("意甲",  "http://sports.163.com/special/00051K7F/rss_sportsyj.xml"),
            		new Channel("国际足球",  "http://sports.163.com/special/00051K7F/rss_sportsgj.xml"),
            		new Channel("中国足球",  "http://sports.163.com/special/00051K7F/rss_sportszg.xml"),
            		new Channel("综合体育",  "http://sports.163.com/special/00051K7F/rss_sportszh.xml"),
            		new Channel("网球",  "http://sports.163.com/special/00051K7F/rss_sportstennis.xml"),
            		new Channel("F1",  "http://sports.163.com/special/00051K7F/rss_sportsf1.xml"),
            		new Channel("秀色",  "http://sports.163.com/special/00051K7F/rss_ttxs.xml"),
            		new Channel("彩票",  "http://sports.163.com/special/00051K7F/rss_sportscp.xml"),
            		]
            	),
            	new Category("亚运", [
            		new Channel("亚运要闻",  "http://2010.163.com/special/00863I1M/rss_2010.xml"),
            		new Channel("综合赛事",  "http://2010.163.com/special/00863I1M/rss_2010.xml"),
            		new Channel("本地新闻",  "http://2010.163.com/special/00863I1M/rss_2010.xml"),
            		new Channel("明星聚焦",  "http://2010.163.com/special/00863I1M/rss_2010.xml"),
            		new Channel("官方新闻",  "http://2010.163.com/special/00863I1M/rss_2010.xml"),
            		]
            	),
            	new Category("娱乐", [
            		new Channel("娱乐头条",  "http://ent.163.com/special/00031K7Q/rss_toutiao.xml"),
            		new Channel("明星动态",  "http://ent.163.com/special/00031K7Q/rss_entstar.xml"),
            		new Channel("电影世界",  "http://ent.163.com/special/00031K7Q/rss_entmovie.xml"),
            		new Channel("电视剧场",  "http://ent.163.com/special/00031K7Q/rss_enttv.xml"),
            		new Channel("音乐沙龙",  "http://ent.163.com/special/00031K7Q/rss_entmusic.xml"),
            		new Channel("图片新闻",  "http://ent.163.com/special/00031K7Q/rss_entpic.xml"),
            		]
            	),
            	new Category("视频", [
            		new Channel("视频头条",  "http://v.163.com/special/008544NC/vheadline.xml"),
            		new Channel("资讯频道",  "http://v.163.com/special/008544NC/vnewsrss.xml"),
            		new Channel("电视剧频道",  "http://v.163.com/special/008544NC/tvrss.xml"),
            		new Channel("电影频道",  "http://v.163.com/special/008544NC/moiverss.xml"),
            		new Channel("综艺频道",  "http://v.163.com/special/008544NC/ventrss.xml"),
            		new Channel("纪实频道",  "http://v.163.com/special/008544NC/vdocrss.xml"),
            		]
            	),
            	new Category("科技", [
            		new Channel("科技头条",  "http://tech.163.com/special/000944OI/headlines.xml"),
            		new Channel("互联网",  "http://tech.163.com/special/000944OI/hulianwang.xml"),
            		new Channel("要闻",  "http://tech.163.com/special/000944OI/yaowen.xml"),
            		new Channel("通信",  "http://tech.163.com/special/000944OI/kejitongxin.xml"),
            		new Channel("IT业界",  "http://tech.163.com/special/000944OI/kejiyejie.xml"),
            		new Channel("视频",  "http://tech.163.com/special/000944OI/kejishipin.xml"),
            		new Channel("深度阅读",  "http://tech.163.com/special/000944OI/shenduyuedu.xml"),
            		new Channel("高端访谈",  "http://tech.163.com/special/000944OI/kejifangtan.xml"),
            		new Channel("IT碰碰车",  "http://tech.163.com/special/000944OI/ITpengpengche.xml"),
            		new Channel("专题",  "http://tech.163.com/special/000944OI/kejizhuanti.xml"),
            		]
            	),
            	new Category("财经", [
            		new Channel("头条新闻",  "http://money.163.com/special/00252EQ2/toutiaorss.xml"),
            		new Channel("要闻综合",  "http://money.163.com/special/00252EQ2/yaowenrss.xml"),
            		new Channel("宏观要闻",  "http://money.163.com/special/00252EQ2/macrorss.xml"),
            		new Channel("证券要闻",  "http://money.163.com/special/00252EQ2/gushinewsrss.xml"),
            		new Channel("操作指南",  "http://money.163.com/special/00252EQ2/caozuorss.xml"),
            		new Channel("商业要闻",  "http://media.163.com/special/00762B70/media.xml"),
            		new Channel("基金要闻",  "http://money.163.com/special/00252EQ2/jjywrss.xml"),
            		new Channel("财经专题",  "http://money.163.com/special/00252LIB/cjztrss.xml"),
            		]
            	),
            	new Category("汽车", [
            		new Channel("头条新闻",  "http://auto.163.com/special/00081K7D/rsstoutiao.xml"),
            		new Channel("车讯要闻",  "http://auto.163.com/special/00081K7D/rsscxyw.xml"),
            		new Channel("新车",  "http://auto.163.com/special/00081K7D/rss_autotry.xml"),
            		new Channel("导购",  "http://auto.163.com/special/00081K7D/rss_autobuy.xml"),
            		new Channel("行情",  "http://auto.163.com/special/00081K7D/rssdepreciate.xml"),
            		new Channel("网易试驾",  "http://auto.163.com/special/00081K7D/rsstest.xml"),
            		new Channel("用车修车",  "http://auto.163.com/special/00081K7D/rss_autouse.xml"),
            		new Channel("汽车用品",  "http://auto.163.com/special/00081K7D/rssqcyp.xml"),
            		new Channel("业界头条",  "http://auto.163.com/special/00081K7D/rsstoutiao.xml"),
            		]
            	),
            	new Category("数码", [
            		new Channel("数码要闻",  "http://tech.163.com/digi/special/00161K7K/rss_digixj.xml"),
            		new Channel("笔记本资讯",  "http://tech.163.com/digi/special/00161K7K/rss_diginote.xml"),
            		new Channel("DIY资讯",  "http://tech.163.com/digi/special/00161K7K/rss_digipc.xml"),
            		new Channel("相机资讯",  "http://tech.163.com/digi/special/00161K7K/rss_digidc.xml"),
            		new Channel("家电资讯",  "http://tech.163.com/digi/special/00161K7K/rss_digijd.xml"),
            		new Channel("随声听资讯",  "http://tech.163.com/digi/special/00161K7K/rss_digisyt.xml"),
            		new Channel("数码极客",  "http://tech.163.com/digi/special/00161K7K/rss_digigeek.xml"),
            		]
            	),
            	new Category("手机", [
            		new Channel("手机头条",  "http://tech.163.com/mobile/special/001144R8/mobile163.xml"),
            		new Channel("新机速递",  "http://tech.163.com/mobile/special/001144R8/xinjisudi.xml"),
            		new Channel("手机评测",  "http://tech.163.com/mobile/special/001144R8/shoujipingce.xml"),
            		new Channel("购机指南",  "http://tech.163.com/mobile/special/001144R8/shoujidaogou.xml"),
            		new Channel("北京行情",  "http://tech.163.com/mobile/special/001144R8/beijinghangqing.xml"),
            		new Channel("上海行情",  "http://tech.163.com/mobile/special/001144R8/shanghaihangqing.xml"),
            		new Channel("广州行情",  "http://tech.163.com/mobile/special/001144R8/guangzhouhangqing.xml"),
            		new Channel("各地行情",  "http://tech.163.com/mobile/special/001144R8/gedihangqing.xml"),
            		]
            	),
            	new Category("女性", [
            		new Channel("时尚资讯",  "http://lady.163.com/special/00261R8C/ladyrss1.xml"),
            		new Channel("扮靓帖士",  "http://lady.163.com/special/00261R8C/ladyrss2.xml"),
            		new Channel("情感口述",  "http://lady.163.com/special/00261R8C/ladyrss3.xml"),
            		new Channel("星座星运",  "http://lady.163.com/special/00261R8C/ladyrss4.xml"),
            		new Channel("女人帮",  "http://lady.163.com/special/00261R8C/ladyrss5.xml"),
            		new Channel("女人论坛",  "http://lady.163.com/special/00261R8C/ladyrss6.xml"),
            		new Channel("心情日记",  "http://lady.163.com/special/00261R8C/ladyrss7.xml"),
            		new Channel("亲子乐园",  "http://lady.163.com/special/00261R8C/ladyrss7.xml"),
            		]
            	),
            	new Category("房产", [
            		new Channel("广州",  "http://gz.house.163.com/special/00873E0M/rss.xml"),
            		new Channel("北京",  "http://bj.house.163.com/special/000741FI/bjrss.xml"),
            		new Channel("上海",  "http://sh.house.163.com/special/000741DO/rsssh.xml"),
            		new Channel("深圳",  "http://sz.house.163.com/special/000741HU/szrss.xml"),
            		]
            	),
            	new Category("游戏", [
            		new Channel("头条要闻",  "http://game.163.com/special/003144N4/rss_gametop.xml"),
            		new Channel("新游戏",  "http://game.163.com/special/003144N4/rss_newgame.xml"),
            		new Channel("玩家新闻",  "http://game.163.com/special/003144N4/rss_players.xml"),
            		new Channel("业界新闻",  "http://game.163.com/special/003144N4/rss_industry.xml"),
            		new Channel("魔兽世界新闻",  "http://game.163.com/special/003144N4/rss_wowxw.xml"),
            		new Channel("魔兽世界攻略",  "http://game.163.com/special/003144N4/rss_wowgl.xml"),
            		new Channel("天下贰新闻",  "http://game.163.com/special/003144N4/rss_tx2xw.xml"),
            		new Channel("天下贰攻略",  "http://game.163.com/special/003144N4/rss_tx2gl.xml"),
            		new Channel("梦幻西游新闻",  "http://game.163.com/special/003144N4/rss_xyqxw.xml"),
            		new Channel("梦幻西游攻略",  "http://game.163.com/special/003144N4/rss_xyqgl.xml"),
            		new Channel("剑网3新闻",  "http://game.163.com/special/003144N4/rss_jx3xw.xml"),
            		new Channel("剑网3攻略",  "http://game.163.com/special/003144N4/rss_jx3gl.xml"),
            		new Channel("梦幻诛仙新闻",  "http://game.163.com/special/003144N4/rss_mhzxxw.xml"),
            		new Channel("梦幻诛仙攻略",  "http://game.163.com/special/003144N4/rss_mhzxgl.xml"),
            		]
            	),
            	new Category("读书", [
            		new Channel("在线阅读",  "http://book.163.com/special/0092451H/rss_online.xml"),
            		new Channel("书摘文摘",  "http://book.163.com/special/0092451H/rss_shuzhai.xml"),
            		new Channel("文化资讯",  "http://book.163.com/special/0092451H/rss_whzx.xml"),
            		new Channel("读书博客",  "http://book.163.com/special/0092451H/rss_blog.xml"),
            		]
            	),
            	new Category("媒体", [
            		new Channel("传媒",  "http://media.163.com/special/00762B70/media.xml"),
            		]
            	),
            	new Category("公益", [
            		new Channel("公益新闻",  "http://gongyi.163.com/special/009344MB/gyxw2.xml"),
            		]
            	),
            	new Category("校园", [
            		new Channel("校园",  "http://daxue.163.com/special/00913J5N/daxuerss.xml"),
            		]
            	),
            	new Category("旅游", [
            		new Channel("头条推荐",  "http://travel.163.com/special/00061K7R/rss_hline.xml"),
            		new Channel("旅游热点",  "http://travel.163.com/special/00061K7R/rss_hotpl.xml"),
            		new Channel("国内旅游",  "http://travel.163.com/special/00061K7R/rss_gnly.xml"),
            		new Channel("出境旅游",  "http://travel.163.com/special/00061K7R/rss_cjly.xml"),
            		new Channel("主题旅游",  "http://travel.163.com/special/00061K7R/rss_ztly.xml"),
            		new Channel("吃喝玩乐",  "http://travel.163.com/special/00061K7R/rss_chwl.xml"),
            		]
            	),
            	new Category("教育", [
            		new Channel("新闻资讯",  "http://edu.163.com/special/002944N7/edunews0126.xml"),
            		new Channel("考试信息",  "http://edu.163.com/special/002944N7/eduexam.xml"),
            		new Channel("校园焦点",  "http://edu.163.com/special/002944N7/educampus.xml"),
            		new Channel("产业新闻",  "http://edu.163.com/special/002944N7/eduindustry.xml"),
            		new Channel("高端访谈",  "http://edu.163.com/special/002944N7/edutalk.xml"),
            		new Channel("青春社区",  "http://edu.163.com/special/002944N7/eduyoung.xml"),
            		]
            	),
            	new Category("论坛", [
            		new Channel("头条",  "http://bbs.163.com/special/001544OQ/bbstop.xml"),
            		new Channel("新闻论坛",  "http://bbs.163.com/special/001544OQ/bbsnewsrss.xml"),
            		new Channel("娱乐论坛",  "http://bbs.163.com/special/001544OQ/bbsentrss.xml"),
            		new Channel("旅游论坛",  "http://bbs.163.com/special/001544OQ/bbstravelrss.xml"),
            		new Channel("体育论坛",  "http://bbs.163.com/special/001544OQ/bbssportsrss.xml"),
            		new Channel("财经论坛",  "http://bbs.163.com/special/001544OQ/bbsmoneyrss.xml"),
            		new Channel("地方论坛",  "http://bbs.163.com/special/001544OQ/bbslocalrss.xml"),
            		new Channel("女人论坛",  "http://bbs.163.com/special/001544OQ/bbsladyrss.xml"),
            		]
            	),
            	new Category("博客", [
            		new Channel("社会",  "http://news.163.com/special/000144P0/blogsh.xml"),
            		new Channel("生活",  "http://news.163.com/special/000144P0/style.xml"),
            		new Channel("历史",  "http://news.163.com/special/000144P0/history.xml"),
            		new Channel("文艺",  "http://news.163.com/special/000144P0/music.xml"),
            		new Channel("读书",  "http://news.163.com/special/000144P0/dushu.xml"),
            		new Channel("明星",  "http://news.163.com/special/000144P0/star.xml"),
            		new Channel("电影",  "http://news.163.com/special/000144P0/movie2.xml"),
            		new Channel("电视",  "http://news.163.com/special/000144P0/dianshi.xml"),
            		new Channel("科学",  "http://news.163.com/special/000144P0/kexue.xml"),
            		new Channel("军事",  "http://news.163.com/special/000144P0/junshi2.xml"),
            		]
            	),
            ];

/**********************************************************************
 * type part
 **********************************************************************/
function Channel ( channel_name, channel_url) {
	this.name = channel_name;
	this.url = channel_url;
	this.newslist = [];
	this.booked = false;
}

function News (url,title, description,time) {
	this.url = url;
	this.title = title;
	this.description = description;
	this.time = time;
}

function Category(name, channels) {
	this.name = name;
	this.channels = channels;
}

function CAT(category_id) {
	if (category_id < 0) {
		alert("cat_id < 0");
		category_id = 0;
	} else if (category_id >= DATA.length) {
		alert("cat_id > DATA.length") ;
		category_id = DATA.length - 1;
	}
	return DATA[category_id];
}
function CHA(category_id, channel_id) {
	var chas = CAT(category_id).channels;
	if (channel_id < 0 || channel_id >= chas.length) {
		alert("channel_id out of range");
		channel_id = 0;
	}
		return chas[channel_id];
}

function NEWS(category_id, channel_id, news_id) {
	var newslist = CHA(category_id, channel_id).newslist;
	if (news_id < 0  || news_id > newslist.length) {
		alert("news_id out of range");
		news_id = 0;
	}
	return newslist[news_id];
}

/**********************************************************************
 * Network part
 * @param xml
 ********************************************************************/
function parseNews(item) {
	var link = item.getElementsByTagName("link")[0].childNodes[0].nodeValue;
	var description = item.getElementsByTagName("description")[0].childNodes[0].nodeValue;
	var title = item.getElementsByTagName("title")[0].childNodes[0].nodeValue;
	var time = item.getElementsByTagName("pubDate")[0].childNodes[0].nodeValue;
	
	var news = new News(link, title, description, time);
	return news;
}

function parseNewslist(xml) {
	var items = xml.getElementsByTagName("item");
	var newslist = [];
	for (var i = 0; i < items.length; i++) {
		newslist.push(parseNews(items[i]));		
	}
	return newslist;
}
	
function openChannel(category_id, channel_id) {
	var url = CHA(category_id, channel_id).url;
	if (CHA(category_id, channel_id).newslist.length > 0) {
		gotoNewsPannel(category_id, channel_id);
		return;
	}
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	   		 //alert(xmlhttp.responseText);
	   		 CHA(category_id, channel_id).newslist = parseNewslist(xmlhttp.responseXML);
	   		gotoNewsPannel(category_id, channel_id);
		}		
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function Weather(data){
	var conditions = $('condition', data);
	var icons = $("icon", data);
	this.curr_condition = conditions[0].getAttribute('data');
	this.curr_temp = $("temp_c", data).attr('data');
	this.curr_humidity = $("humidity", data).attr('data');
	this.curr_icon = "http://www.google.com" + icons[0].getAttribute('data');
	this.wind = $("wind_condition", data).attr('data');
	this.day = $("day_of_week", data).attr('data');
	this.low = $("low", data).attr('data');
	this.high = $("high", data).attr('data');
	this.icon = "http://www.google.com" + icons[1].getAttribute('data');
	this.condition = conditions[1].getAttribute('data');

//	alert(this.curr_condition + "\n" + this.curr_temp + "\n" + this.curr_icon + "\n" + this.wind + "\n" + this.day + "\n" + this.low + "\n" + this.high + "\n" + this.icon + "\n" + this.condition);
}

/***************************************************************************
 * DATABASE
 * @param tx
 ***************************************************************************/
function DB_init(tx) {
	//tx.executeSql("DROP TABLE booked_channel");
	tx.executeSql('CREATE TABLE IF NOT EXISTS booked_channel (cate_id, cha_id, PRIMARY KEY(cate_id, cha_id))');
}
function DB_success() {
	
}
function DB_error(err) {
	//alert("Error processing SQL: "+err.message);
}


function open_database() {
	var db = window.openDatabase("RSS_DB", "1.0", "RSS  DB", 1000000);
	return db;
}


/**
 * when querry success update DATA based on query result. It's be called by getBooked()
 * @param tx
 * @param results
 */
function querySuccess(tx, results) {
	var len = results.rows.length;
	for (var i = 0; i < len; i++)  {
		var cate_id = results.rows.item(i).cate_id;
		var cha_id = results.rows.item(i).cha_id;
		CHA(cate_id, cha_id).booked = true;
	}
}

/**
 * update DATA and database to book a channel
 * @param cate_id
 * @param cha_id
 */
function book_channel(cate_id, cha_id) {
	if (CHA(cate_id, cha_id).booked == true) 
		return ;
	var db = open_database();
	CHA(cate_id, cha_id).booked = true;
	var insert = function (tx) {
		var sql = "INSERT INTO booked_channel (cate_id, cha_id) VALUES(" + cate_id + "," + cha_id +")";
		tx.executeSql(sql);
	};
	//var db = open_database();
	db.transaction(insert, DB_error, DB_success);
}

/**
 * update DATA and the database to unbook a channel
 * @param cate_id
 * @param cha_id
 */
function unbook_channel(cate_id, cha_id) {
	if(CHA(cate_id, cha_id).booked == false )
		return;
	var db = open_database();
	CHA(cate_id, cha_id).booked = false;
	var del = function(tx) {
		var sql = "DELETE FROM booked_channel WHERE cate_id =  " + cate_id +" AND cha_id =" + cha_id;
		tx.executeSql(sql);
	};
	db.transaction(del, DB_error, DB_success);
}

/** 
 * read book channel from database and update the DATA
 */
function getBooked() {
	var db = open_database();
	var DB_init = function(tx) {
		//tx.executeSql("DROP TABLE booked_channel");
		tx.executeSql('CREATE TABLE IF NOT EXISTS booked_channel (cate_id, cha_id, PRIMARY KEY(cate_id, cha_id))');
	}
	db.transaction(DB_init, DB_error, DB_success);
	var queryDB = function (tx) {
		tx.executeSql('SELECT * FROM booked_channel', [], querySuccess, DB_error);
	};
	db.transaction(queryDB, DB_error);	

}

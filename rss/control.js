/*********************************************************************
 * controller: show data model by views.
 ***********************************************************************/
function init() {
	console.log("init...");
	$( document ).delegate("#test", "pageinit", function() {
		test();
	});
}

function loadCategory(){
	var cat_list = document.getElementById("category_list");
	var top = "<li class='ui-li ui-li-divider ui-bar-f ui-corner-top' ></li>";
	var center = "";
	for (var i = 0; i < DATA.length; i++) {
		center += "<li class='list_item ui-li ui-li-static ui-body-c ui-li-has-thumb' onclick='loadChannel("+ i +");'><div class='item_text'><a href='#channelpage' class='ui-link'>" + DATA[i].name + " ...</a></div><img src='img/next.png' class='next_img ui-li-thumb ui-corner-tl'></li>";
	}
	var bottom = "<li class='ui-li ui-li-divider ui-bar-f ui-corner-bottom'></li>";
	cat_list.innerHTML = top + center + bottom;
}

function loadChannel(category_id){
	var cat = CAT(category_id);
	
	var cha_name = document.getElementById("channel_name");
	cha_name.innerHTML = cat.name + " 频道";

	var cha_list = document.getElementById("channel_list");
	//alert(cat.channels.length);
	var top = "<li data-role='list-divider' role='heading' class='ui-li ui-li-divider ui-bar-f ui-corner-top'></li>";
	var center = "";
	for (var i = 0; i < cat.channels.length; i++) {
		center += "<li class='list_item ui-li ui-li-static ui-body-c ui-li-has-thumb' onclick='bookRSS("+category_id+","+i+");'><div class='item_text'><a>"+ cat.channels[i].name + "</a></div><img id='star"+ i +"' src='img/" + (cat.channels[i].booked?"":"dark")+"star.png' class='star_img ui-li-thumb'></li>";
	}
	var bottom = "<li class='ui-li ui-li-divider ui-bar-f ui-corner-bottom'></li>";
	cha_list.innerHTML = top + center + bottom;
}

function bookRSS(cat_id, cha_id){
	CHA(cat_id, cha_id).booked = true;
	var star = document.getElementById("star" + cha_id);
	star.setAttribute("src", "img/star.png");
	//alert("book" + cat_id + "," + cha_id);
	book_channel(cat_id, cha_id);
	unbook_channel(cat_id, cha_id);
	book_channel(cat_id, cha_id);
	loadIndex();
}

function loadIndex(){
	var index_list = document.getElementById("index_list");
	var top = "<li data-role='list-divider' role='heading' class='ui-li ui-li-divider ui-bar-f ui-corner-top'>已订阅的项目</li>";
	var center = "";
	for (var i = 0; i < DATA.length; i++) {
		var cat = CAT(i);
		for(var j = 0; j < cat.channels.length; j++){
			if(cat.channels[j].booked){
				center += "<li class='list_item ui-btn ui-btn-up-c ui-btn-icon-right ui-li-has-arrow ui-li' data-corners='false' data-shadow='false' data-iconshadow='true' data-wrapperels='div' data-icon='arrow-r' data-iconpos='right' data-theme='c'  ><div class='ui-btn-inner ui-li'><div class='ui-btn-text'><a href='#overviewpage' class='booked_text' onclick='openChannel("+ i +","+ j +");'>"+ cat.channels[j].name +"</a> <img src='img/trash.png' class='trash_img' onclick='delRSS("+ i +","+ j +");'> </div><span class='ui-icon ui-icon-arrow-r ui-icon-shadow' >&nbsp;</span></div></li>";
			}
		}
	}
	var bottom = "<li data-role='list-divider' role='heading' class='ui-li ui-li-divider ui-bar-f ui-corner-bottom'></li>";
	index_list.innerHTML = top + center + bottom;
}

function gotoPlace(page){
	//alert(page);
	window.location.href = "index.html"+ page;
}

function delRSS(cat_id, cha_id){
	unbook_channel(cat_id, cha_id);
	loadIndex();
}

function refreshList(){
	CHA(CUR_CATE, CUR_CHAN).newslist = [];
	//alert(CUR_CATE+","+CUR_CHAN);
	openChannel(CUR_CATE, CUR_CHAN);
}

function changeSkin(){
	var cssLink = document.getElementById("cssLink");
	var skin = document.getElementById("skin");
//alert("CUR_STYLE" + CUR_STYLE + " " + cssLink.href);
	if(CUR_STYLE == 0){
		CUR_STYLE = 1;
		skin.setAttribute("src", "img/day.png");
		cssLink.href = "css/themes/default/jquery.mobile-1.1.0.night.css";
//		document.body.style.background = '#cccccc'
	}
	else if(CUR_STYLE == 1){
		CUR_STYLE = 0;
		skin.setAttribute("src", "img/night.png");
		cssLink.href = "css/themes/default/jquery.mobile-1.1.0.css";
//		document.body.style.background = '#fefefe'
	}
}

function gotoNewsPannel(cate_id, chan_id) {
	CUR_CATE = cate_id;
	CUR_CHAN = chan_id;
	
	//get element by id
	var bcha_title = document.getElementById("booked_channel_title");
	bcha_title.innerHTML = CAT(cate_id).name;
	
	var bcha_list = document.getElementById("booked_channel_list");	
	var top = "<li data-role='list-divider' role='heading' class='ui-li ui-li-divider ui-bar-f ui-corner-top'></li>";
	// repaint 
	// alert("goto news Pannel");
	var newslist = CHA(cate_id, chan_id).newslist;
//	alert("there is " + newslist.length + " newses");
	var center = "";
	for (var i  = 0; i < newslist.length; i++) {
		//alert("news" + i +":"  + newslist[i].title + newslist[i].url + newslist[i].time + newslist[i].description);
		center += "<li class='rss_list_item ui-li ui-li-static ui-body-c ui-li-has-thumb'>        <div class='rss_item_text' onclick='loadNews("+ cate_id +","+ chan_id +","+ i +");'> <a href='#newspage' class='ui-link'>"+newslist[i].title +"<br>          "+ newslist[i].time +"</a> </div>        <img src='img/next.png' class='next_img ui-li-thumb'> </li>";
	}
	var bottom = "<li data-role='list-divider' role='heading' class='ui-li ui-li-divider ui-bar-f ui-corner-bottom'></li>";
	bcha_list.innerHTML = top + center + bottom;
}

function loadNews(cat_id, cha_id, news_id){
	var title = document.getElementById("news_title");
	var time = document.getElementById("news_time");
	var desc = document.getElementById("news_desc");
	var url = document.getElementById("news_url");
	var news = NEWS(cat_id, cha_id, news_id);
	title.innerHTML = news.title;
	time.innerHTML = news.time;
	desc.innerHTML = news.description;
	url.innerHTML = "<a href='"+ news.url + "'>继续阅读...</a>";
	//alert("<a href='"+ news.url + "'>继续阅读...</a>");
}


/*****************************************************************/

function weibo(share_title, share_url){
	  var _w = 142 , _h = 32;
	  var param = {
	    url: share_url,
	    type:'4',
	    count:'', /**是否显示分享数，1显示(可选)*/
	    appkey:'', /**您申请的应用appkey,显示分享来源(可选)*/
	    title: share_title, /**分享的文字内容(可选，默认为所在页面的title)*/
	    pic:'', /**分享图片的路径(可选)*/
	    ralateUid:'', /**关联用户的UID，分享微博会@该用户(可选)*/
		language:'zh_cn', /**设置语言，zh_cn|zh_tw(可选)*/
	    rnd:new Date().valueOf()
	  }
	  var temp = [];
	  for( var p in param ){
	    temp.push(p + '=' + encodeURIComponent( param[p] || '' ) )
	  }
	  $('#share').html('<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?' + temp.join('&') + '" width="'+ _w+'" height="'+_h+'"></iframe>')
}

function changeTheme(theme){
	switch(theme){
		case "bluewhite": $('#cssLink').attr('href', 'css/themes/default/theme-bluewhite.min.css'); break;
		case "whiteblack": $('#cssLink').attr('href', 'css/themes/default/theme-whiteblack.min.css'); break;
		case "whiteyellow": $('#cssLink').attr('href', 'css/themes/default/theme-whiteyellow.min.css');break;
		case "yellowblue": $('#cssLink').attr('href', 'css/themes/default/theme-yellowblue.min.css');break;
		default: $('#cssLink').attr('href', 'css/themes/default/jquery.mobile-1.1.0.min.css'); break;
	}
}

function loadNewsPage(item){
	CUR_ITEM_ID = item.id; 
	console.log("CUR_ITEMS_LEN " + CUR_ITEMS.length + " - " + CUR_ITEM_ID);
	$('#news_title').html(item.title);
	$('#news_favor').attr("onclick", "favorNews("+ item.id +");");
	$('#news_time').html(item.updated);
	$('#news_desc').html(item.description);
	if(!DisplayImage) $('#news_desc img').attr('style', 'display:none');
	$('#read_more').attr('style', "display:block");
	$('#news_url').attr("onclick", "showContent("+ item.id +");");
	$('#news_page').attr("href", item.link);
	weibo(item.title, item.link);
}
function fetchContentCallback(data){
	console.log("callback DATA " + data);
	$('#news_desc').html(data);	
	if(!DisplayImage) $('#news_desc img').attr('style', 'display:none');
}
function showContent(itemId){
	console.log(CUR_ITEMS[itemId].feed + CUR_ITEMS[itemId].link);
	fetchContent(CUR_ITEMS[itemId], fetchContentCallback);
	$('#read_more').attr('style', "display:none");
}

function loadFeedItems(url, successFunction, failFunction) {
	jQuery.getFeed({
        url: proxiedUrl(url),
        success: function(feed){
        	successFunction(feed);
        },
        failure: failFunction
    });
}
function itemsOK(feed){
	if (feed != undefined && feed.items){
		console.log(feed.items.length);
		$("#channel_list").html("");
		
		CUR_ITEMS = new Array();
		console.log("CUR_FEED " + CUR_FEED.id);
		
		openFeedDir(CUR_FEED.id);
		
		for(var iItemId=0; iItemId<feed.items.length; iItemId++){
			var item = feed.items[iItemId];
			var title = (item.title!=undefined && item.title) ? item.title : "";
			var link = (item.link!=undefined && item.link) ? item.link : "";
			var date = (item.updated!=undefined && item.updated) ? item.updated : "";
			var desc = (item.description!=undefined && item.description) ? item.description : "";
//			console.log(iItemId + " ,'" + title + "','" + link + "','" + date +"');\">");
			console.log("loadNewsPage(CUR_ITEMS["+ iItemId +"]);");
			$("#channel_list").append(
				"<li><a href='#newspage' onclick=\"loadNewsPage(CUR_ITEMS[" + iItemId +"]);\"><h3>"
				+ title + "</h3><p>"+ date +"</p>"
				+ "<a href='#' onclick=\"favorNews("+ iItemId +");\"/></a></li>");
			
			CUR_ITEMS[iItemId] = new Item(title, CUR_FEED.id, date, desc, iItemId, link);
		}
		console.log(CUR_ITEMS.length);
		console.log(CUR_ITEMS[0].description);
		$("#channel_list").listview("refresh");
	}
}
function itemsBad(){console.log('获取RSS失败，请检查网络连接情况');}

function refreshFeedItems(){
	loadFeedItems(CUR_URL, itemsOK, itemsBad);
}

function loadOverviewPage(feedTitle, feedUrl, feedId){
	console.log(feedTitle + " " + feedUrl + " " + feedId);
	$('.channel_title').html(feedTitle);
	
	$("#unbook").attr('onclick', "unbookFeed("+ feedId +");feedOK();");	// console.log($("#unbook").attr('onclick'));
	
//	setTimeout(function(){
////		if($("#channel_list").children().length == 0)
//			$("#channel_list").html("<li><a><img src='img/loading.gif'/><h3> 载入中...</h3></a></li>").listview('refresh');
//	}, 100);
	
	CUR_FEED = new Feed(feedTitle, feedUrl, "", "", feedId);
	CUR_URL = feedUrl;
	console.log(CUR_URL);
	loadFeedItems(feedUrl, itemsOK, itemsBad);
}
function feedOK(feed, url){
	//console.log(feed.title +","+ feed.link + "," + url);
	$(".DBFeed").remove();
	readFeeds(loadIndexPage); 
}
function feedBad(){
	gotoPlace("#FailPage");
}
function addFeed(){
	addNewFeed($("#feed_url").val(), feedOK, feedBad);
}

function loadIndexPage(feedRows){
	//console.log(feedRows.length);
	for(var i=0; i<feedRows.length; i++){
		var feed = feedRows.item(i);
		console.log(feed.id + " " + feed.title + " " + feed.link + " " + 
				feed.description + " " + feed.category_id + " " + feed.booked);
		console.log("onclick=\"loadOverviewPage('"+ feed.title + "','" + feed.link +"',"+ feed.id +");\"")
		if(feed.booked == "true"){
			$("#index_list").append(
					"<li class='DBFeed'><a href='#overviewpage' onclick=\"loadOverviewPage('"+ feed.title + "','" + feed.link +"',"+ feed.id +");\">"
					+ feed.title +"</a></li>"); //"+ feed.link +"
		}
	}
	$("#index_list").listview('refresh'); //it works!
}

function loadOptionPage(){
	$("#load_pic").bind('change', function(event) {
		DisplayImage = ($("#load_pic").val() == "on");
		saveConfig("DisplayImage", DisplayImage ? "true":"false");
	});
	$("#use_proxy").bind('change', function(event) {
		UseProxy = ($("#use_proxy").val() == "on");
		saveConfig("UseProxy", UseProxy ? "true":"false");
		ProxyUrl = $("#http_proxy").val();
		ProxyPort = $("#port").val();
		saveConfig("ProxyUrl", ProxyUrl);
		saveConfig("ProxyPort", ProxyPort);
	});
	$("[name=radio-choice-1]").bind('change', function(event) {
		Theme = $("[name=radio-choice-1]:checked").val();
		changeTheme(Theme);
		saveConfig("Theme", Theme);
	});
}

function defaultConfig(){
	DisplayImage = true;
	UseProxy = false;
	ProxyUrl = "http://";
	ProxyPort = "80";
	City = "Beijing";
	Theme = "default";
	saveConfig("City", City);
	saveConfig("Theme", Theme);
	$("#load_pic").val(DisplayImage ? "on":"off").change(); 	//saveConfig("DisplayImage", DisplayImage ? "true":"false");
	$("#use_proxy").val(UseProxy ? "on":"off").change(); //saveConfig("UseProxy", UseProxy ? "true":"false");
	$("#http_proxy").attr('value', ProxyUrl);
	$("#port").attr('value', ProxyPort);
	$('#city').attr('value', City);
	changeTheme(Theme);
}

function clearCache(){
	// TODO
	alert("已清空缓存.");
}

function refreshWeather(){
	City=$('#city').attr('value');
	alert(City + " 天气已更新");
	saveConfig("City", City);
	getWeather();
}

function setConfigs(key, value){
	switch(key){
		case "DisplayImage": 
			DisplayImage = (value=="true"); 
			$("#load_pic").val(DisplayImage?"on":"off").change();
			break;
		case "UseProxy": 
			UseProxy = (value=="true");
			$("#use_proxy").val(UseProxy?"on":"off").change();
			break;
		case "ProxyUrl": 
			ProxyUrl = value; 
			if(UseProxy) $("#http_proxy").attr('value', ProxyUrl);
			break;
		case "ProxyPort": 
			ProxyPort = value; 
			if(UseProxy) $("#port").attr('value', ProxyPort);
			break;
		case "City": 
			City = value; 
			$('#city').attr('value', City);
			break;
		case "Theme": 
			Theme = value; 
			changeTheme(value);
			break;
	}
	console.log("DB config " + key +" , " + value);
}

function onDeviceReady(){
	console.log("deviceReady...");
	openDatabse();

	console.log("start config...");
	readConfig(setConfigs);
	
	setTimeout("getWeather()", 1500);
	setTimeout("loadOptionPage()", 2000);
	
	readFeeds(loadIndexPage);
	
}

function track(){
	//saveFeed({title:"title", link:"link1", description:"description", category_id: 1, booked:true});
}

function recommandFeed(feedUrl){
	bookFeed(feedUrl);
	addNewFeed(feedUrl, feedOK, feedBad);
}

function favorNews(itemId){
	var len = FAVOR_ITEMS.length;
	FAVOR_ITEMS[len] = new Item( CUR_ITEMS[itemId].title, CUR_ITEMS[itemId].feed, CUR_ITEMS[itemId].updated, CUR_ITEMS[itemId].description, CUR_ITEMS[itemId].id, CUR_ITEMS[itemId].link);
	alert(FAVOR_ITEMS[len].title + " 已添加至收藏列表")
	console.log("FAVOR_LEN"+ FAVOR_ITEMS.length);
}
function delFavorNews(itemId){
	if(Array.prototype.remove == undefined){
		Array.prototype.remove = function(dx)
		　{
		　　if(isNaN(dx)||dx>this.length){return false;}
		　　this.splice(dx,1);
		　}
	}
	FAVOR_ITEMS.remove(itemId);
	loadFavorPage();
}

function loadFavorPage(){
	$("#favor_list").html("");
	for(var i=0; i<FAVOR_ITEMS.length; i++){
		$("#favor_list").append(
				"<li><a href='#newspage' onclick=\"loadNewsPage(FAVOR_ITEMS[" + i 
				+"]); $('#read_more').attr('style', 'display:none'); $('.channel_title').html('我的收藏');\"><h3>"
				+ FAVOR_ITEMS[i].title + "</h3><p>"+ FAVOR_ITEMS[i].updated +"</p>"
				+ "<a href='#' onclick=\"delFavorNews("+ i +");\"/></a></li>");
	}
	$("#favor_list").listview("refresh");
}

function Feed(title, link, description, updated, id) {
	this.title = title;
	this.link = link;
	this.description = description;
//    this.language = language;
	this.updated = updated;
//	this.items = items;
	this.id = id;
}

function Item(title, feed, updated, description, id, link) {
	this.title = title;
	this.feed = feed;
	this.updated = updated;
	this.link = link;
	this.id = id;
	this.description = description;
	this.content = "";
//	this.image = "";
}

/**
 * handle a url base on whether to use proxy
 * 	if true: return the translated url 
 * 	else:return the original url directly 
 * @param url
 * @returns
 */
function proxiedUrl(url) {
	if (UseProxy) {
		url = ProxyUrl + ":" + ProxyPort + "/" + escape(url);
	}
	return url;
}

/**
 * input a page raw html return the content and images as a string.
 */
function parseContent(rawHtml) {
	var paragraphs = $(rawHtml).find('p');
	var parents = [];
	for ( var i = 0; i < paragraphs.length; i++) {
		var parent = paragraphs[i].parentElement;
		var inset = false;
		for ( var j = 0; j < parents.length; j++) {
			if (parents[j].parent.isSameNode(parent)) {
				parents[j].count++
				inset = true;
				break;
			}
		}
		if (!inset)
			parents.push({
				"parent" : parent,
				"count" : 1
			});

	}
	var contentParent = "";
	var maxcount = 0;
	for ( var i = 0; i < parents.length; i++) {
//		console.log(parents[i].count);
		if (parents[i].count > maxcount) {
			maxcount = parents[i].count;
			contentParent = parents[i].parent;
		}
	}

	var content = "";
	var contentElements =  $("p, img", $(contentParent));
	for (var i = 0; i < contentElements.length; i++) {
		content += contentElements[i].outerHTML;
	}
	return content;
}


function contentFileName(item) {
	return RootDirName + "/" + item.feed + "/" + strhash(item.link) + ".txt";
}
/**
 * fetch a item's html from the internet and parse its content, store it to file and call 
 * callback function to hanle the content.
 * @param url
 * @param callback :GUI handler 
 */
/*
function fetchContent(item, callback) {
	$.get(proxiedUrl(item.link), function(data){
		var content = parseContent(data);
		callback(content);
	});
}

*/

function fetchContent(item, callback) {
	console.log("in fetchContent");
	var filePath = contentFileName(item);
	console.log("item link and file name" + item.link + filePath);
	readFile(filePath, function(text) {
		console.log(text);
		if (text == "" || text == null || text == undefined) {
			$.get(proxiedUrl(item.link), function (data) {
				var content = parseContent(data);
				callback(content);
				writeFile(filePath, content);
			});
		} else {
			callback(text);
		}
	});
}

function getWeather() {
    $.get("http://www.google.com/ig/api?hl=zh-cn&weather=" + City, function (data) {
    	weather = new Weather(data);
//	$('#test_output').html(weather.curr_condition + "<br />" +
//						weather.curr_temp + "<br />" +
//						weather.curr_humidity + "<br />" +
//						"<img src='" +weather.curr_icon+"'/><br />" +
//						weather.wind + "<br />" +
//						weather.day + "<br />" +
//						weather.low + "<br />" +
//						weather.high + "<br />" +
//						"<img src='" +weather.icon+"'/><br />" +
//						weather.condition);
    	$("#weather_icon").attr("src", weather.icon);
    	$("#weather_detail").html(weather.day + " "+weather.curr_temp + "&deg<br />" + weather.condition);
    });
}
/**
 * add a new feed and save it to database.
 * @param url: the feed's url.
 */
function addNewFeed(url, successFunction, failFunction) {
	jQuery.getFeed({
        url: proxiedUrl(url),
        success: function(feed) {
        	saveFeed(feed, url);
        	successFunction(feed, url);
        	
//        	writeItems( ,feed.items); // DEBUG/CordovaLog(18825): Uncaught TypeError: Cannot read property 'length' of undefined
        },
        failure: failFunction
    });
}

/**
 * get a channel item list file name;
 * @param channel_id
 * @returns {String}
 */
function itemsFileName(channel_id) {
	return RootDirName + "/" + channel_id + "/" + channel_id + ".txt";
}

/**
 * read items form file, use call back to handle items list;
 * @param channel_id
 * @param callback: items hanndler
 */
function readItemsFromFile(channel_id, callback) {
	readFile(itemsFileName(channel_id), function(text) {
		var lines = text.split("\n");
		var items = [];
		for (var i = 0; i < lines.length; i++) {
			var item = new Object();
			var splits = lines[i].split("##");
			item.title = splits[0];
			item.updated = splits[1];
			item.description = splits[2];
			item.link = splits[3];
			items.push(item);
		}
		callback(items);
	});
}

/**
 * write items to file.
 * it's not safe because it will cover the old items in the file
 * @param channel_id
 * @param items
 */
function writeItems(channel_id, items) {
	var fileName = itemsFileName(channel_id);
	sitems = "";
	for (var i = 0; i < items.length; i++) {
		sitems += items[i].title + "##" + items[i].updated + "##" + 
			items[i].descripiton + "##" + items[i].description + "##" + items[i].link;
	}
	writeFile(fileName, sitems);
}

/**
 * save items to file in a safe way. old value will be reserved.
 * @param channel_id
 * @param items
 */
function saveItems(channel_id, items) {
	readItemsFromFile(channel_id, function(old_items){
		var newItems = items.concat(old_items);
		writeItems(channel_id, newItems);
	});
}





function test_parseContent() {
	$.get("http://news.sina.com.cn/c/2012-07-25/035824838124.shtml", function (data) {
		alert(parseContent(data));
		var content = parseContent(data);
		$("#test_output").html(content);
		$("#test_output").hide("img");//"<iframe src='file:///mnt/sdcard/content.html'><iframe>");
		//writeFile("content.html", "<html><body>" + parseContent(data) + "</body></html>");
	});
	
}

function test() {
	//test_database();
	fetchContent("http://news.163.com/12/0726/19/87C3HT1M0001124J.html", alert);
}

/**
 * set global variable Databse. this should be called when device is ready.
 */
function openDatabse() {
	DataBase = window.openDatabase(DatabaseName, "1.0", DatabaseName, DatabaseSize);
	console.log("open database");
	DataBase.transaction (createTables, dbError);
}

/**
 * when application first run, set up the tables
 * @param tx
 * @returns
 */
function createTables (tx) {
	tx.executeSql('CREATE TABLE IF NOT EXISTS config (key TEXT PRIMARY KEY, value TEXT)');
    tx.executeSql ('CREATE TABLE IF NOT EXISTS category (id INTEGER PRIMARY ' +
		   'KEY, name TEXT UNIQUE)');
    tx.executeSql ('CREATE TABLE IF NOT EXISTS feed (id INTEGER PRIMARY KEY ' +
		   ', title TEXT, link TEXT UNIQUE, description TEXT '+
		   ', category_id INTEGER, booked TEXT)');
    
    
    /*tx.executeSql ('CREATE TABLE IF NOT EXISTS item (id INTEGER PRIMARY KEY' +
		   ', title TEXT, link TEXT UNIQUE, content TEXT, images TEXT'+
		   ', channel_id INTEGER, FOREIGN KEY (channel_id) REFERENCES channel '+
		   '(id))');
    tx.executeSql ('CREATE TEMP TABLE IF NOT EXISTS ' +
		   'tmp_item (id INTEGER PRIMARY KEY' +
		   ', title TEXT, link TEXT UNIQUE, content TEXT, images TEXT'+
		   ', channel_id INTEGER, FOREIGN KEY (channel_id) REFERENCES channel '+
		   '(id))');*/
    
}


function doNothing() {}

function dbError(err) {
	console.log("DB error:" + err.code + err.message);
}

/**
 * read config from config table. config is stored with a key-value pair format
 * @param key: the config key.
 * @param setConfigFunction: a function handle key and value to set the global config variables.
 * @returns
 */
function readConfig(setConfigFunction) {
	DataBase.transaction(function (tx) {
		tx.executeSql('SELECT * FROM config', [], function (tx, results) {
		var len = results.rows.length;
		console.log("select " + len + " results when readConfig.");
		for (var i = 0; i < len; i++) {
			var key = results.rows.item(i).key;
			var value = results.rows.item(i).value;
			setConfigFunction(key, value);
		}
	}, dbError);}, dbError);
}

/**
 * save the config to the config table
 * @param key
 * @param value
 * @returns
 */
function saveConfig(key, value) {
	var insert = function() {
		DataBase.transaction(function(tx) {
			var insertsql = "INSERT INTO config values('" + key + "', '" + value + "')";
			console.log(insertsql);
			tx.executeSql(insertsql);
		}, dbError, doNothing);
	};
	var update = function () {
		DataBase.transaction(function(tx) {
		var updatesql = "update config set value = '" + value + "' where key = '" + key + "'";
		console.log(updatesql);
		tx.executeSql(updatesql);
		}, dbError, doNothing);
	};
	DataBase.transaction(function(tx){
		tx.executeSql("SELECT * FROM config where key = '" + key + "'", [] , function(tx, result){
			console.log("in saveConfig: select itmes" + result.rows.length);
			if (result.rows.length == 0)
				insert();
			else
				update();
		});
	}, [], update, insert);
}

/**
 * read all feeds from the database
 * @param callBackfunction
 * @returns
 */
function readFeeds(callBackfunction) {
	console.log("read reed");
	DataBase.transaction( function (tx) {
		tx.executeSql("select * from feed",[], function(tx, results) {
			var len = results.rows.length;
			console.log("feed talbes contains "+len+" items");
			callBackfunction(results.rows);
			
/*			for(var i = 0; i < len; i++) {
				console.log("get a feed");
				callBackfunction(results.rows.item(i));
			} */
		});
	}, dbError);
}


/**
 * book a feed: set its booked attribute true
 * @param feedUrl
 * @returns
 */
function bookFeed(feedUrl) {
	DataBase.transaction( function (tx) {
		tx.executeSql("update feed set booked = 'true' where link = '"+ feedUrl +"'");
	}, dbError);
}

/**
 * unbook a feed: set its booked attribute false
 * @param feedId
 * @returns
 */
function unbookFeed(feedId) {
	DataBase.transaction(function (tx) {
		tx.executeSql("update feed set booked = 'false' where id = " + feedId);
	}, dbError);
}

/**
 * save a feed to database.
 * @param feed
 * @returns
 */
function saveFeed(feed, url) {
	DataBase.transaction(function(tx) {
		var sql;
		if (feed.category_id == undefined) feed.category_id = 0;
		if (feed.booked == undefined) feed.booked = true;
		sql = "insert into feed values(null, '" + feed.title + "', '" + url +"', '" 
		+ feed.description + "', " +  feed.category_id+ ", '" + feed.booked + "')";
		console.log(sql);
		tx.executeSql(sql);
	}, dbError, doNothing);
}


function test_database() {
	console.log("test database.");
	saveConfig('k1', 'v1');
	saveConfig('k1', 'v1');
	saveConfig('k2', 'v2');
	saveConfig('new', 'v3');
	readConfig(function (key, value) {
		console.log(key + ":"+ value);
	});
	
	
	/*saveFeed({title:"title", link:"link111", description:"description", category_id: 1, booked:true});
	saveFeed({title:"title2", link:"link12121", description:"description2", category_id: 2, booked:false});
	
	console.log("start to read feeds");
	readFeeds(function (feed) {
		console.log("handle read feed");
		console.log(feed.id + feed.link)
	});*/
}
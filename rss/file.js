function fileError(evt) {
	console.log("file error...");
}


/**
 * translate the news title to a usable file name
 * @param str
 * @returns {String}
 */
function strhash( str ) {
    if (str.length % 32 > 0) str += Array(33 - str.length % 32).join("z");
    var hash = '', bytes = [], i = j = k = a = 0, dict = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','1','2','3','4','5','6','7','8','9'];
    for (i = 0; i < str.length; i++ ) {
        ch = str.charCodeAt(i);
        bytes[j++] = (ch < 127) ? ch & 0xFF : 127;
    }
    var chunk_len = Math.ceil(bytes.length / 32);   
    for (i=0; i<bytes.length; i++) {
        j += bytes[i];
        k++;
        if ((k == chunk_len) || (i == bytes.length-1)) {
            a = Math.floor( j / k );
            if (a < 32)
                hash += '0';
            else if (a > 126)
                hash += 'z';
            else
                hash += dict[  Math.floor( (a-32) / 2.76) ];
            j = k = 0;
        }
    }
    return hash;
}

/**
 * read a file content to use callbackFunction to handle
 */
function readFile(filePath, callbackFunction) {
	window.requestFileSystem(LocalFileSystem.PERSISTENT, 0, function(fileSystem) {
	fileSystem.root.getFile(filePath, {create: true}, function(fileEntry){
			fileEntry.file(function(file){
				var reader = new FileReader();
				reader.onloadend = function(evt) {
					console.log("read text.");
					console.log(evt.target.result);
					callbackFunction(evt.target.result);
				};
				reader.readAsText(file);
			}, fileError);
		}, fileError);
	}, fileError);
}

/**
 * write text to file
 */
function writeFile(filePath, text) {
	window.requestFileSystem(LocalFileSystem.PERSISTENT, {create: true}, function(fileSystem) {
		fileSystem.root.getFile(filePath, {create: true, exclusive: false}, function(fileEntry) {
			fileEntry.createWriter(function(writer) {
		        writer.write(text);
			}, fileError);
		}, fileError);
	}, fileError);
}


/**
 * open a feed dir and if not exist, create it.
 * @param feed_id
 */
function openFeedDir(feed_id) {
	var gotFS = function (fileSystem) {
		fileSystem.root.getDirectory(RootDirName, {create: true}, function(appRootDir) {
			appRootDir.getDirectory("" + feed_id, {create: true});
		});
		};
	window.requestFileSystem(LocalFileSystem.PERSISTENT, 0, gotFS);
}

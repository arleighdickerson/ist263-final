function getJsonFromUrl() {
	var query = location.search.substr(1);
	return _(query).chain().words("&").foldl(function(kv, part) {
		var item = part.split("=");
		kv[item[0]] = decodeURIComponent(item[1]);
		return kv;
	}, {})._wrapped;
}

function invokeAjax(url, callback) {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState === 4) {
			return callback(JSON.parse(ajax.responseText));
		}
	};
	ajax.open("GET", url, true);
	return ajax.send(null);
}

function find(modelClass, callback) {
	var url = "index.php?r=ajax/" + modelClass;
	return invokeAjax(url, callback);
}

function findOne(modelClass, id, callback) {
	var url = "index.php?r=ajax/" + modelClass + "&id=" + id;
	return invokeAjax(url, function(res) {
		for ( var e in res) {// derp
			callback(res[e]);
			break;
		}
	});
}

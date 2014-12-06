/**
 * Sets topbar elements active based on current url
 */

(function() {
	function endsWith(str, suffix) {
		return str.indexOf(suffix, str.length - suffix.length) !== -1;
	}

	var lis = document.getElementById("topbar").getElementsByTagName("li");
	_.forEach(lis, function(li) {
		_.forEach(li.getElementsByTagName("a"), function(a) {
			var href = a.getAttribute("href");
			if (href !== null && endsWith(document.URL, href)) {
				a.parentNode.className = "active";
			}
		});
	});
}.call(this));
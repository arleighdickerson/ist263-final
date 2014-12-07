/**
 * Sets topbar elements active based on current url
 */

(function() {
	function activate() {
		_(document.getElementById("topbar").getElementsByTagName("li"))
				.forEach(function(li) {
					_(li.getElementsByTagName("a")).forEach(function(a) {
						var href = a.getAttribute("href");
						if (href !== null && _(document.URL).endsWith(href)) {
							a.parentNode.className = "active";
						}
					});
				});
	}
	function addLocations(locations) {
		_(document.getElementById("topbar").getElementsByTagName("a"))
				.chain()
				.filter(function(elem) {
					return elem.innerHTML == "SERVICES";
				})
				.map(function(elem) {
					elem.innerHTML += " <b class='caret'></b>"
					return elem.parentNode.children[1];
				})
				.forEach(
						function(ul) {
							_(locations)
									.chain()
									.forEach(
											function(location,id) {
												var url = "index.php?r=front/services&locationId="
														+ id.toString();
												var aHref = document
														.createElement("a");
												aHref.setAttribute("href", url);
												aHref.innerHTML = location.label;

												var li = document
														.createElement("li");
												li.appendChild(aHref);
												ul.appendChild(li);
											})
						});
	}
	function setVisible(elem, visible) {
		var cls = "hide";
		words = _(elem.className).chain().words(" ").filter(function(word) {
			return word != cls;
		})._wrapped;
		if (!visible) {
			words.push(cls);
		}
		elem.className = words.join(" ");
	}

	function setFooterAddress(model) {
		var loading = document.getElementById("footer-address-loading");
		var p = document.getElementById("footer-address-location");
		var hline = document.getElementById("footer-address-hline");

		var header = document.getElementById("footer-address-header");
		var a = document.createElement("a");
		a.setAttribute("href", "index.php?r=front/services&locationId="
				+ model.id.toString());
		a.innerHTML = "Closest Location";
		header.appendChild(a);

		var html = model.street + "<br /> " + model.city + " " + model.state
				+ "<br /> ";
		p.innerHTML = html;

		setVisible(loading, false);
		setVisible(header, true);
		setVisible(hline, true);
		setVisible(p, true);

	}

	function setRandomFooterAddress(locations) {
		var location = locations[Math.floor(Math.random() * locations.length)];
		console.debug(location.id);
		setFooterAddress(location);
	}
	function main(locations){
		console.debug(locations);
		activate();
		addLocations(locations);
		setRandomFooterAddress(locations);
	}
	$(window).load(function() {
		find("location", main);
	});
}.call(this));
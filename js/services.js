/**
 * We are sending redundant model serializations over the wire. Don't do that in
 * real life, use flyweights.
 */
(function() {
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
	function moneyFormat(cashMoney) {
		return "$" + cashMoney.toFixed(2);
	}
	function makeRow(k, v) {
		tr = document.createElement("tr");

		tdk = document.createElement("td");
		tdk.innerHTML = k;

		tdv = document.createElement("td");
		tdv.innerHTML = moneyFormat(v);

		tr.appendChild(tdk);
		tr.appendChild(tdv);
		return tr;
	}
	function setGasPrices(model) {
		var loading = document.getElementById("gasoline-prices-loading");
		var table = document.getElementById("gasoline-prices-table");
		var hline = document.getElementById("gasoline-prices-hline");

		_(model.gasoline).forEach(function(v, k) {
			table.appendChild(makeRow(k, v));
		});

		setVisible(loading, false);
		setVisible(hline, true);
		setVisible(table, true);
	}
	function setItemPrices(model) {
		var loading = document.getElementById("item-prices-loading");
		var table = document.getElementById("item-prices-table");
		var hline = document.getElementById("item-prices-hline");

		_(model.items).forEach(function(item) {
			table.appendChild(makeRow(item.label, item.price));
		});

		setVisible(loading, false);
		setVisible(hline, true);
		setVisible(table, true);
	}

	function setAddress(model) {
		var loading = document.getElementById("address-loading");
		var p = document.getElementById("address-location");
		var hline = document.getElementById("address-hline");

		var html = model.street + "<br /> " + model.city + " " + model.state
				+ "<br /> ";
		p.innerHTML = html;

		setVisible(loading, false);
		setVisible(hline, true);
		setVisible(p, true);

	}

	function setHeader(model) {
		document.getElementById("location-header").innerHTML = model.label;
	}
	function modelSelected(model) {
		console.debug("  iii ")
		console.debug(model);
		setHeader(model);
		setAddress(model);
		setGasPrices(model);
		setItemPrices(model);
	}

	$(document).ready(function() {
		var params = getJsonFromUrl();
		findOne("location", params.locationId, modelSelected);
	});
}).call(this);

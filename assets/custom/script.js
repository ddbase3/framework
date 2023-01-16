$(function() {

	$('.head > li > a.headbtn-sub').on("click", function(e) {
		e.preventDefault();
		var pa = $(this).parent();
		var activate = !pa.hasClass('headactive');
		$('.head li').removeClass('headactive');
		if (activate) {
			pa.addClass('headactive');
			var ajaxload = $(this).attr("rel");
			if (ajaxload) {
				$(this).removeAttr("rel");
				var c = $(this).next("div");
				c.append('<div class="loader"></div>');
				c.load(ajaxload);
			}
		}
	});

});


var searchFns = {
	"link": function(da) {
		location.href = da;
	},
	"extern": function(da) {
		window.open(da);
	}
};

$(function() {

	$('input[name="q"]').on('keyup', function() {
		var q = $(this).val();
		var elresult = $('.searchresult');
		elresult.html('');
		$.getJSON('customsearchprovider.json', { q: q }, function(res) {
			for (var i in res) {
				var e = res[i];
				var a = $('<a class="result" href="#" data-fn="' + e.fn + '" data-da="' + e.da + '" data-ty="' + e.ty + '" data-sv="' + e.sv + '" data-qu="' + e.qu + '"></a>').appendTo(elresult);
				$('<span class="l0">' + e.l0 + '</span>').appendTo(a);
				$('<span class="l1">' + e.l1 + '</span>').appendTo(a);
				a.on('click', function(e) {
					e.preventDefault();
					var fn = $(this).attr('data-fn');
					var da = $(this).attr('data-da');
					searchFns[fn](da);
				});
			}
		});
	});

	$('.errorbox, .warningbox, .hintbox, .infobox, .successbox').css("cursor", "pointer").on("click", function() { $(this).toggleClass("opened"); });

	var cntMaps = 0;
	$(".map").each(function() {

		var id = "mapaddresses" + (cntMaps++);

		var obj = $(this);
		obj.css({ "position": "relative" });
		var div = $('<div id="' + id + '"></div>')
			.css({ "position": "absolute", "z-index": 10, "left": 0, "top": 0, "width": "100%", "height": "100%", "border": "1px solid #666" })
			.appendTo(obj);

		var mymap = L.map(id);
		L.control.scale().addTo(mymap);

		var mapBoxApiKey = 'pk.eyJ1IjoiYmFzZTMiLCJhIjoiY2pwbTZuNGNpMDh4ejQycnQ4Z2twd3ZjMCJ9.08zb7KJxRc1Xuc0FeIDABQ';
		var cycleApiKey = '0006d16b868e45568f033290584ff8d4';
		var weatherApiKey = '27673815c2d7598a418680f98e6ae73c';

		var attrOsm = '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>';

		var mapboxUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={apikey}';
		var mapboxAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
		var osmUrl = 'https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png';
		var osmAttr = attrOsm + ' contributors';
		var esriUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
		var esriAttr = 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community';
		var topoUrl = 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png';
		var topoAttr = 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)';
		var geoUrl = 'https://korona.geog.uni-heidelberg.de/tiles/{variant}/x={x}&y={y}&z={z}';
		var geoAttr = 'Imagery from <a href="http://giscience.uni-hd.de/">GIScience Research Group @ University of Heidelberg</a> &mdash; Map data ' + attrOsm;
		var oceanUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/Ocean_Basemap/MapServer/tile/{z}/{y}/{x}';
		var oceanAttr = 'Tiles &copy; Esri &mdash; Sources: GEBCO, NOAA, CHS, OSU, UNH, CSUMB, National Geographic, DeLorme, NAVTEQ, and Esri';
		var natgeoUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
		var natgeoAttr = 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC';
		var reliefUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}';
		var reliefAttr = 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community';
		var cycleUrl = 'https://{s}.tile.thunderforest.com/{variant}/{z}/{x}/{y}.png?apikey={apikey}';
		var cycleAttr = '&copy; <a href="http://www.thunderforest.com/">Thunderforest</a>, ' + attrOsm;
		var weatherUrl = 'https://{s}.tile.openweathermap.org/map/{variant}/{z}/{x}/{y}.png?appid={apikey}';
		var weatherAttr = 'Map data &copy; <a href="http://openweathermap.org">OpenWeatherMap</a>';
		var simpleUrl = 'https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png';
		var simpleAttr = "&copy; <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a>, &copy;<a href=\"https://carto.com/attribution\">CARTO</a>";

		var baseLayers = $.extend({}, baseLayers, {
			// "Streets": L.tileLayer(mapboxUrl, { maxZoom: 18, id: 'mapbox.streets', attribution: mapboxAttr, apikey: mapBoxApiKey }),
			// "Grayscale": L.tileLayer(mapboxUrl, { maxZoom: 18, id: 'mapbox.light', attribution: mapboxAttr, apikey: mapBoxApiKey }),
			"Basic": L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttr }),
			"Satellite": L.tileLayer(esriUrl, { attribution: esriAttr }),
			"NatGeo": L.tileLayer(natgeoUrl, { maxZoom: 16, attribution: natgeoAttr }),
			"Topologic": L.tileLayer(topoUrl, { maxZoom: 17, attribution: topoAttr }),
			// "Geologic": L.tileLayer(geoUrl, { maxZoom: 20, variant: 'roads', attribution: geoAttr }),
			// "Ocean": L.tileLayer(oceanUrl, { maxZoom: 13, attribution: oceanAttr }),
			// "Relief": L.tileLayer(reliefUrl, { attribution: reliefAttr }),
			"Cycle": L.tileLayer(cycleUrl, { maxZoom: 22, variant: 'cycle', attribution: cycleAttr, apikey: cycleApiKey }),
			"Simple": L.tileLayer(simpleUrl, { maxZoom: 18, attribution: simpleAttr }),
// Karte "HERE": traffic
		});
		var overlays = $.extend({}, overlays, {
/*
			"Temperature": L.tileLayer(weatherUrl, { maxZoom: 19, opacity: 0.5, variant: 'temp', attribution: weatherAttr, apikey: weatherApiKey }),
			"Wind": L.tileLayer(weatherUrl, { maxZoom: 19, opacity: 0.5, variant: 'wind', attribution: weatherAttr, apikey: weatherApiKey }),
			"Clouds": L.tileLayer(weatherUrl, { maxZoom: 19, opacity: 0.5, variant: 'clouds', attribution: weatherAttr, apikey: weatherApiKey }),
			"Precipitation": L.tileLayer(weatherUrl, { maxZoom: 19, opacity: 0.5, variant: 'precipitation', attribution: weatherAttr, apikey: weatherApiKey })
*/
		});

		var lls = [];
		var layerName = 'Places';
		overlays[layerName] = L.layerGroup([]).addTo(mymap);
		$('ul a[data-lat][data-lng]', obj).each(function() {
			var place = $(this).text();
			var href = $(this).attr('href');
			var lat = parseFloat($(this).attr('data-lat'));
			var lng = parseFloat($(this).attr('data-lng'));
			var content = '<a href="' + href + '">' + place + '</span>';
			var m = L.marker([lat, lng]);
			m.addTo(overlays[layerName]).bindPopup(content);
			lls.push(m.getLatLng());
		});

		baseLayers.Basic.addTo(mymap);	// additional overlay possible
		var layersControl = L.control.layers(baseLayers, overlays).addTo(mymap);


		if (lls.length) {
			var bounds = L.latLngBounds(lls);
			mymap.fitBounds(bounds, { padding: [50, 50] });
		} else {
			mymap.setView([53.8, 9.5], 7);
		}

		// TODO Karte auf basis von links mit data-lat/lng aufbauen
	});

});

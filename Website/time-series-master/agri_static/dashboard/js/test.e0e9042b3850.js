/**
 * Convert GeoJSON to SVG
 */
AmCharts.parseGeoJSON = function(geojson, fieldMap) {

	// init field map
	if (typeof(fieldMap) !== "object")
		fieldMap = {};

	// init calibration
	var bounds = {
		"left": -180,
		"bottom": -90,
		"right": 180,
		"top": 90
	}; 

	var bounds = {
		"left": -180,
		"bottom": -90,
		"right": 180,
		"top": 90
	}; 


	// init empty map
	var mapVar = {
		"svg": {
			"defs": {
				"amcharts:ammap": {
					"projection":"mercator",
					"leftLongitude":"-180",
					"topLatitude":"90",
					"rightLongitude":"180",
					"bottomLatitude":"-90"
				}
			},

			"g":{
				"path":[]
			}
		}
	};


	// convert GeoJSON to SVG paths
	var converter = geojson2svg({
		"output": "svg",
		"explode": false,
		"attributes": {"class": "land"},
		"mapExtent": bounds,
		"viewportSize": {
		"width": 100,
		"height": 100
		}
	});

	var svg = converter.convert(geojson, {});


	// parse each path into JavaScript Maps data structure
	for(var i = 0; i < svg.length; i++){
		var path = svg[i];
		var attrs = path.match(/\w+=".*?"/g);
		var area = {};

		for(var x = 0; x < attrs.length; x++) {
			var parts = attrs[x].replace(/"/g, '').split("=");
			var key = fieldMap[parts[0]] || parts[0];
			area[key] = parts[1];
		}
		mapVar.svg.g.path.push(area);
	}

	return mapVar;
}

// ------------------------


jQuery.getJSON("/static/district.json", function(data){
	// convert GeoJSON to JavaScript Maps comptible object
	var mapVar = AmCharts.parseGeoJSON(data);

	// create the map
	var map = AmCharts.makeChart("chartdiv", {
		"type": "map",
		"theme": "light",
		// "export": {
		// 	"enabled": true,
		// },

		"dataProvider": {
			"mapVar": mapVar,
			"getAreasFromMap": true,
			"areas": [
				{
					"title": "NICOBAR",
					"id": "573",
					"color": "#008000",
					"info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
					"balloonText": "NICOBAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
				},
				{
        "title": "KATIHAR",
        "id": "378",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KATIHAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
			],
		},

		"balloon": {
			"adjustBorderColor": true,
			"color": "#000000",
			"cornerRadius": 5,
			"fontSize": 18,
			"textAlign": "left",
			"fillAlpha":1,
			"fillColor": "#FFFFFF"
		},

		"areasSettings": {
			"color":"#FCF3CF",
			"autoZoom": false,
			"outlineColor":"#000000",
			"rollOverColor":undefined,
			"selectedColor": undefined,
			"rollOverColor":undefined
		},

		"hideCredits":"true",

		legend: {
			divId: "legenddiv",
			"data": [
				{
					"title": "No warning",
					"color": "#008000"
				},
				{
					"title": "Watch",
					"color": "#FF0000"
				}
			]
		}

	});

	console.log(map)

});





/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Create map instance

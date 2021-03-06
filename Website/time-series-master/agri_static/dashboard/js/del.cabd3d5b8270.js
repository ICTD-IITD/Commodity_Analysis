
	if(type == 1){
		retail_data = [
			{
				x:retail_x[0],
				y:retail_y[0],
				type: 'scatter',
				mode: "lines+markers",
				line: {
    				// 'color': "red",
    				// 'dash': 'dash',
    			},
				name: `${item} ${measure} past original`,
				connectgaps: false
			},
			{
				x:retail_x[1],
				y:retail_y[1],
				type: 'scatter',
				// mode: "lines",
				// line:{
				// 	color: "red",
				// },
				mode: 'lines+markers',
    			line: {
    				'color': "red",
    				'dash': 'dot'
    			},
				name: `${item} ${measure} past missing`,
				connectgaps: false
			},
			{
				x:retail_x[2],
				y:retail_y[2],
				type: 'dashed',
				name: `${item} ${measure} predicted`,
				connectgaps: false,
				mode: 'lines',
				line: {
					dash: 'dot',
					width: 4,
					color: "yellow"
				}

			},

		]

	}else{

		retail_data = [
			{
				x:retail_x[0],
				y:retail_y[0],
				// mode: 'markers',
				type: 'scatter',
				mode: "lines",
				line: {
					width: 4,
				},

				name: `original`,
				connectgaps: false
			},
			{
				x:retail_x[1],
				y:retail_y[1],
				type: 'scatter',
				mode: "lines",
				line: {
					color: "red",
					width: 2,
				},
				// mode: 'lines+markers',
				// line:{
				// 	'color': 'red',
				// 	'dash': 'dot'
				// },
    			// marker: {
    			// 	'color': "red",
    			// },
				name:`missing`,
				connectgaps: false
			},
		];

	}

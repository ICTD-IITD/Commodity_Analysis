

function initAllCenterTab() {
	$('#table_id').DataTable( {
		destroy: true,
	});

	setOnChangeEventAllCenterTab();
}

function drawVolatilityTable(){
	commodity = $("#commodity_select_allcenter").val();

	date = $("#month_allcenter").datepicker('getDate');
	mode = $("#mode_select_allcenter").val();

	if(commodity && date && mode){
		year = date.getFullYear();
		month = date.getMonth() + 1;

		data = {
			commodity,
			year,
			month,
			mode
		}


		requestPostData("/getVolatilityAllCenter", {"data": data})
		.then(data=>{
			console.log("data recieved")
			console.log(data)
			$('#table_id').DataTable( {
			    data: data,
			    destroy: true,
			    columns: [
			        { data: 'Center' },
			        { data: 'value' },
			    ],
			    order: [[1, "desc" ]]
			} );
			
		})
		.catch(err => {
			$('#table_id').DataTable( {
				destroy: true,
			}).clear().draw();
		})


	}else {
		console.log("Some input is not selected")
	}

	

}


function setOnChangeEventAllCenterTab(){
	$("#commodity_select_allcenter").change(function(event) {
		// console.log(event)
		drawVolatilityTable()
	});


	$("#month_allcenter").datepicker()
    .on("changeDate", function(e) {
    	drawVolatilityTable()
    });

    $("#mode_select_allcenter").change(function(event) {
		// console.log(event)
		drawVolatilityTable()
	});
    

}

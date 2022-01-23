

$( document ).ready(function() {

	init();

});

function init(){
	setDatepicker();
	initAllCenterTab();
	initMonthRangeTab();
}


function setDatepicker() {
	$(".datepicker").datepicker( {
	    format: "mm-yyyy",
	    startView: "months",
	    autoclose: true,
	    minViewMode: "months",
	    endDate: "today",
	    maxDate: new Date(),
	    startDate: "01-2016"
	});
}



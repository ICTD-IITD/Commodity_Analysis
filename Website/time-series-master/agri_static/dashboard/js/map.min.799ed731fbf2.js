$(document).ready(function(){init();});function init(){setDatepicker();setOnChangeEvent();}
function setMap(data){}
function getMapData(){commdity=$("#commodity_select").val();date1=$("#month1").datepicker('getDate');date2=$("#month2").datepicker('getDate');if(commdity&&date1&&date2){year1=date1.getFullYear();month1=date1.getMonth()+1;year2=date2.getFullYear();month2=date2.getMonth()+1;data={commdity,year1,month1,year2,month2,}
return data;}else{console.log("Some input is not selected")}}
function setDatepicker(){$(".datepicker").datepicker({format:"mm-yyyy",startView:"months",autoclose:true,minViewMode:"months",endDate:"today",maxDate:new Date()});}
function setOnChangeEvent(){$("#commodity_select").change(function(event){console.log(event)});$("#month1").datepicker().on("changeDate",function(e){console.log(e)});$("#month2").datepicker().on("changeDate",function(e){console.log(e)});}
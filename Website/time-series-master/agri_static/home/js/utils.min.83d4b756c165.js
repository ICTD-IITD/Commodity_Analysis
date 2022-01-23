var map;function getCommodityStateMandiMap(){requestPostData('/agri_req/get_commodity_map',{"data":""}).then(data=>{console.log(data);map=data;});}
function getMandisFromState(commodity,state){return map["state_mandi"][commodity][state];}
function getStateFromMandi(commodity,mandi){json_obj=map["state_mandi"][commodity]
for(var state in json_obj){idx=json_obj[state].find(el=>el==mandi)
if(idx!=undefined){return json_obj[state][idx];}}}
function setSelectPicker(id_state,id_mandi){$("#"+id_state).on('change',function(event){selected_state=$("#"+id_state).val();console.log(selected_state)});}
console.clear();$(document).ready(function(){setCSRF();$('.modal').modal();});function setCSRF(){csrf_token=$("input[name=csrfmiddlewaretoken]").val();$("body").bind("ajaxSend",function(elm,xhr,s){if(s.type=="POST"){xhr.setRequestHeader('X-CSRF-Token',csrf_token);}});}
function requestPostData(url,data){console.log("%crequest:","color: yellow",[url,data])
data={...data,_token:csrf_token}
return new Promise((resolve,reject)=>{$.ajax({url:url,type:'POST',async:false,contentType:'application/json',data:JSON.stringify(data),dataType:"json",processData:false,success:function(data,textStatus,jQxhr){var data=data["data"]
console.log("%cresponse:","color: #39ff14",[url,data])
resolve(data)},error:function(jqXhr,textStatus,errorThrown){console.log("%cerror","color: red",{jqXhr,textStatus,errorThrown})
reject(errorThrown)},});})}
function promisify(f){return function(...args){return new Promise((resolve,reject)=>{function callback(err,result){if(err){reject(err);}else{resolve(result);}}
args.push(callback);f.call(this,...args);});};};function capitalizeFirstLetter(string){return string.charAt(0).toUpperCase()+string.slice(1).toLowerCase();}
chart_dict={}
function redraw(chart_id){if(chart_id in chart_dict){chart_dict[chart_id].destroy();}}
function isMobileDevice(){return(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));}
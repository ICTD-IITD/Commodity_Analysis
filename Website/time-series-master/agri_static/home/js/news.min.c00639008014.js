function setNewsModal(news_articles){innerHtml=``;for(article of news_articles){title=article['articleTitle']
date=article['publishedDate']
text=article['text'].slice(0,250)
link=article['articleUrl']
innerHtml+=`
		<li class="collection-item">
            <a href="${link}" class="secondary-content" target="_blank">
                <i class="material-icons">launch</i>
            </a>
            <span class="title">${title}</span>
            <p>${date}
            	<br> 
            ${text}...
            </p>
                
        </li>

		`}
console.log(innerHtml)
$("#id_news_list").html(innerHtml);}
function getNewsArticle(type){data={}
if(type=="dispersion"){url='/agri_req/getDispersionNews'}
requestPostData(url,{"data":data})}
function showNewsModal(){$("#id_news_modal").modal('open');}
function requestNewsModal(type){if(type=="dispersion"){setDispersionNews()}
if(type=="volatility"){setVolatiltyNews()}
if(type=="last3yr"){setLast3YrNews()}
if(type=="last1yr"){setLast1YrNews()}
if(type=="last1yr_arrival"){setLast1YrNewsArrival()}
if(type=="last1yr_mandi"){setLast1YrNewsMandi()}
if(type=="last1yr_retail"){setLast1YrNewsRetail()}
if(type=="mandi_retail"){setMandiRetailNews()}
if(type=="mandi_arrival"){setMandiArrivalNews()}}
function setDispersionNews(){data={}
url='/agri_req/getDispersionNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["dispersion_news"]);showNewsModal();})}
function setVolatiltyNews(){data={}
url='/agri_req/getVolatilityNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["volatility_news"]);showNewsModal();})}
function setLast3YrNews(){data={}
url='/agri_req/getLast3YrNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["mandi_arrival_news"].concat(data["retail_mandi_news"]));showNewsModal();})}
function setMandiRetailNews(){data={}
url='/agri_req/getLast3YrNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["retail_mandi_news"])
showNewsModal();})}
function setMandiArrivalNews(){data={}
url='/agri_req/getLast3YrNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["mandi_arrival_news"])
showNewsModal();})}
function setLast1YrNews(){data={}
url='/agri_req/getLast1YrNews'
requestPostData(url,{"data":data}).then(data=>{console.log(data)
setNewsModal(data["arrival_news"].concat(data["mandi_news"]).concat(data["retail_news"]));showNewsModal();})}
function setLast1YrNewsMandi(){data={}
url='/agri_req/getLast1YrNews'
requestPostData(url,{"data":data}).then(data=>{setNewsModal(data["mandi_news"])
showNewsModal();})}
function setLast1YrNewsRetail(){data={}
url='/agri_req/getLast1YrNews'
requestPostData(url,{"data":data}).then(data=>{setNewsModal(data["retail_news"])
showNewsModal();})}
function setLast1YrNewsArrival(){data={}
url='/agri_req/getLast1YrNews'
requestPostData(url,{"data":data}).then(data=>{setNewsModal(data["arrival_news"])
showNewsModal();})}
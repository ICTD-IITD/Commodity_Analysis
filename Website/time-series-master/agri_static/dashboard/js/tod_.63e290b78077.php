 

<!doctype html>
<html lang="en">
   
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />  
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noodp">
      <meta name="viewport" id="viewport" content="width=device-width">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
      <title></title>
      <meta name="keywords" content="IMD">
      
      <link rel="home" href="" title="home">
     
    
      <link rel="stylesheet" href="css/home.css" type="text/css">
     
      <link rel="shortcut icon" href="ico/favicon.png">
     

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" />

      <style type="text/css" media="screen">

         .sun-rise{
            background-image: url('img/sunrise.jpg');
           }
           
           .sun-set{
               background-image: url('img/sunset.jpg');
           }
           

           .moon-rise{
               background-image: url('img/moonrise.jpg');
           }
           


           .moon-set{
               background-image: url('img/moonset.jpg');
           }
           

           .moon-set p span, .moon-rise p span, .sun-set p span, .sun-rise p span{
             background-color: #0000008a;
             padding:5px;
           }

           .moon-set p, .moon-rise p, .sun-set p, .sun-rise p{
                   color: #fff;
                   padding-left: 10px;
                   font-weight: 400;
                   line-height: 36.5px;
                   bottom: 0px !important;
                   font-family: sans-serif;
                   font-size: 14px;
                   margin:0;

           }

           .right-box-equal{
               height: 38px;
               margin-bottom: 5px;
           }
         
      </style>
          
                      <style>
                      #chartdiv {
                        width: 100%;
                        height: 900px;
                      }
                      #info {
                      width: 10%;
                        height: 10%;
                        position: absolute;
                        top: 300px;
                        left: 300px;
                      float:"center";
                      }

                      #info{

                        z-index: 10;
                      }
                      #info p {
                        margin: 5px;

                      }
                      </style>
                      <script src="//cdnjs.cloudflare.com/ajax/libs/geojson2svg/1.0.2/geojson2svg.min.js"></script>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                      <!-- amCharts includes -->
                      <script src="//www.amcharts.com/lib/3/ammap.js"></script>
                      <!--<script src="//www.amcharts.com/lib/3/maps/js/indiaLow.js"></script>-->
                      <script src="//www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

   </head>
   <body>
       <!--This cover the whole page -->
      <div id="pageheight">
      <!--This cover the website page -->
         <div id="pagewrap">
           
         

       

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157746104-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-157746104-1');
</script>

<header id="header">
   <div class="l_content">
      <div id="header-logo"><a id="logo" href="#."><img src="https://mausam.imd.gov.in/imd_latest/contents/img/logo-india-big.png" alt="India Meteorological Department" width="80" height="110" style="z-index: 1;"></a>
      
     <div style="width:600px">
<h1 style="color:#FFF; text-align:center; font-size:19px; padding-top:0px; padding-left:0px; font-weight:300"> INDIA METEOROLOGICAL DEPARTMENT</h1>

<h1 style="color:#FFF; text-align:center; font-size:16px; padding-top:0px; padding-left:0px; font-weight:300"> Ministry of Earth Sciences</h1>

<h1 style="color:#FFF; text-align:center; font-size:14px; padding-top:0px; padding-left:0px; font-weight:300"> Government of India</h1>

</div>
      
      
      </div>
      <div id="header-main">
         <div class="l_top">
          
            <div id="header-search">

         <form action="/search_RV/index.php" method="post">
         <input type="text" name="sr" maxlength="45" />
          <input type="submit" value="Search" />
            </form>

<!--               <form action="#." method="get" class="searchform" enctype="application/x-www-form-urlencoded">
                  <label for="query">Search</label><input type="text" id="query" name="query" size="40" placeholder="Enter search terms" value="" />
                  <input type="hidden" name="collection" value="imd" />
                  <input type="submit" value="Search" name="Submit" title="Search" class="search" />
               </form> -->
            </div>
            <div id="social_media" >
<!--             <div id="facebook_link"> <a id="icon-link-facebook" href="https://www.facebook.com/mausam.nwfc.3" target=_blank>Facebook</a></div>
             
            <div id="twitter_link"><a id="icon-link-twitter"  href="https://twitter.com/Indiametdept" target=_blank>Twitter</a></div>
			
	    <div id="instagram_link"><a id="icon-link-instagram" href="https://www.instagram.com/mausam_nwfc/" target=_blank>Insta</a></div>-->

            <div id="facebook_link"><a id="icon-link-facebook" href="https://www.facebook.com/India.Meteorological.Department/" target=_blank><img src="../img/bom/facebook.gif" title="Facebook"></a>
</div>
             
            <div id="twitter_link"><a id="icon-link-twitter"  href="https://twitter.com/Indiametdept" target=_blank><img src="../img/bom/twitter.gif" title="Twitter"></a></div>
			
	    <div id="instagram_link"><a id="icon-link-instagram" href="https://www.instagram.com/mausam_nwfc/" target=_blank><img src="../img/bom/instagram.gif" title="Instagram"></a></div>

            <div id="instagram_link"><a id="icon-link-instagram" href="https://www.youtube.com/channel/UC_qxTReoq07UVARm87CuyQw/featured?view_as=subscriber" target=_blank><img src="../img/bom/youtube.gif" title="Youtube"></a></div>
             
            <div id="instagram_link"><a id="icon-link-instagram" href="https://imdweather1875.wordpress.com" target=_blank><img src="../img/bom/blog.gif" title="Blog"></a></div>
          
            </div>
         </div>
         
         
         <div class="l_bottom" >
            <ul class="sf-menu" >
               <li class="no-menu"><a href="https://mausam.imd.gov.in" title="Home">Home</a></li>
              
               <li class="no-menu"><a href="https://mausam.imd.gov.in/imd_latest/contents/departmentalweb.php" title="Departmental Website">Departmental Website</a></li>
              
               <li>
                  <abbr><a href="#.">About IMD</a></abbr>
                  <ul>
                     <li class="accessible">
                        <h2 class="accessible">About IMD</h2>
                     </li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/history.php">History</a></li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/mandate.php" >Mandate</a></li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/organisational-structure.php">Organizational Structure</a></li>
                     <li><a href="https://metnet.imd.gov.in/imddir/" target="_blank" rel="noopener noreferrer">IMD's Directory</a></li>                     
                     <li><a href="https://metnet.imd.gov.in/imdpis/imdweb_list_of_dgms.php" target="_blank" rel="noopener noreferrer">Ex DGM's of IMD</a></li>                     
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/citizen_charter.php" rel="noopener noreferrer">Citizen's/Client's Charter</a></li>                                         
					<!-- <li><a href="#">IMD Directory</a></li>-->
                    
                  </ul>
                  <div class="sf-menu-pointer"></div>
               </li>
               <li id="sf-menu-vic">
                  <abbr ><a href="#." >People</a></abbr>
                  <ul>
                     <li class="accessible">
                        <h2 class="accessible">People</h2>
                     </li>
                   
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/honable_minister.php" ><strong>Hon’ble Minister</strong></a></li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/secretory_moes.php" >Secretary MoES</a></li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/dgm.php" >DGM IMD</a></li>
                     <li><a href="https://metnet.imd.gov.in/imddir/imd_senior_officers.php" target="_blank" rel="noopener noreferrer">Senior Officers of IMD</a></li>                     
                    <!-- <li><a href="#." >Ex-DGM's of IMD</a></li>-->
                     
                  </ul>
                  <div class="sf-menu-pointer"></div>
               </li>
               
               <li id="sf-menu-vic">
                <abbr ><a href="#.">Publications</a></abbr>
                  <ul>
                     <li class="accessible">
                        <h2 class="accessible">Publications</h2>
                     </li>

                    <li class="heading"><a href="https://mausam.imd.gov.in/imd_latest/contents/rashtriy_panchang.php" >Rashtriya Panchang</a></li>
                    <li><a href="https://mausam.imd.gov.in/imd_latest/contents/indian_astronomical_ephemeris.php" >The Indian Astronomical Ephemeris</a></li>
                    <li><a href="https://metnet.imd.gov.in/imdmausam/" target=_blank rel="noopener noreferrer">Mausam Journal</a></li>
                    <li><a href="http://imdpune.gov.in/hydrology/rainfall%20variability%20page/rainfall%20trend.html" target=_blank rel="noopener noreferrer">Observed Rainfall Trend over States</a></li>
                     
                  </ul>
                  <div class="sf-menu-pointer"></div>
               
               </li>
               
               <li >
               
               <abbr ><a href="#.">Services</a></abbr>
                  <ul >
                     <li class="accessible">
                        <h2 class="accessible">Services</h2>
                     </li>

                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/hydrological-services.php" >Hydrometeorological Services in IMD</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/meteorological-agriculture-services.php" >Meteorological Services for Agriculture in India</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/meteorological-services-civil-aviation.php" >Meteorological Services for Civil Aviation in India</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/satmet.php" >SATMET Services</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/imd-dwr-network.php" >IMD DWR Network</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/surface-met.php" >Surface Meteorological Instrumentataion</a></li>
                     <li class="services"><a href="upper-air.php" >Upper Air Meteorological Instrumentataion</a></li>
                    
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/meteorological-telecommunication-services.php" >Meteorological Telecommunication Services in IMD</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/environmental-monitoring-services.php" >Environmental monitoring and service</a></li>
                     <li class="services"><a href="https://mausam.imd.gov.in/imd_latest/contents/positional-astronomy.php" >Positional Astronomy</a></li>
                     <li class="services"><a href="http://imdpune.gov.in/training/" target="_blank" rel="noopener noreferrer"  >Meteorological Training Institute</a></li>
                     
                  </ul>
                  <div class="sf-menu-pointer"></div>
            </li>
               <li  class="no-menu"><a href="http://internal.imd.gov.in/pages/press_release_mausam.php" target="_blank">Press Release</a></li>
			   
			<div class="sf-menu-pointer"></div>
			
              <li class="no-menu"><a href="https://mausam.imd.gov.in/hindinew/" title="हिन्दी" target="_blank"><font color=#fcec05">हिन्दी</font></a></li> 

            </ul>
         </div>
      </div>
      <div id="second_logo">
      <a href="#."><img src="https://mausam.imd.gov.in/imd_latest/img/imd_logo_enamble.png" alt="India Meteorological Department"></a>
      </div>
   </div>
</header>           
            <div id="columns">
              <section id="content">
   <div id="current">
      <div id="warning_content" style="width:230px;">
         <h2>Warnings</h2>
         <ul >
            <li><a href="subdivisionwise-warning.php" title="Subdivision Wise" class="tip" style="font-size:12px;">Subdivision Wise</a></li>
            <li><a href="districtwise-warning.php" title="District Wise" class="tip"  style="font-size:12px;">District Wise</a></li>
           
         </ul>
      </div>
      <div id="nowcast_content"  style="width:210px;">
         <h2>Nowcast</h2>
         <ul>
             <li><a href="districtwisewarnings.php" title="District Wise" class="tip"  style="font-size:12px;">District Wise</a></li>
            <li><a href="stationwise-nowcast-warning.php" title="Station Wise" class="tip"  style="font-size:12px;">Station Wise</a></li>
         </ul>
      </div>
<div id="nowcast_content"  style="width:210px;">
         <h2>Weather realized</h2>
         <ul>
             <li><a href="realized_temperature.php" title="Temperature" class="tip"  style="font-size:12px;">Temperature</a></li>
            <li><a href="realized_rainfall.php" title="Rainfall" class="tip"  style="font-size:12px;">Rainfall</a></li>
         </ul>
      </div>

   </div>
   <div class="other" >
      <ul class="sf-menu">
         <li class="closed">
            <a href="#" class="noclick">Specialized Forecasts</a>
            <ul>
               <li class="mar"><a href="https://mausam.imd.gov.in/imd_latest/contents/index_fisherman.php">Marine Forecast</a></li>
               			   
               <li class="tou"><a href="https://internal.imd.gov.in/pages/tourism_forecast_mausam.php" target=_blank>Tourism Forecast</a></li>
               <li class="ts"><a href="http://srf.tropmet.res.in/srf/ts_prediction_system/index.php" target="_blank" rel="noopener noreferrer">Thunderstorm Prediction</a></li>
                              <li class="fog"><a href="https://ews.tropmet.res.in/fog_forecast.php" target="_blank" rel="noopener noreferrer">WIFEX</a></li>
               <li class="cyc1"><a href="https://ews.tropmet.res.in/" target="_blank" rel="noopener noreferrer">Air Quality</a></li>
               <li class="cyc"><a href="http://safar.tropmet.res.in/" target="_blank" rel="noopener noreferrer">SAFAR</a></li>
               <li class="mon"><a href="http://14.139.247.5/power/NRLDC/" target="_blank" rel="noopener noreferrer">Power Sector</a></li>
               <li class="pil"><a href="https://mausam.imd.gov.in/imd_latest/contents/pilgrim_forecast.php">Pilgrimage Forecast</a></li>
               <li class="mou"><a href="https://internal.imd.gov.in/section/nhac/dynamic/hmc.pdf" target=_blank>Mountain Wx Bulletin</a></li>
	<li class="tou"><a href="https://internal.imd.gov.in/pages/highway_forecast_mausam.php" target=_blank>Highway Forecast</a></li>
        
				             
               
               
              <!-- <li class="energy"><a href="#.">Energy</a></li>-->
               
               
            </ul>
         </li>
      </ul>
      
   </div>
   
 
            
 
</section>
           
              <section id="middle">
                <div class="middle_content">
                  <h3 style="color:red; text-align: center; font-size: 18px;">District wise Nowcast warnings</h3>
                  <hr />

                  <div style="text-align: center">

                   
                   
                   


                  
                      
                       <div id="legenddiv" ></div>
                      
                       
                       <div  id="chartdiv" style="height:800px; "></div>
                    

                     
                  </div>
                </div>
               </section>



               
               
            
              
               <div class="clr"></div>
            </div>
		
<footer id="footer">
            <div id="footer-columns">


               <ul id="fc-one">
                  <li class="icon-link border-bottom uppercase"><a href="#."><span>Forecasts</span></a></li>
                   <li><a href="http://internal.imd.gov.in/pages/city_weather_main_mausam.php" target="_blank" rel="noopener noreferrer">City Forecast</a></li>
<!--                    <li><a href="https://mausam.imd.gov.in/imd_latest/contents/current_weather.php">City Forecast</a></li> -->
                  <li><a href="http://nwp.imd.gov.in/gfsproducts_cycle00_mausam.php" target="_blank">Short to Medium Range Model Guidance</a></li>
                  <li><a href="https://mausam.imd.gov.in/imd_latest/contents/extendedrangeforecast.php">Extended Range Model Guidance</a></li> 
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/seasonal_forecast.php">Seasonal Forecast</a></li>
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/index_qpf.php">Quantitative Precipitation Forecast</a></li>
                 
                     
                    
               </ul>
               <ul id="fc-two">
                  <li class="icon-link border-bottom uppercase" ><a href="#."><span>Specialised products &amp; forecasts</span></a></li>
                     
                     
                     <li><a href="https://mausam.imd.gov.in/imd_latest/contents/cyclone.php">Cyclones</a>
&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/imd_latest/contents/monsoon.php">Monsoon</a>
&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/imd_latest/contents/satellite.php">Satellite</a></li>
                      <li><a href="https://mausam.imd.gov.in/imd_latest/contents/index_radar.php">Radar</a>
&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/imd_latest/contents/rainfallinformation.php">Rainfall</a></li>
                       <li><a href="https://mausam.imd.gov.in/imd_latest/contents/agromet/advisory/englishstate_current.php">Agromet Advisories</a></li>
                      
  <li>Meghdoot Agro : <a href="https://play.google.com/store/apps/details?id=com.aas.meghdoot" ><img src="https://mausam.imd.gov.in/imd_latest/android.png" style="height:20px;width:28px;"></a>         
&nbsp;|&nbsp;<a href="https://apps.apple.com/in/app/meghdoot/id1474048155" ><img src="https://mausam.imd.gov.in/imd_latest/apple.png" style="height:20px;width:28px;"></a>|<a href="https://mausam.imd.gov.in/imd_latest/weather_video/meghdoot_app.mp4"target="_blank">Video</a></li> 

  <li>UMANG : <a href="https://play.google.com/store/apps/details?id=in.gov.umang.negd.g2c" ><img src="https://mausam.imd.gov.in/imd_latest/android.png" style="height:20px;width:28px;"></a>         
&nbsp;|&nbsp;<a href="https://apps.apple.com/in/app/umang/id1236448857" ><img src="https://mausam.imd.gov.in/imd_latest/apple.png" style="height:20px;width:28px;"></a></li> 

  <li>Damini Lightning : <a href="https://play.google.com/store/apps/details?id=com.lightening.live.damini"><img src="https://mausam.imd.gov.in/imd_latest/android.png" style="height:20px;width:28px;"></a>         
&nbsp;|&nbsp;<a href="https://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=1502385645"><img src="https://mausam.imd.gov.in/imd_latest/apple.png" style="height:20px;width:28px;"></a></li> 
                 
<!-- <li><a href="https://www.tropmet.res.in/">IITM</a></li>
                     <li><a href="https://www.niot.res.in/">NIOT</a></li>
                     <li><a href="https://www.ncmrwf.gov.in/">NCMRWF</a></li>
                      <li><a href="https://www.ncess.gov.in/

">NCESS</a></li>
                      <li><a href="https://incois.gov.in/

">INCOIS</a></li>
                      <li><a href="www.ncaor.gov.in/">NCAOR</a></li>-->
               </ul>
               <ul id="fc-three">
                  <li class="icon-link border-bottom uppercase"><a href="#."><span>Miscellaneous</span></a></li>
                   
               
                 
               
                  <li><a href="https://mausam.imd.gov.in/imd_latest/contents/citizen_charter.php">Citizen’s Charter</a></li>
				  <li><a href="https://mausam.imd.gov.in/imd_latest/contents/faq.php">Frequently Asked Questions</a></li>
                  <li><a href="http://internal.imd.gov.in/pages/rti_mausam.php" target=_blank>RTI</a>&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/Forecast/feedback.php" target=_blank>Feedback</a></li>
				  <li><a href="https://mausam.imd.gov.in/imd_latest/weather_video/video.php">Weather Video</a></li>
                  <li><a href="http://internal.imd.gov.in/advertisements/20200527_advt_80.pdf" target="_blank" rel="noopener noreferrer">GKMS News Letter for Jan-Mar 2020</a></li>
				  
				  <li><a href="https://mausam.imd.gov.in/Forecast/login.php" >Database Login</a>&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/backend/auth/login" style="width:110px">Admin Login</a></li>
				  
                  <li><a href="http://internal.imd.gov.in/pages/tenders_mausam.php" target=_blank>Tenders</a>&nbsp;|&nbsp;<a href="http://internal.imd.gov.in/pages/recruits_mausam.php" target=_blank>Recruitment</a></li>
<li><a href="https://mausam.imd.gov.in/imd_latest/contents/disclaimer.php">Disclaimer</a>&nbsp;|&nbsp;<a href="https://mausam.imd.gov.in/imd_latest/contents/sitemap.php">Sitemap</a></li>

             <!--
                  <li><a href="#.">Departmental Sites</a></li>
                   <li><a href="example/example.php">Weather Video</a></li>
                   -->
              
 </ul>


               <ul id="fc-four">
                <!--  <li class="icon-link row-link-1st row-double"><a href="https://www.facebook.com/India.Meteorological.Department/" id="icon-link-fb"><span>&nbsp;</span></a></li>
                  <li class="icon-link row-link-2nd"><a id="icon-link-tw" href="https://twitter.com/Indiametdept"><span>Twitter</span></a></li>
                  <li class="icon-link row-link-1st"><a href="#." id="icon-link-yt"><span>Youtube</span></a></li>-->
                  <li><h3 style="text-align:center">Contact Us</h3>
                  <div style="font-size:7px; text-align:center">
                      <p style="color:#000">Office of Director General of Meteorology 
                      <BR>INDIA METEOROLOGICAL DEPARTMENT  <BR>
                      Mausam Bhawan, Lodhi Road  
                      <BR>New Delhi - 110003</p>  
<!--<div style="font-weight: bold;">For Website related queries <BR><div>Email: sankar.nath@imd.gov.in</div>
<div>
<a href="https://metnet.imd.gov.in/imddir/imd_senior_officers.php" target="_blank" rel="noopener noreferrer">Senior Officer of IMD</a></br>
</div> <BR>-->
<div style="color:black;font-size:9px;font-weight: bold; text-align:center">
<a href="https://mausam.imd.gov.in/imd_latest/contents/queries2.php" target="_blank" rel="noopener noreferrer">Contact Details</a></br>
</div>
<BR>
<div>Total visits:20297475</div>
                <!--  <p style="color:#000">Web Information Manager</p>
                  <div>(Smt. Samanti Sarkar, Scientist E)</div> -->
                  </div>
                  
                  
                  
                  
                  </li>

               </ul>


               <p id="copyright">&#169; Copyright <a href="https://moes.gov.in/" target="_blank"> Ministry of Earth Sciences</a>, New Delhi, India <br />
                Designed &amp; Developed by <a href="https://www.tropmet.res.in/" target="_blank"> Indian Institute of Tropical Meteorology</a> , Pune, India  </p>
                <p>&nbsp;</p>
            </div>
         </footer>
         </div>
       
      </div>
 <script>
                      jQuery.getJSON("district_shapefiles/DISTRICT_F-2.json", function(data) {
                      //alert("hi");  
                        // convert GeoJSON to JavaScript Maps comptible object
                        var mapVar = AmCharts.parseGeoJSON(data);
                        
                        // create the map
                        var map = AmCharts.makeChart("chartdiv", {
                          "type": "map",
                          "theme": "light",
"export": {
    "enabled": true,
  },
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
        "title": "ANJAW",
        "id": "513",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ANJAW<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHANGLANG",
        "id": "482",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHANGLANG<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST KAMENG",
        "id": "480",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST KAMENG<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST SIANG",
        "id": "507",
        "color": "#ffa500",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST SIANG<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KURUNG KUMEY",
        "id": "500",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "KURUNG KUMEY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "LOHIT",
        "id": "628",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LOHIT<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LOWER DIBANG VALLEY",
        "id": "657",
        "color": "#ffa500",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LOWER DIBANG VALLEY<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LOWER SUBANSIRI",
        "id": "484",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "LOWER SUBANSIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "PAPUMPARA",
        "id": "470",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PAPUMPARA<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TAWANG",
        "id": "25",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TAWANG<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRAP",
        "id": "466",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "TIRAP<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "UPPER SIANG",
        "id": "524",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "UPPER SIANG<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "UPPER SUBANSIRI",
        "id": "510",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "UPPER SUBANSIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "WEST KAMENG",
        "id": "24",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST KAMENG<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WEST SIANG",
        "id": "517",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST SIANG<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BAKSA",
        "id": "21",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BAKSA<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BARPETA",
        "id": "27",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BARPETA<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BONGAIGAON",
        "id": "26",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BONGAIGAON<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CACHAR",
        "id": "360",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CACHAR<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHIRANG",
        "id": "18",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHIRANG<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DARRANG",
        "id": "16",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DARRANG<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHEMAJI",
        "id": "623",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHEMAJI<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHUBRI",
        "id": "9",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHUBRI<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GOALPARA",
        "id": "12",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GOALPARA<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GOLAGHAT",
        "id": "446",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GOLAGHAT<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HAILAKANDI",
        "id": "337",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "HAILAKANDI<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JORHAT",
        "id": "456",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JORHAT<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KARIMGANJ",
        "id": "340",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KARIMGANJ<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOKRAJHAR",
        "id": "17",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOKRAJHAR<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BALARAMPUR",
        "id": "288",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BALARAMPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MORIGAON",
        "id": "14",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MORIGAON<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DIMA HASAO",
        "id": "393",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DIMA HASAO<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAGAON",
        "id": "19",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAGAON<p><\/br><\/br> Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SIBSAGAR",
        "id": "462",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SIBSAGAR<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TINSUKIA",
        "id": "494",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TINSUKIA<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "UDALGURI",
        "id": "22",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "UDALGURI<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST GARO HILLS",
        "id": "6",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST GARO HILLS<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST KHASI HILLS",
        "id": "2",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST KHASI HILLS<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAINTIA HILLS",
        "id": "3",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAINTIA HILLS<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SOUTH GARO HILLS",
        "id": "1",
        "color": "#ffa500",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is most likely to occur at most places. Heavy rain is likely to occur at isolated places<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SOUTH GARO HILLS<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is most likely to occur at most places. Heavy rain is likely to occur at isolated places<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WEST GARO HILLS",
        "id": "5",
        "color": "#ffa500",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST GARO HILLS<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WEST KHASI HILLS",
        "id": "4",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST KHASI HILLS<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DIMAPUR",
        "id": "402",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DIMAPUR<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOHIMA",
        "id": "624",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOHIMA<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LONGLENG",
        "id": "626",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "LONGLENG<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "MOKOKCHUNG",
        "id": "625",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "MOKOKCHUNG<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "MON",
        "id": "451",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "MON<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "PHEK",
        "id": "403",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PHEK<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TUENSANG",
        "id": "443",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TUENSANG<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WOKHA",
        "id": "436",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WOKHA<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ZUNHEBOTO",
        "id": "423",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "ZUNHEBOTO<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "BISHNUPUR",
        "id": "332",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "BISHNUPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "CHANDEL",
        "id": "331",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "CHANDEL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "IMPHAL EAST",
        "id": "357",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "IMPHAL EAST<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "IMPHAL WEST",
        "id": "350",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "IMPHAL WEST<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "SENAPATI",
        "id": "388",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SENAPATI<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TAMENGLONG",
        "id": "376",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TAMENGLONG<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "THOUBAL",
        "id": "347",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "THOUBAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "UKHRUL",
        "id": "395",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "UKHRUL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "CHAMPHAI",
        "id": "300",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "CHAMPHAI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "KOLASIB",
        "id": "317",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOLASIB<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LAWNGTLAI",
        "id": "247",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LAWNGTLAI<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LUNGLEI",
        "id": "277",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LUNGLEI<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SAIHA",
        "id": "251",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "SAIHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "SERCHHIP",
        "id": "282",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "SERCHHIP<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "DHALAI",
        "id": "305",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHALAI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NORTH TRIPURA",
        "id": "318",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NORTH TRIPURA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SOUTH TRIPURA",
        "id": "287",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SOUTH TRIPURA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WEST TRIPURA",
        "id": "303",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST TRIPURA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST SIKKIM",
        "id": "449",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST SIKKIM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NORTH SIKKIM",
        "id": "473",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NORTH SIKKIM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SOUTH SIKKIM",
        "id": "450",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SOUTH SIKKIM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WEST SIKKIM",
        "id": "455",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST SIKKIM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JALPAIGURI",
        "id": "20",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "JALPAIGURI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "MALDA",
        "id": "362",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "MALDA<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "BANKURA",
        "id": "274",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "BANKURA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "BIRBHUM",
        "id": "310",
        "color": "#FFFF00",
        "info": "<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "BIRBHUM<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "MURSHIDABAD",
        "id": "322",
        "color": "#FFFF00",
        "info": "<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "MURSHIDABAD<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "NADIA",
        "id": "290",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "NADIA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "BHADRAK",
        "id": "196",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHADRAK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CUTTACK",
        "id": "182",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CUTTACK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DEOGARH",
        "id": "205",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DEOGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GANJAM",
        "id": "171",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GANJAM<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAGATSINGHPUR",
        "id": "175",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAGATSINGHPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JHARSUGUDA",
        "id": "595",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JHARSUGUDA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KALAHANDI",
        "id": "173",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KALAHANDI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KANDHAMAL",
        "id": "178",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KANDHAMAL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KORAPUT",
        "id": "152",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KORAPUT<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MALKANGIRI",
        "id": "142",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MALKANGIRI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PURI",
        "id": "170",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PURI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SAMBALPUR",
        "id": "217",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SAMBALPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SUNDARGARH",
        "id": "228",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SUNDARGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BOKARO",
        "id": "284",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "BOKARO<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "CHATRA",
        "id": "302",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "CHATRA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DEVGARH",
        "id": "309",
        "color": "#FFFF00",
        "info": "<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "DEVGARH<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "DHANBAD",
        "id": "289",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "DHANBAD<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "DUMKA",
        "id": "311",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "DUMKA<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "GARHWA",
        "id": "301",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GARHWA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GIRIDIH",
        "id": "314",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GIRIDIH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GUMLA",
        "id": "271",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GUMLA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "JAMTARA",
        "id": "599",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "JAMTARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KHUNTI",
        "id": "259",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KHUNTI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "LATEHAR",
        "id": "307",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>",
        "balloonText": "LATEHAR<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>"
    },
    {
        "title": "LOHARDAGA",
        "id": "597",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>",
        "balloonText": "LOHARDAGA<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>"
    },
    {
        "title": "PAKUR",
        "id": "319",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "PAKUR<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "PALAMU",
        "id": "598",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "PALAMU<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "RAMGARH",
        "id": "600",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "RAMGARH<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "RANCHI",
        "id": "272",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "RANCHI<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "SIMDEGA",
        "id": "596",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SIMDEGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "ARWAL",
        "id": "339",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ARWAL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BANKA",
        "id": "333",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BANKA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BEGUSARAI",
        "id": "369",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BEGUSARAI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHABUA",
        "id": "346",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHABUA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHAGALPUR",
        "id": "361",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHAGALPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHOJPUR",
        "id": "365",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHOJPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BUXAR",
        "id": "363",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BUXAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GAYA",
        "id": "324",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GAYA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GOPALGANJ",
        "id": "409",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GOPALGANJ<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAHANABAD",
        "id": "342",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAHANABAD<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAMUI",
        "id": "334",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAMUI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KATIHAR",
        "id": "378",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KATIHAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KHAGARIA",
        "id": "368",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KHAGARIA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KISHANGANJ",
        "id": "415",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KISHANGANJ<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LAKHISARAI",
        "id": "345",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LAKHISARAI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MADHEPURA",
        "id": "387",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MADHEPURA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MUZAFFARPUR",
        "id": "399",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MUZAFFARPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NALANDA",
        "id": "354",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NALANDA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAWADA",
        "id": "330",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAWADA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PATNA",
        "id": "364",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PATNA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ROHTAS",
        "id": "344",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ROHTAS<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SAHARSA",
        "id": "383",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SAHARSA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SAMASTIPUR",
        "id": "381",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SAMASTIPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SARAN",
        "id": "392",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SARAN<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SHEIKHPURA",
        "id": "338",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SHEIKHPURA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SHEOHAR",
        "id": "605",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SHEOHAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SITAMARHI",
        "id": "424",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SITAMARHI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SIWAN",
        "id": "396",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SIWAN<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SUPAUL",
        "id": "411",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SUPAUL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VAISHALI",
        "id": "379",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VAISHALI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ALLAHABAD",
        "id": "685",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "ALLAHABAD<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DAUSA",
        "id": "437",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "DAUSA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "AMETHI",
        "id": "410",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "AMETHI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "AZAMGARH",
        "id": "398",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "AZAMGARH<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BALLIA",
        "id": "386",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BALLIA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KUMARAM BHEEM",
        "id": "161",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KUMARAM BHEEM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BANDA",
        "id": "370",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BANDA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BARABANKI",
        "id": "440",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BARABANKI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BASTI",
        "id": "432",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BASTI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "CHANDAULI",
        "id": "355",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "CHANDAULI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "CHITRAKOOT",
        "id": "687",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "CHITRAKOOT<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DEORIA",
        "id": "417",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "DEORIA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "FAIZABAD",
        "id": "420",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "FAIZABAD<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "FARRUKHABAD",
        "id": "452",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "FARRUKHABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "FATEHPUR",
        "id": "385",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "FATEHPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GONDA",
        "id": "686",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GONDA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "HARDOI",
        "id": "454",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "HARDOI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "JAUNPUR",
        "id": "384",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "JAUNPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KANNAUJ",
        "id": "438",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KANNAUJ<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KANPUR DEHAT",
        "id": "425",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KANPUR DEHAT<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KAUSHAMBI",
        "id": "366",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KAUSHAMBI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KHERI",
        "id": "493",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KHERI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "LUCKNOW",
        "id": "435",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "LUCKNOW<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MAHARAJGANJ",
        "id": "715",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MAHARAJGANJ<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MAU",
        "id": "717",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MAU<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KANCHIPURAM",
        "id": "76",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KANCHIPURAM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAGAPATTINAAM",
        "id": "53",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAGAPATTINAAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SITAPUR",
        "id": "461",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SITAPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "SONBHADRA",
        "id": "716",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SONBHADRA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "SULTANPUR",
        "id": "401",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SULTANPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "UNNAO",
        "id": "429",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "UNNAO<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "VARANASI",
        "id": "356",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "VARANASI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "AGRA",
        "id": "442",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "AGRA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "ALIGARH",
        "id": "469",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "ALIGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "AURAIYA",
        "id": "422",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "AURAIYA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BADAUN",
        "id": "478",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BADAUN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BAGHPAT",
        "id": "511",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BAGHPAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BAREILLY",
        "id": "497",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BAREILLY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BIJNOR",
        "id": "519",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BIJNOR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "ETAH",
        "id": "453",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "ETAH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "AURANGABAAD",
        "id": "181",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AURANGABAAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "FIROZABAD",
        "id": "445",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "FIROZABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GHAZIABAD",
        "id": "501",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GHAZIABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "VIDESHA",
        "id": "294",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "VIDESHA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "JALAUN",
        "id": "397",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "JALAUN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "JHANSI",
        "id": "374",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "JHANSI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "JYOTIBAPHULE NAGAR",
        "id": "505",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "JYOTIBAPHULE NAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "LALITPUR",
        "id": "335",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "LALITPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MAHOBA",
        "id": "359",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MAHOBA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MAINPURI",
        "id": "444",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MAINPURI<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MATHURA",
        "id": "465",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MATHURA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MEERUT",
        "id": "509",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MEERUT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MORADABAD",
        "id": "508",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MORADABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "PILHIBHIT",
        "id": "498",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "PILHIBHIT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "RAMPUR",
        "id": "684",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "RAMPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "SHARANPUR",
        "id": "533",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SHARANPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "SHAHJAHANPUR",
        "id": "477",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SHAHJAHANPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "ALMORA",
        "id": "522",
        "color": "#008000",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "ALMORA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "BAGESHWAR",
        "id": "530",
        "color": "#008000",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "BAGESHWAR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "CHAMOLI",
        "id": "549",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "CHAMOLI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "CHAMPAWAT",
        "id": "514",
        "color": "#008000",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "CHAMPAWAT<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "DEHRADUN",
        "id": "547",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "DEHRADUN<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "PITHORAGARH",
        "id": "540",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "PITHORAGARH<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "RUDRAPRAYAG",
        "id": "539",
        "color": "#008000",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "RUDRAPRAYAG<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "UDHAM SINGH NAGAR",
        "id": "720",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "UDHAM SINGH NAGAR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "AMBALA",
        "id": "613",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "AMBALA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "BHIWANI",
        "id": "504",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "BHIWANI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "FARIDABAD",
        "id": "606",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "FARIDABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "GURGAON",
        "id": "483",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "GURGAON<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "HISAR",
        "id": "714",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "HISAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "JHAJJAR",
        "id": "499",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "JHAJJAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "JIND",
        "id": "521",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "JIND<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "KAITHAL",
        "id": "528",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "KAITHAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "KARNAL",
        "id": "523",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "KARNAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "KURUKSHETRA",
        "id": "529",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "KURUKSHETRA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MAHENDRAGARH",
        "id": "479",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "MAHENDRAGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MEWAT",
        "id": "607",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "MEWAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "PALWAL",
        "id": "468",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "PALWAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "PANCHKULA",
        "id": "545",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "PANCHKULA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "PANIPAT",
        "id": "515",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "PANIPAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "REWARI",
        "id": "481",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "REWARI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "ROHTAK",
        "id": "721",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "ROHTAK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "SIRSA",
        "id": "525",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SIRSA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SONIPAT",
        "id": "512",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "SONIPAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "CENTRAL DELHI",
        "id": "489",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "CENTRAL DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "EAST DELHI",
        "id": "491",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "EAST DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "NEW DELHI",
        "id": "689",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "NEW DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "NORTH DELHI",
        "id": "688",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "NORTH DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "NORTH EAST DELHI",
        "id": "496",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "NORTH EAST DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "NORTH WEST DELHI",
        "id": "502",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "NORTH WEST DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "SOUTH DELHI",
        "id": "486",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "SOUTH DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "SOUTH WEST DELHI",
        "id": "492",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "SOUTH WEST DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "WEST DELHI",
        "id": "495",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "WEST DELHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "AMRITSAR",
        "id": "564",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "AMRITSAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "BARNALA",
        "id": "536",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "BARNALA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "FARIDKOT",
        "id": "543",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "FARIDKOT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "FATEHGARH SAHIB",
        "id": "544",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "FATEHGARH SAHIB<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "GURDASPUR",
        "id": "568",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "GURDASPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "HOSHIARPUR",
        "id": "565",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "HOSHIARPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "JALANDHAR",
        "id": "557",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "JALANDHAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "KAPURTHALA",
        "id": "554",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "KAPURTHALA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "LUDHIANA",
        "id": "550",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "LUDHIANA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MANSA",
        "id": "615",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "MANSA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MOGA",
        "id": "546",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "MOGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MUKTSAR",
        "id": "541",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "MUKTSAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "PATIALA",
        "id": "719",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "PATIALA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "SANGRUR",
        "id": "538",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "SANGRUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "TARN TARAN",
        "id": "558",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "TARN TARAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "CHAMBA",
        "id": "569",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "CHAMBA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "HAMIRPURR",
        "id": "561",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "HAMIRPURR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "KANGRA",
        "id": "567",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "KANGRA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "KINNAUR",
        "id": "562",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "KINNAUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "KULLU",
        "id": "566",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "KULLU<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "MANDI",
        "id": "563",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "MANDI<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "SHIMLA",
        "id": "559",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "SHIMLA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "SIRMAUR",
        "id": "548",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "SIRMAUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "SOLAN",
        "id": "553",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "SOLAN<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "UNA",
        "id": "560",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "UNA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "ANANTNAG",
        "id": "697",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "ANANTNAG<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "BARAMULA",
        "id": "698",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "BARAMULA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "JAMMU",
        "id": "692",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "JAMMU<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "KATHUA",
        "id": "691",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "KATHUA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "LEH AND LADAKH",
        "id": "703",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "LEH AND LADAKH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "PUNCH",
        "id": "696",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "PUNCH<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "RIASI",
        "id": "693",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "RIASI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "UDHAMPUR",
        "id": "695",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "UDHAMPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "AJMER",
        "id": "431",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "AJMER<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "ALWAR",
        "id": "471",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "ALWAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BANSWARA",
        "id": "28",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BANSWARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BARAN",
        "id": "349",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BARAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BHARATPUR",
        "id": "458",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BHARATPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BHILWARA",
        "id": "711",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BHILWARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BELLARY",
        "id": "100",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BELLARY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHOLPUR",
        "id": "426",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "DHOLPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "DUNGARPUR",
        "id": "661",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "DUNGARPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "JAIPUR",
        "id": "614",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JAIPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "JHALAWAR",
        "id": "316",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JHALAWAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "JHUNJHUNU",
        "id": "485",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JHUNJHUNU<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "KARAULI",
        "id": "428",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "KARAULI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "KOTA",
        "id": "372",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "KOTA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "SWAIMADHOPUR",
        "id": "414",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "SWAIMADHOPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "SIKAR",
        "id": "472",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "SIKAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "SIROHI",
        "id": "353",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "SIROHI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "TONK",
        "id": "582",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "TONK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "UDAIPUR",
        "id": "709",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "UDAIPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BARMER",
        "id": "419",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BARMER<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BIKANER",
        "id": "506",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BIKANER<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "CHURU",
        "id": "503",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "CHURU<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "JODHPUR",
        "id": "460",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JODHPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "NAGAUR",
        "id": "463",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "NAGAUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "ANUPPUR",
        "id": "264",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "ANUPPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "BALAGHAT",
        "id": "223",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BALAGHAT<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "CHHATARPUR",
        "id": "343",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "CHHATARPUR<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "CHHINDWARA",
        "id": "236",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "CHHINDWARA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "DAMOH",
        "id": "298",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "DAMOH<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "DINDORI",
        "id": "261",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "DINDORI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "JABALPUR",
        "id": "268",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "JABALPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "KATNI",
        "id": "286",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "KATNI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "MANDLA",
        "id": "249",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "MANDLA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "PANNA",
        "id": "723",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "PANNA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "REWA",
        "id": "634",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "REWA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SAGAR",
        "id": "299",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SAGAR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SATNA",
        "id": "328",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SATNA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SEONI",
        "id": "239",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SEONI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SHAHDOL",
        "id": "291",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SHAHDOL<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SIDHI",
        "id": "304",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SIDHI<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SINGRAULI",
        "id": "602",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SINGRAULI<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "TIKAMGARH",
        "id": "358",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "TIKAMGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "UMARIA",
        "id": "285",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "UMARIA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "AGAR-MALWA",
        "id": "609",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "AGAR-MALWA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "ALIRAJPUR",
        "id": "234",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "ALIRAJPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "ASHOKNAGAR",
        "id": "610",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "ASHOKNAGAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "BARWANI",
        "id": "219",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BARWANI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "BETUL",
        "id": "224",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BETUL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "BHIND",
        "id": "418",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BHIND<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "KOTTYAM",
        "id": "37",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOTTYAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DATIA",
        "id": "391",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "DATIA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "DEWAS",
        "id": "258",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "DEWAS<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "DHAR",
        "id": "253",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "DHAR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "GUNA",
        "id": "326",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "GUNA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "GWALIOR",
        "id": "394",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "GWALIOR<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "HARDA",
        "id": "229",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "HARDA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "HOSHANGABAD",
        "id": "245",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "HOSHANGABAD<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "INDORE",
        "id": "250",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "INDORE<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "JHABUA",
        "id": "260",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "JHABUA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "KHANDWA",
        "id": "226",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "KHANDWA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "KHARGONE",
        "id": "230",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "KHARGONE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "MANDSAUR",
        "id": "312",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "MANDSAUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "MORENA",
        "id": "421",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "MORENA<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "THRISSUR",
        "id": "45",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "THRISSUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAISEN",
        "id": "276",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "RAISEN<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "RAJGARH",
        "id": "292",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "RAJGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "RATLAM",
        "id": "281",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "RATLAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SEHORE",
        "id": "270",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SEHORE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SHAJAPUR",
        "id": "295",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SHAJAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SHEOPUR",
        "id": "389",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SHEOPUR<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SHIVPURI",
        "id": "375",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "SHIVPURI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "UJJAIN",
        "id": "279",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "UJJAIN<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "ARAVALLI",
        "id": "679",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ARAVALLI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BANASKANTHA",
        "id": "320",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BANASKANTHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHARUCH",
        "id": "225",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHARUCH<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DAHOD",
        "id": "269",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DAHOD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GAZIPUR",
        "id": "371",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GAZIPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "TENI",
        "id": "39",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TENI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GANDHINAGAR",
        "id": "267",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GANDHINAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KHERA",
        "id": "263",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KHERA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHISAGAR",
        "id": "608",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAHISAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHESANA",
        "id": "293",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAHESANA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BIJAAPUR",
        "id": "119",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BIJAAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAVSARI",
        "id": "643",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAVSARI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PANCHMAHAL",
        "id": "256",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PANCHMAHAL<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PATAN",
        "id": "297",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PATAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SURAT",
        "id": "207",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SURAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TAPI",
        "id": "586",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TAPI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VADODARA",
        "id": "244",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VADODARA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VALSAD",
        "id": "195",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VALSAD<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AMRELI",
        "id": "221",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AMRELI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHAVNAGAR",
        "id": "210",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHAVNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BOTAD",
        "id": "233",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BOTAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DEVBHOOMI DWARKA",
        "id": "242",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DEVBHOOMI DWARKA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ETAWAH",
        "id": "427",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "ETAWAH<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GIR SOMNATH",
        "id": "584",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GIR SOMNATH<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAMNAGAR",
        "id": "257",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAMNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KACHCHH",
        "id": "321",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KACHCHH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MORBI",
        "id": "583",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MORBI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PORBANDAR",
        "id": "222",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PORBANDAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAJKOT",
        "id": "266",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAJKOT<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SURENDRANAGAR",
        "id": "275",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SURENDRANAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NORTH GOA",
        "id": "98",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NORTH GOA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SOUTH GOA",
        "id": "95",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SOUTH GOA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MUMBAI CITY",
        "id": "151",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MUMBAI CITY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SUBURBAN MUMBAI",
        "id": "157",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SUBURBAN MUMBAI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PALGHAR",
        "id": "172",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PALGHAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAIGAD",
        "id": "154",
        "color": "#FFFF00",
        "info": "<p><\/br>Intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAIGAD<p><\/br>Intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RATNAGIRI",
        "id": "131",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RATNAGIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SINDHUDURG",
        "id": "107",
        "color": "#FFFF00",
        "info": "<p><\/br>Intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SINDHUDURG<p><\/br>Intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "THANE",
        "id": "585",
        "color": "#FFFF00",
        "info": "<p><\/br>Moderate to intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1321 Hrs<\/br> Valid upto: 1621 Hrs <\/p>",
        "balloonText": "THANE<p><\/br>Moderate to intense spells of rain likely to occur at isolated places during next 3 hours.<\/br><\/br>Time of issue: 2020-07-19<\/br>1321 Hrs<\/br> Valid upto: 1621 Hrs <\/p>"
    },
    {
        "title": "DHULE",
        "id": "587",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHULE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JALGAON",
        "id": "198",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JALGAON<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOLHAPUR",
        "id": "114",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOLHAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NANDURBAR",
        "id": "216",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NANDURBAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NASIK",
        "id": "186",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NASIK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PUNE",
        "id": "159",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PUNE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SANGLI",
        "id": "122",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SANGLI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SATARA",
        "id": "135",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SATARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HINGOLI",
        "id": "589",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "HINGOLI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JALNA",
        "id": "179",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JALNA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LATUR",
        "id": "146",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LATUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "OSMANABAD",
        "id": "143",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "OSMANABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PARBHANI",
        "id": "166",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PARBHANI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AKOLA",
        "id": "194",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AKOLA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BHANDARA",
        "id": "593",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BHANDARA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHANDRAPUR",
        "id": "617",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHANDRAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GADCHIROLI",
        "id": "724",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GADCHIROLI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAGPUR",
        "id": "206",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAGPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WARDHA",
        "id": "622",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WARDHA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WASHIM",
        "id": "588",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WASHIM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BALOD",
        "id": "187",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BALOD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BALODA BAZAR",
        "id": "211",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BALODA BAZAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BASTAR",
        "id": "160",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BASTAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AMBEDKARNAGAR",
        "id": "408",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "AMBEDKARNAGAR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DANTEWARA",
        "id": "591",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DANTEWARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHAMTARI",
        "id": "185",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHAMTARI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JASHPUR",
        "id": "255",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JASHPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KANKER",
        "id": "176",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KANKER<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KONDAGAON",
        "id": "169",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KONDAGAON<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KORBA",
        "id": "243",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KORBA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOREA",
        "id": "603",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOREA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHASAMUND",
        "id": "200",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAHASAMUND<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MUNGELI",
        "id": "601",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MUNGELI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NARAYANPUR",
        "id": "592",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NARAYANPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAIGARH",
        "id": "235",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAIGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAIPUR",
        "id": "594",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAIPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAJNANDGAON",
        "id": "713",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAJNANDGAON<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SUKMA",
        "id": "155",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SUKMA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SURAJPUR",
        "id": "308",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SURAJPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SURGUJA",
        "id": "604",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SURGUJA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EAST GODAVARI",
        "id": "127",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "EAST GODAVARI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KRISHNA",
        "id": "113",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KRISHNA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NELLORE",
        "id": "91",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NELLORE<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PRAKASAM",
        "id": "103",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PRAKASAM<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SRIKAKULAM",
        "id": "149",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SRIKAKULAM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VISHAKHAPATNAM",
        "id": "138",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1135 Hrs<\/br> Valid upto: 0235 Hrs <\/p>",
        "balloonText": "VISHAKHAPATNAM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1135 Hrs<\/br> Valid upto: 0235 Hrs <\/p>"
    },
    {
        "title": "WEST GODAVARI",
        "id": "130",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WEST GODAVARI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KURNOOL",
        "id": "102",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KURNOOL<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ADILABAD",
        "id": "164",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ADILABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "B. KOTHAGUDEM",
        "id": "707",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "B. KOTHAGUDEM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "J. BHUPALPALLY",
        "id": "629",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "J. BHUPALPALLY<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAGTIAL",
        "id": "148",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAGTIAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JANGAON",
        "id": "126",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JANGAON<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JOGULAMBA GADWAL",
        "id": "104",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JOGULAMBA GADWAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KAMAREDDY",
        "id": "708",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KAMAREDDY<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KARIMNAGAR",
        "id": "141",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KARIMNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KHAMMAM",
        "id": "120",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KHAMMAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "M. MALKAJGIRI",
        "id": "123",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "M. MALKAJGIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHABUBABAD",
        "id": "128",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAHABUBABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHABUBNAGAR",
        "id": "112",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAHABUBNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MANCHERIAL",
        "id": "153",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MANCHERIAL<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MEDAK",
        "id": "129",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MEDAK<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAGARKURNOOL",
        "id": "109",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAGARKURNOOL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NALGONDA",
        "id": "115",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NALGONDA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NIRMAL",
        "id": "706",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NIRMAL<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NIZAMABAD",
        "id": "147",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NIZAMABAD<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PEDDAPALLE",
        "id": "144",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PEDDAPALLE<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAJANNA SIRCILLA",
        "id": "140",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAJANNA SIRCILLA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RANGAREDDY",
        "id": "118",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RANGAREDDY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SANGAREDDY",
        "id": "134",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SANGAREDDY<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SURYAPET",
        "id": "117",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SURYAPET<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VIKARABAD",
        "id": "121",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VIKARABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WANAPARTHY",
        "id": "106",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WANAPARTHY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WARANGAL_RURAL",
        "id": "133",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WARANGAL_RURAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WARANGAL_URBAN",
        "id": "132",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WARANGAL_URBAN<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "Y. BHUVANAGIRI",
        "id": "125",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "Y. BHUVANAGIRI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ARIYALUR",
        "id": "56",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ARIYALUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "COIMBATORE",
        "id": "55",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "COIMBATORE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CUDDALORE",
        "id": "61",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CUDDALORE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DINDIGUL",
        "id": "46",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DINDIGUL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ERODE",
        "id": "64",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ERODE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KANYAKUMARI",
        "id": "30",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KANYAKUMARI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KARUR",
        "id": "49",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KARUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KRISHNAGIRI",
        "id": "75",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KRISHNAGIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MADURAI",
        "id": "41",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MADURAI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAMAKKAL",
        "id": "59",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAMAKKAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PUDUKKOTTAI",
        "id": "44",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PUDUKKOTTAI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAMANATHAPURAM",
        "id": "32",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAMANATHAPURAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SALEM",
        "id": "66",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SALEM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SIVAGANGA",
        "id": "43",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SIVAGANGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "THANJAVUR",
        "id": "50",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "THANJAVUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRUNELVELI",
        "id": "35",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TIRUNELVELI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRUPPUR",
        "id": "52",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TIRUPPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRUVALLUR",
        "id": "712",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TIRUVALLUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRUVANNAMALAI",
        "id": "74",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TIRUVANNAMALAI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VELLORE",
        "id": "79",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VELLORE<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VILLUPURAM",
        "id": "69",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VILLUPURAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VIRUDHUNAGAR",
        "id": "36",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "VIRUDHUNAGAR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "UDUPI",
        "id": "86",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "UDUPI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "UTTAR KANNADA",
        "id": "96",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "UTTAR KANNADA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BIDAR",
        "id": "137",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BIDAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHARWAD",
        "id": "97",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHARWAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GADAG",
        "id": "99",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GADAG<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HAVERI",
        "id": "93",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "HAVERI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOPPAL",
        "id": "101",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOPPAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAICHUR",
        "id": "105",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAICHUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "YADGIR",
        "id": "590",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "YADGIR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BALRAMPUR",
        "id": "459",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BALRAMPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "CHITRADURGA",
        "id": "90",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHITRADURGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DAVANGERE",
        "id": "89",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DAVANGERE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HASSAN",
        "id": "83",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "HASSAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KODAGU",
        "id": "73",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KODAGU<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MANDHYA",
        "id": "77",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MANDHYA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ERNAKULAM",
        "id": "40",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ERNAKULAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "IDUKKI",
        "id": "42",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "IDUKKI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KASARAGODE",
        "id": "72",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KASARAGODE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOLLAM",
        "id": "33",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOLLAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MALAPPURAM",
        "id": "58",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MALAPPURAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PALAKKAD",
        "id": "51",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PALAKKAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PATHANAMTHITTA",
        "id": "618",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PATHANAMTHITTA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "LAKSHADWEEP",
        "id": "574",
        "color": "#FFFF00",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LAKSHADWEEP<p>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "THIRUVANANTHAPURAM",
        "id": "31",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "THIRUVANANTHAPURAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "THIRUVARUR",
        "id": "48",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "THIRUVARUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BULDHANA",
        "id": "197",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BULDHANA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NARSHIMAPURA",
        "id": "254",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "NARSHIMAPURA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Light to Moderate Rain with Lightning\r\n\r\n \r\n\r\n\u0939\u0932\u094d\u0915\u0940 \u0938\u0947 \u092e\u0927\u094d\u092f\u092e \u0935\u0930\u094d\u0937\u093e \u0924\u0925\u093e \u0935\u091c\u094d\u0930\u092a\u093e\u0924<\/br><\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "ANUGUL",
        "id": "204",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ANUGUL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BILAASPUR",
        "id": "556",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "BILAASPUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "KIPHIRE",
        "id": "627",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>",
        "balloonText": "KIPHIRE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1255 Hrs<\/br> Valid upto: 1555 Hrs <\/p>"
    },
    {
        "title": "PRATAAPGARH",
        "id": "29",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "PRATAAPGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "BALESHWAR",
        "id": "215",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BALESHWAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HAMIRPUR",
        "id": "382",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "HAMIRPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DAMAN",
        "id": "616",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DAMAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GORAKHPUR",
        "id": "433",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GORAKHPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DIU",
        "id": "705",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DIU<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RI BHOI",
        "id": "7",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RI BHOI<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KARBI ANALOG",
        "id": "8",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KARBI ANALOG<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KAMRUP METRO",
        "id": "10",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KAMRUP METRO<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOCHBIHAR",
        "id": "11",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "KOCHBIHAR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "NALBARI",
        "id": "13",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NALBARI<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KAMRUP RURAL",
        "id": "15",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KAMRUP RURAL<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SONITPUR",
        "id": "23",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SONITPUR<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PRATAPGARH",
        "id": "380",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "PRATAPGARH<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "TUTICORIN",
        "id": "34",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TUTICORIN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ALAPPUZHA",
        "id": "38",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ALAPPUZHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAGAPATTINAM",
        "id": "47",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAGAPATTINAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TIRUCHIRAPPALLI",
        "id": "54",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TIRUCHIRAPPALLI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PERAMBALUR",
        "id": "57",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PERAMBALUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NILGIRI",
        "id": "60",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NILGIRI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOZHIKODE",
        "id": "62",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KOZHIKODE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PUDUCHERY",
        "id": "63",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PUDUCHERY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "WAYANAD",
        "id": "65",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "WAYANAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHAMARAJANAGAR",
        "id": "67",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHAMARAJANAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KANNUR",
        "id": "68",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KANNUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHARAMPURI",
        "id": "70",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHARAMPURI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MYSORE",
        "id": "71",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MYSORE<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHENNAI",
        "id": "78",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHENNAI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DAKSHIN KANNADA",
        "id": "80",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DAKSHIN KANNADA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BANGLORE URBAN",
        "id": "81",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BANGLORE URBAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAMNAGAR",
        "id": "82",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAMNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHIKMAGALUR",
        "id": "84",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHIKMAGALUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHITTOOR",
        "id": "85",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHITTOOR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "TUMKUR",
        "id": "87",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "TUMKUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SHIMOGA",
        "id": "88",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SHIMOGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CUDDAPAH",
        "id": "92",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CUDDAPAH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "ANANTHAPUR",
        "id": "94",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ANANTHAPUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GUNTUR",
        "id": "108",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GUNTUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BAGALKOT",
        "id": "110",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BAGALKOT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BELGAUM",
        "id": "111",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BELGAUM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "HYDERABAD",
        "id": "116",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "HYDERABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BIJAPUR",
        "id": "156",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BIJAPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GULBARGA",
        "id": "124",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GULBARGA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SIDDIPET",
        "id": "136",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SIDDIPET<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SOLAPUR",
        "id": "139",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SOLAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MULUGU",
        "id": "145",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MULUGU<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1301 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "VIZIANAGARAM",
        "id": "150",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1135 Hrs<\/br> Valid upto: 0235 Hrs <\/p>",
        "balloonText": "VIZIANAGARAM<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1135 Hrs<\/br> Valid upto: 0235 Hrs <\/p>"
    },
    {
        "title": "BID",
        "id": "158",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BID<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GAJAPATHI",
        "id": "162",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GAJAPATHI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NANDED",
        "id": "163",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NANDED<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAYAGARHA",
        "id": "165",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "RAYAGARHA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NABARANGAPUR",
        "id": "167",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NABARANGAPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AHMADNAGAR",
        "id": "168",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AHMADNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1240 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KHORDHA",
        "id": "174",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KHORDHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NAYAGARH",
        "id": "177",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NAYAGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "YAVATMAL",
        "id": "180",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "YAVATMAL<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AURANGABAD",
        "id": "325",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AURANGABAD<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KENDRAPARHA",
        "id": "183",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KENDRAPARHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BAUDA",
        "id": "184",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BAUDA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BALANGIR",
        "id": "188",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BALANGIR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NUAPARHA",
        "id": "189",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NUAPARHA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DANGS",
        "id": "190",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DANGS<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SUBARNAPUR",
        "id": "191",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SUBARNAPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DHENKANAL",
        "id": "192",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DHENKANAL<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAJAPUR",
        "id": "193",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JAJAPUR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DURG",
        "id": "199",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DURG<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GARIABAND",
        "id": "201",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GARIABAND<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GONDIYA",
        "id": "202",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "GONDIYA<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BURHANPUR",
        "id": "203",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BURHANPUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1440 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "SOUTH 24 PARGANAS",
        "id": "208",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "SOUTH 24 PARGANAS<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "AMARAVATI",
        "id": "209",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AMARAVATI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JUNAGARH",
        "id": "212",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JUNAGARH<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BARAGARH",
        "id": "213",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BARAGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BEMETARA",
        "id": "214",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BEMETARA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KENDUJHAR",
        "id": "218",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KENDUJHAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JANJGIR_CHAMPA",
        "id": "220",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "JANJGIR_CHAMPA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KABIRDHAM",
        "id": "227",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "KABIRDHAM<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "EASTMEDNIPUR",
        "id": "231",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "EASTMEDNIPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "MAYURBHANJ",
        "id": "232",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAYURBHANJ<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KOLKATA",
        "id": "237",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "KOLKATA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "HAORA",
        "id": "238",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "HAORA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "ANAND",
        "id": "240",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ANAND<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PASCHIM SINGHBHUMI",
        "id": "241",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>",
        "balloonText": "PASCHIM SINGHBHUMI<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>"
    },
    {
        "title": "PASHCHIM MEDINIPUR",
        "id": "246",
        "color": "#FFFF00",
        "info": "<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "PASHCHIM MEDINIPUR<p><\/br>Thunderstorm with lightning and light to moderate rainfall likely to affect some parts  during next 2-3 hours from 14:20 hours IST of today the 19th July\u20192020.<\/br><\/br>Time of issue: 2020-07-19<\/br>1417 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "BILASPUR",
        "id": "248",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BILASPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SARAIKELA",
        "id": "252",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1130 Hrs<\/br> Valid upto: 1430 Hrs <\/p>",
        "balloonText": "SARAIKELA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1130 Hrs<\/br> Valid upto: 1430 Hrs <\/p>"
    },
    {
        "title": "HUGLI",
        "id": "262",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "HUGLI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "NORTH 24 PRAGANA",
        "id": "265",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "NORTH 24 PRAGANA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "AHMADABAD",
        "id": "273",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AHMADABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PURULIYA",
        "id": "278",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "PURULIYA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "BHOPAL",
        "id": "280",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "BHOPAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "BARDAMAN",
        "id": "283",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "BARDAMAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "HAZARIBAGH",
        "id": "296",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "HAZARIBAGH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MAMIT",
        "id": "306",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MAMIT<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "AIZAWL",
        "id": "313",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "AIZAWL<p><\/br><\/br>Thundershower with lightening & strong surface wind is likely to occur at isolated places. Light to moderate rain is very likely to occur at few places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "KODARMA",
        "id": "315",
        "color": "#FFFF00",
        "info": "<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "KODARMA<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "CHITTAURGARH",
        "id": "323",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "CHITTAURGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "NIMACH",
        "id": "327",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>",
        "balloonText": "NIMACH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1435 Hrs<\/br> Valid upto: 1830 Hrs <\/p>"
    },
    {
        "title": "CHURACHANDPUR",
        "id": "329",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHURACHANDPUR<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MIRZAPUR",
        "id": "336",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MIRZAPUR<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "GOODA",
        "id": "341",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>",
        "balloonText": "GOODA<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1320 Hrs<\/br> Valid upto: 1620 Hrs <\/p>"
    },
    {
        "title": "SAHEBGANJ",
        "id": "348",
        "color": "#FFFF00",
        "info": "<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "SAHEBGANJ<p>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "SANTRAVIDASNAGAR",
        "id": "351",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SANTRAVIDASNAGAR<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "MUNGER",
        "id": "352",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MUNGER<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DAKSHIN DINAJPUR",
        "id": "367",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "DAKSHIN DINAJPUR<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "BUNDI",
        "id": "373",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "BUNDI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "RAJSMAND",
        "id": "377",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "RAJSMAND<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "PURNIA",
        "id": "390",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PURNIA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DARBHANGA",
        "id": "400",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DARBHANGA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "RAIBEARELI",
        "id": "404",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "RAIBEARELI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KANPUR",
        "id": "405",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KANPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "PALI",
        "id": "406",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "PALI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "PEREN",
        "id": "407",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PEREN<p><\/br><\/br> Light to moderate rain is very likely to occur at few places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "UTTAR_DINAJPUR",
        "id": "412",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "UTTAR_DINAJPUR<p><\/br><\/br>Thunderstorm with lightning and light to moderate rainfall likely to continue over some parts <\/br>Time of issue: 2020-07-19<\/br>1239 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "ARARIYA",
        "id": "413",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "ARARIYA<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MADUBANI",
        "id": "416",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "MADUBANI<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "PURBA CHAMPARAN",
        "id": "430",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PURBA CHAMPARAN<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SANTKABIRNAGAR",
        "id": "434",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SANTKABIRNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KUSHINAGAR",
        "id": "439",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KUSHINAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DARJEELING",
        "id": "441",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "DARJEELING<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1155 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "SIDDHARTHNAGAR",
        "id": "447",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SIDDHARTHNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "PACHIM CHAMPARAN",
        "id": "448",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "PACHIM CHAMPARAN<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br>Low cloud to ground Lightning probability ( < 30% probability of lightning occurrence)<\/br> Moderate rain: 5-15 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "MAHAMAYANAGAR",
        "id": "457",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MAHAMAYANAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "SHRAWASTI",
        "id": "464",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "SHRAWASTI<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "KANSHIRAMNAGAR",
        "id": "467",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "KANSHIRAMNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BAHRAICH",
        "id": "474",
        "color": "#ffa500",
        "info": "<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BAHRAICH<p>Moderate rain: 5-15 mm\/hr<\/br> Moderate Thunderstorms with maximum surface wind speed between 41 \u2013 61 kmph (In gusts)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "DIBRUGARH",
        "id": "475",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DIBRUGARH<p><\/br><\/br>Light to moderate rain is very likely to occur at many places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JAISELMER",
        "id": "476",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JAISELMER<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "LAKHIMPUR",
        "id": "487",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LAKHIMPUR<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GAUTAMBUDHNAGAR",
        "id": "488",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "GAUTAMBUDHNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "BULANDSAHAR",
        "id": "490",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "BULANDSAHAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "NANITAL",
        "id": "516",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "NANITAL<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "MUZAFARNAGAR",
        "id": "518",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>",
        "balloonText": "MUZAFARNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1430 Hrs<\/br> Valid upto: 1730 Hrs <\/p>"
    },
    {
        "title": "FATEHABAD",
        "id": "520",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "FATEHABAD<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "HARIDWAR",
        "id": "526",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "HARIDWAR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "PAURI GARHWAL",
        "id": "527",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "PAURI GARHWAL<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "DIBANG VALLEY",
        "id": "531",
        "color": "#FFFF00",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DIBANG VALLEY<p><\/br><\/br> Light to moderate rain is very likely to occur at many places. <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "GANGANAGAR",
        "id": "532",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "GANGANAGAR<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "YAMUNANAGAR",
        "id": "534",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "YAMUNANAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "BATHINDA",
        "id": "535",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "BATHINDA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "CHANDIGARH",
        "id": "537",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "CHANDIGARH<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "TEHRI GARWAL",
        "id": "542",
        "color": "#008000",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "TEHRI GARWAL<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "FIROZPUR",
        "id": "551",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "FIROZPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "NAWASHAHR",
        "id": "552",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "NAWASHAHR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "UTTARKASHI",
        "id": "555",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>",
        "balloonText": "UTTARKASHI<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1145 Hrs<\/br> Valid upto: 1445 Hrs <\/p>"
    },
    {
        "title": "LAHUL&SPITI",
        "id": "570",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>",
        "balloonText": "LAHUL&SPITI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1200 Hrs<\/br> Valid upto: 1500 Hrs <\/p>"
    },
    {
        "title": "NORTH & MIDDLE ANDAMAN",
        "id": "571",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "NORTH & MIDDLE ANDAMAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "SOUTH ANDAMAN",
        "id": "572",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>",
        "balloonText": "SOUTH ANDAMAN<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1153 Hrs<\/br> Valid upto: 1400 Hrs <\/p>"
    },
    {
        "title": "LOWER DIBANG VALLEY",
        "id": "611",
        "color": "#ffa500",
        "info": "<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "LOWER DIBANG VALLEY<p><\/br><\/br> Light to moderate rain is very likely to occur at most places.Heavy rain is likely to occur at isolated places.<\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "BANGLORE RURAL",
        "id": "612",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "BANGLORE RURAL<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "CHHOTA UDEPUR",
        "id": "638",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHHOTA UDEPUR<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "DADAR & NAGAR HAVELI",
        "id": "647",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "DADAR & NAGAR HAVELI<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "JALOR",
        "id": "669",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "JALOR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "SABAR KANTHA",
        "id": "670",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "SABAR KANTHA<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "NARMADA",
        "id": "683",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "NARMADA<p>Light rain: < 5 mm\/hr<\/br> <\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    },
    {
        "title": "SAS NAGAR",
        "id": "690",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "SAS NAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "MIRPUR",
        "id": "694",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "MIRPUR<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "MUZAFARABAD",
        "id": "699",
        "color": "#FFFF00",
        "info": "<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "MUZAFARABAD<p>Light rain: < 5 mm\/hr<\/br> Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "CHILAS",
        "id": "700",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "CHILAS<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "GILGIT WAZARAT",
        "id": "701",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "GILGIT WAZARAT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "TRIBAL TERITORY",
        "id": "702",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "TRIBAL TERITORY<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "GILGIT",
        "id": "704",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>",
        "balloonText": "GILGIT<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1420 Hrs<\/br> Valid upto: 1720 Hrs <\/p>"
    },
    {
        "title": "HANUMANGARH",
        "id": "710",
        "color": "#FFFF00",
        "info": "<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>",
        "balloonText": "HANUMANGARH<p>Light Thunderstorms with maximum surface wind speed less than 40 kmph <\/br><\/br><\/br>light to moderate rain<\/br>Time of issue: 2020-07-19<\/br>1230 Hrs<\/br> Valid upto: 1530 Hrs <\/p>"
    },
    {
        "title": "RUPNAGAR",
        "id": "718",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>",
        "balloonText": "RUPNAGAR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1259 Hrs<\/br> Valid upto: 1559 Hrs <\/p>"
    },
    {
        "title": "PURBI SINGBHUMI",
        "id": "722",
        "color": "#ffa500",
        "info": "<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>",
        "balloonText": "PURBI SINGBHUMI<p>Moderate cloud to ground Lightning probability (30 - 60% probability of lightning occurrence)<\/br> <\/br>Time of issue: 2020-07-19<\/br>1400 Hrs<\/br> Valid upto: 1700 Hrs <\/p>"
    },
    {
        "title": "CHIKBALLAPUR",
        "id": "725",
        "color": "#008000",
        "info": "<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>",
        "balloonText": "CHIKBALLAPUR<p>No Warning <\/br><\/br>Time of issue: 2020-07-19<\/br>1300 Hrs<\/br> Valid upto: 1600 Hrs <\/p>"
    }
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
                            "autoZoom": true,
                             "outlineColor":"#000000",
                           "rollOverColor":undefined,
                            "selectedColor": undefined,
                          "rollOverColor":undefined
                       },
                    "hideCredits":"true",
                      legend: {
                        divId: "legenddiv",
                        "data": [{
                            "title": "No warning",
                            "color": "#008000"
                          }, {
                            "title": "Watch",
                            "color": "#FFCC33"
                          },

                      {
                            "title": "Alert",
                            "color": "#FFA500"
                          },
                      {
                            "title": "Warning",
                            "color": "#FF0000"
                          }

                      ]

                      }


                        });
                      //map.addListener("rollOverMapObject", function(event) {
                        //document.getElementById("info").innerHTML = '<p><b>' + event.mapObject.title + '</b></p><p>' + event.mapObject.info + '</p>';
                      //});  
                      });

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
                        for(var i = 0; i < svg.length; i++) {
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

                      //console.log(AmCharts.maps.loaded.svg.g.path);

                      </script>

      <script src="js/libs/jquery-1.10.2.min.js"></script>
      <script src="js/home.js"></script>
      <script src="libs/easyab/easyab.min.js" type="text/javascript"></script>

      <script> 
      jQuery('#Satellite').hover(function() { 

          jQuery('#banner #right_div').css({'background-image': 'url(assets/img/sattelite.jpg)', 'background-position': '-122px'}); 

      }); 

      jQuery('#Radar').hover(function() { 

          jQuery('#banner #right_div').css({'background-image': 'url(assets/img/radar.jpg)', 'background-position': '0px'}); 

      }); 

      jQuery('#Current').hover(function() { 

          jQuery('#banner #right_div').css("background-image", "url(assets/img/current_weather.jpg)"); 

      }); 

      jQuery('#Rainfall').hover(function() { 

          jQuery('#banner #right_div').css({'background-image': 'url(assets/img/current_weather.jpg)'}); 

      }); 

      jQuery('#Weather').hover(function() { 

          jQuery('#banner #right_div').css("background-image", "url(assets/img/video.jpg)"); 

      }); 
</script>


      
      
   </body>
  
</html>

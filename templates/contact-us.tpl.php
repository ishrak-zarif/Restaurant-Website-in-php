<?php 
//$current_page_name = 'contact-us';
require_once dirname(__FILE__) . '/header.inc.php';?>


<?php /*
<div id="items_3" class="main_content">
    <div class="page_heading foodMenuHeading">
        <?php echo $this->current_page_body_title;?>				
    </div>	
    
        <div class="menus">
            <?php echo (!empty($this->contact_info) && !empty($this->contact_info['content']) ? html_entity_decode($this->contact_info['content']) : '');?>
        </div>		
</div>
*/?>

   	
  <div class="main_body_content">
	<div class="welcome_text_area">
	  <table width="93%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="welcome_title" style="width:172px;"> Contact Us </td>
		  <td class="welcome_title_bg">&nbsp;</td>
		</tr>
	  </table>
	  
	  
	  <div class="werlcome_text">
		<p align="center"><strong><em>BIG BUN</em></strong> is located in the center of Dhaka at Uttara, a small distance from Airport.</p>
		<p align="center">House Building Road,<br/>
		  Uttara, Dhaka-1230
		<div align="left" style="width:150px; margin:auto; margin-top:-10px;"> Tel:&nbsp;+(880)18-22-994292
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+(880)19-20-213696 </div>
		<br/>
		</p>
		<p align="center"> Opening Hours:</p>
		<p align="center">7 days a week
		<div align="center">10:00 am to 8:00 pm</div>
		</p>
		<!--<p align="center"><br/>
		  For reservations please call</p>
		
		<!--Contact for reserve form-->
		<!--<div class="right_field contact_form_div_wrap">
		  <form name="contact_us_form" id="contact_us_form" method="post" action="" onsubmit="return submit_contact_form('contact_us_form')">
			<div class="contact_form">
			  <div class="contact_form_left">Name:</div>
			  <div class="contact_form_right">
				<input name="name" id="name" type="text" class="input_box" value="" />
			  </div>
			</div>
			<div class="contact_form">
			  <div class="contact_form_left">Telephone:</div>
			  <div class="contact_form_right">
				<input name="telephone" id="telephone" class="input_box" value="" />
			  </div>
			</div>
			<div class="contact_form">
			  <div class="contact_form_left">Email:</div>
			  <div class="contact_form_right">
				<input name="email" id="email" type="text" class="input_box" value="" />
			  </div>
			</div>
			<div class="contact_form">
			  <div class="contact_form_left">Comments:</div>
			  <div class="contact_form_right">
				<textarea rows="" name="comment" cols="" id="comment" class="input_box" style="width:300px; height:100px" ></textarea>
			  </div>
			</div>-->
            <p align="center"><br/>
		  		Our restaurant at Google Map
            </p>
            <div id="google-map"> 
            
			</div>
			<!--<div class="contact_form">
			  <div class="contact_form_left">&nbsp;</div>
			  <div class="contact_form_right">
				<input type="hidden" name="page_form_mandatory" id="page_form_mandatory" value="name,telephone,email,comment" />
				<input type="hidden" name="page_form_valid_email" id="page_form_valid_email" value="email" />
				<input type="hidden" name="admin_email" id="admin_email" value="" />
				<input type="hidden" name="admin_name" id="admin_name" value="" />
				<input type="hidden" name="thankyou_message" id="thankyou_message" value="Thank you for contact us." />
				<input type="image" src="images/gc_submit.png" border="0" />
			  </div>
			</div>
		  </form>
		</div>
		<!--End Reserve form-->
	  </div>
	  

	</div>
  </div>
  <script>
		//for google map
		
		    var map;
			$(document).ready(function(){
			  map = new GMaps({
				el: '#google-map',
				lat: 23.8737218,
				lng: 90.4007328,
				scrollwheel:true
			  });
			  map.addMarker({
				lat: 23.8737218,
				lng: 90.4007328,
				title: 'Lima',
				details: {
				  database_id: 42,
				  author: 'HPNeo'
				},
				click: function(e){
				  if(console.log)
					console.log(e);
				  alert('You clicked in this marker');
				},
				mouseover: function(e){
				  if(console.log)
					console.log(e);
				}
			  });
			  map.addMarker({
				lat: 23.8737218,
				lng: 90.4007328,
				title: 'Marker with InfoWindow',
				infoWindow: {
				  content: '<p>HTML Content</p>'
				}
			  });
			});
		
		</script>








<?php require_once dirname(__FILE__) . '/footer.inc.php';?>
		
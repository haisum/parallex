<?php
/* @var $this SiteController */
?>

<?php echo $fbJsSdk; ?>
<!-- Site will be fade-in using the below pageFade div -->
<div class="pageFade" style="background-color:#ececec; width:100%;height:100%; z-index:1000000; position:fixed"></div>

<!--
Site main frame begin
Note: Don't edit main frame, except comment area
-->



<div  class="header">	
	<div class="container headerContent">
        	
		<!-- Place your logo here. data-src-small use to add logo for mobile device -->
		<div class="logo" >
			<a href="#home"><img src="images/logo.png" data-src-small="images/logo_s.png" alt="logo text"></a>
        </div>
		
		<div class="top-links">
			<div id="guest-menu" <?php if(!Yii::app()->user->isGuest){ ?> style="display:none;" <?php } ?>>
				<a id="fb-login-button"><img src="images/fb-login.png" /></a>
				<a href="#login" class="top-link"> Login </a>
				<a href="#register" class="top-link"> Register </a>
			</div>
			<div id="authenticated-menu"<?php if(Yii::app()->user->isGuest){ ?> style="display:none;" <?php } ?>>
				<div class="top-link" id="current-user" style="color:white;">Welcome, <?php echo Yii::app()->user->name; ?>&nbsp;</div>
				<a href="<?php echo $this->createUrl('/site/logout'); ?>" class="top-link"> Logout </a>
			</div>
			<form class="top-link" id="search-form" action="javascript:;">
				<?php
				$tempData = CHtml::listData(Program::model()->findAll(), 'id', 'name');
				$data = array();
				foreach ($tempData as $key => $value) {
					$data[] = array("label" => $value,
									"value" => $value,
									"id" => $key
									);
				}
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				    'name'=>'search',
				    'source'=>$data,
				    // additional javascript options for the autocomplete plugin
				    'options'=>array(
				    	'select' => 'js:function(event, ui){
				    		$("#program_"+ui.item.id).click();
				    	}'
				    ),
				    'htmlOptions' => array(
				    	'placeholder' => 'Search'
				    )
				));
				?>
				<img src="images/search-button.png" alt="search"/>
			</form>
		</div>
                
		<div class="nav">
			<div id="mobile_nav"> <span>SELECT PAGE </span> </div>
			<ul>
                <!--  Add require site page navigation -->                    
                <li><a href="#home">Home</a></li> 
                <li><a href="#music">Music</a>
					<!-- Sub menu -->
					<?php if(count($programs["music"]["programs"]) > 0){ ?>
                	<ul>
                		<?php foreach($programs["music"]["programs"] as $program){ ?>
                			<li><a href="javascript:;" onclick="$('#program_<?php echo $program["id"]; ?>').click();"><?php echo $program["name"]; ?></a></li>
                		<?php } ?>
                	</ul>
                	<?php } ?>
                <li><a href="#drama">Drama Series</a> 
                	<!-- Sub menu -->
                	<?php if(count($programs["drama"]["programs"]) > 0){ ?>
                	<ul>
                		<?php foreach($programs["drama"]["programs"] as $program){ ?>
                			<li><a href="javascript:;" onclick="$('#program_<?php echo $program["id"]; ?>').click();"><?php echo $program["name"]; ?></a></li>
                		<?php } ?>
                	</ul>
                	<?php } ?>
                </li>
                <li><a href="#shows">Shows</a>
                	<!-- Sub menu -->
                	<?php if(count($programs["shows"]["programs"]) > 0){ ?>
                	<ul>
                		<?php foreach($programs["shows"]["programs"] as $program){ ?>
                			<li><a href="javascript:;" onclick="$('#program_<?php echo $program["id"]; ?>').click();"><?php echo $program["name"]; ?></a></li>
                		<?php } ?>
                	</ul>
                	<?php } ?>
                </li>
                    
                <li><a href="#schedule">Schedule</a></li>
				<li><a href="#live">Live</a></li>
				<li><a href="#mobile" class="last">Mobile</a></li>
				<li><a href="#" class="last">Shop</a></li>				
			</ul>
		</div>             
	</div>
</div>       

<!-- The Dynamic content will be load inside the below mainContainer div-->
<div class="mainContainer" >
    
    <div id="bodyContent" >
        
        <!-- Portfolio/News full details content are load in backArea id div  -->
       	<div id="backArea" ></div>
        
         <div ><div id="fsTextWarp" ></div></div>
        
        <div class="dynamicLoad" >
            <div class="contentWarp container" >
            	<!-- Page content are loaded inside the pageHolder div  -->
				<div class="pageHolder" ></div>        
            </div>
        </div>
        
    </div>

</div>
<?php echo $static["music"] . $static["drama"] . $static["shows"] . $static["schedule"] . $static["live"] . $static["mobile"]; ?>

<!-- Hidden Bottom Page -->
       
<div class="staticContent bgShadowCenter" id="bottom-page" data-id="bottom_page" style="padding:100px 0px 0px 0px; overflow:hidden" >   	

</div>

<div class="hiddenPage">
	<div id="privacy-policy">
		<h1> Privacy Policy </h1>
		<p> You are not allowed to copy any of the material posted on this website. </p>
	</div>
</div>

<div class="hiddenPage">
	<div id="disclaimer">
		<h1> Disclaimer </h1>
		<p> You are not allowed to copy any of the material posted on this website. </p>
	</div>
</div>	
        

<!-- Bottom Menu -->
<div class="bottom-menu">
	<div class="container nav">
		<a class="bottom-link" id="about-us-link" href="#home"> About Us </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="advertise"> Advertise with Us </a>
		<a class="bottom-link" id="tune-in-link" href="#home"> Tune in </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="music_gallery"> Music </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="video_gallery"> Video </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="video_submission"> Music Video Submission </a>
		<a class="bottom-link pop-up-link" id="privacy-link" href="#privacy-policy"> Privacy Policy </a>
		<a class="bottom-link pop-up-link" id="disclaimer-link" href="#disclaimer"> Disclaimer </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="career"> Career </a>
		<a class="bottom-link" href="#bottom_page" data-page-id="contact_us"> Contact Us </a>
	</div>
</div>

<!-- Footer Content -->
<div class="footer"  >
	<div class="container" > 
		<!-- Place your copyright text -->
		<div class="five columns"><h6 class="bottomText">Copyright <?php echo date('Y'); ?> © NEX1 TV All rights reserved.</h6></div>
		<!-- Address -->
		<div class="three columns"><h6 class="bottomText"></h6></div>
		<!-- Email -->
		<div class="three columns"><h6 class="bottomText"><span class="list2_white">support@nex1.tv</span></h6></div>   
		<!-- Social network web page link  -->
		<div class="four  columns offset-by-one">
			<ul class="social_bookmarks noMargin">                 
				<li class="twitter_white noMargin"><a href="<?php echo $settings["twitterProfile"]; ?>">Follow us on Twitter</a></li>
				<li class="facebook_white noMargin"><a href="<?php echo $settings["facebookProfile"]; ?>">Join our Facebook Group</a></li>
				<li class="gplus_white noMargin"><a href="<?php echo $settings["googlePlusProfile"]; ?>">Join me on Google Plus</a></li>
				<li class="linkedin_white noMargin"><a href="<?php echo $settings["linkedinProfile"]; ?>">Add me on Linkedin</a></li>
				<li class="rss_white noMargin"><a href="<?php echo $settings["rssFeedUrl"]; ?>">RSS</a></li>
			</ul>
		</div> 
	</div>
</div>

<!-- End site main frame -->

<!-- 
Begin Page content
 
Note: mobile_spacing class is used to add spacing arround the content in mobile device not in desktop,
if you remove the mobile_spacing class, the layout design doesn't effect in desktop it only effect in mobile device
 -->
  
<div class="container" >


<!--
This is the template for a page. A page displays at the top of the website. It is placed in the pageHolder div in the
index page. To link to the page below use: <a href="#page-template">Page Template</a>-->
<div class="page" data-id="page-template">
The content goes here.
</div>
<?php echo $pages["home"] . $pages["login"] . $pages["register"]; ?>
</div>
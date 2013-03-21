<!-- Features page -->
                
<div class="page" data-id="features" >
     <div class="pgContent">
     

         <div class="row" > <div class="bottom_spacing"></div> </div>
         
         <div class="six columns alpha" >
			<div class="mobile_spacing" >
            	<!-- Tab Example-->
             	<h3 class="title_light">Tab</h3>
             	<br>
        		 <!-- Tab Navigation Begin -->       
                 <ul class="tabs">
                 	<!-- Set class name active to the required li tag-->
					<li><a class="active"  href="#tab1">Tab 1</a></li>
                    <li><a href="#tab2">Tab 2</a></li>
                    <li><a href="#tab3">Video</a></li>
                 </ul>
                                            
                 <!-- Tab Content -->                      
                 <ul class="tabs-content">
					<!-- Set class name active to the corresponding li tag-->
                    <li id="tab1"  class="active" >
						<h5>Title text 1</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                         <p>We also provide consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                    </li>
                        
					<li  id="tab2">
						<h5>Title 2</h5>
						<p>We also provide consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim.</p>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo. </p>
					</li>
                        
					<li  id="tab3">
						<div class="tabVideo">
							<div class="addVideo" data-width="100%" data-height="220px" data-autoplay="false" data-url="http://vimeo.com/45778774" > </div>	
                        </div>
					</li>
                        
				</ul>
        
        	</div>
        </div>
        
        
        <div class="five columns alpha" >
			<div class="mobile_spacing" >
            
            	
            	<h3 class="title_light">Accordion - Auto Hide</h3>
                <br>
                
                <!-- Start Accordion 
                The attribute data-autoHide is used to close the accordion tab automatically when the user select other tab,
                The attribute data-openFirstElement is used to open the first accordion tab when page load
                -->
       		 	<div class="accordion" data-autoHide="true" data-openFirstElement="true" >
                
                	<!-- Accordion tab -->
					<dt>
                    	<a href="" class="normal"><span class="acc_heading">
                    		<!-- Heading -->
                    		<h6><strong>Heading Text panel 1</strong></h6> 
                     	</span></a>
					</dt>
                    
                    	<dd>
                        	<span class="acc_content">
                                <!-- Tab content -->
                                Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br> 
                                set <em><span class="text_highlight">data-autoHide="true"</span></em> and <br> <em><span class="text_highlight">data-openFirstElement="true"</span></em> to the main accordion class div. 
                                Add any number of accordion on same page.
                        	</span>
                        </dd>
                        
                        
                    <!-- Accordion tab -->
                    <dt>
                    	<a href="" class="normal"><span class="acc_heading">
                        	<!-- Heading -->
                    		<h6><strong>Heading Text panel 2</strong></h6> 
                        </span></a>
                    </dt>
						<dd>
                            <span class="acc_content">
                            	<!-- Tab content -->
                            	Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. onec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.
                            </span>
                        </dd>
                    
                    
                    <!-- Accordion tab -->
                    <dt>
                    	<a href="" class="normal"><span class="acc_heading">
                        	<!-- Heading -->
                    		<h6><strong>Lorem ipsum dolor sit amet 3</strong></h6> 
                        </span></a>
                    </dt>
                    	<dd>
                        	<span class="acc_content">
                            	<!-- Tab content -->
                            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo tristique odio, Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus
							</span>
                        </dd>
                        
                </div>??   
                <!-- End Accordion -->   

			</div> 
		</div> 

        
         <div class="five columns alpha" >
			<div class="mobile_spacing" >
            
            	<h3 class="title_light">Accordion - Toggle</h3>
                <br>
                 <!-- Start Accordion 
                The attribute data-autoHide is used to close the accordion tab automatically when the user select other tab,
                The attribute data-openFirstElement is used to open the first accordion tab when page load
                -->
       		 	<div class="accordion"  data-autoHide="false" data-openFirstElement="false" >
                
                	<!-- Accordion tab -->
                    <dt>
                    	<a href="" class="normal"><span class="acc_heading">
                        	<!-- Heading -->
                    		<h6><strong>Panel 1 heading text</strong></h6> 
                        </span></a>
                    </dt>
                    	<dd>
                        	<span class="acc_content">
                            	<!-- Tab content -->
                            	<p>Add any number of accordion on same page. Option to open the first tab and tab autohide by using data attribute</p>
                                 Just set <em><span class="text_highlight">data-autoHide="false"</span></em> and <br> <em><span class="text_highlight">data-openFirstElement="false"</span></em> to the main accordion class div.
                            </span>
                        </dd>
                        
                    <!-- Accordion tab -->
                    <dt>
                    	<a href="" class="normal"><span class="acc_heading">
                        	<!-- Heading -->
                    		<h6><strong>Panel 2 heading text</strong></h6> 
                        </span></a>
                    </dt>
                        <dd>
                            <span class="acc_content">
                            	<!-- Tab content -->
                            	onec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.
                             </span>
                        </dd>

                        
                    <!-- Accordion tab -->
                    <dt>
                    	<a href="" class="normal"><span class="acc_heading">
                        	<!-- Heading -->
                    		<h6><strong>Panel 3 sample heading text</strong></h6> 
                        </span></a>
                    </dt>
                    	<dd>
                        	<span class="acc_content">
                            	<!-- Tab content -->
                            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo tristique odio, Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus
                            </span>
                        </dd>
                        
                </div>??   
                <!-- End Accordion --> 
                   
            </div>
        </div>
                
        
        <div class="row"> <hr> </div>
		<div class="separator_bar"></div> 
		<div class="row"> <hr> </div>
        
         <!-- Video sample code-->
		<div class="sixteen columns" >
			<div class="mobile_spacing" >
				<h3 class="title_light">VIDEO DEMO</h3>
				<hr>
			</div>
		</div>     
            
		<!-- Video 1 -->
		<div class="fifteen columns proPadLef" >
			<div class="mobile_spacing" >
            
				<h3 class="title_light">Youtube : Launch on June 2012</h3>
				<br> 
				<!-- Add video -->                         
				<div class="addVideo video_content" data-url="http://www.youtube.com/watch?v=_1NGnVLDPog" >
					<div class="video_hover"></div>
                        <img class="scale-with-grid" src="images/video_img1.jpg" />
				</div>
				<br class="clear"/>
				<hr> 
                                     
			</div>
		</div>                 
            
		<!-- Video 2 -->                    
		<div class="fifteen columns proPadLef" >
			<div class="mobile_spacing" >
				<h3>vimeo : Launch on May 2012</h3>
				<h6 class="title_uppercase title_italic">Video Title</h6>
				<br>  
				<!-- Add video -->
				<div class="addVideo video_content"  id="video" data-url="http://vimeo.com/45778774"> 
					<div class="video_hover"></div>
                        <img class="scale-with-grid" src="images/video_img1.jpg" />
				</div>  
                <br> 
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo tristique odio, Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                <p> Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi nam liber.</p>
                
				<h6><a class="alignLeft list_hover pad"> <strong>Continue reading</strong></a></h6>            
			</div>
		</div>
		
        <div class="row"> <hr> </div>
		<div class="separator_bar"></div> 
		<div class="row"> <hr> </div>

<!-- Typography - Grid -->   
        <div class="sixteen columns" >
			<div class="mobile_spacing" >
       			<h3 class="title_light">Typography - Grid</h3>
                <div class="separator_mini"></div>
        	</div>
       </div>
       
       
<!-- four columns -->   
        <div class="sixteen columns" >
                
			<div class="four columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE FOURTH</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div> 
                            
			<div class="four columns" >
				<div class="mobile_spacing" >
					<h4>ONE FOURTH</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div>
                        
			<div class="four columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE FOURTH</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div>
            <div class="four columns" >
				<div class="mobile_spacing" >
					<h4>ONE FOURTH</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
				</div>
			</div>
            <hr> 
            
		</div>
             

<!-- Three columns -->                    
		<div class="sixteen columns" >
                
			<div class="five columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE THIRD</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div> 
                            
			<div class="five columns" >
				<div class="mobile_spacing" >
					<h4>ONE THIRD</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div>
                        
			<div class="five columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE THIRD</h4>
					<p>We also provide constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
			</div>
            
            <hr> 
		</div>
            
            
 <!-- Two by one column --> 
            
		<div class="sixteen columns" >

			<div class="eleven columns alpha" >
				<div class="mobile_spacing" >
					<h4>TWO THIRD</h4>
					<p>We also provide consectetur adipiscing elit. Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad constetur adiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
				</div>
			</div>
                        
            <div class="five columns alpha" >
                <div class="mobile_spacing" >
                    <h4>ONE THIRD</h4>
                    <p>We also provide consectetur adipiscing elit. Lor em ipsum dolor sit amet, consectetuer adipiscing elit, sed diam ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </div>           
			
            <hr> 
		</div>
            
            
<!-- one by Two column --> 		
        <div class="sixteen columns" >
        
			<div class="five columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE THIRD</h4>
					<p>We also provide consectetur adipiscing elit. Lor em ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
				</div>
			</div>
                        
			<div class="eleven columns alpha" >
				<div class="mobile_spacing" >
					<h4>TWO THIRD</h4>
					<p>We also provide consectetur adipiscing elit. Lor em ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>                                    
				</div>
			</div>
			
            <hr> 
		</div>

            
 <!-- one by one column -->             
		<div class="sixteen columns" >
            
			<div class="eight columns alpha" >
				<div class="mobile_spacing" >
					<h4>ONE HALF</h4>
					<p>We also provide consectetur adipiscing elit. Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat consectetuer adipiscing elit, sed diam nonummy nibh ipsum.</p>
				</div>
			</div>
                        
			<div class="eight columns alpha " >
				<div class="mobile_spacing" >
					<h4>ONE HALF</h4>
					<p>We also provide consectetur adipiscing elit. Lorem ipsum dolor sit a m et, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
				</div>
			</div>                     
			
            <hr> 
		</div>
        
 <!-- single column -->    
        
        <div class="sixteen columns" >
			<div class="mobile_spacing" >
            	<h4>FULL WIDTH</h4>
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi nam liber.</p>
            </div>
        </div>  
            
		<div class="row"> <hr> </div>
		<div class="separator_bar"></div> 
		<div class="row"> <hr> </div>
        

		<div class="sixteen columns" >
                
            <!-- Heading Text -->
			<div class="five columns alpha">
                <div class="mobile_spacing" >
					<h1>Heading &lt;h1&gt;</h1>
					<h2>Heading &lt;h2&gt;</h2>
					<h3>Heading &lt;h3&gt;</h3>
					<h4>Heading &lt;h4&gt;</h4>
					<h5>Heading &lt;h5&gt;</h5>
            	    <h6>Heading &lt;h6&gt;</h6>          
					<hr>
				</div>
			</div>
            
            <!-- Heading Text Light -->  
            <div class="five columns alpha">
                <div class="mobile_spacing" >
					<h1 class="title_light">Heading light &lt;h1&gt;</h1>
					<h2 class="title_light">Heading light &lt;h2&gt;</h2>
					<h3 class="title_light">Heading light &lt;h3&gt;</h3>
					<h4 class="title_light">Heading light &lt;h4&gt;</h4>
					<h5 class="title_light">Heading light &lt;h5&gt;</h5>
					<h6 class="title_light">Heading light &lt;h6&gt;</h6>          
					<hr>
				</div>
			</div>
                
				<div class="five columns alpha">
                	<div class="mobile_spacing" >
                    	<!-- Blockquote -->
                        <blockquote>
                            <p>Blockquote style example It stands out, but is awesome. Lorem ipsum dolor</p>
                            <cite>Dave Gamache, Skeleton Creator</cite>
                        </blockquote>
                        
                        <!-- High light text -->
                        <p>Lorem ipsum <span class="text_highlight">highlight text</span> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.
                        <span class="text_highlight">highlight text</span> Ut wisi enim ad constetur adiscing elit. Lorem ipsum dolor sit amet
                        </p>
                	</div>       
				</div>
                
        </div>    

            
		<div class="row"> <hr> </div>
		<div class="separator_bar"></div> 
		<div class="row"> <hr> </div>
              
            
		<!-- Listed items -->
        <div class="four columns " >
			<div class="mobile_spacing" >
            	<h3 class="title_light">Listed items</h3>
                <br>               

				<span class="list1">list1 item</span>
				<span class="list1">list1 item</span><br><br>                

				<span class="list2">list2 item</span>
				<span class="list2">list2 item</span><br><br>
                
				<span class="list3">list3 item</span>
				<span class="list3">list3 item</span><br><br>          

				<span class="list4">list4 item</span>
				<span class="list4">list4 item</span><br><br>              

				<span class="list5">list5 item</span>
				<span class="list5">list5 item</span><br><br>                

				<span class="list6">list6 item</span>
				<span class="list6">list6 item</span><br><br>                                

				<span class="list7">list7 item</span>
				<span class="list7">list7 item</span><br><br>                

				<span class="list8">list8 item</span>
				<span class="list8">list8 item</span><br><br>
                
				<span class="list9">list9 item</span>
				<span class="list9">list9 item</span><br><br>
                                    
				<span class="list10">list10 item</span>
				<span class="list10">list10 item</span>
				<hr> 
			</div>
		</div>
        
        <div class="four columns alpha darkStyle" style="background-color:#333" >
			<div class="mobile_spacing" >
            	<h3 class="title_light">Listed items - White</h3>
                <br>               

				<span class="list1_white">list1 item</span>
				<span class="list1_white">list1 item</span><br><br>                

				<span class="list2_white">list2 item</span>
				<span class="list2_white">list2 item</span><br><br>         

				<span class="list4_white">list4 item</span>
				<span class="list4_white">list4 item</span><br><br>              

				<span class="list5_white">list5 item</span>
				<span class="list5_white">list5 item</span><br><br>                

				<span class="list6_white">list6 item</span>
				<span class="list6_white">list6 item</span><br><br>                                

				<span class="list7_white">list7 item</span>
				<span class="list7_white">list7 item</span><br><br>                

				<span class="list8_white">list8 item</span>
				<span class="list8_white">list8 item</span><br><br>
                
				<span class="list9_white">list9 item</span>
				<span class="list9_white">list9 item</span><br><br>
                                    
				<span class="list10_white">list10 item</span>
				<span class="list10_white">list10 item</span>
				<hr> 
			</div>
		</div>    
         <div class="one columns" ></div>
        <div class="three columns alpha" >
			<div class="mobile_spacing" >
            	<!-- Button sample-->
					<h3 class="title_light">Buttons</h3>
                    <br>
					<a><span class="button small">Small Size</span></a>
                    <br>
					<a><span class="button">Normal Size</span></a>
                    <br>
					<a><span class="button medium">Medium Size</span></a>
                    <br>
					<a><span class="button large">Large Size</span></a>
                    <br>
                    <a class="normal" >Normal text link</a> 
                    <br><div  class="pad"></div>
                    <a class="text_hover alignLeft">Text link with background</a>
                    <div  class="clear pad"></div>
                    <a class="list_hover pad"> <strong>Simple button link</strong></a><br>
				<hr> 

            </div>
        </div>
        
		<div class="four columns alpha" >
			<div class="mobile_spacing" >
				<h3 class="title_light"> Social Icons set </h3>
                <br>
                <!-- Socialize icons-->
				<ul class="social_bookmarks noMargin">
					<li class="twitter noMargin"><a title="twitter" >Follow us on Twitter</a></li>
 					<li class="facebook noMargin"><a title="Facebook" >Join our Facebook Group</a></li>
					<li class="gplus noMargin"><a title="Google Plus" >Join me on Google Plus</a></li>
					<li class="linkedin noMargin"><a title="Linkedin" >Add me on Linkedin</a></li>
					<li class="rss noMargin"><a title="RSS" >RSS</a></li>
					<li class="digg noMargin"><a title="Digg" >Digg</a></li>
					<li class="delicious noMargin"><a ctitle="delicious" >delicious</a></li>
					<li class="youtube noMargin"><a title="youtube" >youtube</a></li>
					<li class="vimeo noMargin"><a title="vimeo" >vimeo</a></li>
					<li class="skype noMargin"><a title="skype" >skype</a></li>
					<li class="dribbble noMargin"><a title="dribbble" >dribbble</a></li>
					<li class="ichat noMargin"><a title="ichat" >ichat</a></li>
					<li class="deviantart noMargin"><a title="deviantart" >deviantart</a></li>
					<li class="stumbleupon noMargin"><a title="stumbleupon" >stumbleupon</a></li>
				</ul>
                <hr>
                
                <h3 class="title_light"> Social Icons - White </h3>
                <br>
                <!-- Socialize icons-->
				<ul class="social_bookmarks noMargin darkStyle" style="background-color:#333">
					<li class="twitter_white noMargin"><a title="twitter" >Follow us on Twitter</a></li>
 					<li class="facebook_white noMargin"><a title="Facebook" >Join our Facebook Group</a></li>
					<li class="gplus_white noMargin"><a title="Google Plus" >Join me on Google Plus</a></li>
					<li class="linkedin_white noMargin"><a title="Linkedin" >Add me on Linkedin</a></li>
					<li class="rss_white noMargin"><a title="RSS" >RSS</a></li>
					<li class="digg_white noMargin"><a title="Digg" >Digg</a></li>
					<li class="delicious_white noMargin"><a ctitle="delicious" >delicious</a></li>
					<li class="youtube_white noMargin"><a title="youtube" >youtube</a></li>
					<li class="vimeo_white noMargin"><a title="vimeo" >vimeo</a></li>
					<li class="skyp_whitee noMargin"><a title="skype" >skype</a></li>
					<li class="dribbble_white noMargin"><a title="dribbble" >dribbble</a></li>
					<li class="ichat_white noMargin"><a title="ichat" >ichat</a></li>
					<li class="deviantart_white noMargin"><a title="deviantart" >deviantart</a></li>
					<li class="stumbleupon_white noMargin"><a title="stumbleupon" >stumbleupon</a></li>
				</ul>
                <hr>
			</div> 
		</div> 
                       
		<br class="clear"/>
 
 
    
    </div>
</div>


<!-- End Features page -->
                
 
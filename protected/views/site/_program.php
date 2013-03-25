<?php if($programs){ ?>
	<?php foreach($programs as $program){ ?>
	<!-- program  -->
	<div class="program" itemscope itemtype="http://schema.org/MusicVideoObject">
    	
        <img  src="<?php echo $program["image"]; ?>" class="thumbnail" alt="Wonder" itemprop="image"/>
             
        <div class="name" itemprop="name"><?php echo $program["name"]; ?></div>
		
		<!-- project full details -->
		<div class="program-details" >
        	
                                
            <!-- project description -->
            <div class="projDetails scroll-pane" >
			  	<div class="detail_spacing">
				
					<h2 class="title_light"><?php echo $program["name"]; ?></h2>
					
					<iframe class="video" width="640" height="360" src="<?php echo $program["url"]; ?>" frameborder="0" allowfullscreen></iframe>
					<!-- <div class="video">
					<object  width="640" height="385">
						<param name="wmode" value="transparent" />
						<param name="movie" value="https://www.youtube.com/embed/22h2Yp8w8kg?feature=player_detailpage" />
						<param name="allowFullScreen" value="true" />
						<param name="allowscriptaccess" value="always" />
						<embed src="http://www.youtube.com/v/Q5im0Ssyyus?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="385" wmode="transparent">
					</object>
					</div> -->
					
					<a class=" list_hover"><span class="list10"><?php echo $program["likes"]; ?></span></a>
					<a class=" list_hover"><span class="list11"><?php echo $program["dislikes"]; ?></span></a>
                	<div class="social-media-sharing">
						<a class="fb-share" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=111454652362194&link=https://developers.facebook.com/docs/reference/dialogs/&picture=http://www.tradebanq.com/images/logo_en.png&name=Nex1TV&caption=Game%20of%20Thrones&description=Episode%201&redirect_uri=http://localhost/nex1tv&display=popup"> </a>
						<!--<a href="https://plus.google.com/share?url=http://hkhalili.com" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="https://www.gstatic.com/images/icons/gplus-64.png" alt="Share on Google+"/></a>
						<img src="images/fb-share.png" /></a>-->
					</div>
                    
                    <strong>Program Name:</strong> <?php echo $program["name"]; ?><br>
                    <strong>Timing:</strong> <?php echo $program["timing"]; ?><br>
                    
                    <!-- <ul>
                    	<li class="list4">jQuery</li><br>
                        <li class="list4">CSS3</li><br>
                        <li class="list4">Flash</li><br>
                    	<li class="list4">wordpress</li>
                    </ul> -->
                    
                    <p><?php echo $program["description"]; ?></p>

					<!--<div class="fourteen columns alpha">-->
					<div>
					<div class="mobile_spacing">
						<?php if($program["comments"]){?>
						<section id="comments-sec">
							<!-- Number of comments posted-->
							<h5 class="title_light">Comments (<?php echo count($program["comments"]);?>)</h5>
							
							<ol class="comment-list">
							<?php	
								foreach($program["comments"] as $comment){
							?>
								<li class="comment">
									<article> 
										<!-- author -->
										<?php
										$this->widget('application.extensions.VGGravatarWidget', 
	                                        array(
	                                            'email' =>  $comment["email"],
	                                            'size' => 50,
	                                            'htmlOptions' => array(
	                                            	"class" => "avatar",
	                                            	"alt" => "Profile Picture"
	                                            )
	                                        )
                                        ); 
                                        ?>
										<div class="comment-aut">
											<a class="author text_hover"><?php echo $comment["name"]; ?></a>
											<p class="date"><?php echo $comment["timing"]; ?></p>
										</div>
										<!-- author comment -->
										<div class="comment-area">
											<p><?php echo $comment["comment"]; ?></p>
										</div>
									</article>
								</li>
							<?php } ?>	  
							</ol>
						</section>
						<?php
						}
						?>
						<section class="lightColor" id="comment-replay">
							<h5>Leave a Comment</h5>
							<!-- Add comment Form field -->
							<form class="comments-form" method="post">
									
								<label for="comment-name"><h6><strong>Name</strong> (required)</h6></label>
								<input type="text" id="comment-name" value="" name="name">
								<br>
								   
								<label for="comment-email"><h6><strong>Email</strong> (required)</h6></label>
								<input type="email" id="comment-email" value="" name="email">
								<br>
								   
								<label for="comment-url"><h6><strong>Website</strong></h6></label>
								<input type="url" id="comment-url" value="" name="url">
								<br>
								   
								<label for="comment-message"><h6><strong>Your Comment</strong> (required)</h6></label>
								<textarea required="" rows="6" cols="88" id="comment-message" name="message"></textarea>
								<br>
								<input type="hidden" value="<?php $program["id"]; ?>" name="program-id"/>
								<a href="#" class="alignRight"><span class="button">Submit</span></a>
					
								<div class="clear"></div>
					
							</form>
						</section>
							
						</div>
					</div> <!-- end comments section -->
					
					<p style="clear:both"></p>

					</div>
            </div>
            
        </div>
	</div>
    <?php } ?>    
<?php }?>    
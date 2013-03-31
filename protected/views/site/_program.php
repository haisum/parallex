<?php if($programs){ ?>
	<?php foreach($programs as $program){ ?>
	<!-- program  -->
	<div id="<?php echo "program_{$program['id']}"; ?>" class="program" itemscope itemtype="http://schema.org/MusicVideoObject">
    	
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
					
					<a data-id="<?php echo $program["id"]; ?>" class="likes list_hover"><span <?php if(Yii::app()->request->cookies["c_like_" . $program["id"]] === "like") { ?> style="font-weight:bold;"<?php } ?> class="list10"><?php echo $program["likes"]; ?></span></a>
					<a data-id="<?php echo $program["id"]; ?>" class="dislikes list_hover"><span <?php if(Yii::app()->request->cookies["c_like_" . $program["id"]] === "dislike") { ?> style="font-weight:bold;"<?php } ?> class="list11"><?php echo $program["dislikes"]; ?></span></a>
                	<div class="social-media-sharing">
						<a class="fb-share" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=<?php echo Yii::app()->setting->get("facebook-app-id"); ?>&link=https://developers.facebook.com/docs/reference/dialogs/&picture=http://www.tradebanq.com/images/logo_en.png&name=Nex1TV&caption=Game%20of%20Thrones&description=Episode%201&redirect_uri=http://localhost/nex1tv&display=popup"> </a>
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
						<section id="comments-sec">
							<!-- Number of comments posted-->
							<h5 class="title_light">Comments (<?php echo count($program["comments"]);?>)</h5>
							
							<ol class="comment-list" id="commentList<?php echo $program["id"]; ?>">
							<?php	
							if($program["comments"]){
								foreach($program["comments"] as $comment){
									$this->renderPartial("_comment", array("comment" => $comment));
								}
							}
							?>	  
							</ol>
						</section>
						<section class="lightColor" id="comment-replay">
							<h5>Leave a Comment</h5>
							<!-- Add comment Form field -->
							<form class="comments-form" onsubmit="submitComment(this);" action="javascript:;" data-id="<?php echo $program["id"]; ?>" method="post">
									
								<label for="comment-name"><h6><strong>Name</strong> (required)</h6></label>
								<input type="text" id="comment-name" value="" name="Comment[name]">
								<span style="color:red;" id="Comment_name_<?php echo $program["id"]; ?>"></span>
								<br>
								   
								<label for="comment-email"><h6><strong>Email</strong> (required)</h6></label>
								<input type="email" id="comment-email" value="" name="Comment[email]">
								<span style="color:red;" id="Comment_email_<?php echo $program["id"]; ?>"></span>
								<br>
								   
								<label for="comment-url"><h6><strong>Website</strong></h6></label>
								<input type="url" id="comment-url" value="" name="Comment[website]">
								<span style="color:red;" id="Comment_website_<?php echo $program["id"]; ?>"></span>
								<br>
								   
								<label for="comment-message"><h6><strong>Your Comment</strong> (required)</h6></label>
								<textarea required="" rows="6" cols="88" id="comment-message" name="Comment[comment]"></textarea>
								<span style="color:red;" id="Comment_comment_<?php echo $program["id"]; ?>"></span>
								<br>
								<input type="hidden" value="<?php echo $program["id"]; ?>" name="Comment[programId]"/>
								<a onclick="submitComment($(this).parent('form'));" href="javascript:;" class="alignRight"><span class="button">Submit</span></a>
					
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
<li class="comment">
	<article> 
		<!-- author -->
		<?php
		$this->widget('application.extensions.VGGravatarWidget', 
            array(
                'email' =>  $comment->email,
                'size' => 50,
                'htmlOptions' => array(
                	"class" => "avatar",
                	"alt" => "Profile Picture"
                )
            )
        ); 
        ?>
		<div class="comment-aut">
			<a class="author text_hover" target="_blank" rel="nofollow" href="<?php echo ($comment->website != "" ? $comment->website : "javascript:;"); ?>"><?php echo $comment->name; ?></a>
			<p class="date"><?php echo $comment->postedTime; ?></p>
		</div>
		<!-- author comment -->
		<div class="comment-area">
			<p><?php echo $comment->comment; ?></p>
		</div>
	</article>
</li>
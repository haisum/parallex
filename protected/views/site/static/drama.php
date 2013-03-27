<!-- Drama Static Content -->  
<div class="staticContent parallax" data-id="drama" data-src="images/parallax/image4.jpg" data-src-small="images/parallax/image4_s.jpg">                	
    <div class="container" >
        <div class="separator_mini"></div> 
        <h1>Drama</h1>
		<div class="sixteen columns" >
            <?php $this->renderPartial("_program", array("programType" => "drama" ,"programs" => $programs)); ?>
			<div class="stage">
			</div>
		</div>
    </div>
</div>
<!-- End Drama page -->



 
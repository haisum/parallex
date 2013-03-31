<!-- Home page -->

<div class="page sixteen columns" data-id="home" >
    <div class="pgContent" >
                     
        <div class="slider1 fmSlider fullHeight" >  
                       
          	<div class="fmSlides sixteen columns" >
					
				<!--Note : On each slide, if you add the class fmSlider_animate, than each div inside the slide will make animate.
                The circular object, portfolio frame images action are written in custom.js file near // Home page slider items, comment line
                 -->
                <?php if($slides){
                foreach($slides as $slide){ ?>
				<div class="columns alpha fmSlider_animate fadeEffect"  >                     
					<?php echo $slide; ?>	
				</div>
				<?php }
				} ?>
              
              <!-- End slides -->
                  
			</div>
		</div>
         
    </div>
</div>

<!-- End Home page -->                 

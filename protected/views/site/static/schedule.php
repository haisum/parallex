<!-- Services  -->
       
<div class="staticContent lightStyle"  data-id="schedule" >
	<div class="container" >
 
		<div class="sixteen columns alpha">
			<div class="mobile_spacing">
				<h1 class="title_light">TV Scheduale</h1> 
				<hr>  
				<h4>NEX1 TV is established with an ambition to transform and modernize the Persian media industry in music, shows and entertainment.</h4>          
			</div>
		</div>
                    
		<div class="separator_mini"></div>
                
		<div class="nine columns alpha" >
		  <div class="mobile_spacing">
                        
				<!-- Tab Navigation Begin -->       
			<ul class="tabs">
					<li><a href="#skill" class="active" >Music</a></li>
					<li><a href="#staff">Drama Series</a></li>
					<li><a href="#strategy">Shows</a></li>
			  </ul>
                                                    
			  <!-- Tab Content -->
			  <ul class="tabs-content">
			    <li id="skill" class="active" > 
			    	<?php if($music["programs"]){
			    		foreach($music["programs"] as $program){
			    	 ?>
                        <div class="row alpha ">
                        	<span class="smallImg " > <img style="width:80px;" class="border1" src="<?php echo $program["image"]; ?>" alt="<?php echo $program["name"]; ?>" /></span>                
                        	<h5 class="title title_bottomspace"><?php echo $program["name"]; ?></h5>
                        	<?php echo $program["timing"]; ?>
                        </div>
                        <div class="separator_mini"></div>
                    <?php }
                    } ?>
					</li>
				<li id="staff" > 
                        <?php if($drama["programs"]){
			    		foreach($drama["programs"] as $program){
			    	 ?>
                        <div class="row alpha ">
                        	<span class="smallImg " > <img style="width:80px;" class="border1" src="<?php echo $program["image"]; ?>" alt="<?php echo $program["name"]; ?>" /></span>
                        	<h5 class="title title_bottomspace"><?php echo $program["name"]; ?></h5>
                        	<?php echo $program["timing"]; ?>
                        </div>
                        <div class="separator_mini"></div>
                    <?php }
                    } ?>
					</li>
					<li id="strategy" > 
                        <?php if($shows["programs"]){
			    		foreach($shows["programs"] as $program){
				    	 ?>
	                        <div class="row alpha ">
	                        	<span class="smallImg " > <img style="width:80px;" class="border1" src="<?php echo $program["image"]; ?>" alt="<?php echo $program["name"]; ?>" /></span>                
	                        	<h5 class="title title_bottomspace"><?php echo $program["name"]; ?></h5>
	                        	<?php echo $program["timing"]; ?>
	                        </div>
	                        <div class="separator_mini"></div>
	                    <?php }
	                    } ?>
					</li>
		    </ul>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <ul class="tabs-content">                              
			    
			  
             
              <!-- End Tab Example -->
                                               
		  </div>           
		</div>
	  <div class="separator_mini"></div>
                            
		              
	</div>
</div>

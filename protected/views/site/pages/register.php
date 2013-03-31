<!-- Register Page -->
<?php if(Yii::app()->user->isGuest){ ?>
<div class="page sixteen columns " data-id="register" id="register-page">                	
    <div class="pgContent" >
    	
        <div class="separator_mini"></div> 
        <h1>Register</h1>		
		<div class="separator_mini"></div> 
		
		<form action="javascript:;" id="register-form" name="register" method="post" class="darkColor ten columns">
			First name<input type="text" name="User[firstName]"  placeholder="First Name" />
			<span style="color:red;display:block;" id="User_firstName"></span>
			Last name<input type="text" name="User[lastName]"  placeholder="Last Name" />
			<span style="color:red;display:block;" id="User_lastName"></span>
			Email<input type="text" name="User[email]" placeholder="Email" />
			<span style="color:red;display:block;" id="User_email"></span>
			Birthday <br/>
				<input type="date" name="User[birthday]" placeholder="birthday in yyyy-mm-dd format" />
				<span style="color:red;display:block;" id="User_birthday"></span>
			Address <input type="text" name="User[address]"  placeholder="Address" />
			<span style="color:red;display:block;" id="User_address"></span>

			Website <input type="text" name="User[website]"  placeholder="Website" />
			<span style="color:red;display:block;" id="User_website"></span>
			Password: <input type="password" name="User[password]" />
			<span style="color:red;display:block;" id="User_password"></span>
			<br/>                                
			<button type="submit" id="register_submit"  class="button alignLeft">Register</button>                                  
			<div id="reply_register_message" ></div>                            
		</form>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#register-form").submit(function(){
			$("#reply_register_message").html("");
			$this = $(this);
			$.ajax({
				url : "site/register",
				type : "post",
				data : $(this).serialize() + "&ajax=register-form",
				dataType : "json",
				success : function(data){
					if(typeof data.status !== "undefined"){
						if(data.status == "fail"){
							$.each(data.response, function(i, e){
								$this.find("#" + i).text(e[0]);
							});
						}
						else if(data.status == "ok"){
							$("#reply_register_message").html("Registeration successfull. You may now login.");	
							window.setTimeout(function(){
								$("#register-page").slideUp();
							}, 3000);
						}
					}
				}
			});
			return false;
		});
	});

	</script>	
		
	</div>
</div>
<?php } ?>
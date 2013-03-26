<!-- Register Page -->
<?php if(Yii::app()->user->isGuest){ ?>
<div class="page sixteen columns " data-id="register" id="register-page">                	
    <div class="pgContent" >
    	
        <div class="separator_mini"></div> 
        <h1>Register</h1>		
		<div class="separator_mini"></div> 
		
		<form action="javascript:;" id="register-form" name="register" method="post" class="darkColor ten columns">
			First name<input type="text" name="User[firstName]"  placeholder="First Name" />
			Last name<input type="text" name="User[lastName]"  placeholder="Last Name" />
			Email<input type="text" name="User[email]" placeholder="Email" />
			Birthday <br/>
				<input type="date" name="User[birthday]" placeholder="birthday" />
			<br/><br/>
			Location <input type="text" name="User[address]"  placeholder="Address" />

			Location <input type="text" name="User[website]"  placeholder="Website" />
			Password: <input type="password" name="User[password]" />
			<br/>                                
			<button type="submit" id="register_submit"  class="button alignLeft">Register</button>                                  
			<div id="reply_register_message" ></div>                            
		</form>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#register-form").submit(function(){
			$("#reply_register_message").html("");
			$.ajax({
				url : "site/register",
				type : "post",
				data : $(this).serialize() + "&ajax=register-form",
				dataType : "json",
				success : function(data){
					if(typeof data.status !== "undefined"){
						if(data.status == "fail"){
							var message = "<strong>Following errors occured:</strong><br style='clear:both;'/><ul style='list-style: disc;margin-left: 30px;'>";
							$.each(data.response, function(i, e){
								message += "<li>"+e[0]+"</li>";
							});
							$("#reply_register_message").html(message + "</ul>");
						}
						else if(data.status == "ok"){
							$("#reply_register_message").html("Registeration successfull. You may now login.");	
							window.setTimeout(function(){
								$("#register-page").slideUp();
							}, 3000);
						}
					}
					console.log(data);
				}
			});
			return false;
		});
	});

	</script>	
		
	</div>
</div>
<?php } ?>
<!-- Login Page -->
<?php if(Yii::app()->user->isGuest){ ?>
<div class="page sixteen columns " data-id="login" id="login-page">                	
    <div class="pgContent" >
    	
        <div class="separator_mini"></div> 
        <h1>Login</h1>
		
		<div class="separator_mini"></div> 
		
		<form id="login-form" name="login" action="javascript:;" method="post" class="darkColor ten columns">
			Email<input type="text" value="Email" name="LoginForm[username]"  
				onfocus="if(this.value == 'Email') {this.value = '';}"  
				onblur="if (this.value == '') {this.value = 'Email';}" />
			Password: <input type="password" name="LoginForm[password]" />
			<br/>                                
			<button type="submit" id="login_submit"  class="button alignLeft">Login</button>                                  
			<div id="reply_message" ></div>                            
		</form>
		
	
	<script type="text/javascript">
	$(document).ready(function(){
		$("#login-form").submit(function(){
			$("#reply_message").html("");
			$.ajax({
				url : "site/login",
				type : "post",
				data : $(this).serialize() + "&ajax=login-form&source=site",
				dataType : "json",
				success : function(data){
					if(typeof data.LoginForm_password !== "undefined"){
						$("#reply_message").html(data.LoginForm_password[0]);
					}
					else if(typeof data.LoginForm_username !== "undefined"){
						$("#reply_message").html(data.LoginForm_username[0]);
					}
					else if(typeof data.status !== "undefined"){
						if(data.status == "fail"){
							$("#reply_message").html("error occurred while logging you in.");		
						}
						else if(data.status == "ok"){
							$("#current-user").html("Welcome, " + data.name);
							$("#authenticated-menu").show();
							$("#guest-menu").hide();
							$("#login-page, #register-page").slideUp("fast", function(){
								$(this).remove();
							});
						}
					}
				}
			});
		});
	});

	</script>	
	</div>
</div>
<?php } ?>
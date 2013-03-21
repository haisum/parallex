<!-- Login Page -->
<div class="page sixteen columns " data-id="login" >                	
    <div class="pgContent" >
    	
        <div class="separator_mini"></div> 
        <h1>Login</h1>
		
		<div class="separator_mini"></div> 
		
		<form name="login" method="post" class="darkColor ten columns">
			Email<input type="text" value="Email" name="email"  
				onfocus="if(this.value == 'Email') {this.value = '';}"  
				onblur="if (this.value == '') {this.value = 'Email';}" />
			Password: <input type="password" name="name" />
			<br/>                                
			<button type="submit" id="login_submit"  class="button alignLeft">Login</button>                                  
			<div id="reply_message" ></div>                            
		</form>
		
		
	</div>
</div>
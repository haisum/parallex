<!-- Register Page -->
<div class="page sixteen columns " data-id="register" >                	
    <div class="pgContent" >
    	
        <div class="separator_mini"></div> 
        <h1>Register</h1>		
		<div class="separator_mini"></div> 
		
		<form name="login" method="post" class="darkColor ten columns">
			First name<input type="text" value="First Name" name="name"  
				onfocus="if(this.value == 'First Name') {this.value = '';}"	
				onblur="if (this.value == '') {this.value = 'First Name';}" />
			Last name<input type="text" value="Last Name" name="name"  
				onfocus="if(this.value == 'Last Name') {this.value = '';}"	
				onblur="if (this.value == '') {this.value = 'Last Name';}" />
			Email<input type="text" value="Email" name="email"  
				onfocus="if(this.value == 'Email') {this.value = '';}"  
				onblur="if (this.value == '') {this.value = 'Email';}" />
			Confirm email<input type="text" value="Email" name="email_confirm"  
				onfocus="if(this.value == 'Email') {this.value = '';}"  
				onblur="if (this.value == '') {this.value = 'Email';}" />
			Birthday <br/>
				Day: <input type="number" name="birthday" size="2" maxlength="2" placeholder="dd" />
				Month: <input type="number" name="birthmonth" size="2" maxlength="2" placeholder="mm" />
				Year: <input type="number" name="birthyear" size="4" maxlength="4" placeholder="yyyy" />
			<br/><br/>
			Location <input type="text" value="Location" name="location"  
				onfocus="if(this.value == 'Location') {this.value = '';}"  
				onblur="if (this.value == '') {this.value = 'Location';}" />
			Password: <input type="password" name="password" />
			Confirm password: <input type="password" name="password_confirm" />	
			<br/>                                
			<button type="submit" id="login_submit"  class="button alignLeft">Login</button>                                  
			<div id="reply_message" ></div>                            
		</form>
		
		
	</div>
</div>
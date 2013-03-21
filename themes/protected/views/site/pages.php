
<!-- 
Begin Page content
 
Note: mobile_spacing class is used to add spacing arround the content in mobile device not in desktop,
if you remove the mobile_spacing class, the layout design doesn't effect in desktop it only effect in mobile device
 -->
  
<div class="container" >


<!--
This is the template for a page. A page displays at the top of the website. It is placed in the pageHolder div in the
index page. To link to the page below use: <a href="#page-template">Page Template</a>-->
<div class="page" data-id="page-template">
The content goes here.
</div>


<?php
// Including all required pages

// Home Page
include_once("pages/home.php");

// Top Link Pages
include_once("pages/login.php");
include_once("pages/register.php");

?>
 

</div>


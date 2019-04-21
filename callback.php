<?php 
if(isset($_POST['name']) and $_POST['name']!='') {
	
	$name = $_POST['name'];
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = '';
	if(isset($_POST['phone'])) $email = $_POST['phone']; else $email = '';
	if(isset($_POST['message'])) $message = $_POST['message']; else $message = '';
	
    $mailto ="info@alneaimy.com";
	$headers  = "MIME-Version: 1.0\r\n";
	$subject = "Online Enquiry From Website";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$name." do_not_reply@abellahomestay.com \r\n" . "Reply-To: ".$email."\r\n";
	$mailbody = "<table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"2\">";
	$mailbody .= "<tr><td colspan=\"2\"><strong><font size=\"+1\">";
	$mailbody .= "Online Enquiry from Website</font></strong></td></tr>";
	$mailbody .= "<tr><td width=\"23%\" height=\"20\">Name : </td>";
	$mailbody .= "<td width=\"77%\">" . addslashes($name) . "</td></tr>";
	$mailbody .= "<tr><td valign=\"top\" height=\"20\">Email : </td>";
	$mailbody .= "<td valign=\"top\">" . addslashes(nl2br($email)) . "</td></tr>";
	$mailbody .= "<tr><td valign=\"top\" height=\"20\">Phone : </td>";
	$mailbody .= "<td valign=\"top\">" . addslashes(nl2br($phone)) . "</td></tr>";
	$mailbody .= "<tr><td valign=\"top\" height=\"20\">message : </td>";
	$mailbody .= "<td valign=\"top\">" . addslashes(nl2br($message)) . "</td></tr>";
	$mailbody .= "<tr><td valign=\"top\" height=\"20\" colspan=\"2\"></td></tr>";
	$mailbody .= "<tr><td height=\"20\" colspan=\"2\">";
	$mailed = mail($mailto,$subject,$mailbody,$headers);	
}
else {
	header("index.html");
	exit;
}
?>

<?php
		  if(isset($mailed) and $mailed==true) { ?>
		  
            <div class="row">
              <div class="col-lg-12">
                <div class="call-box">
                  <p><strong style="color:green">Thank you</strong><br>
		  We have received your Message and shall reply to it as soon as possible.</p>
                </div>
              </div>
            </div>
         
		  <?php
		  } else { ?>
            
              <div class="row">
                <div class="col-lg-12">
                  <div class="call-box-1">
                  <p><strong style="color: red">We are sorry.</strong><br> Your mail could not be delivered due to a technical error. We apologize for the inconvenience caused.</p>
                  </div>
                </div>
              </div>
            
		  <?php } ?>
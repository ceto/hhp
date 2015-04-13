<?php 
  wp_reset_query();
?>
<?php
  $response = '';

  function gen_response($type, $uzi){
    if($type == 'success') {
      return $response = '<div id="contacresponse" class="contact-response wrapper wrapper--fullwidth"><p class="success">'.$uzi.'</p></div>';
    } else {
      return $response = '<div id="contacresponse" class="contact-response contact-response wrapper wrapper--fullwidth"><p class="error">'.$uzi.'</p></div>';
    }
  }

  $not_human       = 'Authentication failed';
  $missing_content = 'Missing fields are required';
  $email_invalid   = 'Invalid e-mail address';
  $message_unsent  = 'Error message';
  $message_sent    = '<strong>Melding er sendt.</strong><br>Vi vil ta kontakt med deg så raskt som mulig. Ha en fin dag';

  //user posted variables
  $name = $_POST['contact_name'];
  $email = $_POST['contact_email'];
  $tel = $_POST['contact_tel'];
  $message = $_POST['contact_message'];
  $human = $_POST['contact_human'];
  $type = $_POST['contact_type'];


  //php mailer variables
  //$to = get_option('admin_email');
  $to = 'Annette.kleven@vestbo.no';
  //$to = 'szabogabi@gmail.com';
  

  $subject = $type.": Hesjaholtet Park";
  
  $headers = "From: " . strip_tags($email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
  //$headers .= "CC: szabogabi@gmail.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  
if(!$human == 0){
    if($human != 2) gen_response('error', $not_human); //not human!
    else {
      
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $response = gen_response('error', $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message) || empty($tel)){
          $response = gen_response('error', $missing_content);
        }
        else //ready to go!
        {
          $message='Name: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Message: <br />'.$message;
          $sent = wp_mail($to, $subject, $message, $headers);
            if($sent) {
              $sent = wp_mail($email, $subject, $message, $headers);
              $response = gen_response('success', $message_sent); //message sent!
            } else {
                $response = gen_response('error', $message_unsent); //message wasn't sent
              }
        }
      }
    }
  } 
  else 
    if ($_POST['submitted']) { $response = gen_response('error', $missing_content);}

?>

<?php if ( !is_archive() && !is_page_template('template-chooser.php') ) : ?>
<?php echo $response; ?>
<aside id="contactblock" class="footer--contactblock is_light <?php echo is_singular('apartment')?'collapse':''; ?>">
	<div class="wrapper wrapper--extranarrow">

    <div class="page-header">
      <p>
        <a class="js_inverseoff active" href="#">Meld interesse</a> | <a class="js_inverseon" href="#">Meld forkjøpsrett</a>
      </p>
		</div>


		<div class="contact--right">
			<form action="<?php the_permalink(); ?>#contacresponse" method="post">
        <div class="formitem">
          <input required placeholder="ditt navn (obligatorisk)" type="text" id="contact_name" name="contact_name">
        </div>
        <div class="formitem">
          <input required placeholder="e-post (obligatorisk)" type="email" id="contact_email" name="contact_email">
        </div>
        <div class="formitem">
          <input placeholder="telefonnummer" type="tel" id="contact_tel" name="contact_tel">
        </div>
        <div class="formitem">
          <textarea name="contact_message" placeholder="melding" id="contact_message" cols="30" rows="6"></textarea>
        </div>
	      <div class="formactions">
          <input id="contact_type" type="hidden" name="contact_type" value="Interesse">
          <input type="hidden" name="contact_human" value="2">
          <input type="hidden" name="submitted" value="1">
	        <input type="submit" class="btn" value="Send">
	      </div>
    	</form>
		</div>
	</div>
</aside>
<?php endif; ?>

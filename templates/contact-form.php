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


  $submitted = $_POST['submitted'];

  $addr = $_POST['contact_gateaddresse'];
  $po = $_POST['contact_postnummer'];
  $poststed = $_POST['contact_poststed'];
  $mnummer = $_POST['contact_mnummer'];
  $mobil = $_POST['contact_mobil'];
  $prosjekt = $_POST['contact_prosjekt'];
  $tfork = $_POST['contact_tfork'];


  //php mailer variables
  //$to = get_option('admin_email');
  $to = 'Annette.kleven@vestbo.no';
  //$to = 'szabogabi@gmail.com';
  

  $subject = $type.": Hesjaholtet Park";
  
  $headers = "From: " . strip_tags($email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
  //$headers .= "CC: szabogabi@gmail.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";



  if ($submitted == 1) {
    // Simple contact to Anette
    $to = 'Annette.kleven@vestbo.no';
    $message='Name: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Message: <br />'.$message;
    
  } else {
    // Frorkj message to vestbo
    $to = 'forkjopsrett@vestbo.no';
    $message='Prosjekt: Brl Hesjaholtet Park<br/>'.
             'Navn: '.$name.'<br/>'.
             'Gateadresse: '.$addr.'<br />'.
             'Postnummer: '.$po.'<br/>'.
             'Poststed: '.$poststed.'<br/>'.
             'Medlemsnummer: '.$mnummer.'<br />'.
             'Tel: '.$tel.'<br />'.
             'Mobil: '.$mobil.'<br/>'.
             'E-post: '.$email.'<br />'.
             'Type forkj.: '.$tfork.'<br />';
    $message_sent    = '<strong>Melding er sendt.</strong><br>Takk for din påmelding. Ha en fin dag';
  }
          
  //$to='szabogabi@gmail.com';

if(!$human == 0){
    if($human != 2) gen_response('error', $not_human); //not human!
    else {
      
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $response = gen_response('error', $email_invalid);
      else //email is valid
      {
        //validate presence of name and email
        if(empty($name) || empty($email)){
          $response = gen_response('error', $missing_content);
        }
        else //ready to go!
        {
          

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
      <p class="tablist" role="tablist">
        <a class="js_inverseoff active" href="#ct" aria-controls="ct" role="tab" data-toggle="tab">Meld interesse</a> | 
        <a class="js_inverseon aria-controls="ct" role="tab" data-toggle="tab"" href="#ft">Meld forkjøpsrett</a>
      </p>
		</div>


<div role="tabpanel">

  <!-- Nav tabs -->
  <!--ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#ct" aria-controls="ct" role="tab" data-toggle="tab">Meld interesse</a></li>
    <li role="presentation"><a href="#ft" aria-controls="ft" role="tab" data-toggle="tab">Meld forkjøpsrett</a></li>
  <ul -->
		<div class="contact--right">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="ct">

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

        <div role="tabpanel" class="tab-pane fade" id="ft">
          <form action="<?php the_permalink(); ?>#contacresponse" method="post">
            <div class="formitem">
              <input required disabled="disabled" placeholder="Prosjekt" type="text" id="contact_prosjekt" name="contact_prosjekt" value="Prosjekt: Brl Hesjaholtet Park">
            </div>
            <div class="formitem">
              <input required placeholder="Navn (obligatorisk)" type="text" id="contact_name" name="contact_name">
            </div>
            <div class="formitem">
              <input required placeholder="Gateadresse (obligatorisk)" type="text" id="contact_gateaddresse" name="contact_gateaddresse">
            </div>
            <div class="formitem">
              <input required placeholder="Postnummer (obligatorisk)" type="text" id="contact_postnummer" name="contact_postnummer">
            </div>
            <div class="formitem">
              <input required placeholder="Poststed (obligatorisk)" type="text" id="contact_poststed" name="contact_poststed">
            </div>
            <div class="formitem">
              <input required placeholder="Medlemsnummer i Vestbo (obligatorisk)" type="text" id="contact_mnummer" name="contact_mnummer">
            </div>
            <div class="formitem">
              <input placeholder="Mobilnummer" type="tel" id="contact_mobil" name="contact_mobil">
            </div>
            <div class="formitem">
              <input placeholder="Telefonnummer" type="tel" id="contact_tel" name="contact_tel">
            </div>
            <div class="formitem">
              <input required placeholder="E-post (obligatorisk)" type="email" id="contact_email" name="contact_email">
            </div>
            <div class="formitem formitem--radios">
              <h4>Type forkjøpsrett (obligatorisk)</h4>
              <input required type="radio" name="contact_tfork" value=">Intern forkjøsrett, boende i leilighet nr" /> Intern forkjøsrett, boende i leilighet nr<br>
              <input required type="radio" name="contact_tfork" value="Medlemskap i Vestbo, medlemsnummer" /> Medlemskap i Vestbo, medlemsnummer
            </div>
            <div class="formactions">
              <input id="contact_type" type="hidden" name="contact_type" value="Forkjøpsrett">
              <input type="hidden" name="contact_human" value="2">
              <input type="hidden" name="submitted" value="2">
              <input type="submit" class="btn" value="Send">
            </div>
          </form>
      
        </div>
      
      </div>




		</div>
    </div> <!-- /.tabpanel-->
	</div>
</aside>
<?php endif; ?>

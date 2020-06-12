<?php 
/*
  Template Name: Contact Form
*/

get_header(); 


$messageStatus = "";

if (!empty( $_POST ) && isset($_POST['textinputYourName'])) { 

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . get_option('admin_email') . "\r\n";
 
    $to = get_option('admin_email');
    if (get_theme_mod(GENLITE_CONTACT_MAILTO)) {
      $to = get_theme_mod(GENLITE_CONTACT_MAILTO);
    }
     
    $subject = __('Contact Form Message has arrived', 'genlite');
    if (get_theme_mod(GENLITE_CONTACT_SUBJECT)) {
        $subject = get_theme_mod(GENLITE_CONTACT_SUBJECT);
    }

    $messageStatus = __('Thanks for reaching out.  Once reviewed I will get back to you as soon as possible.','genlite');
    if (get_theme_mod(GENLITE_CONTACT_STATUS)) {
       $messageStatus = get_theme_mod(GENLITE_CONTACT_STATUS);
    }


    $textinputYourName = esc_attr($_POST["textinputYourName"]);
    $textinputYourEmail = esc_attr($_POST["textinputYourEmail"]);
    $textareaMessage = esc_attr($_POST["textareaMessageDetails"]);
    $textinputWebAddress = esc_attr($_POST["textinputWebAddress"]);
    $supportType = esc_attr($_POST["supportType"]);
  
    $emailMessage = "
     <html>
     <head>
     <title>" . $subject . "</title>
     </head>
     <body>" . $textinputYourName . " - " . $textinputYourEmail . " - " . $textareaMessage . " - " . $textinputWebAddress . " - " . $supportType .
     "</body>
     </html>
     ";

    if ($to === '' || $subject === '' ) {
       $messageStatus = __('Required missing fields','genlite');
    
     } else {
         if ( !is_customize_preview() ) { 
             wp_mail($to, $subject, $emailMessage, $headers);  
         }
    }  

}

?>

<div class="container">

   <div class="row justify-content-center">
    
      <div class="genlite-title-row">

            <h1 class="text-center"><?php the_title(); ?></h1>

       </div>

    </div>        
  
    <div class="row">

        <div class = "col-lg-12 text-center">

          <?php while(have_posts()) : the_post(); ?>

              <?php the_content(''); ?>

          <?php 

          endwhile; wp_reset_query(); ?>

          <br>

        </div>

    </div>

     <div class="row justify-content-center">

        <div class = "col-lg-4 col-md-offset-4">     

          <!-- The Contact Form  -->

          <form method="post" class="form-horizontal">
  
            <fieldset>

                  <div class="form-group">
                    <label class="genlite-contact-label" for="textinputYourName">Your Name *</label>  
                    <div>
                      <input id="textinputYourName" name="textinputYourName" type="text" placeholder="" class="form-control input-md" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="genlite-contact-label" for="textinputYourEmail">Your Email *</label>  
                    <div>
                      <input id="textinputYourEmail" name="textinputYourEmail" type="email" placeholder="" class="form-control input-md" required="">
                    </div>  
                  </div>

                  <div class="form-group">
                    <label class="genlite-contact-label" for="textinputWebAddress">Website Address</label>  
                    <div>
                    <input id="textinputWebAddress" name="textinputWebAddress" type="text" placeholder="" class="form-control input-md">   
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="genlite-contact-label" for="supportType">Service Type</label>
                    <div>
                      <select id="supportType" name="supportType" class="form-control">
					
          					    <option value="WordPress Development">WordPress Development</option>
          					    <option value="GenLite Support">GenLite Support</option>
                    
                      </select>
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="genlite-contact-label" for="textareaMessageDetails">Message Details *</label>
                    <div>                     
                      <textarea rows="10" class="form-control" id="textareaMessageDetails" name="textareaMessageDetails"></textarea>
                    </div>
                  </div>

           </fieldset>

           <br>
         
           <div class="form-group">

                <div class="col-12 text-center">
                   <button class="genlite-btn-contact" type="submit" id="singlebuttonSend" name="singlebuttonSend" >Send</button>
                </div>

           </div>
     
          <br>

          <div class="text-center genlite-green"><?php echo $messageStatus; ?></div>

          <br>

        </form>

        <!-- End of Contact Form  -->

      </div>
  
   </div>

</div>


<?php get_footer(); ?>
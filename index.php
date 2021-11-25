<!DOCTYPE html>
<html>
  <head>
    <title>Blanca's Cleaning Services</title>

    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Love+Ya+Like+A+Sister&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div id="container">
      <div id="header">
        <a href="/" title="Return to Home Page" id="logo">
          <img
            id="mainimage"
            src="images/logo.png"
            alt="Blanca's Cleaning Services. Quality house cleaing at an affordable price!"
          />
        </a>
      </div>
      <div class="sidebar">
        <a href="./index.php"><h1>Homepage</h1></a>
      </div>
      <div class="sidebar">
        <a href="./services.php"><h1>Services</h1></a>
      </div>
      <div class="sidebar">
        <a href="./contact.php"><h1>Contact</h1></a>
      </div>

      <div id="content" class="content-block">
        <h2>Proudly Serving Franklin County, Missouri</h2>
        <h3>...and surrounding areas</h3>
        <img
          id="map"
          src="images/blanca.png"
          alt="Blanca's Cleaning Services. Quality house cleaing at an affordable price!"
        />
        <img
          id="map"
          src="images/franklin.png"
          alt="Blanca's Cleaning Services. Quality house cleaing at an affordable price!"
        />
        <br /><br />
        <p>
          &#9733; New Haven &#9733; Washington &#9733; Union &#9733; Hermann
          &#9733; Gerald &#9733; Villa Ridge &#9733; Gray Summit &#9733; Berger
          &#9733; Sullivan &#9733; St. Clair &#9733; Labadie &#9733; Beaufort
          &#9733; Augusta &#9733; Dutzow
        </p>
        <br />
        <p>
          Consider hiring Blanca for all of your home and office cleaning needs.
          We offer a variety of cleaning services which are sure to keep your
          place happy and sparkling! Quality cleaning at a fair price.
        </p>
      </div>

      <div id="reserve" class="content-block">
        <h2>Contact Us Today</h2>
        <p>
          Send us a message or book Blanca for a professional house cleaning
          session.
        </p>

        <form id="contact_form" method="post" name="myemailform" action="index.php#contact_form">
          <label for="your_name">Your Name</label>
          <input type="text" id="your_name" name="your_name" placeholder="John Smith" />

          <label for="your_email">Your Email</label>
          <input type="email" id="your_email" name="your_email" placeholder="your@email.com" />

          <label for="your_phone">Your Phone</label>
          <input type="phone" id="your_phone" name="your_phone" placeholder="555-555-5555" />

          <label for="your_time">Message</label>
          <input
            type="text"
            id="your_message"
            name="your_message"
            placeholder="Spruce things up!"
          />

          <input type="submit" value="Submit" />
        </form>

        <?php
          use PHPMailer\PHPMailer\PHPMailer;
          use PHPMailer\PHPMailer\SMTP;
          use PHPMailer\PHPMailer\Exception;

          //Load Composer's autoloader
          require 'vendor/autoload.php';

          if (count($_POST) > 0) {
            $name = $_POST['your_name'];
            $visitor_email = $_POST['your_email'];
            $visitor_phone = $_POST['your_phone'];
            $visitor_message = $_POST['your_message'];
            
            $email_to = 'blanca@blancascleaning.com';
            $email_subject = "New Message";
            $email_body = "You have received a new message from the user $name.\n\n".
            "Name:\t$name\n".
            "Email:\t$visitor_email\n".  
            "Phone:\t$visitor_phone\n".                   
            "Here is the message:\n\n $visitor_message".
            $headers = "";
            $headers .= "Reply-To: $visitor_email \r\n";
            $headers .= "Bcc: someoneelse@domain.com \r\n";

            $mail = new PHPMailer(true);

            try {
                $host = getenv("HOST");
                $port = getenv("PORT");
                $email = getenv("EMAIL");
                $email_bcc = getenv("EMAIL_BCC");
                $password = getenv("PASSWORD");

                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $host;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $email;                     //SMTP username
                $mail->Password   = $password;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($email);
                $mail->addAddress($email);     //Add a recipient
                $mail->addBCC($email_bcc);

                //Content
                $mail->isHTML(false);                                  //Set email format to HTML
                $mail->Subject = $email_subject;
                $mail->Body    = $email_body;

                $mail->send();
                echo "<br/>Thank you, ", $name, ". We will be in touch shortly.";
            } catch (Exception $e) {
                echo "Message could not be sent.";
            }
          }
        ?>
      </div>

      <div id="footer" class="content-block">
        Contact us today!:
        <a href="mailto:blanca@blancascleaning.com"
          >blanca@blancascleaning.com</a
        >
        | 240.305.7290
      </div>
    </div>
  </body>
</html>

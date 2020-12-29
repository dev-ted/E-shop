<?php
 $active='contact';
include("pages/header.php")
?>
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Contact Us</li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
            include("pages/sidebar.php")
            ?>
        </div>
        <div class="col-md-9">

            <div class="box">

                <div class="box-header">
                    <center>
                        <h2>Contact Us,Stay in Touch</h2>
                        <p class="text-muted">for enquiries or complaints feel free to contactus</p>
                    </center>
                    <form action="contact.php" method="POST">
                        <div class="form-group">
                        <span >Name</span>
                        <input class="form-control" type="text" name="name" placeholder="Please enter your name" required>
                       
                        </div>
                        <div class="form-group">
                        <span >email</span>
                        <input class="form-control" type="text" name="email" placeholder="Please enter your email" required>
                       
                        </div>
                        <div class="form-group">
                        <span >Subject</span>
                        <input class="form-control" type="text" name="subject" placeholder="Please enter the Subject" required>
                       
                        </div>
                        <div class="form-group">
                        <span >Message</span>
                        <textarea class="form-control" type="text" name="message" required></textarea>
                       
                        </div>
                        <div class="text-center">

                        <button type="submit" name="submit" class="btn btn-primary">
                           <i class="fa fa-send"></i> Send message

                        </button>
                        </div>

                    </form>

                    <?php
                    if(isset($_POST['submit'])){
                        //send message to admin
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];

                        $reciever_mail = "robotteddy@gmail.com";
                        $retval= mail($name,$email,$subject,$message,$reciever_mail);

                        //auto reply
                        $auto_email = $_POST['email'];
                        $mail_subject = "Welcome to Takeless";
                        $msg = "Thank You for contacting us ";
                        $sender = "robotteddy@gmail.com";
                        $retval= mail($auto_email,$mail_subject,$msg,$sender);
                       // echo "<h2> Your message has been submitted</h2>";
                        if( $retval == true ) {
                            echo "Message sent successfully...";
                         }else {
                            echo "Message could not be sent...";

                    
                        
                    }
                }

                    ?>
                </div>
            </div>


        </div>
    </div>
</div>
<?php
include("pages/footer.php")
?>
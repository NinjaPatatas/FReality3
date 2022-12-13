<?php 

                            if(isset($_POST['send1'])){
                                $to = $_POST['email'];
                                 $subject ="FIND REALITY SUBSCRIPTION";
                                 
                                 $message =  "THANK YOU ".$_POST['name1']." FOR SUBSCRIBING TO FIND REALITY !!";
                                 
                                 
                                 $retval = mail ($to,$subject,$message);
                                 
                                 if( $retval == true ) {
                                    echo "Message sent successfully...";
                                 }else {
                                    echo "Message could not be sent...";
                                 }


                            }

                            header("Location: index.php");

                            ?>
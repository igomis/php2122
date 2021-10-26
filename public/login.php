<?php
    require_once ('../kernel.php');
    require_once ('../bootstrap.php');
    $mail = require_once ('../mailer.php');


    $errors = [];
    if (isPost() && cfsr()){
       $email = isRequired('email',$errors);
       if ($_POST['forgot'] == 'on'){
           try {
               $user = $query->selectWhereUnique('users','email',$email);
               if (!$user) {
                   throw new Exception('No hi ha usuari');
               }
               $token_recup = generar_token_seguro(60);
               $query->update('users',compact('token_recup'),'id',$user->id);
               //Recipients
               $mail->setFrom('2daw2021batoi@gmail.com', 'Batoi');
               $mail->addAddress($user->email,$user->name);     // Add a recipient

               // Content
               $mail->isHTML(true);                                  // Set email format to HTML
               $mail->Subject = 'Forgot Password';
               $mail->Body    = "Utilitza el següent <a href='http://php.dwes.my/forgot.php?email=".$user->email."&token=".$token_recup."'>enllaç</a> per canviar contrasenya";
               $mail->send();
               echo 'Message has been sent';
           } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
           }
       }
       else {
           $password = isRequired('password',$errors);
           if (!count($errors)){
               $user = $query->login('users',$email,$password);
               $_SESSION['user'] = serialize($user);
               header('Location: /');
           }
       }

    }

    require_once('login.view.php');

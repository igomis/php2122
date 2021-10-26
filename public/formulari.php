<?php
    require('../kernel.php');
    use App\Exceptions\RequiredField;
    $greetins = "Formulari";
    $errors = [];

    if (isPost() && cfsr()){

        // validació camps
        try {
            $title = isRequired('title');
            $assigned_to = isRequired('assigned_to', $errors);
            $completed = isRequired('completed', $errors);
        } catch (RequiredField $e){
            $errors[$e->getField()] = $e->getMessage();
        }

        $due = isAfter('due',$errors);
        isType('file','application/pdf',$errors);
        if (!count($errors)) {
            $file = "upload/" . $_FILES["file"]["name"];
            $res = move_uploaded_file($_FILES["file"]["tmp_name"], $file);
            if (!$res) {
                $errors['file'] = 'Error pujant el fitxer';
            } else {
               $completed = $completed==='on'?1:0;
               $query->insert('tasks',compact('title','assigned_to','completed','due','file'));
            }
        }
        if (count($errors)){
            extract($_POST,EXTR_PREFIX_SAME,'old');
            require_once('formulari.view.php');
        }
    } else {
        $visites = $_SESSION['visites'];
        require('formulari.view.php');
    }




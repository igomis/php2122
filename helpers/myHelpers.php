<?php
    function dd(...$variable){
        die(var_dump($variable));
    }

    function isPost(){
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    function cfsr(){
        if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) die('Anti-CSRF');
        else return true;
    }

    function isRequired($nomCamp){
        if (!empty($_POST[$nomCamp])) {
            return trim(htmlspecialchars($_POST[$nomCamp]));
        }
        throw new \App\Exceptions\RequiredField($nomCamp);
    }

    function isBetween($nomCamp,&$errors,$min=-99999999,$max=9999999){
        if (!empty($_POST[$nomCamp]) && is_numeric($_POST[$nomCamp])) {
            if ($_POST[$nomCamp]<$min || $_POST[$nomCamp]> $max){
                $errors[$nomCamp] = "$nomCamp ha d'estar entre $min i $max";
                return null;
            }
            else {
                return $_POST[$nomCamp];
            }
        } else {
            $errors[$nomCamp] = "$nomCamp és requerit i numèric";
            return null;
        }
    }
    function isAfter($nomCamp,&$errors){
        if (!empty($_POST[$nomCamp])){
            $now = strtotime(date("d-m-Y H:i:00",time()));
            $fecha_entrada = strtotime($_POST[$nomCamp]);
            if ($now > $fecha_entrada){
                $errors[$nomCamp] = "$nomCamp ja ha passat";
            }else{
                return $_POST[$nomCamp];
            }
        } else {
            $errors[$nomCamp] = "$nomCamp és requerit i data";
            return null;
        }
    }

    function isEmail($nomCamp,&$errors){
        if (!empty($_POST[$nomCamp]) && filter_var($_POST[$nomCamp], FILTER_VALIDATE_EMAIL)){
            return $_POST['$nomCamp'];
        } else {
            $errors[$nomCamp] = "$nomCamp és requerit i email";
            return null;
        }
    }

    function  isType($nomCamp,$type,&$error){
        if ($_FILES[$nomCamp]['type'] !== $type) {
            $errors[$nomCamp] = "Fitxer No és $type";
        }
    }


    function isValidClass($nomCamp,$errors){
        if (!isset($errors)) {
            return '';
        }
        if (isset($errors[$nomCamp])) {
            return 'is-invalid';
        }
        return 'is-valid';
    }

    function showError($nomCamp,$errors){
        if (!isset($errors)) {
            return '';
        }
        if (isset($errors[$nomCamp])) {
            return "<div class='invalid-feedback'>$errors[$nomCamp]</div>";
        }
        return "<div class='valid-feedback'>All correct</div>";
    }

    function insert($table,$fields) {
        $fieldsValue = implode(" , :",array_keys($fields));
        $fieldsName = implode(",",array_keys($fields));
        $sentence = "insert into %s (%s) values (:%s )";
        return sprintf($sentence,$table,$fieldsName,$fieldsValue);
    }

    function generar_token_seguro($longitud)
    {
        if ($longitud < 4) {
            $longitud = 4;
        }

        return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
    }

    function update($table,$fields,$primaryKey) {
        $sentence = "UPDATE $table SET ";
        foreach ($fields as $key => $value){
            $sentence .= "$key = :$key,";
        }
        $sentence = trim($sentence,',');
        $sentence .= " WHERE $primaryKey = :id";
        return $sentence;
    }

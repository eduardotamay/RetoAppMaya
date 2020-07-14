<?php
    include_once("MTest.php");

    if(isset($_POST['Insert']) && $_POST['Insert']!='') {

        if(isset($_POST['radioName']) && $_POST['radioName']!='')         {$radioName=$_POST['radioName'];}
        if(isset($_POST['radioLastname']) && $_POST['radioLastname']!='') {$radioLastName=$_POST['radioLastname'];}
        if(isset($_POST['radioCountry']) && $_POST['radioCountry']!='')   {$radioCountry=$_POST['radioCountry'];}
        if(isset($_POST['radioOption1']) && $_POST['radioOption1']!='')   {$radioOption1=$_POST['radioOption1'];}
        if(isset($_POST['radioOption2']) && $_POST['radioOption2']!='')   {$radioOption2=$_POST['radioOption2'];}
        if(isset($_POST['radioOption3']) && $_POST['radioOption3']!='')   {$radioOption3=$_POST['radioOption3'];}
        if(isset($_POST['radioOption4']) && $_POST['radioOption4']!='')   {$radioOption4=$_POST['radioOption4'];}
        if(isset($_POST['radioOption5']) && $_POST['radioOption5']!='')   {$radioOption5=$_POST['radioOption5'];}
        if(isset($_POST['radioOption6']) && $_POST['radioOption6']!='')   {$radioOption6=$_POST['radioOption6'];}
        if(isset($_POST['radioOption7']) && $_POST['radioOption7']!='')   {$radioOption7=$_POST['radioOption7'];}
        if(isset($_POST['radioOption8']) && $_POST['radioOption8']!='')   {$radioOption8=$_POST['radioOption8'];}
        if(isset($_POST['radioOption9']) && $_POST['radioOption9']!='')   {$radioOption9=$_POST['radioOption9'];}
        if(isset($_POST['radioOption10']) && $_POST['radioOption10']!='') {$radioOption10=$_POST['radioOption10'];}

        if ($radioName!='' and $radioLastName!='' and $radioCountry!='' and $radioOption1!='' and $radioOption2!='' and 
        $radioOption3!='' and $radioOption4!='' and $radioOption5!='' and $radioOption6!='' and $radioOption7!='' and 
        $radioOption8!='' and $radioOption9!='' and $radioOption10!='') {
            
            $ObjTest = new testMaya();
            //Respuestas 1c 2c 3b 4c 5a 6b 7a 8b 9a 10c
            
            //Sacar calificación
            $calification = 0;

            $answers = $radioOption1.','.$radioOption2.','.$radioOption3.','.$radioOption4.','.$radioOption5.','.$radioOption6.','.$radioOption7.','.$radioOption8.','.$radioOption9.','.$radioOption10;
            //string aleatorio
            $name=str_replace(' ', '',$radioName);
            $last=str_replace(' ', '',$radioLastName);
            $strin = $name.$last;
            $encripName = substr(str_shuffle($strin), 0, 10);

            $ObjTest->test($encripName,$radioName,$radioLastName,$radioCountry,$answers,$calification);
            
            $result = $ObjTest->insertUser();


            if ($result) {
                $nameUser = $encripName;
                header('HTTP/1.1 200 Ok');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'OK','name'=>$nameUser)));
            }else{
                echo "Error";
            }
        }else{
            echo "Error2";
        }

    }

?>
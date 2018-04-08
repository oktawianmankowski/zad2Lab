

<?php
$result = [$_POST['name'] => 1];
if (strlen($_POST['value']) < 9 || !regonValidator($_POST['value'])) {
    $result = [$_POST['name'] => "Pole " . $_POST['name'] . " IS INCORRECT"];
}

else {$result = [$_POST['name'] => "Field " . $_POST['name'] . " IS CORRECT"];}
echo json_encode($result);

function regonValidator($regon) {
    $reg = '/^[0-9]{9}$/';
    if(preg_match($reg, $regon)==false)
        return false;
    else
    {
        $digits = str_split($regon);
        $checksum = (8*intval($digits[0]) + 9*intval($digits[1]) + 2*intval($digits[2]) + 3*intval($digits[3]) + 4*intval($digits[4]) + 5*intval($digits[5]) + 6*intval($digits[6]) + 7*intval($digits[7]))%11;
        if($checksum == 10) 
            $checksum = 0;
 
        return (intval($digits[8]) == $checksum);
    }
}
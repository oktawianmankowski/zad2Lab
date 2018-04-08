

<?php
$result = [$_POST['name'] => 1];
if (strlen($_POST['value']) < 9 ) {
    $result = [$_POST['name'] => "Pole " . $_POST['name'] . " IS INCORRECT"];
}

else {$result = [$_POST['name'] => "Field " . $_POST['name'] . " IS CORRECT"];}
echo json_encode($result);

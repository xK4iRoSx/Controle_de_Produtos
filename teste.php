

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    date_default_timezone_set('America/Fortaleza');
    

    $data = "2023-05-24 13:21:15";
    

    $tempo = strtotime($data);
    $agora = strtotime(date("Y-m-d H:i:s"));
    $dif = $agora - $tempo;
    $seg = $dif;
    $min = round($dif/60);
    $hrs = round($dif/3600);
    $dia = round($dif/86400);
    $sen = round($dif/604800);
    $mes = round($dif/2419200);
    $ano = round($dif/29030400);
    if($seg <= 60){
        echo $seg." segundos";
  }else if($min <= 3600){
    echo $min. " minutos";
  }else if($hrs <= 86400){
    echo $hrs. " horas";
  }
?>
</body>
</html>
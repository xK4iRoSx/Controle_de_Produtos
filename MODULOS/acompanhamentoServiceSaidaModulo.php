<?php
date_default_timezone_set('America/Fortaleza');
include_once("../conexaoDB.php");
$status = "Saida";

$sqli = "SELECT * FROM service";
$ordems = $conexao->query($sqli);

while($ordem = mysqli_fetch_assoc($ordems)){
    $resOrdem = $ordem['ordem'];
    
    $sqli = "SELECT * FROM ordemservico where ordem ='$resOrdem' ORDER BY id DESC LIMIT 1 ";
    $resServico = $conexao->query($sqli);

    while($res = mysqli_fetch_assoc($resServico)){
      
        
        if($res['status']== $status){
            $teste = strtotime(date($res['data']." ".$res['hora']));
             
            $agora = strtotime(date("d-m-Y H:i:s"));

            $dif = $agora - $teste;
            $seg = $dif;
            $min = round($dif/60);
            $hrs = round($dif/3600);
            $dia = round($dif/86400);
            $sen = round($dif/604800);
            $mes = round($dif/2419200);
            $ano = round($dif/29030400);
           
    
             echo "<div class='div'>".$res['ordem']."<br><br>
             Ultimo local:".$res['setor']."<br><br>
              dia ".$res['data']." as ".$res['hora']."<br><br>";
              
             
                
             

              if($seg <= 60){
                if($seg == 1){
                    echo" há 1 segundo";
                }else{
                    echo "<span class='tempo'>há ".$seg."</span> segundos";
                }
                   

              }else if($min <= 60){

                    if($min == 1){
                        echo" há 1 minuto";
                    }else{
                         echo"<span class='tempo'>há ".$min."</span> minutos";
                    }
                 

              }else if($hrs <= 24){
                if($hrs == 1){
                    echo" há 1 horas";
                }else{
                    echo "<span class='tempo'>há ".$hrs."</span> horas";
                }
             
              }else if($dia <= 7){
                if($dia == 1){
                    echo" há 1 dia";
                }else{
                    echo "<span class='tempo'>há ".$dia."</span> dias";
                }
                

              }else if($sen <= 4){
                if($sen == 1){
                    echo" há 1 semana";
                }else{
                    echo "<span class='tempo'>há ".$sen."</span> semanas";
                }
               
                
              }else if($mes <= 12){
                if($mes == 1){
                    echo" há 1 mês";
                }else{
                    echo "<span class='tempo'>há ".$mes."</span> mesês";
                }
               
                
              }else{
                if($ano == 1){
                    echo" há 1 ano";
                }else{
                    echo "<span class='tempo'>há ".$ano."</span> anos";
                }
               
                
              }
              echo"<hr></div><br>";
        }
       


     }
}
?>


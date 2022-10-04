<!DOCTYPE html>
<html lang="pt">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manipulação XML com PHP</title>

      <style>



        
      body {
      background-image: url(./assets/sol.jpg);       
      background-position: top center;
      background-size: 100% auto;
      background-repeat: no-repeat;
      font-family: 'Ariel', sans-serif;
      line-height: 300%;
      color: rgb(233, 229, 236);
      text-align: center;
      padding: 50px;
      border-radius: 20px;
      
      margin-top: 200px;
}     
      </style>
    

<?php


$signos = simplexml_load_file('XMLcomSignos.xml');

$data = $_POST['dataNascimento'];

$data = explode('-', $data);

$dataSemAno = $data[1]."/".$data[2];
   

foreach($signos->signo as $signo){
      $dataInicioFormatada = explode('/', $signo->dataInicio);
      $dataInicioFormatada = $dataInicioFormatada[1]."/".$dataInicioFormatada[0];

      $dataFinalFormatada = explode('/', $signo->dataFim);
      $dataFinalFormatada = $dataFinalFormatada[1]."/".$dataFinalFormatada[0];

      if(strtotime($dataSemAno) >= strtotime($dataInicioFormatada) && strtotime($dataSemAno) <= strtotime($dataFinalFormatada)){
      
            echo "Você é do signo: ".$signo->signoNome;

            echo "<br/><br/>Descrição: ".$signo->descricao;
            
           
            
      }
}

?>

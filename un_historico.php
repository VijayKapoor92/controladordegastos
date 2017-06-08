<?php
ini_set("display_errors","on");
date_default_timezone_set('America/Sao_Paulo');
require_once 'conexao/conn.php';

$conexao = conectar();
$usuario = $_POST["usuario"];

$sql ="
      select 
         r.nm_renda as \"nm_renda\", 
         r.vl_renda as \"vl_renda\", 
         r.dt_renda as \"dt_renda\", 
         d.nm_despesa as \"nm_despesa\", 
         d.vl_despesa as \"vl_despesa\", 
         d.dt_despesa as \"dt_despesa\"
      from 
         renda r, despesa d
      where 
         r.id_usuario = d.id_usuario
      and 
         r.id_usuario = {$usuario}
      ";

$rs = mysqli_query($conexao,$sql);

print "<table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>";
   print "<thead>";
      print "<tr>";
         print "<th class='mdl-data-table__cell--non-numeric'>Descrição</th>";
         print "<th>Valor</th>";
         print "<th>Data</th>";
      print "</tr>";
   print "</thead>";
   print "<tbody>";
while($data = mysqli_fetch_array($rs)){
      print "<tr>";
         print "<td class='mdl-data-table__cell--non-numeric'>".utf8_encode($data["nm_renda"])."</td>";
         print "<td>".$data["vl_renda"]."</td>";
         print "<td>".$data["dt_renda"]."</td>";
      print "</tr>";
}
   print "</tbody>";
print "</table>";
?>
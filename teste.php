<?php
ini_set("display_errors","on");
date_default_timezone_set('America/Sao_Paulo');
require_once 'conexao/conn.php';

try{

                  $retorno = 1;

                  $sql = "select count(*) from usuario where email_usuario = 'vijaylopeskapoor@gmail.com' and senha_usuario = md5('123456')";
                  
                  $conexao = conectar();
                  $stmt = mysqli_query($conexao, $sql);
                  $rs = mysqli_fetch_array($stmt);

                  if($rs[0] != 0){
                        session_start();
                        $sSql = "
                        select 
                              nm_usuario as \"nm_usuario\",
                              senha_usuario as \"senha_usuario\",
                              email_usuario as \"email_usuario\"
                        from 
                              usuario 
                        where 
                              email_usuario = 'vijaylopeskapoor@gmail.com' 
                        and 
                              senha_usuario = md5('123456')
                        ";
                        $sStmt = mysqli_query($conexao, $sSql);
                        $sRs = mysqli_fetch_array($sStmt);
                        $_SESSION["nome_usuario"] = $sRs["nm_usuario"];
                        $_SESSION["senha_usuario"] = $sRs["senha_usuario"];
                        $_SESSION["email_usuario"] = $sRs["email_usuario"];
                        print $retorno;
                  }else{
                        $retorno = 2;
                        print $retorno;
                  }
            }catch(Exception $e){

            }
?>
<?php

define('HOST','localhost');
define('USER','root');
define('PASS',null);
define('DB','ClicaAqui');

class Conexao{
 /** @var PDO */
 private static $Conexao;

// Cria uma classe de Conexao chamada CONECTAR()
 private static function Conectar(){
  try{
  // verificar se a conexao nao existe, Padrao SINGLETON e garante que somente uma conexao seja criada 
  // para nao criar uma nova conexao
  if(self::$Conexao == null):
   $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
   self::$Conexao = new PDO($dsn, USER,PASS, null);
  endif;
  }
  catch (PDOException $e){
   echo $e->getMessage();
  } 
// COnfigura o PDO para lançar exceções em caso de erro, facilita o tratamento durante operações com o banco de dados
  self::$Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return self::$Conexao;
 }
 // permitir que outras partes do sistema acessem a conexao criada,
 // sem instanciar a classe novamente
 public static function retornarConexao(){
 return self::Conectar();
 }
}
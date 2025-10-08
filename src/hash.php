<?php

if (isset($_POST['link'])) {
 try {
  $pdo = Conexao::retornarConexao();
  $url = trim($_POST['link']);
  $maxTentativas = 10;

  // Gera um hash único para o banco de dados
  for ($i = 0; $i < $maxTentativas; $i++) {
   try {
    $hash = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);
    $stmt = $pdo->prepare("INSERT INTO urls (id, url, views) VALUES (:hash, :url, 0)");
    $stmt->execute([':hash' => $hash, ':url' => $url]);

    $urlEncurtada = $hash;
    break;
   } catch (PDOException $e) {
    if ($i === $maxTentativas - 1) {
     throw new Exception("Não foi possível gerar um hash único.");
    }
   }
  }
 } catch (Exception $e) {
  echo "Erro: " . $e->getMessage();
 }
}

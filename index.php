<?php
require_once 'src/Conexao.php';

// Verifica se o código foi passado na URL
if (isset($_GET['codigo'])) {
 try {
  $pdo = Conexao::retornarConexao();
  $codigo = trim($_GET['codigo']);
  $codigo = str_replace(' ', '', $codigo); // Remove espaços
  
  // Busca APENAS pelo hash (id) - identificador único
  // Nome personalizado pode repetir, não é usado para busca
  $stmt = $pdo->prepare("SELECT url FROM urls WHERE id = :codigo");
  $stmt->execute([':codigo' => $codigo]);
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if ($resultado) {
   // Incrementa o contador de views
   $stmtUpdate = $pdo->prepare("UPDATE urls SET views = views + 1 WHERE id = :codigo");
   $stmtUpdate->execute([':codigo' => $codigo]);
   
   // Redireciona para a URL original
   header("Location: " . $resultado['url']);
   exit();
  } else {
   // Código não encontrado
   http_response_code(404);
   echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
 <meta charset='UTF-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1.0'>
 <title>Link não encontrado - ClicaAqui</title>
 <style>
  body {
   font-family: Arial, sans-serif;
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
   margin: 0;
   background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   color: white;
  }
  .error-container {
   text-align: center;
   padding: 2rem;
  }
  h1 { font-size: 4rem; margin: 0; }
  p { font-size: 1.5rem; margin: 1rem 0; }
  a {
   color: white;
   text-decoration: none;
   background: rgba(255,255,255,0.2);
   padding: 10px 20px;
   border-radius: 5px;
   display: inline-block;
   margin-top: 1rem;
   transition: background 0.3s;
  }
  a:hover { background: rgba(255,255,255,0.3); }
 </style>
</head>
<body>
 <div class='error-container'>
  <h1>404</h1>
  <p>Link não encontrado</p>
  <p>O link que você está tentando acessar não existe ou foi removido.</p>
  <a href='View/inicio.php'>Voltar para a página inicial</a>
 </div>
</body>
</html>";
  }
 } catch (PDOException $e) {
  echo "Erro ao processar o link: " . $e->getMessage();
 }
} else {
 // Se não há hash, redireciona para a página inicial
 header("Location: View/inicio.php");
 exit();
}


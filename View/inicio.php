<?php
include '../src/Conexao.php';
include '../src/hash.php';

?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>ClicaAqui</title>
 <link rel="stylesheet" href="../style/style.css">
</head>

<body>
 <header class="header">
  <div class="container">
   <div class="logo">
    <img src="../style/img/ClicaAqui(png).png" alt="ClicaAqui Logo" class="logo-img">
   </div>
   <button class="theme-toggle" id="themeToggle" aria-label="Alternar tema">
    <span class="icon">🌙</span>
   </button>
  </div>
 </header>

 <div class="titulo">
  <div class="container">
   <section class="hero">
    <div class="hero-content">
     <div class="hero-text">
      <h2>Bem-vindo ao<img src="../style/img/ClicaAqui(png).png" alt="ClicaAqui" class="hero-img"></h2>
      <p>Sua plataforma de Links Curtos</p>
     </div>
    </div>
   </section>
   <div class="input-container">
    <div class="input-group">
     <form action="../View/inicio.php" method="post">
      <input required="" type="url" name="link" autocomplete="off" class="input">
      <label class="user-label">Insira o seu link</label>

      <button class="button">Criar Link</button>
     </form>
     <?php if (isset($urlEncurtada)): ?>
     <div class="input-group copy-group">
      <?php 
       // URL limpa sem mostrar "ClicaAqui"
       // Detecta protocolo e porta automaticamente
       $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
       $urlFinal = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/' . $urlEncurtada;
      ?>
      <input required="" type="text" name="link-curto" readonly value="<?php echo $urlFinal; ?>" class="input copy-input">
      <button type="button" class="copy-btn" onclick="copyLink()">
       <svg class="copy-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM19 21H8V7H19V21Z" fill="white" />
       </svg>
      </button>
     </div>
     <?php endif; ?>
    </div>
   </div>
  </div>
 </div>

 <footer class="footer">
  <div class="container">
   <p>&copy; <?php echo date('Y'); ?> ClicaAqui. Todos os direitos reservados.</p>
   <p class="creator">Desenvolvido por <strong><a href="https://github.com/JasonFigueiredo" target="_blank" style="color: var(--accent);">JasonFigueiredo</a></strong></p>
  </div>
 </footer>

 <script src="../script/script.js"></script>
</body>

</html>
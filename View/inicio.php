<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>ClicaAqui - Página Inicial</title>
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

 <main class="titulo">
  <div class="container">
   <section class="hero">
    <div class="hero-content">
     <div class="hero-text">
      <h2>Bem-vindo ao<img src="../style/img/ClicaAqui(png).png" alt="ClicaAqui" class="hero-img"></h2>
      <p>Sua plataforma de Links Personalizados</p>
     </div>
    </div>
   </section>
  </div>
 </main>
 
 <div class="input-container">
  <div class="input-group">
   <input required="" type="text" name="text" autocomplete="off" class="input">
   <label class="user-label">Insira o seu link</label>
  </div>
 </div>
 
 <footer class="footer">
  <div class="container">
   <p>&copy; <?php echo date('Y'); ?> ClicaAqui. Todos os direitos reservados.</p>
   <p class="creator">Desenvolvido por <strong>JasonFigueiredo</strong></p>
  </div>
 </footer>

 <script src="../script/script.js"></script>
</body>

</html>
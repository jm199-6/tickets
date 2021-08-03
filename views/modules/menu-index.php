<?php
  $sec = new Seguridad();
 ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a href="./" class="navbar-brand">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li id="pg1" class="nav-item">
          <a class="nav-link" href="./?p=<?php echo $sec->encript("listas"); ?>">Listas</a>
        </li>

      </ul>
      
    </div>
</nav>

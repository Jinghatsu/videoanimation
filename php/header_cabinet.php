<?php include ("core.php")?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><h2>WAKAI</h2></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Меню
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">На главную</a></li>
                   
                    <?php
                            if (isset($_SESSION['login'])) {
                                echo "<li style = 'cursor: pointer' class='nav-item'><a class='nav-link'>{$_SESSION['login']['login']}</a></li>";
                                echo '<li class="nav-item"><a class="nav-link" href="php/out.php">Выход</a></li>';
                                if ($_SESSION['login']['isAdmin'] == 1) { ?>
                                    <li class="nav-item"><a class="nav-link" href="php/admin_panel.php">Редактор</a></li>
                                <?php }
                            } else { ?>
                            <li class="nav-item"><a class="nav-link" href="php/auth.php">Авторизация</a></li>
                                <?php 
                            } 
                        ?>
                </ul>
            </div>
        </div>
    </nav>
    <script>
 function collapsElement(id) {
 if ( document.getElementById(id).style.display != "none" ) {
 document.getElementById(id).style.display = 'none';
 }
 else {
 document.getElementById(id).style.display = '';
 }
 }
 </script>

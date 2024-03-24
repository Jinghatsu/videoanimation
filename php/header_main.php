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
                        <?php
                            if (isset($_SESSION['login'])) {
                                if ($_SESSION['login']['isAdmin'] == 0 && $_SESSION['login']['accept'] == 1) { ?>
                                    <li class="nav-item"><a class="nav-link" href="privatepage.php">Ваш курс</a></li>
                                <?php }    
                            }
                        ?>  
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Программа курса</a></li>
                    <li class="nav-item"><a class="nav-link" href="lessons.html">Подробнее</a></li>

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

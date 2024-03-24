<?php include ("core.php")?>

        <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
        <div class="container">
                    <?php
                    if(!empty($_SESSION['login'])) {
                    echo '<a class="navbar-brand" href="../index.php"><h2>WAKAI</h2></a>';
                    }
                    ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Меню
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <?php
                    if(!empty($_SESSION['login'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="../index.php">Главная</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="out.php">Выход</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="admin_panel.php">Редактор</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
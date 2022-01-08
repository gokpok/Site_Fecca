<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Fecca</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Red+Hat+Display:wght@400;500;600&display=swap" rel="stylesheet"> 
    <?php wp_head(); // Загрузка скриптов и стилей
    ?>
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="header_logo">
                <a href="/"><img src="<?php 
                bloginfo( 'template_url' ); //Статическая ссылка на картинку
                ?>/assets/img/Fecca.svg" alt=""></a>
            </div>  
            <div class="tagline">
                We're Hiring!
            </div>  
            <div class="menu-burger__header">
                <span></span>
            </div>
            <nav class="header__nav">
            <?php //Генерация меню
                    wp_nav_menu( array(
                    'container' => 'ul',
                    'menu_class' => 'menu',
                    'walker' => new Walker_Nav_Primary()
                )); ?>
            </nav>

                <?php 
                $h_b = get_field('header_button'); // Получение обьекта поля group
                ?>
                <div class="btn_header">

                    <a href="<?php  //Поле ссылки
                    echo esc_url($h_b['url']); 
                    ?>" class="link_header" >
                        <?php  //Поле текста
                        echo esc_html($h_b['title']);
                        ?>
                    </a>
                </div>
                <?php //endif; ?>
        </div>
    </header>
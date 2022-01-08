<?php
    add_action( 'wp_enqueue_scripts', 'add_scripts_and_styles' );
    add_action( 'init', 'create_post_types' );
    add_theme_support( 'custom_logo' );

    function add_scripts_and_styles() {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, null, true);
        wp_enqueue_script( 'jquery' );

        wp_enqueue_script( 'swiper_sc', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', false, null, 'footer');
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'swiper_sc'), null, 'footer');

        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css');
        wp_enqueue_style( 'swiper_st', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
        wp_enqueue_style( 'main', get_stylesheet_uri(), array('normalize', 'swiper_st'));
    }

    add_action( 'after_setup_theme', function () {
        add_theme_support( 'menus' );
    } );

    function my_myme_types($mime_types){
        $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
        return $mime_types;
    }
    add_filter('upload_mimes', 'my_myme_types', 1, 1);


    
    function create_post_types(){
        register_post_type( 'Users_review', [
            'label'  => null,
            'labels' => [
                'name'               => 'Отзывы', // основное название для типа записи
                'singular_name'      => 'Отзыв', // название для одной записи этого типа
                'add_new'            => 'Добавить отзыв', // для добавления новой записи
                'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
                'new_item'           => 'Новой отзыв', // текст новой записи
                'view_item'          => 'Смотреть отзывы', // для просмотра записи этого типа.
                'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Отзывы', // название меню
            ],
            'description'         => '',
            'public'              => true,
            // 'publicly_queryable'  => null, // зависит от public
            // 'exclude_from_search' => null, // зависит от public
            // 'show_ui'             => null, // зависит от public
            // 'show_in_nav_menus'   => null, // зависит от public
            'show_in_menu'        => null, // показывать ли в меню адмнки
            // 'show_in_admin_bar'   => null, // зависит от show_in_menu
            'show_in_rest'        => null, // добавить в REST API. C WP 4.7
            'rest_base'           => null, // $post_type. C WP 4.7
            'menu_position'       => null,
            'menu_icon'           => null,
            //'capability_type'   => 'post',
            //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
            //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
            'hierarchical'        => false,
            'supports'            => [ 'title' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => [],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ] );
    }

    class Walker_Nav_Primary extends Walker_Nav_menu {
        // контейнер меню
        function start_lvl( &$output, $depth = 0, $args = NULL){ //ul           
            if ($depth > 0){                                                // если глубина больше 0, начальному контейнеру добавляем класс dropdown2
                $submenu = ' dropdown2';
            }
            elseif ($depth == 0) {                                          // если глубина 0 (меню на главной странице), начальному контейнеру добавляем класс dropdown
                $submenu = ' dropdown';
            }
            else{                                                           // в остальных случаях ничего не добавляется
                $submenu = '';
            }
            $output .= "<ul class=\"menu$submenu\">";                       // определение вида онтейнера меню
         }
        // контейнер содержимого 
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
            //инициализация переменных
            $drop = '';
            $arrow = '';
            $url_icon = '';
            if( $depth && $args->walker->has_children) {                    // если глубина != 0 и есть дочерние элементы, добавляем контейнеру содержимого класс drop
                $drop = ' drop';
            } 
            elseif ($depth == 0 && $args->walker->has_children) {           // если глубина 0 и есть дочерние элементы, контейнеру добавляется класс main_drop
                $drop = ' main_drop';
                $url_icon .= get_template_directory_uri() . '/assets/img/ar_m_2.svg">';     // определение локального урл стрелки главного меню
                $arrow .= '<img class="menu_nav" src="' . $url_icon;                        // формирование блока картинки стрелки
            }
           $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';  // добавление ссылки, заданной из админки(если есть), в пункт меню
           $item_output .= '<a' . $attributes . '>' . $item->title . '</a>';                    // фориирование блока ссылки     
           $output .= "<li class='" .  implode(" ", $item->classes) . $drop . "'> $arrow $item_output ";    //формирование общего контейнера с содержимым

        }
        }
        
?>
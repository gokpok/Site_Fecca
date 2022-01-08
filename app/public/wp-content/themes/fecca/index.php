    <?php 
    
    get_header();                              // Подключаем хедер

    ?>
    <main class="main">
        <div class="screen_one">
        <?php $screen_1 = get_field('screen_1');//Получение обьекта группы ACF?>
            <div class="m_text">
                <?php print_r($screen_1['screen_1_title']); ?>
            </div>
            <div class="store_btn">

                <a href="<?php print_r($screen_1['screen_1_apple']); ?>"><img src="<?php 
                bloginfo( 'template_url' ); //Статическая ссылка на картинку
                ?>/assets/img/AppStore.svg" alt="" class="apple_btn"></a>

                <a href="<?php print_r($screen_1['screen_1_google']); ?>"><img src="<?php 
                bloginfo( 'template_url' ); //Статическая ссылка на картинку
                ?>/assets/img/GooglePlay.svg" alt="" class="google_btn"></a>

            </div>   
            <div class="round">
                <img class="Oval" src="<?php 
                bloginfo( 'template_url' ); //Статическая ссылка на картинку
                ?>/assets/img/Oval.svg" alt="">
            </div>
            <div class="iphone">
                <img src="<?php the_field('screen_1_image'); ?>" alt="">
            </div>
        </div>
        <div class="screen_two">
        <?php $screen_2 = get_field('screen_2');//Получение обьекта группы?>
            <div class="container_1-sc2">
                <div class="text_1">
                     <?php print_r($screen_2['screen_2_title']); ?>
                </div>

                <style>
                    .text_2 a::after {
                        content: url("<?php 
                            bloginfo( 'template_url' ); //Статическая ссылка на картинку
                            ?>/assets/img/arrow_r.svg");

                    }
                </style>
                <?php
                //$screen_2_t = get_field('screen_2');
                if( $screen_2['screen_2_text'] ): // Боковой текст печатаем, только если он задан?>
                    <div class="text_2">
                        <?php print_r($screen_2['screen_2_text']); ?>  
                        <br>
                        <a href="<?php print_r($screen_2['screen_2_link']); ?>">Learn More</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="container_2-sc2">

                <?php
                // Repeater
                // Check rows exists.
                    if( have_rows('features') ): 
                    // Loop through rows. 
                    ?>
                    <?php while( have_rows('features') ) : the_row(); 
                        // Load sub field value. 
                        $image = get_sub_field('features_icon');
                        $picture = $image['url']
                        
                        ?>
                        <div class="feature">
                            <img src="<?php echo $picture ?>" alt="">
                            <p class="title"><?php the_sub_field('features_name') ?></p>
                            <p class="text"><?php the_sub_field('features_description') ?></p>
                        </div>
                        <?php $sub_value = the_sub_field('sub_field'); ?>
                    <?php endwhile; 
                // No value.
                else :
                // Do something...
                endif; 
                ?>
                
            </div>
        </div>
        <div class="screen_three">
            <div class="title-sc3">
                <?php the_field('screen_3_title') ?>
            </div>
            <div class="container_sc3">
                <div class="container_1-sc3">
                    <?php
                    if( have_rows('functions1') ): 
                    // Loop through rows. ?>
                        <?php while( have_rows('functions1') ) : the_row(); ?>
                            <div class="advv">
                                <p class="title_adv"><?php the_sub_field('functions1_title'); ?></p>
                                <p class="text_advv"><?php the_sub_field('functions1_text'); ?></p>
                            </div>
                        <?php endwhile; 
                        // No value.
                    else :
                        // Do something...
                    endif; 
                    ?>
                </div>
                <div class="container_2-sc3">
                    <img src="<?php the_field('screen_3_image'); ?>" alt="">
                </div>
                <div class="container_3-sc3">
                    <?php
                    if( have_rows('functions2') ): 
                    // Loop through rows. ?>
                        <?php while( have_rows('functions2') ) : the_row(); ?>
                            <div class="advv">
                                <p class="title_adv"><?php the_sub_field('functions2_title'); ?></p>
                                <p class="text_advv"><?php the_sub_field('functions2_text'); ?></p>
                            </div>
                        <?php endwhile; 
                        // No value.
                    else :
                        // Do something...
                    endif; 
                    ?>
                </div>
            </div>
        </div>
        <div class="screen_four">
            <div class="title_sc4">
                <?php $screen_4 = get_field('screen_4');//Получение обьекта группы?>
                <p class="title-s"><?php print_r($screen_4['screen_4_title_small']); ?></p>
                <p class="title-b"><?php print_r($screen_4['screen_4_title_big']); ?></p>
            </div>
            <div class="container_sc4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        // Repeater
                        // Check rows exists.
                            if( have_rows('card_review') ): 
                            // Loop through rows. ?>
                            <?php while( have_rows('card_review') ) : the_row(); 
                                // Load sub field value.                              
                            ?>
                            <div class="swiper-slide">
                                <div class="card_block">
                                        <div class="card_wrap">
                                            <div class="card">
                                                <div class="bg_bg">
                                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/backg_dude.svg" alt="">
                                                </div>
                                                <div class="bg_dude">
                                                    <img src="<?php the_sub_field('card_photo'); ?>" alt="">
                                                </div>
                                                <div class="card_bot">
                                                    <div class="icon_bckg">
                                                        <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/quote_dude.svg" alt="">
                                                    </div>
                                                    <p class="author"><?php the_sub_field('card_name'); ?></p>
                                                    <p class="position"><?php the_sub_field('card_position'); ?></p>
                                                </div>
                                            </div>
                                            <div class="card_back">
                                                <p class="quote">“<?php the_sub_field('card_annotation'); ?>”</p>
                                                <p class="author"><?php the_sub_field('card_name'); ?></p>
                                                <p class="position"><?php the_sub_field('card_position'); ?></p>
                                                <a href="<?php the_sub_field('card_link'); ?>" class="link_story">Read full story</a>
                                            </div>
                                        </div>
                                    </div>  
                            </div>
                        <?php endwhile; 
                        // No value.
                        else :
                            // Do something...
                        endif; 
                        ?>
                    </div>
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
            
        </div>
        <div class="screen_five">     
            <?php
            $featured_post = get_field('users_review_1');
            if( $featured_post ):           
            ?>
            <style> .quote_sc5::before {content: url('<?php  bloginfo( 'template_url' );?>/assets/img/par.svg');} </style>
            <div class="quote_box">
                <p class="quote_sc5">
                    <?php echo esc_html( $featured_post->review_text ); ?>
                </p>
                <img src="<?php echo wp_get_attachment_image_url( esc_html( $featured_post->review_icon ) ); ?>" alt="">
                <p class="quote_author">
                    <?php echo esc_html( $featured_post->review_name ); ?>
                </p>
                <p class="author_position">
                    <?php echo esc_html( $featured_post->review_position ); ?>
                </p>
            </div>
            <?php endif; ?>


            <?php
            $featured_post = get_field('users_review_2');
            if( $featured_post ): 
            
                //$image_r = get_field('review_icon');
                //$picture_r = $image_r['url']
                $custom_field = the_field('review_icon');;
                
            ?>
                
                <div class="quote_box">
                <p class="quote_sc5">
                    <?php echo esc_html( $featured_post->review_text ); ?>
                </p>
                <img src="<?php echo wp_get_attachment_image_url( esc_html( $featured_post->review_icon ) ); ?>" alt="">
                <p class="quote_author">
                    <?php echo esc_html( $featured_post->review_name ); ?>
                </p>
                <p class="author_position">
                    <?php echo esc_html( $featured_post->review_position ); ?>
                </p>
            </div>
            <?php endif; ?>



        </div>
        <div class="screen_six">
            <?php $screen_6 = get_field('screen_6');//Получение обьекта группы?>
            <div class="title-s"><?php print_r($screen_6['screen_6_title_small']); ?></div>
            <div class="title-b"><?php print_r($screen_6['screen_6_title_big']); ?></div>


            <?php
                if( have_rows('faq') ): 
                // Loop through rows. ?>
                    <?php while( have_rows('faq') ) : the_row(); ?>
                    <div class="button_wrap">
                        <button class="accordion"><?php the_sub_field('question'); ?></button>
                        <div class="panel">
                        <?php the_sub_field('answer'); ?>
                        </div>
                        <img class="ar" src="<?php 
                        bloginfo( 'template_url' ); //Статическая ссылка на картинку
                        ?>/assets/img/arrow_button.svg" alt="">
                    </div>
                    <?php endwhile; 
                    // No value.
                else :
                    // Do something...
                endif; 
            ?>



        </div>
    </main>

<?php 
    
    get_footer();

?>
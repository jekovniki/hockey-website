<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header-line"></div>
        <div class="section">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
    </header>
    
    <nav>
        <?php
        // Display the WordPress navigation menu
        wp_nav_menu( array(
            'theme_location' => 'primary-menu', // You should define this in your functions.php file
            'container'      => false, // Remove the outer div container
            'menu_class'     => 'menu', // CSS class for the ul element
        ) );
        ?>
    </nav>
    
    <main>
        <div class="section">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article <?php post_class(); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php _e( 'Sorry, no posts found.', 'your-text-domain' ); ?></p>
            <?php endif; ?>
        </div>
    </main>
    
    <footer>
        <div class="legal-panel">
            <div class="club-identity">
                <div class="section">
                <?php
                    $footer_image = get_theme_mod('footer_image', '');
                    if (!empty($footer_image)) {
                        echo '<img src="' . esc_url($footer_image) . '" alt="Footer Image">';
                    }
                ?>
                </div>
                <div class="footer-wrapper">
                    <div class="club-information">
                    <?php
                        $footer_name = get_theme_mod('footer_name', '');
                        $footer_location = get_theme_mod('footer_location', '');
                        $footer_arena = get_theme_mod('footer_arena', '');
                        $footer_town = get_theme_mod('footer_town', '');
                        if (!empty($footer_name)) {
                            echo '<p><strong>' . esc_html($footer_name) . '</strong></p>';
                        }
                    
                        if (!empty($footer_location)) {
                            echo '<p>' . esc_html($footer_location) . '</p>';
                        }
                    
                        if (!empty($footer_arena)) {
                            echo '<p>' . esc_html($footer_arena) . '</p>';
                        }
                    
                        if (!empty($footer_town)) {
                            echo '<p>' . esc_html($footer_town) . '</p>';
                        }
                    ?>
                    </div>
                    <div class="club-navi">
                        <nav>
                            <?php
                            // Display the WordPress navigation menu
                            wp_nav_menu( array(
                                'theme_location' => 'club-menu', // You should define this in your functions.php file
                                'container'      => false, // Remove the outer div container
                                'menu_class'     => 'club-menu', // CSS class for the ul element
                            ) );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <nav>
                    <?php
                    // Display the WordPress navigation menu
                    wp_nav_menu( array(
                        'theme_location' => 'secondary-menu', // You should define this in your functions.php file
                        'container'      => false, // Remove the outer div container
                        'menu_class'     => 'secondary-menu', // CSS class for the ul element
                    ) );
                    ?>
                </nav>
                <p class="copyright">&copy; <?php echo date( 'Y' ); ?> ХК Левски София. Всички права запазени. Никаква част от този сайт не може да бъде възпроизвеждана без нашето писмено разрешение. </p>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>

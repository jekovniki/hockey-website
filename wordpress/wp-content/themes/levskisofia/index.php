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
            <div class="navigation">
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
            </div>
        </div>
    </header>
    <main>
    <section id="news">
        <?php
        $args = array(
            'category_name' => 'news', // Replace 'news' with the slug of your 'news' category.
            'posts_per_page' => -1,    // Display all posts from the category.
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
                ?>
                <article <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="post-content">
            <?php
            // Retrieve the "staging_images" field from the "News" ACF field group.
            $staging_image = get_field('staging_images');

            // Check if the field has a value.
            if ($staging_image) {
                echo '<img src="' . esc_url($staging_image['url']) . '" class="staging" alt="' . esc_attr($staging_image['alt']) . '" />';
            }

            // Get the post content and split it into an array of words.
            $content = get_the_content();
            $content_words = explode(' ', $content);

            // Check if there are more than 50 words.
            if (count($content_words) > 50) {
                // Display the first 50 words.
                $excerpt = implode(' ', array_slice($content_words, 0, 50));
                echo wpautop($excerpt); // Ensure proper paragraph formatting.
                ?>
                <p><a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a></p>
                <?php
            } else {
                // Display the full content if it has 50 words or less.
                the_content();
            }
            ?>
        </div>
    </a>
</article>
                <?php
            endwhile;
            wp_reset_postdata(); // Restore the global post data.
        else :
            ?>
            <p><?php _e('Sorry, no posts found in the "News" category.', 'your-text-domain'); ?></p>
        <?php endif; ?>
    </section>
    </main>
    <footer>
        <div class="top">
            <div class="container">
                <div class="row pt-4">
                    <div class="col-md-12 club-identity">
                        <div class="section">
                            <?php
                            $footer_image = get_theme_mod('footer_image', '');
                            if (!empty($footer_image)) {
                                echo '<img src="' . esc_url($footer_image) . '" alt="Footer Image" class="img-fluid">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 left-info">
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
                            <div class="mt-2 mb-2">
                            <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="club-menu ml-1">
                                <?php
                                // Display the WordPress navigation menu
                                wp_nav_menu(array(
                                    'theme_location' => 'club-menu', // You should define this in your functions.php file
                                    'container' => false, // Remove the outer div container
                                    'menu_class' => 'nav',
                                ));
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row pt-3">
                            <nav>
                                <?php
                                // Display the WordPress navigation menu
                                wp_nav_menu(array(
                                    'theme_location' => 'secondary-menu', // You should define this in your functions.php file
                                    'container' => false, // Remove the outer div container
                                    'menu_class' => 'nav',
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="row pt-3">
                            <p class="copyright">&copy; <?php echo date('Y'); ?> ХК Левски София. Всички права запазени. Никаква част от този сайт не може да бъде възпроизвеждана без нашето писмено разрешение.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

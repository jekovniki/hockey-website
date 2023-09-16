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
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <p><?php bloginfo( 'description' ); ?></p>
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
    </main>
    
    <footer>
        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>

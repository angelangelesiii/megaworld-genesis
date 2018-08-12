
<?php 
$propertiesQuery = new WP_Query(array(
    'post_type' 			=> 'property',
    'posts_per_page' 		=> 4,
    'orderby'				=> 'rand',
    'order'					=> 'ASC'
));

if ($propertiesQuery -> have_posts()):
?>

<section class="properties-container page-body fp-property-grid">

    <div class="wrapper-medium">

        <header class="section-header">
            <h2 class="section-title">
                Properties
            </h2>
            <div class="subtext">All at your fingertips</div>
        </header>

        <div class="iso-grid properties-grid">

            <div class="grid-sizer"></div>

            <?php while ($propertiesQuery -> have_posts()): $propertiesQuery -> the_post(); 

            $categories = wp_get_post_terms($post->ID, 'city');
            $cities = '';
            foreach($categories as $category) {
                $cities .= $category->slug.' ';
                }
            $cities = trim($cities, ' ');
            ?>
            
            <article class="property property-item grid-item <?php echo $cities; ?>">
                
                <a href="<?php the_permalink(); ?>">
                    <div class="aspect-ratio-sizer" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg-small' ) ?>)"></div>

                    <div class="contents-2">
                        <div class="inner">
                            <img src="<?php echo get_template_directory_uri().'/images/logos/mw_block_white.png'; ?>" alt="Megaworld" class="mini-logo">
                            <h2 class="property-name"><?php the_title(); ?></h2>
                        </div>
                    </div>

                    <div class="contents">
                        <div class="inner">
                            <img src="<?php echo get_template_directory_uri().'/images/logos/mw_block_white.png'; ?>" alt="Megaworld" class="mini-logo">
                            <h2 class="property-name"><?php the_title(); ?></h2>
                        </div>
                    </div>
                </a>
                
            </article>

            <?php endwhile; ?>
        </div>

        <div class="properties-btn-container">
            <a href="<?php echo site_url( '/properties' ); ?>" class="btn properties-fp-btn primary">View all properties</a>
        </div>

    </div>

</section>

<?php endif; ?>
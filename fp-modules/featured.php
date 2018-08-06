
<?php 
if (have_rows('featured_properties', 'options')):
?>

<section class="featured-properties">

    <div id="featured-properties-slider">

        <?php 
        while (have_rows('featured_properties', 'options')): the_row(); 
        $content = get_sub_field('content');
        $propertyID = get_sub_field('property');
        $bgImage = get_the_post_thumbnail_url( $propertyID, 'bg_large' );
        if ($content['image']) $bgImage = wp_get_attachment_image_url( $content['image'], 'bg_large' );
        $headline = get_the_title($propertyID);
        if ($content['headline']) $headline = $content['headline'];
        ?>

        <div class="featured-item property <?php echo $content['align']; ?>" style="background-image: url(<?php echo $bgImage; ?>);">
            <div class="overlay" style="opacity: 0.3;"></div>
            <div class="contents">
                <div class="wrapper-medium">
                    <div class="sizer">
                        <h1 class="headline"><?php echo $headline; ?></h1>
                        <h2 class="subtext"><?php echo $content['subtext']; ?></h2>
                        <div class="custom-content">
                            <?php echo $content['message']; ?>
                        </div>
                        <a href="<?php echo get_the_permalink($propertyID); ?>" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>

</section>

<?php 
endif; 
?>
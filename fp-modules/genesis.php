
<section class="genesis">

    <div class="wrapper-medium">
        <div class="grid-x">
            <div class="text-contents cell auto">
                <h1 class="section-title">
                    <?php if(get_field('genesis_header','options')): the_field('genesis_header', 'options');
                    else: echo 'Meet Genesis'; endif; ?>
                </h1>
                <p>
                    <?php if(get_field('genesis_text','options')): the_field('genesis_text', 'options');
                    else: ?>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa molestias optio, dolorem perspiciatis voluptatibus expedita quis facilis corporis numquam iure rerum ad quisquam reiciendis? Iusto, quisquam! Asperiores, iure. Nulla, et?
                    <?php endif; ?>
                </p>
            </div>
            <div class="photo-container cell shrink">
            
                <img src="<?php echo get_template_directory_uri().'/images/genesis.png'; ?>" alt="Genesis Cabiles">
            </div>
            
        </div>
    </div>
    <div class="animated-box">
        <div class="animated-element"></div>
    </div>
</section>
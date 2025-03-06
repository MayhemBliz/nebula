<section class="py-20 <?php echo esc_attr(get_field('background_colour') ?: 'bg-white'); ?>">
    <div class="container">
        <div class="grid grid-cols-2 gap-6 lg:flex lg:justify-between">
            
            <?php if (have_rows('logos')) : ?>
                <?php while (have_rows('logos')) : the_row(); ?>
                    <div class="logo-item">
                        <?php 
                        $logo_image = get_sub_field('logo_image');
                        $logo_name = get_sub_field('logo_name');

                        if ($logo_image): ?>
                            <img src="<?php echo esc_url($logo_image['url']); ?>" 
                                 alt="<?php echo esc_attr($logo_name ?: 'Logo'); ?>" 
                                 class="h-20 w-64 object-contain object-left">
                        <?php endif; ?>

                        <?php if ($logo_name): ?>
                            <p class="text-sm mt-2"><?php echo esc_html($logo_name); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
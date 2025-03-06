<?php 
    $link = get_field('link');
?>
<a href="<?php echo esc_url($link['url']); ?>" class="btn inline-block font-semibold px-6 py-3 transition duration-300">
    <?php echo esc_html($link['title']); ?>
</a>
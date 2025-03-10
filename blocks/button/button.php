<?php 
    $link = get_field('link');
    $type = get_field('type');

    $bg_class = ($type === 'secondary') ? 'bg-secondary text-white' : 'bg-primary text-white';
?>
<a href="<?php echo esc_url($link['url']); ?>" class="btn block w-fit font-semibold px-6 py-3 rounded transition duration-300 <?php echo esc_attr($bg_class); ?>">
    <?php echo esc_html($link['title']); ?>
</a>
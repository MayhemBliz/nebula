<?php get_header(); ?>

<?php get_template_part('blocks/hero/hero', null, ['title' => '404']); ?>

<main class="flex-1">

    <section class="py-20 <?php echo esc_attr(get_field('background_colour') ?: 'bg-white'); ?>">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-primary mb-12">Page Not Found</h2>
            <p class="mb-6">Sorry, but the page you were trying to view does not exist.</p>
            <a class="text-secondary underline" href="<?php echo home_url(); ?>">Go to Homepage</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    
    <!-- Insert Google Tag Manager -->
    <!-- Insert Hotjar Tracking Code -->
    
</head>
<body <?php body_class('min-h-screen flex flex-col'); ?>>

    <!-- Insert Google Tag Manager (noscript) -->
    <header class="fixed h-auto lg:h-40 w-full z-50 <?php echo (has_block('acf/hero') || ($args['has_hero'] ?? false)) ? '' : 'bg-black'; ?>">
        <div class="container flex flex-col py-6">
            <div class="flex justify-between gap-6">
                <div class="w-32 h-8">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<h1 class="text-white"><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
                    }
                    ?>
                </div>
                <div class="flex flex-col items-end gap-6 lg:mb-6">
                    <nav class="flex gap-6">
                        <ul class="flex items-center gap-3 lg:gap-6 text-white font-semibold">
                            <li>
                                <form 
                                    method="get" 
                                    class="top-nav-item search-form flex items-center gap-2" 
                                    action="<?php echo esc_url(home_url('/')); ?>"
                                    id="searchForm"
                                >
                                    <button 
                                        type="button" 
                                        class="search-submit flex items-center justify-center h-10 w-10 bg-primary rounded-full"
                                        aria-label="<?php esc_attr_e('Submit search', 'nebula'); ?>"
                                        id="searchButton"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                    <input 
                                        type="search" 
                                        id="search-field" 
                                        class="hidden bg-transparent w-14 focus:w-40 outline-none transition-all duration-300 placeholder-white lg:block" 
                                        placeholder="<?php esc_attr_e('Search...', 'nebula'); ?>" 
                                        value="<?php echo get_search_query(); ?>" 
                                        name="s" 
                                        autocomplete="off" 
                                        aria-label="<?php esc_attr_e('Search for:', 'nebula'); ?>"
                                    >
                                </form>
                            </li>
                            <li>
                                <a href="tel:<?php echo esc_html(str_replace(' ', '', get_field('phone_number', 'option'))); ?>" class="top-nav-item flex items-center gap-2">
                                    <i class="flex items-center justify-center h-10 w-10 bg-primary rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-telephone" viewBox="0 0 16 16">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                        </svg>
                                    </i>
                                    <span class="hidden lg:block"><?php echo esc_html(get_field('phone_number', 'option')); ?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- Mobile Menu Toggle -->
                        <button id="mobile-menu-toggle" class="lg:hidden text-white">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
            <div class="flex justify-end">
                <nav class="hidden lg:block">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'flex items-center flex-shrink-0 gap-6 text-white font-semibold',
                        'container' => false
                    )); ?>
                </nav>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="fixed inset-y-0 right-0 w-64 shadow-xl bg-white transform translate-x-full transition-transform lg:hidden">
                    <div class="p-6 flex flex-col h-screen">
                        <button id="mobile-menu-close" class="ml-auto mb-6">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'flex flex-col space-y-4',
                                'container' => false,
                            ));
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </header>

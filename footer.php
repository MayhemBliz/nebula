    <section class="bg-lightGrey border-t border-grey relative h-96 flex items-center text-center">
        <div class="relative container mx-auto z-10">
            <h2 class="text-4xl font-bold text-primary mb-8">Let's discuss your project</h2>
            <a href="mailto:<?php echo esc_html(get_field('email_address', 'option')); ?>" class="bg-secondary text-white px-8 py-3 rounded hover:bg-secondary transition w-auto self-start">
                Get in touch
            </a>
        </div>
    </section>
    
    <footer class="relative bg-primary text-white pt-20 pb-6">
        <div class="relative z-10 container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
            <a href="#" id="back-to-top" class="absolute -top-26 right-6 flex items-center bg-secondary gap-3 text-white px-8 py-3 rounded hover:bg-secondary transition ">
                Back to top
                <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 12C5.70835 12 5.90816 11.921 6.05548 11.7804C6.20281 11.6397 6.28557 11.449 6.28557 11.2501V2.56155L9.65725 5.7817C9.73029 5.85142 9.817 5.90673 9.91243 5.94446C10.0079 5.9822 10.1101 6.00162 10.2134 6.00162C10.3167 6.00162 10.419 5.9822 10.5144 5.94446C10.6099 5.90673 10.6966 5.85142 10.7696 5.7817C10.8427 5.71197 10.9006 5.6292 10.9401 5.5381C10.9797 5.447 11 5.34936 11 5.25075C11 5.15215 10.9797 5.05451 10.9401 4.96341C10.9006 4.87231 10.8427 4.78954 10.7696 4.71981L6.05619 0.220316C5.98321 0.150479 5.89652 0.0950707 5.80108 0.0572652C5.70564 0.0194598 5.60333 0 5.5 0C5.39667 0 5.29436 0.0194598 5.19892 0.0572652C5.10348 0.0950707 5.01679 0.150479 4.94381 0.220316L0.23038 4.71981C0.0828702 4.86063 0 5.05161 0 5.25075C0 5.4499 0.0828702 5.64088 0.23038 5.7817C0.377889 5.92251 0.577955 6.00162 0.786565 6.00162C0.995175 6.00162 1.19524 5.92251 1.34275 5.7817L4.71443 2.56155V11.2501C4.71443 11.449 4.79719 11.6397 4.94452 11.7804C5.09184 11.921 5.29165 12 5.5 12Z" fill="white"/>
                </svg>
            </a>
            <div class="lg:col-span-2 md:order-1 flex flex-col gap-6">
                <?php echo '<h2><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h2>'; ?>
                <p><?php echo nl2br(esc_html(get_field('address', 'option'))); ?></p>
                <a class="underline" href="tel:<?php echo esc_html(str_replace(' ', '', get_field('phone_number', 'option'))); ?>"><?php echo esc_html(get_field('phone_number', 'option')); ?></a>
                <a class="flex items-center underline" href="mailto:<?php echo esc_html(get_field('email_address', 'option')); ?>"><?php echo esc_html(get_field('email_address', 'option')); ?></a>
            </div>
            
            <!-- Services -->
            <div class="lg:col-span-1 md:order-2 lg:order-4 flex flex-col gap-6">
                <h3 class="text-xl font-bold">Services</h3>
                <?php wp_nav_menu(array(
                    'theme_location' => 'services',
                    'menu_class' => 'space-y-4',
                    'container' => false
                )); ?>
            </div>

            <!-- Socials -->
            <div class="lg:col-span-1 md:order-2 lg:order-4 flex flex-col gap-6">
                <h3 class="text-xl font-bold">Socials</h3>
                <ul>
                    <li>
                        <a class="flex gap-3 items-center" href="<?php echo esc_url(get_field('linkedin', 'option')); ?>">
                            <i class="flex items-center justify-left h-10 w-4">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.72099 11.7283V3.99803H0.151878V11.7283H2.72099V11.7283ZM1.4367 2.94298C2.33232 2.94298 2.89022 2.34889 2.89022 1.60709C2.87329 0.848807 2.33232 0.271484 1.4535 0.271484C0.574531 0.271508 0 0.84883 0 1.60712C0 2.34891 0.557596 2.943 1.41979 2.943L1.4367 2.94298ZM4.14289 11.7283C4.14289 11.7283 4.1766 4.72334 4.14289 3.99806H6.7124V5.11911H6.69535C7.03321 4.59159 7.64189 3.81653 9.02781 3.81653C10.7186 3.81653 11.986 4.92138 11.986 7.29583V11.7283H9.4169V7.59285C9.4169 6.55373 9.04517 5.84465 8.11516 5.84465C7.40553 5.84465 6.98261 6.32268 6.79689 6.78477C6.72894 6.94924 6.7124 7.18026 6.7124 7.4113V11.7283H4.14289Z" fill="#ffffff"/>
                                </svg>
                            </i>
                            <span>LinkedIn</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-3 items-center" href="<?php echo esc_url(get_field('facebook', 'option')); ?>">
                            <i class="flex items-center justify-left h-10 w-4">
                                <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.7749 14V7.7H6.68758L7 4.9H4.7749V3.53623C4.7749 2.81523 4.79332 2.1 5.80083 2.1H6.82128V0.0980957C6.82128 0.0679957 5.94474 0 5.05797 0C3.206 0 2.04638 1.16004 2.04638 3.29014V4.9H0V7.7H2.04638V14H4.7749Z" fill="#ffffff"/>
                                </svg>
                            </i>
                            <span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-3 items-center" href="<?php echo esc_url(get_field('instagram', 'option')); ?>">
                            <i class="flex items-center justify-left h-10 w-4">
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.4998 10.546C8.4579 10.546 10.0453 8.95863 10.0453 7.00053C10.0453 5.04243 8.4579 3.45508 6.4998 3.45508C4.5417 3.45508 2.95435 5.04243 2.95435 7.00053C2.95435 8.95863 4.5417 10.546 6.4998 10.546ZM6.4998 9.36417C7.80518 9.36417 8.86344 8.30591 8.86344 7.00053C8.86344 5.69513 7.80518 4.6369 6.4998 4.6369C5.1944 4.6369 4.13616 5.69513 4.13616 7.00053C4.13616 8.30591 5.1944 9.36417 6.4998 9.36417Z" fill="#ffffff"/>
                                    <path d="M10.0453 2.86426C9.7189 2.86426 9.45435 3.12882 9.45435 3.45517C9.45435 3.78151 9.7189 4.04608 10.0453 4.04608C10.3716 4.04608 10.6362 3.78151 10.6362 3.45517C10.6362 3.12882 10.3716 2.86426 10.0453 2.86426Z" fill="#ffffff"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.386431 2.43585C0 3.19427 0 4.18709 0 6.17273V7.82727C0 9.8129 0 10.8057 0.386431 11.5641C0.726345 12.2313 1.26873 12.7737 1.93585 13.1135C2.69427 13.5 3.68709 13.5 5.67273 13.5H7.32727C9.3129 13.5 10.3057 13.5 11.0641 13.1135C11.7313 12.7737 12.2737 12.2313 12.6135 11.5641C13 10.8057 13 9.8129 13 7.82727V6.17273C13 4.18709 13 3.19427 12.6135 2.43585C12.2737 1.76873 11.7313 1.22635 11.0641 0.886431C10.3057 0.5 9.3129 0.5 7.32727 0.5H5.67273C3.68709 0.5 2.69427 0.5 1.93585 0.886431C1.26873 1.22635 0.726345 1.76873 0.386431 2.43585ZM7.32727 1.68182H5.67273C4.66041 1.68182 3.97224 1.68274 3.44032 1.7262C2.92219 1.76853 2.65722 1.84526 2.47239 1.93944C2.02764 2.16605 1.66605 2.52764 1.43944 2.97239C1.34526 3.15722 1.26853 3.42219 1.2262 3.94032C1.18274 4.47224 1.18182 5.16041 1.18182 6.17273V7.82727C1.18182 8.83962 1.18274 9.52773 1.2262 10.0597C1.26853 10.5778 1.34526 10.8428 1.43944 11.0276C1.66605 11.4724 2.02764 11.8339 2.47239 12.0605C2.65722 12.1547 2.92219 12.2315 3.44032 12.2738C3.97224 12.3172 4.66041 12.3182 5.67273 12.3182H7.32727C8.33962 12.3182 9.02773 12.3172 9.55967 12.2738C10.0778 12.2315 10.3428 12.1547 10.5276 12.0605C10.9724 11.8339 11.3339 11.4724 11.5605 11.0276C11.6547 10.8428 11.7315 10.5778 11.7738 10.0597C11.8172 9.52773 11.8182 8.83962 11.8182 7.82727V6.17273C11.8182 5.16041 11.8172 4.47224 11.7738 3.94032C11.7315 3.42219 11.6547 3.15722 11.5605 2.97239C11.3339 2.52764 10.9724 2.16605 10.5276 1.93944C10.3428 1.84526 10.0778 1.76853 9.55967 1.7262C9.02773 1.68274 8.33962 1.68182 7.32727 1.68182Z" fill="#ffffff"/>
                                </svg>
                            </i>
                            <span>Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Policies -->
            <div class="lg:col-span-1 md:order-2 lg:order-4 flex flex-col gap-6">
                <h3 class="text-xl font-bold">Policies</h3>
                <?php wp_nav_menu(array(
                    'theme_location' => 'policies',
                    'menu_class' => 'space-y-4',
                    'container' => false
                )); ?>
            </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="relative z-10 container">
            <div class="flex flex-col gap-6 md:flex-row justify-between border-t pt-6">
                <span class="flex-grow">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
                <span>Website by <?php echo '<a target="_blank" href="#" class="text-secondary underline">' . get_bloginfo('name') . '</a></span>'; ?>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
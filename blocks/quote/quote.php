<div class="relative bg-primary p-12 rounded-32 px-12 overflow-hidden"> 
    <div class="flex flex-col gap-6 mb-6 text-white z-20">
        <svg width="51" height="38" viewBox="0 0 51 38" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M39.7375 0C45.8211 0 50.7642 4.86337 50.8624 10.8999C51.1491 13.6392 51.1075 17.6798 49.2491 22.345C47.3496 27.1124 43.64 32.3133 36.8764 37.3664C35.4719 38.4158 33.4793 38.1324 32.4258 36.733C31.3723 35.334 31.6571 33.3491 33.0616 32.2997C38.0335 28.5855 40.8848 24.9739 42.5124 21.8193C41.6252 22.046 40.6956 22.1667 39.7375 22.1667C33.5925 22.1667 28.611 17.2045 28.611 11.0833C28.611 4.96217 33.5925 0 39.7375 0ZM11.1265 0C17.21 0 22.1532 4.86337 22.2514 10.9C22.5382 13.6392 22.4965 17.6798 20.6381 22.345C18.7387 27.1124 15.029 32.3133 8.26537 37.3664C6.86079 38.4158 4.86819 38.1324 3.81477 36.733C2.76131 35.334 3.04596 33.3491 4.45054 32.2997C9.42239 28.5855 12.2739 24.9739 13.9014 21.8193C13.0143 22.046 12.0846 22.1667 11.1265 22.1667C4.98149 22.1667 0 17.2045 0 11.0833C0 4.96217 4.98149 0 11.1265 0Z" fill="#E63479"/>
        </svg>
        <blockquote class="text-white">"<?php echo esc_html(get_field('quote')); ?>"</blockquote>
    </div>
    <div class="flex gap-6 items-center">
        <img class="object-cover w-24 h-24 rounded-full border-secondary border-4" src="<?php echo esc_url(get_field('author_image')); ?>" alt="<?php echo esc_html(get_field('author')); ?>">
        <div>
            <p class="text-xl text-white font-bold mb-0"><?php echo esc_html(get_field('author')); ?></p>
            <p class="text-xl text-white mb-0"><?php echo esc_html(get_field('author_job_title')); ?></p>
        </div>
    </div>
</div>
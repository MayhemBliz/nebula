document.addEventListener('DOMContentLoaded', function() {
    function toggleFAQ(element) {
        const content = element.nextElementSibling;
        const iconContainer = element.querySelector('.faq-icon');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            content.classList.add('block');
            element.classList.add('active');
            iconContainer.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" class="bi bi-dash" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                </svg>
            `;
        } else {
            content.classList.remove('block');
            content.classList.add('hidden');
            element.classList.remove('active');
            iconContainer.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            `;
        }
    }
});
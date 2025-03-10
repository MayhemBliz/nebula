/**
 * @package    Nebula
 * @author     Sean Palmer
 * @license    MIT
 * @link       https://github.com/mayhembliz/nebula
 * @since      1.0
*/

(function()
{
    "use strict";

    /*---------------------------------
	Breakpoint
    -----------------------------------*/
    const breakpoint = () => {
        // Setup the breakpoint variable
        let breakpoint;

        // Get the current breakpoint
        const getBreakpoint = function() {
            return window
                .getComputedStyle(document.body, ":before")
                .content.replace(/"/g, "");
        };

        // Calculate breakpoint on page load
        breakpoint = getBreakpoint();

        return breakpoint;
    };

    /*---------------------------------
	Sticky Header on Scroll
    -----------------------------------*/
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('header');
    
        // Function to check scroll position and toggle sticky class
        const checkScroll = () => {
            if (window.scrollY > 20) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        };
    
        // Check scroll position on page load
        checkScroll();
    
        // Check scroll position on scroll
        window.addEventListener('scroll', checkScroll);
    });

    /*---------------------------------
	Mobile menu
    -----------------------------------*/
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const menuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
    
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });
    
        menuClose.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });

        // Toggle sub-menu visibility
        const subMenuTriggers = document.querySelectorAll('#mobile-menu .menu-item-has-children > a');

        subMenuTriggers.forEach(trigger => {
            trigger.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior
                const subMenu = trigger.nextElementSibling; // Get the corresponding sub-menu
                if (subMenu && subMenu.classList.contains('sub-menu')) {
                    subMenu.classList.toggle('hidden'); // Toggle visibility
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children > a');
    
        menuItemsWithChildren.forEach((menuItem) => {
            menuItem.addEventListener('click', (event) => {
                if (window.innerWidth <= 1023) {
                    event.preventDefault();
                    const submenu = menuItem.nextElementSibling; // Target the submenu
                    submenu.classList.toggle('open'); // Toggle submenu visibility
                    menuItem.classList.toggle('open'); // Toggle arrow rotation
                }
            });
        });
    });
    
    

    /*---------------------------------
	Debouncer
    -----------------------------------*/
    const debouncer = (function () {
        const timers = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
            if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    console.log("main.js 11")

    /*---------------------------------
    Search
    -----------------------------------*/
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById("searchForm");
        const searchField = document.getElementById("search-field");
        const searchButton = document.getElementById("searchButton");
    
        let isInputFocused = false; // Track input focus status
    
        searchButton.addEventListener("click", function () {
            // Use your breakpoint function to check if the current viewport is desktop
            if (breakpoint() === "xl" || breakpoint() === "lg") {
                if (!isInputFocused) {
                    // Focus the input field and mark it as focused
                    searchField.focus();
                    isInputFocused = true;
                    console.log("Input field focused");
                } else if (searchField.value.trim() === "") {
                    console.log("Submitting form programmatically");
                    searchForm.submit();
                }
                // If the input is focused and has a value, the form will submit naturally
            } else {
                // For mobile and tablets, allow form submission
                searchForm.submit();
            }
        });
    
        // Reset isInputFocused when the input loses focus
        searchField.addEventListener("blur", function () {
            isInputFocused = false;
        });
    });
    
    /* ==========================================================================
    Back to top.
    ========================================================================== */
    document.addEventListener('DOMContentLoaded', function () {
        const backToTopButton = document.getElementById('back-to-top');
    
        // Show/hide the button based on scroll position
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) { // Adjust scroll position as needed
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });
    
        // Smooth scroll to top
        backToTopButton.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
    

    /* ==========================================================================
    Test breakpoints.
    ========================================================================== */
    function breakpoints(){
        if (breakpoint() == "xl") {
            console.log("desktop")
        }

        if (breakpoint() == "lg") {
            console.log("laptop")
        }

        if (breakpoint() == "md") {
            console.log("tablet")
        }

        if (breakpoint() == "sm") {
            console.log("mobile")
        }
    }

    window.addEventListener("resize", function() {
        debouncer(function() {
            breakpoints();
        }, 500);
    });

    window.addEventListener("orientationchange", function() {
        debouncer(function() {
            breakpoints();
        }, 500);
    });

})();
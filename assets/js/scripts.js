// This file will contain functions like abrir(), ocultar() and others
// Make sure this file is loaded after jQuery and Bootstrap JS

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('eys-principal');
    const openBtn = document.getElementById('abrir');
    const closeBtn = document.getElementById('cerrar');
    const contentWrapper = document.getElementById('eys-contenido-g'); // New content wrapper

    // Ensure elements exist before adding listeners
    if (openBtn) {
        openBtn.addEventListener('click', abrir);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', ocultar);
    }

    // Initial state setup and responsive adjustments
function initializeSidebar() {
        if (window.innerWidth <= 768) {
            ocultar(); // Default to hidden on smaller screens
            document.body.classList.remove('sidebar-open'); // Ensure class is removed
            if (openBtn) openBtn.style.display = "block"; // Make sure open button is visible
            if (closeBtn) closeBtn.style.display = "none";
        } else {
            abrir(); // Default to open on larger screens
            document.body.classList.add('sidebar-open'); // Ensure class is added
            if (openBtn) openBtn.style.display = "none";
            if (closeBtn) closeBtn.style.display = "inline";
        }
    }




    initializeSidebar(); // Call on page load

    // Helper to handle responsive adjustments on resize
    window.addEventListener('resize', initializeSidebar);


    function abrir() {
        if (sidebar) {
            sidebar.style.width = "15%"; // Wider for content
            sidebar.style.minWidth = "200px"; // Ensure minimum width
            sidebar.style.transform = "translateX(0)"; // Slide into view
            sidebar.classList.add('open');
        }
        if (mainContent) {
            mainContent.style.marginLeft = "15%"; // Push content
            mainContent.style.width = "85%";
        }
        if (contentWrapper) {
            contentWrapper.style.marginLeft = "0"; // Reset if previously adjusted
        }
        if (openBtn) openBtn.style.display = "none";
        if (closeBtn) closeBtn.style.display = "inline";

        document.body.classList.add('sidebar-open'); // Add class to body for global styling

        // Update text/icons in menu items
        // 'modules' is defined in page_footer.php, assumed to be globally available
        if (typeof modules !== 'undefined' && modules.length > 0) {
            modules.forEach(module => {
                const menuItem = document.getElementById(module[0]);
                if (menuItem) {
                    const menuText = menuItem.querySelector('.menu-text');
                    const menuIcon = menuItem.querySelector('.menu-icon');
                    if (menuText) menuText.style.display = "inline"; // Show text
                    if (menuIcon) menuIcon.style.marginRight = "10px"; // Add space
                }
            });
        }
    }

    function ocultar() {
        if (sidebar) {
            sidebar.style.width = "5%"; // Smaller width
            sidebar.style.minWidth = "60px"; // Minimum width for just icon
            if (window.innerWidth <= 768) {
                sidebar.style.transform = "translateX(-100%)"; // Hide completely on small screens
            } else {
                sidebar.style.transform = "translateX(0)"; // Just shrink on large screens
            }
            sidebar.classList.remove('open');
        }
        if (mainContent) {
            mainContent.style.marginLeft = "5%"; // Adjust for smaller sidebar
            mainContent.style.width = "95%";
        }
        if (contentWrapper) {
            contentWrapper.style.marginLeft = "0";
        }
        if (openBtn) openBtn.style.display = "inline";
        if (closeBtn) closeBtn.style.display = "none";

        document.body.classList.remove('sidebar-open'); // Remove class from body

        // Hide text, keep only icon
        if (typeof modules !== 'undefined' && modules.length > 0) {
            modules.forEach(module => {
                const menuItem = document.getElementById(module[0]);
                if (menuItem) {
                    const menuText = menuItem.querySelector('.menu-text');
                    const menuIcon = menuItem.querySelector('.menu-icon');
                    if (menuText) menuText.style.display = "none";
                    if (menuIcon) menuIcon.style.marginRight = "0";
                }
            });
        }
    }

    // Add other global JavaScript functions here, e.g., for `editarcorreo` and `editartelefono`
    // These functions should also be moved from persona_record.php into this file.
    // Make sure to pass `arractu` and `arractut` from the controller to the view,
    // and then to this JS file (e.g., as global JS variables like `modules`).

    // Example for `editarcorreo` - assuming `arractu` is passed to JS (e.g., as a global const `emailEditLinks`)
    /*
    window.editarcorreo = function() { // Make it global if needed by inline HTML or other scripts
        const options = document.getElementById('idcorreo').selectedOptions;
        const idcorreo = Array.from(options).map(({ value }) => value);
        // Assuming emailEditLinks is a global const available from PHP in footer
        if (typeof emailEditLinks !== 'undefined' && emailEditLinks[idcorreo[0]]) {
            window.location.href = emailEditLinks[idcorreo[0]];
        }
    };
    */
});

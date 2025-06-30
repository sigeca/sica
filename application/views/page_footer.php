</main> </div> <?php if (isset($this->session->userdata['logged_in'])) : ?>
    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> UTLVT Tecnología de la Información. Todos los derechos reservados.</p>
            <p>Contacto: info@educaysoft.org</p>
        </div>
    </footer>
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otERdGYXJW6l5jN15z7m3gG12dDk1iKkK1z3pQnFw6z4nJ08i4G8w2E3v/fT5b/M+V0X5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>

    <script type="text/javascript">
        // PHP variables passed to JavaScript
        const BASE_URL = '<?php echo base_url(); ?>';
        <?php
        // Prepare the menu modules data once for JavaScript
        $amenu = [];
        if (isset($this->session->userdata['acceso'])) {
            foreach ($this->session->userdata['acceso'] as $row) {
                $id = $row["modulo"]["id"] ?? '';
                $nombre = $row["modulo"]["nombre"] ?? 'N/A';
                $icono = $row["modulo"]["icono"] ?? 'default';
                $modulo = $row["modulo"]["modulo"] ?? '';
                array_push($amenu, [$id, $nombre, $icono, $modulo]);
            }
        }
        $js_array = json_encode($amenu);
        echo "const modules = " . $js_array . ";\n";
        ?>

        // These functions should ideally be in assets/js/scripts.js
        // but included here for direct context of their PHP dependency

        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('eys-principal');
            const openBtn = document.getElementById('abrir');
            const closeBtn = document.getElementById('cerrar');
            const contentWrapper = document.getElementById('eys-contenido-g'); // New content wrapper

            if (openBtn) {
                openBtn.addEventListener('click', abrir);
            }
            if (closeBtn) {
                closeBtn.addEventListener('click', ocultar);
            }

            // Initial state of the sidebar based on a default or session
            // For example, if you want it initially closed on mobile
            if (window.innerWidth <= 768) { // Example breakpoint for mobile
                ocultar();
            } else {
                abrir(); // Default to open on larger screens
            }

            function abrir() {
                if (sidebar) {
                    sidebar.style.width = "15%"; // Wider for content
                    sidebar.style.minWidth = "200px"; // Ensure minimum width
                    sidebar.style.display = "block";
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

                // Update text/icons in menu items
                modules.forEach(module => {
                    const menuItem = document.getElementById(module[0]);
                    if (menuItem) {
                        menuItem.querySelector('.menu-text').style.display = "inline"; // Show text
                        menuItem.querySelector('.menu-icon').style.marginRight = "10px"; // Add space
                    }
                });
            }

            function ocultar() {
                if (sidebar) {
                    sidebar.style.width = "5%"; // Smaller width
                    sidebar.style.minWidth = "60px"; // Minimum width for just icon
                    // sidebar.style.display = "none"; // Might hide completely on small screens, better to just shrink
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

                // Hide text, keep only icon
                modules.forEach(module => {
                    const menuItem = document.getElementById(module[0]);
                    if (menuItem) {
                        menuItem.querySelector('.menu-text').style.display = "none";
                        menuItem.querySelector('.menu-icon').style.marginRight = "0";
                    }
                });
            }

            // Helper to handle responsive adjustments on resize
            window.addEventListener('resize', function() {
                if (window.innerWidth <= 768) {
                    ocultar(); // Auto-hide sidebar on smaller screens
                } else {
                    abrir(); // Auto-show sidebar on larger screens
                }
            });
        });
    </script>
</body>
</html>

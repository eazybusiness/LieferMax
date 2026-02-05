<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>LieferMax</h3>
                <p>Optimierung der Getränke Logistik</p>
                <p>
                    <strong>LieferMax GmbH</strong><br>
                    An der Leiten 4<br>
                    D-87672 Roßhaupten
                </p>
            </div>
            
            <div class="footer-section">
                <h3>Kontakt</h3>
                <p>
                    <i class="fas fa-phone icon-accent"></i> 08367 – 91 39 187<br>
                    <i class="fas fa-envelope icon-accent"></i> info@liefermax.com
                </p>
            </div>
            
            <div class="footer-section">
                <h3>Navigation</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-menu',
                    'fallback_cb'    => false,
                ));
                ?>
            </div>
            
            <div class="footer-section">
                <h3>Partner</h3>
                <p>
                    <a href="https://www.copasysteme.de/" target="_blank" rel="noopener">
                        COPA SYSTEME
                    </a>
                </p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> LieferMax GFGH Lieferschein Fahrerverkaufssystem</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

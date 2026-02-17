    <!-- Footer -->
    <footer class="gradient-bg-alt text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="LieferMax Logo" class="h-12 w-12 rounded-lg">
                        <h3 class="text-2xl font-bold"><?php bloginfo('name'); ?></h3>
                    </div>
                    <p class="text-gray-300 leading-relaxed">
                        Digitale Getränkelogistik-Lösung mit COPA-Integration für Getränkefachgroßhandel.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Produkte</h4>
                    <ul class="space-y-3">
                        <li><a href="<?php echo home_url('/products#liefermax'); ?>" class="text-gray-300 hover:text-white transition">LieferMax App</a></li>
                        <li><a href="<?php echo home_url('/products#check'); ?>" class="text-gray-300 hover:text-white transition">LM-CHECK</a></li>
                        <li><a href="<?php echo home_url('/products#map'); ?>" class="text-gray-300 hover:text-white transition">LM-MAP</a></li>
                        <li><a href="<?php echo home_url('/products#shop'); ?>" class="text-gray-300 hover:text-white transition">Shop-Konverter</a></li>
                        <li><a href="<?php echo home_url('/products#apps'); ?>" class="text-gray-300 hover:text-white transition">Bestell-Apps</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Unternehmen</h4>
                    <ul class="space-y-3">
                        <li><a href="<?php echo home_url('/integration'); ?>" class="text-gray-300 hover:text-white transition">COPA Integration</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>" class="text-gray-300 hover:text-white transition">Kontakt</a></li>
                        <li><a href="<?php echo home_url('/impressum'); ?>" class="text-gray-300 hover:text-white transition">Impressum</a></li>
                        <li><a href="<?php echo home_url('/datenschutz'); ?>" class="text-gray-300 hover:text-white transition">Datenschutz</a></li>
                        <li><a href="<?php echo home_url('/agb'); ?>" class="text-gray-300 hover:text-white transition">AGB</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Kontakt</h4>
                    <ul class="space-y-3 text-gray-300">
                        <?php
                        $phone = get_field('company_phone', 'option') ?: '08367 – 91 39 187';
                        $email = get_field('company_email', 'option') ?: 'info@liefermax.com';
                        $address = get_field('company_address', 'option') ?: "An der Leiten 4\nD-87672 Roßhaupten";
                        ?>
                        <li><i class="fas fa-phone mr-2"></i><?php echo esc_html($phone); ?></li>
                        <li><i class="fas fa-envelope mr-2"></i><?php echo esc_html($email); ?></li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i><?php echo nl2br(esc_html($address)); ?></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-600 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Alle Rechte vorbehalten.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

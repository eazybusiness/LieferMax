<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<div class="pt-32 pb-24 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">
                Kontaktieren Sie <span class="gradient-text">uns</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Haben Sie Fragen zu LieferMax? Wir helfen Ihnen gerne weiter.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Nachricht senden</h2>
                <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form"]'); ?>
                
                <!-- Fallback if CF7 not installed -->
                <form action="<?php echo get_template_directory_uri(); ?>/assets/php/contact-form.php" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-Mail *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telefon</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Firma</label>
                        <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Nachricht *</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
                    </div>
                    
                    <div class="hidden">
                        <input type="text" name="honeypot" value="">
                    </div>
                    
                    <button type="submit" class="w-full gradient-bg text-white px-8 py-4 rounded-lg font-bold hover:shadow-xl transition">
                        Nachricht senden <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="bg-white rounded-2xl p-8 shadow-lg mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Kontaktinformationen</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 mb-1">Adresse</div>
                                <div class="text-gray-600">
                                    <?php 
                                    $address = get_field('company_address', 'option') ?: "An der Leiten 4\nD-87672 Roßhaupten";
                                    echo nl2br(esc_html($address));
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 mb-1">Telefon</div>
                                <div class="text-gray-600">
                                    <?php 
                                    $phone = get_field('company_phone', 'option') ?: '08367 – 91 39 187';
                                    echo esc_html($phone);
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 mb-1">E-Mail</div>
                                <div class="text-gray-600">
                                    <?php 
                                    $email = get_field('company_email', 'option') ?: 'info@liefermax.com';
                                    echo esc_html($email);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Standort</h2>
                    <div class="aspect-video rounded-lg overflow-hidden">
                        <iframe 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            scrolling="no" 
                            marginheight="0" 
                            marginwidth="0" 
                            src="https://www.openstreetmap.org/export/embed.html?bbox=10.695600509643556%2C47.64370000000001%2C10.735600509643556%2C47.66370000000001&layer=mapnik&marker=47.6537%2C10.7156"
                            style="border: 1px solid #ccc">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>

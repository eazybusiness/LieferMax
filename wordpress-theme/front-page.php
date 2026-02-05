<?php get_header(); ?>

<main class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Wir optimieren die Getränke Logistik!</h1>
                <p>LieferMax digitalisiert Ihren Lieferprozess - Professionell, effizient und zukunftssicher.</p>
                <div style="margin-top: 2rem;">
                    <a href="<?php echo home_url('/kontakt'); ?>" class="btn btn-primary" style="margin-right: 1rem;">
                        Demo anfragen
                    </a>
                    <a href="<?php echo home_url('/liefermax'); ?>" class="btn btn-outline">
                        Mehr erfahren
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Products Section -->
    <section class="section section-white">
        <div class="container">
            <div class="section-title">
                <h2>Unsere Lösungen</h2>
                <p>Digitale Tools für moderne Getränkelogistik</p>
            </div>
            
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-mobile-alt fa-3x icon-accent"></i>
                    </div>
                    <h3>LieferMax App</h3>
                    <p>Diese App ersetzt jeglichen Lieferschein in Papierform. LieferMax digitalisiert Ihren Lieferprozess!</p>
                    <a href="<?php echo home_url('/liefermax'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
                
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-check-circle fa-3x icon-accent"></i>
                    </div>
                    <h3>LieferMax-CHECK</h3>
                    <p>Die Leergutkontroll-App! Checken Sie ob der Leergutbestand der jeweiligen Tour stimmt.</p>
                    <a href="<?php echo home_url('/liefermax-check'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
                
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-map-marked-alt fa-3x icon-accent"></i>
                    </div>
                    <h3>LieferMax-MAP</h3>
                    <p>Das Routing Programm, um all Ihre Fahrzeuge Live zu verfolgen, um den Lieferzustand auszuwerten.</p>
                    <a href="<?php echo home_url('/liefermax-map'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
                
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-shopping-cart fa-3x icon-accent"></i>
                    </div>
                    <h3>Shop-Konverter</h3>
                    <p>Die moderne View basierende Webshop-Lösung für COPA Systeme drink.3000 & drink.PRO Warenwirtschaft Benutzer!</p>
                    <a href="<?php echo home_url('/weitere-tools'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
                
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-mobile fa-3x icon-accent"></i>
                    </div>
                    <h3>Bestell-Apps</h3>
                    <p>Wir bieten native iOS und Android Apps in Verbindung mit ShopWare. Gerne auch angebunden an drink.3000 & drink.PRO von COPA SYSTEME.</p>
                    <a href="<?php echo home_url('/bestell-app'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
                
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-cash-register fa-3x icon-accent"></i>
                    </div>
                    <h3>Kassen-Konverter</h3>
                    <p>Sie wollen Ihre Getränke-Markt-Kasse günstig mit COPA SYSTEME verbinden? Artikel und Umsätze synchron halten? Hier ist Ihre Lösung!</p>
                    <a href="<?php echo home_url('/weitere-tools'); ?>" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- COPA Integration Section -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title">
                <h2>COPA SYSTEME Integration</h2>
                <p>Unser Technologiepartner für nahtlose Integration</p>
            </div>
            
            <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                <p style="font-size: 1.125rem; margin-bottom: 2rem;">
                    LieferMax kann mit drink.3000 und drink.PRO von COPA SYSTEME und bestimmt auch mit Ihrer Warenwirtschaft arbeiten.
                </p>
                <a href="https://www.copasysteme.de/" target="_blank" rel="noopener" class="btn btn-secondary">
                    COPA SYSTEME besuchen
                </a>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="section section-white">
        <div class="container">
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <h2 style="margin-bottom: 1rem;">Bereit für die digitale Zukunft?</h2>
                <p style="font-size: 1.125rem; margin-bottom: 2rem;">
                    Kontaktieren Sie uns für eine persönliche Demo und erfahren Sie, wie LieferMax Ihre Logistik optimieren kann.
                </p>
                <a href="<?php echo home_url('/kontakt'); ?>" class="btn btn-primary btn-lg">
                    Jetzt Demo anfragen
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

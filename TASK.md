# TASK.md

## LieferMax Website - WordPress Template Migration

**Last Updated**: February 17, 2026  
**Current Strategy**: WordPress Theme Development (1:1 Design Match)
**Deployment Target**: Strato WordPress

---

## 🎯 Current Sprint Goals

1. **WordPress Theme Development**: Convert static HTML to WordPress templates
2. **1:1 Design Match**: Pixel-perfect match with existing static site
3. **Minimal Manual Work**: Automate content migration with ACF
4. **Local Testing**: Full WordPress setup and testing before export
5. **Strato Deployment**: Export package ready for client's Strato hosting

---

## ✅ Completed Tasks

### Strategy Pivot (Feb 17, 2026)
- [x] Analyzed deployment options (Netlify, Strato, WordPress)
- [x] Decided on WordPress template solution for Strato
- [x] Pulled static HTML files from GitHub main branch
- [x] Created WP-TEMPLATE-PLAN.md with complete architecture
- [x] Updated TASK.md for WordPress workflow

### Project Setup
- [x] Initial project structure created (Jan 15, 2026)
- [x] Scraped original liefermax.com content (Jan 15, 2026)
- [x] Git repository initialized (Jan 15, 2026)
- [x] All documentation created (README, PLANNING, etc.)

### Homepage Development
- [x] Homepage (`index.html`) complete redesign (Jan 15, 2026)
  - [x] Navigation with modern design
  - [x] Hero section with gradient background and stats
  - [x] Products overview section (6 product cards)
  - [x] COPA integration highlight section
  - [x] CTA section with gradient background
  - [x] Footer with contact info and links
  - [x] Responsive design implemented
  - [x] Modern SaaS-style UI with animations

### Documentation (New)
- [x] PROJECT-RULES.md created (Feb 4, 2026)
- [x] PLANNING.md created with full architecture (Feb 4, 2026)
- [x] TASK.md created (Feb 4, 2026)

---

## 🔄 In Progress

### 🚨 PHASE 1: WordPress Theme Development (Feb 17, 2026)

#### Current Tasks:
- [x] Static HTML files pulled from GitHub main branch
- [ ] **Analyze HTML structure** (Navigation, Sections, Components)
- [ ] **Create WordPress theme structure**
  - [ ] style.css (theme header)
  - [ ] functions.php (theme functions)
  - [ ] header.php (navigation)
  - [ ] footer.php (footer)
  - [ ] Page templates for all 8 pages
- [ ] **Set up local WordPress** (Docker or XAMPP)
- [ ] **Install and configure ACF** (Advanced Custom Fields)
- [ ] **Migrate content to WordPress**
- [ ] **Test 1:1 design match**
- [ ] **Create export package for Strato**
  - ✅ index.html → index.astro (11 Bilder)
    - ✅ home.md Content-Datei erstellt
    - ✅ Alle 11 Bilder kopiert und verifiziert
    - ✅ Hero Section mit 4 Screenshots
    - ✅ Products Section mit 6 Produkt-Icons
    - ✅ COPA Integration Section
    - ✅ CTA Section
    - ✅ Image Modal Funktionalität
  - ✅ products.html → products.astro (20+ Bilder!)
    - ✅ Alle 6 Produktsektionen (LieferMax, CHECK, MAP, Shop, Apps, Kasse)
    - ✅ Vollständige Feature-Listen
    - ✅ Screenshot-Galerien
    - ✅ Produktbilder und Icons
  - ✅ integration.html → integration.astro
    - ✅ COPA Integration Details
    - ✅ Technische Spezifikationen
    - ✅ Datenfluss-Beschreibungen
  - ✅ contact.html → contact.astro
    - ✅ Kontaktformular
    - ✅ OpenStreetMap Integration
    - ✅ Kontaktinformationen
  - ✅ agb.html → agb.astro
  - ✅ datenschutz.html → datenschutz.astro
  - ✅ impressum.html → impressum.astro
- ✅ Alle Bilder nach public/assets/images kopiert
- ✅ Build erfolgreich (7 Seiten generiert)
- [ ] **NÄCHSTER SCHRITT: Admin-Zugang testen**
  - [ ] GitHub OAuth App erstellen (siehe ADMIN-SETUP-GUIDE.md)
  - [ ] Test: Kunde kann Seiten editieren
  - [ ] Test: Änderungen werden committed und deployed
- [ ] **Pre-Deployment: SFTP Backup der Live-Site erstellen**
- [ ] **Deployment-Plan mit Kunde abstimmen**
- [ ] GitHub Actions SFTP Workflow implementieren
- [ ] Go-Live durchführen

### 🚨 PHASE 2: HTML-First Redesign (Feb 5, 2026) - COMPLETED

#### ✅ Abgeschlossen - Sofort-Maßnahmen:
- [x] Logo aus client_input extrahiert und integriert (alle Seiten)
- [x] Farbpalette aus Logo abgeleitet (Rot #D32F2F statt Blau)
- [x] CSS-Variablen definiert für konsistentes Design
- [x] Alle Gradients von Blau → Rot/Grau aktualisiert

#### ✅ Abgeschlossen - Content-Vervollständigung:
- [x] Vollständige Feature-Listen auf products.html ergänzt (37 Punkte)
  - [x] Leistungsverzeichnis: 17 Punkte
  - [x] Weitere Funktionen: 20 Punkte
- [x] LM-CHECK: Screenshot-Galerie eingebaut (6 Bilder)
- [x] LM-MAP: Dashboard-Screenshots eingebaut (3 Bilder)
- [x] Shop-Konverter: Logos eingebaut (ShopWare, WooCommerce, COPA)

#### CMS-Migration:
- [x] Astro-Projekt initialisieren
- [x] Decap CMS konfigurieren
- [ ] Content in Markdown migrieren (in progress)
- [ ] Admin-Panel einrichten
- [ ] Kunden-Dokumentation erstellen

#### Content-Completion (Feb 5, 2026) - COMPLETED:
- [x] LieferMax App: Leistungsverzeichnis (17 Punkte) ✅
- [x] LieferMax App: Weitere Funktionen (20 Punkte) ✅
- [x] LM-CHECK: Galerie mit 6 Screenshots ✅
- [x] LM-MAP: 3 Dashboard-Screenshots ✅
- [x] Shop-Konverter: ShopWare/WooCommerce/COPA Logos ✅
- [ ] Bestell-Apps: App-Screenshots (optional - später)

### Logo & Farben Integration (Feb 5, 2026) - COMPLETED
- [x] Logo in alle HTML-Seiten integriert (7 Seiten)
- [x] Farbschema von Blau → Rot geändert (alle Seiten)
- [x] Navigation-Links: hover von blue → red
- [x] Buttons: gradient-bg von blau → rot
- [x] Hero-Section: Akzente von blau → rot
- [x] CSS-Variablen für konsistentes Theming

### Pre-Customer Review Fixes (Feb 4, 2026) - COMPLETED
- [x] Fix FAQ section on contact.html - REMOVED (no original content exists)
- [x] Fix navigation on contact.html (links to non-existent services.html)
- [x] Change "Jetzt bestellen" button to "Demo anfragen" on contact.html
- [x] Align color scheme on contact.html with rest of site (purple → blue)
- [x] Add Kassen-Konverter section to products.html
- [x] Implement mobile menu JavaScript functionality
- [x] Link Demo buttons to contact.html

### Products Page
- [x] Complete `products.html` with all 6 product sections
  - [x] LieferMax App section with detailed features
  - [x] LieferMax-CHECK section
  - [x] LieferMax-MAP section
  - [x] Shop-Konverter section with data flow details
  - [x] Bestell-Apps section with app store badges
  - [x] Kassen-Konverter section added (Feb 4, 2026)
  - [x] Navigation and footer
  - [x] Responsive design testing

---

## 📋 Backlog (Priority Order)

### High Priority - Core Pages

#### Integration Page
- [x] Create `integration.html` for COPA integration details (Feb 4, 2026)
  - [x] Hero section highlighting COPA partnership
  - [x] Integration benefits section
  - [x] Technical details (API, data sync, DMS)
  - [x] Step-by-step integration flow diagram
  - [x] Supported systems (drink.3000, drink.PRO)
  - [x] CTA for integration consultation
  - [x] Responsive design

#### Contact Page
- [x] Create `contact.html` with contact form (Feb 4, 2026)
  - [x] Contact information display (address, phone, email)
  - [x] Contact form with validation
    - [x] Fields: Name, Email, Phone, Company, Message
    - [ ] Client-side validation (JavaScript)
    - [ ] Honeypot field for spam prevention
  - [ ] Create `assets/php/contact-form.php`
    - [ ] Server-side validation
    - [ ] Input sanitization
    - [ ] Email sending functionality
    - [ ] Success/error response handling
  - [x] OpenStreetMap embed (corrected coordinates Feb 4, 2026)
  - [x] Responsive design
  - [ ] **FIX NEEDED:** FAQ section has wrong content (food delivery instead of B2B software)

### Medium Priority - Assets & Optimization

#### Images & Media
- [ ] Source high-quality stock photos
  - [ ] Hero section background/image
  - [ ] Product screenshots/mockups
  - [ ] COPA integration diagram/visual
  - [ ] Team/office photos (if needed)
- [ ] Optimize all images
  - [ ] Compress images (TinyPNG, ImageOptim)
  - [ ] Convert to WebP format where supported
  - [ ] Create responsive image sets
  - [ ] Add proper alt text for accessibility
- [ ] Create/add company logo (if not using text logo)
- [ ] Add favicon (multiple sizes)

#### JavaScript Enhancements
- [ ] Create `assets/js/main.js`
  - [ ] Mobile menu toggle functionality
  - [ ] Smooth scroll to anchor links
  - [ ] Scroll-triggered animations (optional)
  - [ ] Navigation bar scroll behavior (shadow on scroll)
- [ ] Create `assets/js/form-validation.js`
  - [ ] Real-time form validation
  - [ ] Error message display
  - [ ] Success message handling
  - [ ] Form submission via AJAX (optional)

### Low Priority - Polish & Enhancement

#### Testing & Validation
- [ ] Cross-browser testing
  - [ ] Chrome (latest)
  - [ ] Firefox (latest)
  - [ ] Safari (latest)
  - [ ] Edge (latest)
- [ ] Responsive design testing
  - [ ] Mobile: 320px, 375px, 414px
  - [ ] Tablet: 768px, 1024px
  - [ ] Desktop: 1280px, 1440px, 1920px
- [ ] Validate HTML (W3C Validator)
- [ ] Run Lighthouse audit
  - [ ] Performance > 90
  - [ ] Accessibility > 90
  - [ ] Best Practices > 90
  - [ ] SEO > 90
- [ ] Test contact form functionality
  - [ ] Test with valid inputs
  - [ ] Test with invalid inputs
  - [ ] Test spam prevention
  - [ ] Verify email delivery

#### SEO & Meta Tags
- [ ] Add unique meta descriptions to all pages
- [ ] Add Open Graph tags for social sharing
- [ ] Create `robots.txt`
- [ ] Create `sitemap.xml`
- [ ] Add structured data (Schema.org) for business info
- [ ] Optimize page titles for SEO

#### Performance Optimization
- [ ] Minify CSS (if using custom CSS file)
- [ ] Minify JavaScript files
- [ ] Implement lazy loading for images
- [ ] Add browser caching headers (via .htaccess or server config)
- [ ] Optimize web font loading
- [ ] Remove unused CSS/JS

#### Additional Pages (Optional)
- [x] Create `impressum.html` (legal imprint - required in Germany) (Feb 4, 2026)
- [x] Create `datenschutz.html` (privacy policy - GDPR) (Feb 4, 2026)
- [x] Create `agb.html` (terms and conditions) (Feb 4, 2026)
- [ ] Create 404 error page

---

## 🚀 Deployment Tasks

### Pre-Deployment
- [ ] Final testing on all pages
- [ ] Verify all links work
- [ ] Check all images load correctly
- [ ] Test contact form on staging server
- [ ] Review all content for typos/errors
- [ ] Run final Lighthouse audit

### GitHub Deployment
- [ ] Push all changes to GitHub
- [ ] Configure GitHub Pages
- [ ] Test deployed site
- [ ] Update README with live URL
- [ ] Create release/tag (v1.0)

### Production Deployment (if separate hosting)
- [ ] Set up hosting account
- [ ] Configure domain and DNS
- [ ] Upload files via FTP/SFTP
- [ ] Configure PHP mail settings
- [ ] Set up SSL certificate (HTTPS)
- [ ] Test contact form on production
- [ ] Submit sitemap to Google Search Console

---

## 🐛 Known Issues / Bugs

### Critical (Feb 4, 2026 - Pre-Customer Review) - ALL FIXED
~~1. **contact.html FAQ section** - Contains wrong mockup data for food delivery service instead of B2B software~~
~~2. **contact.html navigation** - Links to non-existent `services.html`~~
~~3. **contact.html button** - "Jetzt bestellen" should be "Demo anfragen"~~
~~4. **contact.html colors** - Uses purple scheme instead of blue (inconsistent with other pages)~~
~~5. **products.html** - Missing Kassen-Konverter section~~
~~6. **All pages** - Mobile hamburger menu has no JavaScript functionality~~
~~7. **All pages** - Demo buttons not linked to contact page~~

### Fixed (Feb 4, 2026)
- ✅ OSM Map on contact.html showed wrong location (corrected coordinates to 47.6537, 10.7156)
- ✅ FAQ section removed from contact.html (no original content)
- ✅ Navigation fixed on contact.html
- ✅ Button changed to "Demo anfragen"
- ✅ Color scheme aligned (blue instead of purple)
- ✅ Kassen-Konverter section added to products.html
- ✅ Mobile menu JavaScript implemented (assets/js/main.js)
- ✅ All Demo buttons linked to contact.html

---

## 💡 Ideas / Future Enhancements

### Discovered During Work
- Consider adding a "Demo Request" modal instead of separate page
- Add customer testimonials section to homepage
- Create a simple blog section for company news
- Add video embed for product demos
- Consider adding live chat widget (Tawk.to, Crisp)
- Add cookie consent banner (GDPR compliance)
- Create downloadable PDF brochures for products
- Add "Back to Top" button on long pages

### Phase 2 (Post-Launch)
- Multi-language support (English version)
- Customer case studies page
- Integration with CRM system
- Online demo booking system
- Knowledge base / FAQ section
- Customer portal with login

---

## 📝 Notes

### Design Decisions
- Using TailwindCSS CDN for rapid development (no build process needed)
- Keeping JavaScript minimal - vanilla JS only, no frameworks
- Blue gradient theme matches beverage/logistics industry (trust, reliability)
- Each product has unique color for easy visual differentiation
- Mobile-first approach for responsive design

### Content Notes
- All content sourced from original liefermax.com website
- Contact info verified: An der Leiten 4, D-87672 Roßhaupten, Tel: 08367 – 91 39 187
- COPA Systeme is the main technology partner - emphasize throughout
- Target audience: Beverage wholesalers (Getränkefachgroßhandel)

### Technical Notes
- PHP contact form will only work on server with PHP support
- GitHub Pages doesn't support PHP - need alternative hosting for contact form
- Consider using Netlify Forms or Formspree as alternative to PHP
- All external resources (TailwindCSS, Font Awesome, Google Fonts) loaded via CDN

---

## 🎯 Success Criteria

### Minimum Viable Product (MVP)
- [x] Homepage complete and responsive
- [ ] Products page complete with all 6 products
- [ ] Integration page explaining COPA partnership
- [ ] Contact page with working form
- [ ] All pages responsive on mobile, tablet, desktop
- [ ] Clean, professional design matching SaaS platforms
- [ ] Real content from original website
- [ ] Fast load times (< 3 seconds)

### Stretch Goals
- [ ] Lighthouse score > 95 on all metrics
- [ ] Animated transitions and micro-interactions
- [ ] Video content integration
- [ ] Downloadable resources (PDFs, brochures)
- [ ] Customer testimonials
- [ ] Blog section

---

## 📞 Questions for Client

_To be filled in during development if clarification needed_

1. Do you have high-resolution logo files?
2. Do you have product screenshots or should we use mockups?
3. Preferred email address for contact form submissions?
4. Any specific stock photo preferences or brand guidelines?
5. Do you need legal pages (Impressum, Datenschutz, AGB)?

---

**Remember**: Update this file as you complete tasks, discover new work, or encounter issues!

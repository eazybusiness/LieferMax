# WordPress Entwicklungsplan - LieferMax

**Datum**: 5. Februar 2026  
**Ziel**: WordPress-optimiertes Theme mit schlichtem Rot-Akzent Design

---

## 🎨 Design-Philosophie

### Farbschema: Schlicht mit Rot-Akzenten

**Problem**: Rot kann dominant wirken  
**Lösung**: Rot nur als Akzent, nicht als Hauptfarbe

```css
:root {
  /* Hauptfarben: Neutral & Professionell */
  --primary: #2C3E50;        /* Dunkelblau-Grau (Hauptfarbe) */
  --secondary: #34495E;      /* Mittelgrau */
  --text: #333333;           /* Text-Grau */
  
  /* Rot: Nur als Akzent */
  --accent-red: #A52A2A;     /* Gedämpftes Rot (aus Logo) */
  --accent-red-light: #C74444; /* Helles Rot für Hover */
  
  /* Neutral */
  --light-bg: #F8F9FA;       /* Heller Hintergrund */
  --white: #FFFFFF;
  --border: #E0E0E0;
}
```

**Verwendung:**
- ✅ **Rot für**: Buttons, Links, Icons, kleine Akzente
- ❌ **NICHT für**: Große Flächen, Hintergründe, Überschriften
- ✅ **Hauptfarbe**: Dunkelgrau/Blaugrau (professionell, schlicht)

**Beispiel:**
```
Header: Weiß mit grauem Text
Buttons: Rot (Call-to-Action)
Überschriften: Dunkelgrau
Links: Rot beim Hover
Icons: Rot als Akzent
```

---

## 🏗️ Entwicklungsumgebung - 3 Optionen

### Option 1: Lokal + ngrok ⭐ EMPFOHLEN

**Setup:**
```bash
# 1. WordPress lokal installieren (LocalWP, XAMPP, oder Docker)
# 2. Theme entwickeln
# 3. ngrok für Demo
ngrok http 8080
# → https://xyz.ngrok.io (Kunde kann live sehen)
```

**Vorteile:**
- ✅ Schnellste Entwicklung (keine Upload-Wartezeiten)
- ✅ Volle Kontrolle
- ✅ Keine Gefahr für Live-Site
- ✅ Kunde sieht live via ngrok
- ✅ Git-Versionierung einfach

**Nachteile:**
- ⚠️ ngrok-Link ändert sich (kostenlose Version)
- ⚠️ Muss laufen während Demo

**Workflow:**
```
Entwicklung → Git Commit → ngrok Demo → Feedback → 
Anpassungen → Finale Version → Upload zu Ionos/Kunde
```

---

### Option 2: Ionos Staging-Subdomain

**Setup:**
```
Hauptdomain: liefermax.com (bleibt unberührt)
Staging: dev.liefermax.com oder staging.liefermax.com
```

**Vorteile:**
- ✅ Permanenter Link für Kunde
- ✅ Echtes Hosting-Environment
- ✅ Keine lokale Infrastruktur nötig
- ✅ Einfach auf Live umschalten

**Nachteile:**
- ⚠️ Langsamere Entwicklung (FTP/SFTP Upload)
- ⚠️ Braucht Subdomain-Setup
- ⚠️ Ionos-Zugangsdaten nötig

**Workflow:**
```
Lokal entwickeln → FTP Upload → Kunde testet → 
Feedback → Anpassungen → Live-Switch
```

---

### Option 3: Kunden-WP mit Staging-Plugin

**Setup:**
```
WordPress Plugin: WP Staging Pro oder Duplicator
Erstellt Kopie der Live-Site in /staging/
```

**Vorteile:**
- ✅ Arbeitet auf Kunden-Hosting
- ✅ Exakte Live-Umgebung
- ✅ Ein-Klick Deployment

**Nachteile:**
- ❌ Gefahr für Live-Site (wenn Fehler)
- ❌ Braucht Kunden-WP-Zugang
- ❌ Langsamer (arbeitet auf fremdem Server)

---

## 🏆 Empfehlung: Hybrid-Ansatz

### Beste Lösung für schnelle Entwicklung:

**Phase 1: Lokal + ngrok (Entwicklung)**
- Schnelle Entwicklung lokal
- ngrok für Live-Demos
- Git für Versionierung

**Phase 2: Ionos Staging (Testing)**
- Upload zu Ionos Staging
- Kunde testet in echter Umgebung
- Finales Feedback

**Phase 3: Live-Deployment**
- Von Staging → Live
- Oder direkt zu Kunden-WP

---

## 📋 Konkrete Schritte

### 1. Lokale WordPress-Installation (30 Min)

**Option A: LocalWP (empfohlen - einfachste)**
```bash
# Download: https://localwp.com/
# 1. LocalWP installieren
# 2. "Create New Site" → liefermax-redesign
# 3. WordPress läuft auf http://liefermax-redesign.local
```

**Option B: Docker (für Profis)**
```bash
cd /home/nop/CascadeProjects/liefermax-redesign
mkdir wordpress-dev
cd wordpress-dev

# docker-compose.yml erstellen
docker-compose up -d
# WordPress läuft auf http://localhost:8080
```

**Option C: XAMPP/LAMP**
```bash
# XAMPP installieren
# WordPress in htdocs/ entpacken
# http://localhost/liefermax
```

---

### 2. Theme-Struktur erstellen (1-2 Stunden)

```
wp-content/themes/liefermax-theme/
├── style.css              # Theme-Info & Basis-Styles
├── functions.php          # Theme-Funktionen
├── index.php              # Fallback-Template
├── header.php             # Header mit Logo & Navigation
├── footer.php             # Footer
├── page.php               # Standard-Seiten
├── front-page.php         # Homepage
├── single.php             # Einzelseiten
├── assets/
│   ├── css/
│   │   └── main.css       # Haupt-Styles (TailwindCSS)
│   ├── js/
│   │   └── main.js        # JavaScript
│   └── images/
│       ├── logo.png
│       └── ...
└── templates/
    ├── template-products.php   # Produkte-Seite
    └── template-contact.php    # Kontakt-Seite
```

---

### 3. XML-Import (15 Min)

```bash
# In WordPress Admin:
Tools → Import → WordPress
# XML-Datei hochladen:
client_input/liefermaxgfghlieferscheinfahrerverkaufssystem.WordPress.2026-02-05.xml

# Importiert:
- Alle 17 Seiten
- Alle Bilder (URLs)
- Alle Inhalte
```

---

### 4. Theme-Entwicklung (4-6 Stunden)

#### 4.1 style.css (Theme-Header)
```css
/*
Theme Name: LieferMax Redesign
Theme URI: https://liefermax.com
Author: Nils (eazybusiness)
Description: Modern, professional theme for LieferMax B2B logistics platform
Version: 1.0
License: GNU General Public License v2 or later
Text Domain: liefermax
*/
```

#### 4.2 functions.php (Theme-Setup)
```php
<?php
// Theme-Support
function liefermax_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    
    // Navigation
    register_nav_menus([
        'primary' => __('Primary Menu', 'liefermax'),
        'footer' => __('Footer Menu', 'liefermax')
    ]);
}
add_action('after_setup_theme', 'liefermax_setup');

// Styles & Scripts
function liefermax_enqueue_assets() {
    // TailwindCSS CDN
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css');
    
    // Custom CSS
    wp_enqueue_style('liefermax-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0');
    
    // JavaScript
    wp_enqueue_script('liefermax-script', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'liefermax_enqueue_assets');
?>
```

#### 4.3 header.php (mit Logo)
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="fixed top-0 w-full bg-white shadow-md z-50">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="<?php echo home_url(); ?>" class="flex items-center space-x-3">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" 
                         alt="<?php bloginfo('name'); ?>" 
                         class="h-12">
                <?php endif; ?>
                <span class="text-2xl font-bold text-gray-800">
                    <?php bloginfo('name'); ?>
                </span>
            </a>
            
            <!-- Navigation -->
            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container' => 'div',
                'container_class' => 'hidden md:flex space-x-6',
                'menu_class' => 'flex space-x-6'
            ]); ?>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>
</header>

<div style="height: 80px;"></div> <!-- Spacer for fixed header -->
```

---

### 5. Farbschema implementieren (1 Stunde)

**assets/css/main.css:**
```css
:root {
  /* Hauptfarben: Schlicht & Professionell */
  --primary: #2C3E50;
  --secondary: #34495E;
  --text: #333333;
  
  /* Rot: Nur Akzent */
  --accent: #A52A2A;
  --accent-hover: #C74444;
  
  /* Neutral */
  --bg-light: #F8F9FA;
  --white: #FFFFFF;
  --border: #E0E0E0;
}

/* Buttons: Rot-Akzent */
.btn-primary {
  background: var(--accent);
  color: var(--white);
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  transition: all 0.3s;
}

.btn-primary:hover {
  background: var(--accent-hover);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(165, 42, 42, 0.3);
}

/* Links: Grau mit Rot-Hover */
a {
  color: var(--text);
  transition: color 0.3s;
}

a:hover {
  color: var(--accent);
}

/* Überschriften: Dunkelgrau */
h1, h2, h3, h4, h5, h6 {
  color: var(--primary);
  font-weight: 700;
}

/* Icons: Rot-Akzent */
.icon-accent {
  color: var(--accent);
}

/* Sections: Weiß/Hellgrau abwechselnd */
.section-white {
  background: var(--white);
}

.section-light {
  background: var(--bg-light);
}
```

---

### 6. ngrok Setup (5 Min)

```bash
# ngrok installieren
# https://ngrok.com/download

# WordPress läuft auf localhost:8080
ngrok http 8080

# Output:
# Forwarding: https://abc123.ngrok.io → http://localhost:8080

# WordPress URL anpassen:
# wp-config.php:
define('WP_HOME', 'https://abc123.ngrok.io');
define('WP_SITEURL', 'https://abc123.ngrok.io');
```

**Für Kunde:**
```
Demo-Link: https://abc123.ngrok.io
(Link ist 2 Stunden gültig, dann neu generieren)
```

---

## 📅 Zeitplan

### Tag 1 (4-6 Stunden):
1. **WordPress lokal installieren** (30 Min)
2. **XML importieren** (15 Min)
3. **Theme-Struktur erstellen** (1 Stunde)
4. **Header/Footer mit Logo** (1 Stunde)
5. **Farbschema implementieren** (1 Stunde)
6. **Homepage anpassen** (1-2 Stunden)
7. **ngrok Demo** (5 Min)

### Tag 2 (4-6 Stunden):
1. **Produktseiten** (2 Stunden)
2. **Kontaktseite** (1 Stunde)
3. **Responsive Design** (1 Stunde)
4. **Testing** (1 Stunde)
5. **Kunde-Feedback** (via ngrok)

### Tag 3 (2-4 Stunden):
1. **Anpassungen nach Feedback** (2 Stunden)
2. **Upload zu Ionos Staging** (1 Stunde)
3. **Finales Testing** (1 Stunde)

---

## 🚀 Deployment-Optionen

### Option A: Ionos Staging
```bash
# FTP Upload:
Host: ftp.ionos.de
User: [Ihre Zugangsdaten]
Pfad: /staging/ oder /dev/

# Theme hochladen nach:
/wp-content/themes/liefermax-theme/
```

### Option B: Kunden-WP
```bash
# Via WP Staging Plugin
# Oder manuell via FTP/SFTP
```

### Option C: Weiter lokal mit ngrok
```bash
# Für Entwicklung & Demos
# Später zu Live migrieren
```

---

## ✅ Checkliste

### Vorbereitung:
- [ ] LocalWP oder Docker installiert
- [ ] WordPress lokal läuft
- [ ] ngrok installiert (optional)
- [ ] Git Repository aktualisiert

### Entwicklung:
- [ ] Theme-Struktur erstellt
- [ ] Logo integriert
- [ ] Farbschema implementiert (schlicht mit Rot-Akzent)
- [ ] XML importiert
- [ ] Header/Footer angepasst
- [ ] Homepage gestylt
- [ ] Produktseiten angepasst
- [ ] Kontaktseite angepasst
- [ ] Mobile responsive

### Demo:
- [ ] ngrok läuft
- [ ] Demo-Link an Kunde
- [ ] Feedback gesammelt

### Deployment:
- [ ] Theme zu Ionos/Kunde hochgeladen
- [ ] Live-Test
- [ ] DNS/Domain konfiguriert

---

## 🎯 Nächster Schritt

**Soll ich starten mit:**

1. **LocalWP Setup** - WordPress lokal installieren
2. **Docker Setup** - docker-compose.yml erstellen
3. **Theme-Struktur** - Direkt Theme-Dateien erstellen

Was bevorzugen Sie für die lokale Entwicklung?

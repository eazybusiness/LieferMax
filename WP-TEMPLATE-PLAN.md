# LieferMax WordPress Template Migration Plan

**Erstellt:** 17. Februar 2026  
**Strategie:** Statische HTML → WordPress Templates (1:1 Design Match)

---

## 🎯 Ziel

**WordPress-Theme erstellen, das exakt wie die statische Seite aussieht**

### Konditionen:
1. ✅ **1:1 Design-Match** - Pixel-perfekte Übereinstimmung
2. ✅ **Minimale manuelle Arbeit** - Automatisierung wo möglich
3. ✅ **Kunde kann Content selbst ändern** - WordPress Admin
4. ✅ **Bei Strato hostbar** - Standard WordPress

---

## 📋 Workflow

### **Phase 1: Statische HTML analysieren** ✅
- [x] HTML-Dateien von GitHub main branch pullen
- [ ] Struktur analysieren (Navigation, Sections, Footer)
- [ ] CSS/JS Dependencies identifizieren
- [ ] Wiederverwendbare Komponenten identifizieren

### **Phase 2: WordPress Theme erstellen**
- [ ] Theme-Struktur aufbauen
- [ ] Header/Footer als Templates
- [ ] Page Templates für jede Seite
- [ ] CSS/JS integrieren (unverändert)
- [ ] ACF Fields für editierbare Inhalte

### **Phase 3: Lokale WordPress Setup**
- [ ] Docker/XAMPP WordPress installieren
- [ ] Theme installieren
- [ ] Plugins installieren (ACF)
- [ ] Test-Content einfügen

### **Phase 4: Content-Migration**
- [ ] Pages in WordPress anlegen
- [ ] Bilder in Media Library
- [ ] ACF Fields ausfüllen
- [ ] 1:1 Design-Vergleich

### **Phase 5: Export & Deployment**
- [ ] WordPress Export erstellen
- [ ] Strato-Deployment-Package
- [ ] Dokumentation für Kunde
- [ ] Übergabe

---

## 🏗️ WordPress Theme Struktur

```
liefermax-wp-theme/
├── style.css                 # Theme Header
├── functions.php             # Theme Functions
├── header.php                # Header Template
├── footer.php                # Footer Template
├── index.php                 # Fallback Template
├── front-page.php            # Homepage Template
├── page-products.php         # Produkte Template
├── page-integration.php      # Integration Template
├── page-contact.php          # Kontakt Template
├── page-impressum.php        # Impressum Template
├── page-agb.php              # AGB Template
├── page-datenschutz.php      # Datenschutz Template
├── page-weitere-tools.php    # Weitere Tools Template
├── assets/
│   ├── css/
│   │   └── main.css          # Original CSS (unverändert)
│   ├── js/
│   │   └── main.js           # Original JS (unverändert)
│   └── images/               # Theme-Bilder
└── inc/
    ├── acf-fields.php        # ACF Field Definitions
    └── custom-functions.php  # Helper Functions
```

---

## 🎨 Design-Match Strategie

### **1:1 Übereinstimmung sicherstellen:**

**CSS:**
- ✅ Original CSS komplett übernehmen
- ✅ Keine Änderungen an Styles
- ✅ TailwindCSS CDN beibehalten

**HTML-Struktur:**
- ✅ Exakte HTML-Struktur aus statischen Dateien
- ✅ Nur dynamische Teile durch WordPress-Tags ersetzen
- ✅ Klassen und IDs identisch

**JavaScript:**
- ✅ Original JS unverändert
- ✅ Smooth Scroll, Navigation, etc. beibehalten

---

## 🔧 ACF (Advanced Custom Fields) Setup

### **Minimale manuelle Arbeit durch Smart Fields:**

**Global Settings (einmalig):**
```php
- Site Title
- Site Logo
- Contact Email
- Contact Phone
- Social Media Links
```

**Page Fields (pro Seite):**
```php
- Hero Section
  - Title (Text)
  - Description (Textarea)
  - Background Image (Image)
  - CTA Button Text (Text)
  - CTA Button Link (URL)

- Content Blocks (Repeater)
  - Block Type (Select: Text, Image, Gallery, Features)
  - Block Title (Text)
  - Block Content (WYSIWYG)
  - Block Image (Image)
  - Block Gallery (Gallery)

- Features List (Repeater)
  - Feature Icon (Image)
  - Feature Title (Text)
  - Feature Description (Text)
```

**Product Fields:**
```php
- Product Name
- Product Description
- Product Images (Gallery)
- Product Features (Repeater)
- Product Link
- Product Screenshots (Gallery)
```

---

## 🚀 Lokale WordPress Setup

### **Docker Compose (empfohlen):**

```yaml
version: '3.8'
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./liefermax-wp-theme:/var/www/html/wp-content/themes/liefermax
      - ./uploads:/var/www/html/wp-content/uploads
  
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: wordpress
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
```

**Starten:**
```bash
docker-compose up -d
# WordPress: http://localhost:8080
# Admin: http://localhost:8080/wp-admin
```

---

## 📦 Export-Strategie

### **WordPress Export Package:**

**Enthält:**
1. **Theme-Ordner** (`liefermax-wp-theme/`)
2. **WordPress XML Export** (Pages, Posts, Media)
3. **SQL-Dump** (Datenbank)
4. **Uploads-Ordner** (Media Library)
5. **Plugin-Liste** (ACF, etc.)

**Export-Script:**
```bash
#!/bin/bash
# export-wp-package.sh

# Theme exportieren
zip -r liefermax-theme.zip liefermax-wp-theme/

# WordPress Content exportieren
wp export --dir=./export/

# Datenbank exportieren
wp db export liefermax-db.sql

# Uploads exportieren
zip -r liefermax-uploads.zip wp-content/uploads/

# Alles in ein Package
mkdir liefermax-wp-package
mv liefermax-theme.zip liefermax-wp-package/
mv export/*.xml liefermax-wp-package/
mv liefermax-db.sql liefermax-wp-package/
mv liefermax-uploads.zip liefermax-wp-package/

echo "✅ Export-Package erstellt: liefermax-wp-package/"
```

---

## 📋 Strato Import-Anleitung

### **Für den Kunden:**

**Schritt 1: WordPress installieren**
- Strato Admin → WordPress 1-Click Installation
- Domain auswählen
- Admin-Zugangsdaten notieren

**Schritt 2: Theme hochladen**
```
1. WordPress Admin → Design → Themes → Installieren
2. liefermax-theme.zip hochladen
3. Theme aktivieren
```

**Schritt 3: Plugins installieren**
```
1. Plugins → Installieren
2. "Advanced Custom Fields" suchen
3. Installieren & Aktivieren
```

**Schritt 4: Content importieren**
```
1. Tools → Import → WordPress
2. XML-Datei hochladen
3. Import starten
4. Bilder automatisch herunterladen: Ja
```

**Schritt 5: Fertig!**
- Website unter Domain aufrufen
- Sollte exakt wie statische Version aussehen

---

## 🎯 Vorteile dieser Lösung

### **Für den Kunden:**
- ✅ **WordPress CMS** - Bekannte Oberfläche
- ✅ **Exakt gleiches Design** - Keine Überraschungen
- ✅ **Einfache Content-Änderung** - Visueller Editor
- ✅ **Media Library** - Bilder per Drag & Drop
- ✅ **Bei Strato hostbar** - Keine Domain-Änderung

### **Für dich:**
- ✅ **Minimale manuelle Arbeit** - Automatisierter Export
- ✅ **Wiederverwendbar** - Theme für andere Projekte
- ✅ **Wartbar** - Saubere Code-Struktur
- ✅ **Testbar** - Lokal entwickeln, dann deployen

### **Technisch:**
- ✅ **Standard WordPress** - Keine Custom-Lösungen
- ✅ **ACF für Flexibilität** - Einfach erweiterbar
- ✅ **Original CSS/JS** - Keine Rewrites nötig
- ✅ **SEO-optimiert** - WordPress SEO-Plugins nutzbar

---

## 🔄 Update-Workflow

### **Nach Go-Live:**

**Content-Änderungen (Kunde):**
```
1. WordPress Admin einloggen
2. Seite bearbeiten
3. ACF Fields ändern
4. Speichern
5. Fertig!
```

**Design-Änderungen (du):**
```
1. Lokal Theme anpassen
2. Testen
3. Theme-ZIP erstellen
4. Kunde hochladen lassen
5. Fertig!
```

---

## ⚠️ Wichtige Punkte

### **Design-Match sicherstellen:**
1. **Browser-Tests:** Chrome, Firefox, Safari
2. **Responsive-Tests:** Mobile, Tablet, Desktop
3. **Pixel-Vergleich:** Screenshots vergleichen
4. **Funktions-Tests:** Navigation, Links, Forms

### **Performance:**
1. **Bilder optimieren** - WebP, Kompression
2. **CSS/JS minifizieren** - Für Produktion
3. **Caching aktivieren** - WordPress Plugins
4. **CDN nutzen** - Optional für Bilder

---

## 📊 Zeitplan

### **Tag 1: Theme-Entwicklung**
- HTML-Struktur analysieren (1h)
- Theme-Grundstruktur (2h)
- Header/Footer Templates (2h)
- Page Templates (3h)

### **Tag 2: ACF & Content**
- ACF Fields definieren (2h)
- Lokale WordPress Setup (1h)
- Content migrieren (3h)
- Design-Vergleich (2h)

### **Tag 3: Testing & Export**
- Alle Seiten testen (2h)
- Responsive testen (1h)
- Export-Package erstellen (1h)
- Dokumentation (2h)

**Gesamt: ~22 Stunden**

---

## ✅ Erfolgsmetriken

**Theme ist fertig wenn:**
- [ ] Alle 8 Seiten als Templates vorhanden
- [ ] Design 1:1 identisch mit statischer Version
- [ ] ACF Fields für alle editierbaren Inhalte
- [ ] Responsive auf allen Geräten
- [ ] Export-Package funktioniert
- [ ] Import auf Strato getestet
- [ ] Kunde kann Content selbst ändern
- [ ] Dokumentation vollständig

---

**Bereit für Implementation! 🚀**

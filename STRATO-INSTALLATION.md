# LieferMax WordPress - Strato Installation Guide

**Version:** 1.0.0  
**Datum:** 17. Februar 2026  
**Theme:** LieferMax WordPress Theme

---

## 📋 Übersicht

Dieses Dokument beschreibt die Installation des LieferMax WordPress-Themes auf Strato Hosting.

### Was ist enthalten:
- ✅ Komplettes WordPress-Theme (1:1 Design-Match)
- ✅ 8 vorkonfigurierte Seiten
- ✅ Advanced Custom Fields (ACF) Integration
- ✅ Alle Bilder und Assets
- ✅ Responsive Design
- ✅ COPA Systeme Branding

---

## 🎯 Voraussetzungen

### Auf Strato:
- WordPress-Installation (Version 6.0+)
- PHP 7.4 oder höher
- MySQL 5.7 oder höher
- FTP/SFTP-Zugang

### Lokal (für Export):
- Zugriff auf lokale WordPress-Installation
- Docker (läuft bereits)

---

## 📦 Export-Paket erstellen

### 1. Theme exportieren

```bash
# Im Projektverzeichnis
cd /home/nop/CascadeProjects/liefermax-redesign
zip -r liefermax-theme.zip wordpress-theme/liefermax/
```

### 2. WordPress-Daten exportieren

```bash
# WordPress XML Export
docker exec liefermax-wordpress wp export --dir=/tmp --allow-root
docker cp liefermax-wordpress:/tmp/export.xml ./liefermax-export.xml

# Datenbank-Dump (optional)
docker exec liefermax-mysql mysqldump -uwordpress -pwordpress wordpress > liefermax-db.sql
```

### 3. Bilder exportieren

```bash
# Alle Bilder sind bereits im Theme unter assets/images/
# Keine zusätzlichen Uploads nötig
```

---

## 🚀 Installation auf Strato

### Schritt 1: WordPress vorbereiten

1. **WordPress auf Strato installieren** (falls noch nicht geschehen)
   - Strato Hosting-Panel öffnen
   - "WordPress installieren" wählen
   - Domain auswählen
   - Admin-Zugangsdaten notieren

2. **WordPress-Admin öffnen**
   - URL: `https://ihre-domain.de/wp-admin`
   - Mit Admin-Daten einloggen

### Schritt 2: Theme hochladen

**Option A: Via WordPress-Admin (empfohlen)**

1. Design → Themes → Installieren
2. "Theme hochladen" klicken
3. `liefermax-theme.zip` auswählen
4. "Jetzt installieren" klicken
5. "Aktivieren" klicken

**Option B: Via FTP**

1. FTP-Verbindung zu Strato herstellen
2. Navigieren zu: `/wp-content/themes/`
3. Ordner `liefermax` hochladen
4. In WordPress-Admin: Design → Themes → "LieferMax" aktivieren

### Schritt 3: Plugin installieren

1. **Advanced Custom Fields installieren**
   - Plugins → Installieren
   - "Advanced Custom Fields" suchen
   - Installieren & Aktivieren

### Schritt 4: Seiten importieren

**Option A: Manuell erstellen (schnell)**

Erstellen Sie folgende Seiten unter "Seiten → Erstellen":

| Seitentitel | Slug | Template |
|------------|------|----------|
| Home | home | Homepage |
| Produkte | products | Products Page |
| Integration | integration | Integration Page |
| Kontakt | contact | Contact Page |
| Weitere Tools | weitere-tools | Standard-Template |
| Impressum | impressum | Impressum |
| Datenschutzerklärung | datenschutz | Datenschutz |
| AGB | agb | AGB |

**Für jede Seite:**
1. Seiten → Erstellen
2. Titel eingeben
3. Rechte Sidebar → "Template" auswählen
4. "Veröffentlichen" klicken

**Option B: XML Import (automatisch)**

1. Werkzeuge → Daten importieren
2. "WordPress" wählen
3. Plugin installieren (falls nötig)
4. `liefermax-export.xml` hochladen
5. "Datei hochladen und importieren"
6. Alle Inhalte importieren

### Schritt 5: Startseite festlegen

1. Einstellungen → Lesen
2. "Eine statische Seite" wählen
3. Startseite: "Home" auswählen
4. Speichern

### Schritt 6: Menü erstellen (optional)

1. Design → Menüs
2. Neues Menü erstellen: "Primary Menu"
3. Seiten hinzufügen:
   - Home
   - Produkte
   - Integration
   - Kontakt
4. Position: "Primary Menu" zuweisen
5. Speichern

---

## ✅ Verifizierung

### Checkliste:

- [ ] Theme ist aktiviert
- [ ] ACF Plugin ist installiert
- [ ] Alle 8 Seiten existieren
- [ ] Templates sind zugewiesen
- [ ] Startseite zeigt "Home"
- [ ] Navigation funktioniert
- [ ] Alle Bilder werden angezeigt
- [ ] Design ist identisch mit Vorlage
- [ ] Responsive auf Mobile/Tablet
- [ ] Footer zeigt Kontaktdaten

### Test-URLs:

```
https://ihre-domain.de/              → Homepage
https://ihre-domain.de/products/     → Produkte
https://ihre-domain.de/integration/  → Integration
https://ihre-domain.de/contact/      → Kontakt
https://ihre-domain.de/impressum/    → Impressum
https://ihre-domain.de/datenschutz/  → Datenschutz
https://ihre-domain.de/agb/          → AGB
```

---

## 🎨 Theme-Anpassungen

### Globale Einstellungen (ACF)

1. **Theme Settings** im WordPress-Admin
   - Firmenname
   - Telefon
   - E-Mail
   - Adresse

### Seiten bearbeiten

1. Seite öffnen
2. Inhalt bearbeiten (WYSIWYG-Editor)
3. ACF-Felder ausfüllen (falls vorhanden)
4. "Aktualisieren" klicken

### Bilder austauschen

- Alle Bilder sind im Theme: `wp-content/themes/liefermax/assets/images/`
- Via FTP austauschen oder
- Neue Bilder in Mediathek hochladen

---

## 🔧 Troubleshooting

### Theme wird nicht angezeigt
- Cache leeren (Browser + WordPress)
- Theme erneut aktivieren
- Permalinks neu speichern (Einstellungen → Permalinks)

### Bilder fehlen
- Prüfen: `/wp-content/themes/liefermax/assets/images/`
- Theme erneut hochladen
- Dateiberechtigungen prüfen (644 für Dateien, 755 für Ordner)

### Seiten zeigen falsches Template
- Seite bearbeiten → Template neu zuweisen
- Speichern

### ACF-Felder fehlen
- Plugin "Advanced Custom Fields" installiert?
- Plugin aktiviert?
- Theme neu aktivieren

---

## 📞 Support

Bei Fragen oder Problemen:

**LieferMax GmbH**  
An der Leiten 4  
D-87672 Roßhaupten  

Telefon: 08367 – 91 39 187  
E-Mail: info@liefermax.com  

---

## 📝 Technische Details

### Theme-Struktur

```
liefermax/
├── style.css              # Theme Header
├── functions.php          # Theme Functions
├── header.php             # Header Template
├── footer.php             # Footer Template
├── front-page.php         # Homepage
├── page-products.php      # Produkte
├── page-contact.php       # Kontakt
├── page-integration.php   # Integration
├── page-impressum.php     # Impressum
├── page-datenschutz.php   # Datenschutz
├── page-agb.php           # AGB
├── page.php               # Default Template
├── index.php              # Fallback
├── assets/
│   ├── css/main.css       # Styles
│   ├── js/main.js         # JavaScript
│   └── images/            # 71 Bilder
└── inc/
    └── menu-functions.php # Menu Helpers
```

### Verwendete Technologien

- **WordPress:** 6.x
- **PHP:** 7.4+
- **TailwindCSS:** CDN
- **Font Awesome:** 6.4.0
- **Google Fonts:** Inter
- **ACF:** Advanced Custom Fields

### Performance

- ✅ Optimierte Bilder
- ✅ CDN für CSS/JS
- ✅ Minimale Plugins
- ✅ Sauberer Code
- ✅ SEO-optimiert

---

## 🎯 Nächste Schritte nach Installation

1. **Inhalte anpassen**
   - Texte überarbeiten
   - Bilder austauschen
   - Kontaktdaten aktualisieren

2. **SEO optimieren**
   - Yoast SEO Plugin installieren
   - Meta-Descriptions anpassen
   - Sitemap erstellen

3. **Sicherheit**
   - SSL-Zertifikat aktivieren (Strato)
   - Regelmäßige Backups
   - WordPress & Plugins aktuell halten

4. **Analytics**
   - Google Analytics einbinden
   - Tracking-Code hinzufügen

---

**✅ Installation abgeschlossen!**

Ihr LieferMax WordPress-Theme ist jetzt einsatzbereit! 🚀

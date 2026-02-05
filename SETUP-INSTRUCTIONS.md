# LieferMax WordPress - Setup Anleitung

**Datum**: 5. Februar 2026  
**Status**: Bereit für Installation

---

## ✅ Was wurde erstellt

### 1. WordPress Theme
```
wordpress-theme/
├── style.css              ✓ Theme-Info
├── functions.php          ✓ Theme-Funktionen
├── header.php             ✓ Header mit Logo
├── footer.php             ✓ Footer
├── index.php              ✓ Blog-Übersicht
├── page.php               ✓ Standard-Seiten
├── front-page.php         ✓ Homepage
├── assets/
│   ├── css/main.css       ✓ Schlicht mit Rot-Akzent
│   ├── js/main.js         ✓ Mobile Menu, Smooth Scroll
│   └── images/
│       ├── logo.png       ✓ Firmenlogo
│       └── copa_systeme_logo.png ✓ Partner-Logo
```

### 2. Docker Setup
- `docker-compose.yml` - WordPress + MySQL + phpMyAdmin
- `setup.sh` - Automatisches Setup-Script

### 3. Content
- WordPress XML Export (17 Seiten) bereit zum Import
- Alle Bilder gescraped und verfügbar

### 4. Tests
- `tests/test-suite.md` - Vollständige Test-Checkliste

---

## 🚀 Installation (3 Optionen)

### Option 1: Docker (empfohlen, braucht sudo)

```bash
# Docker mit sudo starten
sudo docker-compose up -d

# Warten bis MySQL bereit ist (30 Sek)
sleep 30

# WordPress öffnen
xdg-open http://localhost:8080
```

**Zugangsdaten:**
- WordPress: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- DB User: wordpress
- DB Password: wordpress_password

---

### Option 2: LocalWP (einfachste, ohne sudo)

1. **LocalWP herunterladen**: https://localwp.com/
2. **Installieren und starten**
3. **"Create New Site"** klicken
   - Site Name: liefermax-redesign
   - PHP: 8.0+
   - MySQL: 8.0+
4. **Theme hochladen**:
   ```bash
   # Theme-Ordner kopieren nach:
   ~/Local Sites/liefermax-redesign/app/public/wp-content/themes/
   ```
5. **Theme aktivieren** in WordPress Admin
6. **XML importieren** (siehe unten)

---

### Option 3: Manuell (XAMPP/LAMP)

1. **XAMPP installieren**: https://www.apachefriends.org/
2. **WordPress herunterladen**: https://de.wordpress.org/download/
3. **WordPress entpacken** nach `/opt/lampp/htdocs/liefermax/`
4. **Datenbank erstellen** in phpMyAdmin
5. **WordPress installieren**
6. **Theme hochladen** und aktivieren
7. **XML importieren**

---

## 📥 WordPress Installation & Setup

### 1. WordPress Basis-Installation

Öffne http://localhost:8080 und folge dem Setup:

```
Sprache: Deutsch
Site-Titel: LieferMax
Benutzername: admin
Passwort: [Sicheres Passwort wählen]
E-Mail: info@liefermax.com
```

### 2. Theme aktivieren

```
Dashboard → Design → Themes
→ "LieferMax Redesign" aktivieren
```

### 3. Menüs erstellen

```
Dashboard → Design → Menüs

Hauptmenü erstellen:
- LieferMax
- LM-CHECK  
- LM-MAP
- ShopWare & WooCommerce
- Bestell Apps
- Kontakt

Position: Primary Menu
```

### 4. Logo hochladen

```
Dashboard → Design → Customizer → Website-Identität
→ Logo auswählen: wordpress-theme/assets/images/logo.png
```

### 5. XML-Content importieren

```
Dashboard → Werkzeuge → Daten importieren
→ WordPress Importer installieren
→ Importer ausführen
→ Datei auswählen: client_input/liefermaxgfghlieferscheinfahrerverkaufssystem.WordPress.2026-02-05.xml
→ "Datei hochladen und importieren"
→ Autor zuweisen: admin
→ "Anhänge herunterladen und importieren" ✓
→ Absenden
```

**Wichtig**: Dieser Import bringt alle 17 Seiten mit komplettem Content!

### 6. Permalinks konfigurieren

```
Dashboard → Einstellungen → Permalinks
→ "Beitragsname" auswählen
→ Speichern
```

---

## 🌐 ngrok für Demo-Link

```bash
# ngrok installieren (falls noch nicht)
# https://ngrok.com/download

# WordPress läuft auf localhost:8080
ngrok http 8080

# Output:
# Forwarding: https://abc123.ngrok.io → http://localhost:8080
```

**WordPress URL anpassen für ngrok:**

```bash
# In WordPress Admin:
Dashboard → Einstellungen → Allgemein
→ WordPress-Adresse (URL): https://abc123.ngrok.io
→ Website-Adresse (URL): https://abc123.ngrok.io
→ Speichern
```

**Demo-Link an Kunde senden:**
```
https://abc123.ngrok.io
```

---

## 🧪 Tests durchführen

### 1. Content-Test

```bash
# Alle Seiten aufrufen und prüfen:
http://localhost:8080/
http://localhost:8080/liefermax/
http://localhost:8080/liefermax-check/
http://localhost:8080/liefermax-map/
http://localhost:8080/weitere-tools/
http://localhost:8080/bestell-app/
http://localhost:8080/kontakt/
http://localhost:8080/impressum/
http://localhost:8080/agb/
http://localhost:8080/datenschutzerklaerung/
```

Checkliste in `tests/test-suite.md` abhaken!

### 2. Responsive Test

```bash
# Browser DevTools öffnen (F12)
# Responsive Mode aktivieren
# Testen:
- iPhone 13 (390x844)
- iPad (768x1024)  
- Desktop (1920x1080)
```

### 3. Browser-Test

Öffnen in:
- Chrome
- Firefox
- Safari (falls macOS)
- Edge

### 4. Performance-Test

```bash
# Lighthouse in Chrome DevTools
# Oder online: https://pagespeed.web.dev/

Ziel-Scores:
- Performance: > 90
- Accessibility: > 90
- Best Practices: > 90
- SEO: > 90
```

---

## 🎨 Design-Überprüfung

### Farben korrekt?

- ✓ Hauptfarbe: Dunkelgrau (#2C3E50)
- ✓ Rot nur als Akzent (#A52A2A)
- ✓ KEINE großen roten Flächen
- ✓ Schlicht und professionell

### Logo sichtbar?

- ✓ Header auf allen Seiten
- ✓ Verlinkt zur Startseite
- ✓ Richtige Größe

---

## 📝 Checkliste vor Kunde-Demo

- [ ] WordPress läuft lokal
- [ ] Theme aktiviert
- [ ] XML importiert (alle 17 Seiten)
- [ ] Menüs konfiguriert
- [ ] Logo hochgeladen
- [ ] Permalinks gesetzt
- [ ] ngrok gestartet
- [ ] Demo-Link funktioniert
- [ ] Alle Tests bestanden
- [ ] Screenshots gemacht

---

## 🐛 Troubleshooting

### Docker startet nicht
```bash
# Mit sudo versuchen
sudo docker-compose up -d

# Oder LocalWP verwenden (keine sudo nötig)
```

### Theme wird nicht angezeigt
```bash
# Dateiberechtigungen prüfen
chmod -R 755 wordpress-theme/

# Theme-Ordner muss in:
wp-content/themes/liefermax-theme/
```

### XML-Import schlägt fehl
```bash
# PHP Memory Limit erhöhen
# In wp-config.php:
define('WP_MEMORY_LIMIT', '256M');

# Oder kleinere Datei importieren
# Nur wichtige Seiten manuell erstellen
```

### ngrok-Link funktioniert nicht
```bash
# WordPress URLs zurücksetzen
# In wp-config.php VOR "That's all":
define('WP_HOME', 'http://localhost:8080');
define('WP_SITEURL', 'http://localhost:8080');

# Dann ngrok neu starten
```

---

## 📞 Nächste Schritte

1. **WordPress starten** (Docker oder LocalWP)
2. **Theme aktivieren**
3. **XML importieren**
4. **Tests durchführen**
5. **ngrok Demo** für Kunde
6. **Feedback sammeln**
7. **Anpassungen machen**
8. **Zu Ionos/Kunde deployen**

---

## 🎯 Deployment zu Ionos (später)

```bash
# Theme exportieren
cd wordpress-theme
zip -r liefermax-theme.zip .

# Via FTP hochladen zu:
/wp-content/themes/liefermax-theme/

# Oder via WordPress Admin:
Dashboard → Design → Themes → Theme hochladen
```

---

**Viel Erfolg! 🚀**

Bei Fragen: info@liefermax.com

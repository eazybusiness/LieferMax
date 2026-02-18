# LieferMax Website - Favicon Setup

## ✅ Favicon wurde erfolgreich hinzugefügt

### Was wurde gemacht:

1. **Favicon-Datei kopiert:**
   - Quelle: `/client_input/liefermax-logo.png`
   - Ziel: `/assets/images/favicon.png`

2. **Favicon-Links zu allen HTML-Dateien hinzugefügt:**
   ```html
   <!-- Favicon -->
   <link rel="icon" type="image/png" href="assets/images/favicon.png">
   <link rel="apple-touch-icon" href="assets/images/favicon.png">
   ```

3. **Aktualisierte Dateien:**
   - ✅ index.html
   - ✅ contact.html
   - ✅ products.html
   - ✅ integration.html
   - ✅ bestell-app.html
   - ✅ portal.html
   - ✅ weitere-tools.html
   - ✅ impressum.html
   - ✅ datenschutz.html
   - ✅ agb.html

---

## 🚀 Für das Deployment

### Dateien hochladen:

1. **Favicon-Datei:**
   ```
   assets/images/favicon.png
   ```

2. **Alle HTML-Dateien (mit favicon-Links):**
   ```
   *.html
   ```

### Mit lftp hochladen:

```bash
# Favicon hochladen
put assets/images/favicon.png

# HTML-Dateien hochladen (bereits im deploy-to-strato.sh enthalten)
mput *.html
```

---

## 📱 Favicon-Unterstützung

Die implementierten Links unterstützen:

- **Browser Favicon:** `rel="icon"` für Desktop-Browser
- **Apple Touch Icon:** `rel="apple-touch-icon"` für iOS-Geräte
- **PNG-Format:** Universell unterstützt

---

## 🔧 Optional: Weitere Favicon-Formate

Falls du zusätzliche Formate für bessere Kompatibilität möchtest:

### 1. Favicon.ico erstellen (optional)

```bash
# Online-Tool verwenden: https://favicon.io/
# Oder mit ImageMagick (falls installiert):
convert assets/images/favicon.png -resize 32x32 assets/images/favicon.ico
```

Dann in HTML hinzufügen:
```html
<link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
```

### 2. Android Icons (optional)

```html
<link rel="icon" type="image/png" sizes="192x192" href="assets/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="512x512" href="assets/images/android-icon-512x512.png">
```

---

## 🧪 Testen

### Browser-Cache leeren

Nach dem Upload:
1. **Browser-Cache leeren:** `Ctrl+F5` (oder `Cmd+Shift+R`)
2. **Fenster schließen und neu öffnen**
3. **Inkognito-Modus testen**

### Test-Checkliste:

- [ ] Favicon im Browser-Tab sichtbar?
- [ ] Favicon in Bookmarks sichtbar?
- [ ] Favicon auf iOS Homescreen (falls getestet)?
- [ ] Keine 404-Fehler in Browser-Konsole?

---

## 📁 Datei-Struktur nach Deployment

```
liefermax-website/
├── assets/
│   └── images/
│       ├── favicon.png
│       └── logo.jpg
├── index.html (mit favicon-Links)
├── contact.html (mit favicon-Links)
├── products.html (mit favicon-Links)
└── ... alle anderen HTML-Dateien
```

---

## 🔄 Zukünftige Updates

### Favicon ändern:

1. **Neues Logo vorbereiten:**
   - Format: PNG
   - Größe: 32x32px bis 512x512px
   - Quadratisch

2. **Datei ersetzen:**
   ```bash
   # Altes favicon ersetzen
   cp neues-logo.png assets/images/favicon.png
   ```

3. **Hochladen:**
   ```bash
   put assets/images/favicon.png
   ```

### HTML-Links anpassen:

Falls du andere Formate hinzufügst, die Links im `<head>` Bereich jeder HTML-Datei aktualisieren.

---

## 🎯 Ergebnis

Die LieferMax-Website zeigt jetzt das LieferMax-Logo als Favicon in:

- ✅ Desktop-Browser-Tabs
- ✅ Browser Bookmarks
- ✅ iOS Homescreen-Icons
- ✅ Android Browser-Favoriten

**Status: ✅ Bereit für Deployment**

---

**Erstellt:** Februar 2026  
**Version:** 1.0  
**Projekt:** LieferMax Website Redesign

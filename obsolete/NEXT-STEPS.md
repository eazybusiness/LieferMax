# LieferMax WordPress - Nächste Schritte

**Status**: WordPress läuft lokal ✅  
**Nächste Schritte**: Theme aktivieren → XML importieren → Konfigurieren

---

## 📋 Step-by-Step Anleitung

### ✅ Step 1: WordPress installiert
WordPress läuft auf: http://localhost:8080 (oder LocalWP URL)

---

### 🎨 Step 2: Theme aktivieren

1. **WordPress Admin öffnen**:
   ```
   http://localhost:8080/wp-admin
   ```

2. **Einloggen** mit den Zugangsdaten aus der Installation

3. **Theme aktivieren**:
   ```
   Dashboard → Design → Themes
   → "LieferMax Redesign" suchen
   → "Aktivieren" klicken
   ```

**Erwartetes Ergebnis**: Theme ist aktiv, Frontend zeigt neues Design

---

### 📥 Step 3: WordPress XML importieren

1. **WordPress Importer installieren**:
   ```
   Dashboard → Werkzeuge → Daten importieren
   → "WordPress" → "Jetzt installieren"
   → "Importer ausführen"
   ```

2. **XML-Datei hochladen**:
   ```
   → "Datei auswählen"
   → Navigiere zu: client_input/liefermaxgfghlieferscheinfahrerverkaufssystem.WordPress.2026-02-05.xml
   → "Datei hochladen und importieren"
   ```

3. **Import-Optionen**:
   ```
   → Autor zuweisen: "admin" (oder dein Admin-User)
   → ✓ "Dateianhänge herunterladen und importieren" aktivieren
   → "Absenden" klicken
   ```

4. **Warten** (kann 1-2 Minuten dauern)

**Erwartetes Ergebnis**: 
- 17 Seiten importiert
- Alle Bilder heruntergeladen
- Erfolgsmeldung

---

### 🔗 Step 4: Permalinks konfigurieren

```
Dashboard → Einstellungen → Permalinks
→ "Beitragsname" auswählen
→ "Änderungen speichern"
```

**Erwartetes Ergebnis**: URLs sind jetzt schön: `/liefermax/` statt `/?p=124`

---

### 📱 Step 5: Menüs erstellen

1. **Hauptmenü erstellen**:
   ```
   Dashboard → Design → Menüs
   → "Neues Menü erstellen"
   → Name: "Hauptmenü"
   → "Menü erstellen"
   ```

2. **Seiten hinzufügen**:
   ```
   Linke Seite → "Seiten" aufklappen
   → Folgende Seiten auswählen:
     ☐ LieferMax
     ☐ LieferMax-CHECK
     ☐ LieferMax-MAP
     ☐ ShopWare & WooCommerce
     ☐ Bestell App
     ☐ Kontakt
   → "Zum Menü hinzufügen"
   ```

3. **Menü-Position festlegen**:
   ```
   → Unten: "Primary Menu" aktivieren
   → "Menü speichern"
   ```

4. **Footer-Menü erstellen** (optional):
   ```
   → "Neues Menü erstellen"
   → Name: "Footer-Menü"
   → Seiten hinzufügen:
     ☐ Impressum
     ☐ AGB
     ☐ Datenschutzerklärung
   → Position: "Footer Menu"
   → "Menü speichern"
   ```

**Erwartetes Ergebnis**: Navigation im Header funktioniert

---

### 🎨 Step 6: Logo hochladen

1. **Customizer öffnen**:
   ```
   Dashboard → Design → Customizer
   → "Website-Identität"
   ```

2. **Logo auswählen**:
   ```
   → "Logo auswählen"
   → "Datei hochladen"
   → Navigiere zu: wordpress-theme/assets/images/logo.png
   → "Auswählen"
   → Größe anpassen (ca. 50px Höhe)
   → "Veröffentlichen"
   ```

**Erwartetes Ergebnis**: Logo erscheint im Header

---

### 🌐 Step 7: ngrok für Demo starten

1. **ngrok installieren** (falls noch nicht):
   ```bash
   # Download: https://ngrok.com/download
   # Oder via Package Manager:
   sudo snap install ngrok
   ```

2. **ngrok starten**:
   ```bash
   ngrok http 8080
   # (oder dein LocalWP Port, z.B. 10004)
   ```

3. **URL notieren**:
   ```
   Forwarding: https://abc123.ngrok.io → http://localhost:8080
   ```

4. **WordPress URLs anpassen**:
   ```
   Dashboard → Einstellungen → Allgemein
   → WordPress-Adresse (URL): https://abc123.ngrok.io
   → Website-Adresse (URL): https://abc123.ngrok.io
   → "Änderungen speichern"
   ```

5. **Neu einloggen** mit ngrok-URL:
   ```
   https://abc123.ngrok.io/wp-admin
   ```

**Erwartetes Ergebnis**: Website ist öffentlich über ngrok-Link erreichbar

---

### 🧪 Step 8: Tests durchführen

1. **Content-Test**:
   ```
   Alle Seiten aufrufen und prüfen:
   - https://abc123.ngrok.io/
   - https://abc123.ngrok.io/liefermax/
   - https://abc123.ngrok.io/liefermax-check/
   - https://abc123.ngrok.io/liefermax-map/
   - https://abc123.ngrok.io/weitere-tools/
   - https://abc123.ngrok.io/bestell-app/
   - https://abc123.ngrok.io/kontakt/
   ```

2. **Design-Check**:
   - ✓ Logo sichtbar?
   - ✓ Farben schlicht (Grau + Rot-Akzent)?
   - ✓ Keine großen roten Flächen?
   - ✓ Navigation funktioniert?

3. **Responsive-Test**:
   ```
   Browser DevTools (F12) → Responsive Mode
   Testen:
   - iPhone 13 (390x844)
   - iPad (768x1024)
   - Desktop (1920x1080)
   ```

4. **Mobile Menu**:
   - ✓ Hamburger-Icon sichtbar auf Mobile?
   - ✓ Menü öffnet/schließt?

5. **Browser-Test**:
   - Chrome ✓
   - Firefox ✓
   - Safari ✓ (falls macOS)

6. **Performance-Test**:
   ```
   Chrome DevTools → Lighthouse
   Oder: https://pagespeed.web.dev/
   
   Ziel: Alle Scores > 90
   ```

---

## 📝 Checkliste

- [ ] **Step 2**: Theme aktiviert
- [ ] **Step 3**: XML importiert (17 Seiten)
- [ ] **Step 4**: Permalinks auf "Beitragsname"
- [ ] **Step 5**: Menüs konfiguriert
- [ ] **Step 6**: Logo hochgeladen
- [ ] **Step 7**: ngrok läuft, Demo-Link funktioniert
- [ ] **Step 8**: Tests durchgeführt

---

## 🎯 Demo-Link für Kunde

Nach Step 7 haben Sie einen öffentlichen Link:
```
https://abc123.ngrok.io
```

Diesen Link können Sie dem Kunden senden für Feedback!

---

## 🐛 Troubleshooting

### Theme wird nicht angezeigt
```bash
# Prüfen ob Theme-Ordner korrekt ist:
ls -la ~/Local\ Sites/liefermax-redesign/app/public/wp-content/themes/liefermax-theme/

# Sollte enthalten:
# style.css, functions.php, header.php, footer.php, etc.
```

### XML-Import schlägt fehl
```php
// PHP Memory Limit erhöhen
// In wp-config.php VOR "That's all":
define('WP_MEMORY_LIMIT', '256M');
```

### ngrok-Link funktioniert nicht
```bash
# WordPress URLs zurücksetzen
# In wp-config.php VOR "That's all":
define('WP_HOME', 'http://localhost:8080');
define('WP_SITEURL', 'http://localhost:8080');

# Dann ngrok neu starten
```

### Bilder werden nicht angezeigt
```
Dashboard → Einstellungen → Medien
→ Prüfen ob Upload-Ordner beschreibbar ist
```

---

## 📞 Nächste Schritte nach Tests

1. **Kunde-Feedback** sammeln via ngrok-Link
2. **Anpassungen** basierend auf Feedback
3. **Finale Tests**
4. **Deployment** zu Ionos/Kunden-Server

---

**Viel Erfolg! 🚀**

Wenn Sie bei einem Step Hilfe brauchen, lassen Sie es mich wissen!

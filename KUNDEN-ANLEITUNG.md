# LieferMax Website - Anleitung für Content-Verwaltung

**Für:** Kunde (LieferMax)  
**Erstellt:** 17. Februar 2026

---

## 🎯 Zwei Möglichkeiten zur Auswahl

Sie haben **zwei Optionen**, wie Sie Ihre Website verwalten möchten:

### Option 1: Netlify (Empfohlen) ⭐
- **Kostenlos**
- **Sehr einfach** - Texte/Bilder ändern wie in Word
- **Automatisch** - Änderungen sind in 30 Sekunden live
- **Schnell** - Weltweit schnelles Hosting
- ⚠️ Erfordert: Domain-Umstellung (A-Record bei Strato ändern)

### Option 2: Strato (Ihre aktuelle Lösung)
- **Bekannt** - Ihr aktuelles Hosting
- **Keine Domain-Änderung** nötig
- ⚠️ Erfordert: FTP-Upload nach jeder Änderung
- ⚠️ Etwas mehr Aufwand

---

## 📱 Option 1: Netlify CMS (Empfohlen)

### Einmalige Einrichtung (macht Ihr Entwickler):
1. Website wird auf Netlify deployed
2. Sie erhalten Login-Daten per Email
3. Sie stellen bei Strato den A-Record um (Anleitung unten)

### So bearbeiten Sie Inhalte:

#### Schritt 1: Einloggen
1. Öffnen Sie: `https://liefermax.com/admin/`
2. Klicken Sie auf "Login with Netlify Identity"
3. Geben Sie Ihre Email und Passwort ein

#### Schritt 2: Seite auswählen
- Klicken Sie links auf "Seiten"
- Wählen Sie die Seite, die Sie bearbeiten möchten (z.B. "Startseite")

#### Schritt 3: Inhalt bearbeiten
**Text ändern:**
- Klicken Sie in das Textfeld
- Bearbeiten Sie den Text wie in Word
- **Fett:** Markieren + Strg+B
- **Kursiv:** Markieren + Strg+I

**Bild hochladen:**
- Klicken Sie auf "Bild hinzufügen"
- Wählen Sie Datei von Ihrem Computer
- Bild wird automatisch hochgeladen

**Bild ersetzen:**
- Klicken Sie auf das alte Bild
- Klicken Sie auf "Ersetzen"
- Wählen Sie neues Bild

#### Schritt 4: Veröffentlichen
1. Klicken Sie oben rechts auf "Publish"
2. Bestätigen Sie mit "Publish now"
3. **Warten Sie 30 Sekunden**
4. Öffnen Sie `liefermax.com` → Änderungen sind live! ✅

### Domain zu Netlify umstellen

**Bei Ihrem Strato-Account:**
1. Login: https://www.strato.de/apps/CustomerService
2. Gehen Sie zu: Domains → Ihre Domain → DNS-Einstellungen
3. Ändern Sie den **A-Record**:
   - **Alt:** Strato IP (z.B. 81.169.xxx.xxx)
   - **Neu:** `75.2.60.5` (Netlify IP)
4. Speichern
5. **Warten Sie 1-24 Stunden** (DNS-Propagation)
6. Fertig! ✅

**Alternative (CNAME):**
- Erstellen Sie CNAME-Record:
- `www` → `liefermax.netlify.app`

---

## 🖥️ Option 2: Strato mit lokalem CMS

### Voraussetzungen:
- Node.js installiert (einmalig)
- FTP-Client (z.B. FileZilla)
- Ihre Strato FTP-Zugangsdaten

### So bearbeiten Sie Inhalte:

#### Schritt 1: CMS starten
```bash
# Terminal öffnen
cd liefermax-cms
npm run dev
```
- Browser öffnet automatisch: `http://localhost:4321/admin/`

#### Schritt 2: Inhalt bearbeiten
- Gleich wie bei Netlify (siehe oben)
- Änderungen werden lokal gespeichert

#### Schritt 3: Website bauen
```bash
# Im Terminal:
npm run build
```
- Erstellt `dist/` Ordner mit fertiger Website

#### Schritt 4: Via FTP hochladen
1. **FileZilla öffnen**
2. **Verbinden:**
   - Host: `ftp.strato.de`
   - Benutzername: Ihr Strato FTP-User
   - Passwort: Ihr Strato FTP-Passwort
3. **Upload:**
   - Links: Navigieren zu `liefermax-cms/dist/`
   - Rechts: Ihr Webspace-Ordner
   - Alle Dateien markieren → Rechtsklick → Upload
4. **Warten** bis Upload fertig
5. **Testen:** `liefermax.com` öffnen → Änderungen sind live! ✅

---

## 🎨 Option 2 Alternative: WYSIWYG Editor (Einfacher)

### Für wen geeignet?
- Sie möchten **kein Terminal** nutzen
- Sie möchten HTML-Dateien **direkt bearbeiten**
- Sie sind mit FTP vertraut

### BlueGriffon (Kostenloser HTML-Editor)

#### Installation:
1. Download: http://bluegriffon.org/pages/Download
2. Installieren (Windows/Mac/Linux)
3. Programm starten

#### Nutzung:
1. **Datei herunterladen:**
   - FileZilla → Verbinden zu Strato
   - HTML-Datei herunterladen (z.B. `index.html`)

2. **In BlueGriffon öffnen:**
   - Datei → Öffnen → HTML-Datei auswählen
   - Sie sehen die Website wie im Browser

3. **Bearbeiten:**
   - **Text ändern:** Einfach reinschreiben wie in Word
   - **Bild ändern:** Rechtsklick auf Bild → Bild ersetzen
   - **Formatierung:** Toolbar nutzen (Fett, Kursiv, etc.)

4. **Speichern:**
   - Datei → Speichern

5. **Hochladen:**
   - FileZilla → Datei hochladen
   - Alte Datei wird überschrieben

6. **Testen:**
   - `liefermax.com` öffnen → Änderungen sind live! ✅

---

## 📊 Vergleich der Optionen

| Feature | Netlify CMS | Lokales CMS | BlueGriffon |
|---------|-------------|-------------|-------------|
| **Einfachheit** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| **Geschwindigkeit** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐ |
| **Kosten** | Kostenlos | 4-8€/Monat | 4-8€/Monat |
| **Automatisch** | ✅ Ja | ❌ Manuell | ❌ Manuell |
| **Domain-Änderung** | ✅ Nötig | ❌ Nicht nötig | ❌ Nicht nötig |
| **FTP nötig** | ❌ Nein | ✅ Ja | ✅ Ja |
| **Terminal nötig** | ❌ Nein | ✅ Ja | ❌ Nein |

---

## 🆘 Häufige Probleme & Lösungen

### Netlify CMS

**Problem:** "Login funktioniert nicht"
- **Lösung:** Prüfen Sie Spam-Ordner für Einladungs-Email
- **Lösung:** Passwort zurücksetzen

**Problem:** "Änderungen nicht sichtbar"
- **Lösung:** Cache leeren (Strg+F5)
- **Lösung:** 1-2 Minuten warten

**Problem:** "Bild lädt nicht hoch"
- **Lösung:** Bild-Größe reduzieren (max. 5MB)
- **Lösung:** Format prüfen (JPG, PNG, WebP)

### Lokales CMS

**Problem:** "npm run dev funktioniert nicht"
- **Lösung:** `npm install` ausführen
- **Lösung:** Node.js neu installieren

**Problem:** "FTP-Verbindung schlägt fehl"
- **Lösung:** Zugangsdaten prüfen
- **Lösung:** Firewall prüfen

### BlueGriffon

**Problem:** "Design sieht anders aus"
- **Lösung:** Im "WYSIWYG-Modus" arbeiten
- **Lösung:** Nicht im "Source-Modus" bearbeiten

**Problem:** "Bild wird nicht angezeigt"
- **Lösung:** Bild auch via FTP hochladen
- **Lösung:** Bildpfad prüfen

---

## 📞 Support

**Bei technischen Problemen:**
- Email: [Ihr Support-Email]
- Telefon: [Ihre Nummer]

**Dokumentation:**
- Netlify CMS: https://decapcms.org/docs
- FileZilla: https://filezilla-project.org/
- BlueGriffon: http://bluegriffon.org/

---

## ✅ Checkliste: Erste Schritte

### Wenn Sie Netlify wählen:
- [ ] Login-Daten erhalten
- [ ] Erste Anmeldung unter `/admin/`
- [ ] Test-Änderung durchführen
- [ ] Domain bei Strato umstellen
- [ ] Finale Test-Änderung

### Wenn Sie Strato behalten:
- [ ] Entscheiden: Lokales CMS oder BlueGriffon?
- [ ] Software installieren (Node.js oder BlueGriffon)
- [ ] FTP-Zugangsdaten bereithalten
- [ ] Test-Änderung durchführen
- [ ] Upload testen

---

**Viel Erfolg mit Ihrer neuen Website! 🚀**

Bei Fragen stehe ich gerne zur Verfügung.

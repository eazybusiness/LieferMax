# LieferMax Website - HTML-Editor Anleitung für Kunden

## Übersicht

Diese Anleitung erklärt, wie Sie als Kunde Texte, Bilder und Inhalte auf Ihrer LieferMax-Website selbstständig bearbeiten können, ohne Programmierkenntnisse zu benötigen.

---

## 1. Empfohlene HTML-Editoren

### Option 1: Visual Studio Code (Empfohlen) ⭐

**Vorteile:**
- Kostenlos und Open Source
- Sehr benutzerfreundlich
- Live-Vorschau möglich
- Automatische Fehlerprüfung
- Große Community und viele Erweiterungen

**Download:**
- Website: https://code.visualstudio.com/
- Verfügbar für: Windows, macOS, Linux

**Installation:**
1. Download von der Website
2. Installer ausführen
3. Standard-Einstellungen übernehmen
4. Nach Installation starten

**Empfohlene Erweiterungen:**
- **Live Server** (ritwickdey.liveserver) - Für Live-Vorschau
- **HTML CSS Support** - Für bessere HTML-Unterstützung
- **Prettier** - Für automatische Code-Formatierung

### Option 2: Sublime Text

**Vorteile:**
- Sehr schnell und leichtgewichtig
- Einfache Bedienung
- Kostenlos nutzbar (mit gelegentlicher Kauferinnerung)

**Download:**
- Website: https://www.sublimetext.com/
- Verfügbar für: Windows, macOS, Linux

### Option 3: Notepad++ (Nur Windows)

**Vorteile:**
- Sehr einfach und schnell
- Kostenlos
- Geringe Systemanforderungen

**Download:**
- Website: https://notepad-plus-plus.org/
- Nur für Windows

### Option 4: BlueGriffon (WYSIWYG-Editor)

**Vorteile:**
- Visuelle Bearbeitung (wie Word)
- Keine HTML-Kenntnisse nötig
- Kostenlose Version verfügbar

**Nachteil:**
- Kann manchmal Code durcheinanderbringen

**Download:**
- Website: http://www.bluegriffon.org/

---

## 2. Visual Studio Code einrichten (Empfohlen)

### 2.1 Live Server Extension installieren

1. VS Code öffnen
2. Auf das Extensions-Symbol klicken (linke Seitenleiste, 4 Quadrate)
3. Nach "Live Server" suchen
4. "Install" klicken bei "Live Server" von Ritwick Dey
5. VS Code neu starten

### 2.2 Website-Ordner öffnen

1. **File** → **Open Folder**
2. Ordner mit den Website-Dateien auswählen
3. "Select Folder" klicken

### 2.3 Live-Vorschau starten

1. HTML-Datei öffnen (z.B. `index.html`)
2. Rechtsklick in der Datei
3. "Open with Live Server" wählen
4. Browser öffnet sich automatisch mit Vorschau
5. Änderungen werden automatisch im Browser aktualisiert

---

## 3. Website-Dateien von Strato herunterladen

### 3.1 Mit FileZilla (Empfohlen)

**FileZilla installieren:**
- Download: https://filezilla-project.org/download.php?type=client
- Kostenlos für Windows, macOS, Linux

**Verbindung einrichten:**
1. FileZilla öffnen
2. **Datei** → **Servermanager** → **Neuer Server**
3. Einstellungen:
   - **Protokoll**: SFTP - SSH File Transfer Protocol
   - **Server**: Ihr Strato-Servername (z.B. `501****03.ssh.w*.strato.hosting`)
   - **Port**: 22
   - **Verbindungsart**: Normal
   - **Benutzer**: Ihr Strato-Benutzername (z.B. `su******`)
   - **Passwort**: Ihr Strato-Passwort
4. **Verbinden** klicken
5. Beim ersten Mal: Host-Key bestätigen

**Dateien herunterladen:**
1. Rechte Seite: Server-Dateien (navigieren zu `liefermax-website`)
2. Linke Seite: Lokaler Computer (Ordner auswählen)
3. Dateien von rechts nach links ziehen (Download)
4. Kompletten Ordner herunterladen für lokale Bearbeitung

### 3.2 Mit lftp (Für Fortgeschrittene)

```bash
# Verbinden
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22

# Ordner herunterladen
mirror liefermax-website /lokaler/pfad/liefermax-website

# Verbindung beenden
exit
```

---

## 4. Texte bearbeiten

### 4.1 Überschriften ändern

**Beispiel: Hauptüberschrift auf der Startseite**

Datei: `index.html`

**Vorher:**
```html
<h1 class="text-5xl md:text-6xl font-bold mb-6">
    Willkommen bei LieferMax
</h1>
```

**Nachher:**
```html
<h1 class="text-5xl md:text-6xl font-bold mb-6">
    Ihre neue Überschrift hier
</h1>
```

**Wichtig:**
- Nur den Text zwischen `>` und `</h1>` ändern
- Die Klassen (`class="..."`) NICHT ändern
- Die HTML-Tags (`<h1>`, `</h1>`) NICHT löschen

### 4.2 Fließtext ändern

**Beispiel: Absatz-Text**

**Vorher:**
```html
<p class="text-xl text-gray-100 max-w-3xl mx-auto">
    Alter Text hier
</p>
```

**Nachher:**
```html
<p class="text-xl text-gray-100 max-w-3xl mx-auto">
    Neuer Text hier. Kann auch mehrere Sätze enthalten.
</p>
```

### 4.3 Listen bearbeiten

**Beispiel: Feature-Liste**

**Vorher:**
```html
<ul class="space-y-4">
    <li>✓ Feature 1</li>
    <li>✓ Feature 2</li>
    <li>✓ Feature 3</li>
</ul>
```

**Nachher:**
```html
<ul class="space-y-4">
    <li>✓ Neues Feature 1</li>
    <li>✓ Neues Feature 2</li>
    <li>✓ Neues Feature 3</li>
    <li>✓ Neues Feature 4</li>
</ul>
```

**Tipp:** Neue Listenelemente durch Kopieren und Einfügen einer Zeile hinzufügen.

---

## 5. Bilder ändern

### 5.1 Neues Bild hochladen

**Schritt 1: Bild vorbereiten**
- Format: JPG, PNG oder WebP
- Größe: Maximal 2 MB (komprimieren mit https://tinypng.com/)
- Auflösung: 1920x1080px für große Bilder, 800x600px für kleine
- Dateiname: Kleinbuchstaben, keine Leerzeichen (z.B. `produkt-neu.jpg`)

**Schritt 2: Bild in assets/images/ speichern**
- Lokal: Bild in `/assets/images/` Ordner kopieren
- Per FileZilla: Bild in `assets/images/` auf Server hochladen

**Schritt 3: Bild-Pfad in HTML ändern**

**Vorher:**
```html
<img src="assets/images/altes-bild.jpg" alt="Beschreibung">
```

**Nachher:**
```html
<img src="assets/images/neues-bild.jpg" alt="Neue Beschreibung">
```

### 5.2 Bild-Beschreibung (Alt-Text) ändern

**Wichtig für SEO und Barrierefreiheit:**

```html
<img src="assets/images/produkt.jpg" alt="LieferMax Produkt Screenshot">
```

Der `alt`-Text beschreibt das Bild für:
- Suchmaschinen (Google)
- Screenreader (Barrierefreiheit)
- Falls Bild nicht lädt

**Gute Alt-Texte:**
- "LieferMax Dashboard Übersicht"
- "Lieferfahrer mit Smartphone App"
- "Routenplanung auf Karte"

**Schlechte Alt-Texte:**
- "Bild1"
- "IMG_1234"
- "" (leer)

### 5.3 Logo ändern

**Logo-Datei:** `assets/images/logo.jpg`

1. Neues Logo vorbereiten (quadratisch, 200x200px)
2. Als `logo.jpg` speichern
3. Alte `logo.jpg` in `assets/images/` ersetzen
4. Hochladen auf Server

**Oder:** Neuen Dateinamen verwenden:

```html
<!-- In allen HTML-Dateien ändern -->
<img src="assets/images/logo.jpg" alt="LieferMax Logo">
<!-- Zu: -->
<img src="assets/images/neues-logo.png" alt="LieferMax Logo">
```

---

## 6. Links ändern

### 6.1 Interne Links (zu anderen Seiten)

**Beispiel: Navigation**

```html
<a href="products.html">Produkte</a>
<a href="contact.html">Kontakt</a>
<a href="impressum.html">Impressum</a>
```

**Zu bestimmtem Abschnitt springen:**

```html
<a href="products.html#liefermax">Zum LieferMax Produkt</a>
<a href="products.html#check">Zum LM-CHECK Produkt</a>
```

### 6.2 Externe Links (zu anderen Websites)

**Beispiel: App Store Link**

```html
<a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank">
    App herunterladen
</a>
```

**Wichtig:**
- `target="_blank"` öffnet Link in neuem Tab
- Vollständige URL mit `https://` verwenden

### 6.3 E-Mail-Links

```html
<a href="mailto:info@liefermax.com">info@liefermax.com</a>
```

### 6.4 Telefon-Links (für Mobile)

```html
<a href="tel:+4912345678">+49 123 456 78</a>
```

---

## 7. Kontaktformular-E-Mail ändern

**Datei:** `assets/php/contact-form.php`

**Zeile 19 ändern:**

```php
// Alte E-Mail
define('RECIPIENT_EMAIL', 'info@liefermax.com');

// Neue E-Mail
define('RECIPIENT_EMAIL', 'ihre-neue-email@liefermax.com');
```

**Wichtig:**
- E-Mail muss von Ihrer Domain sein (`@liefermax.com`)
- Keine externen E-Mails (`@gmail.com` funktioniert nicht)

---

## 8. Änderungen hochladen

### 8.1 Mit FileZilla

1. FileZilla öffnen und verbinden
2. Geänderte Datei links (lokal) auswählen
3. Auf Server-Ordner rechts ziehen
4. Bei Nachfrage: "Überschreiben" bestätigen
5. Im Browser testen: `https://liefermax.com`

### 8.2 Mehrere Dateien hochladen

1. Alle geänderten Dateien markieren (Strg+Klick)
2. Auf Server ziehen
3. Überschreiben bestätigen

### 8.3 Kompletten Ordner hochladen

1. Rechtsklick auf Ordner (z.B. `assets`)
2. "Upload" wählen
3. Bestätigen

---

## 9. Häufige Aufgaben

### 9.1 Neue Seite hinzufügen

**Schritt 1: Bestehende Seite kopieren**
```bash
cp index.html neue-seite.html
```

**Schritt 2: Inhalt anpassen**
- Titel ändern (`<title>`)
- Überschriften ändern
- Inhalte anpassen

**Schritt 3: In Navigation einfügen**

In allen HTML-Dateien die Navigation erweitern:

```html
<a href="neue-seite.html" class="text-gray-600 hover:text-red-600 font-medium transition">
    Neue Seite
</a>
```

### 9.2 Produkt hinzufügen (auf products.html)

**Produkt-Karte kopieren:**

```html
<!-- Bestehende Produkt-Karte -->
<div class="bg-white rounded-xl shadow-lg p-8 card-hover">
    <div class="text-5xl mb-6">🚚</div>
    <h3 class="text-2xl font-bold mb-4">Produktname</h3>
    <p class="text-gray-600 mb-6">
        Produktbeschreibung hier
    </p>
    <ul class="space-y-3 mb-8">
        <li class="flex items-start">
            <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
            <span>Feature 1</span>
        </li>
        <li class="flex items-start">
            <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
            <span>Feature 2</span>
        </li>
    </ul>
</div>
```

**Anpassen:**
- Emoji ändern (🚚 → 📦)
- Produktname ändern
- Beschreibung ändern
- Features anpassen

### 9.3 Kontaktdaten aktualisieren

**Datei:** `contact.html` und `impressum.html`

**Adresse ändern:**
```html
<p class="text-gray-600">
    Musterstraße 123<br>
    12345 Musterstadt<br>
    Deutschland
</p>
```

**Telefon ändern:**
```html
<a href="tel:+4912345678" class="text-red-600 hover:underline">
    +49 123 456 78
</a>
```

**E-Mail ändern:**
```html
<a href="mailto:info@liefermax.com" class="text-red-600 hover:underline">
    info@liefermax.com
</a>
```

---

## 10. Wichtige Regeln

### ✅ DO (Erlaubt)

- Text zwischen HTML-Tags ändern
- Bilder austauschen (gleiche Größe)
- Links ändern
- Alt-Texte anpassen
- Neue Listenelemente hinzufügen (durch Kopieren)
- Farben in Texten ändern (wenn nötig)

### ❌ DON'T (Vermeiden)

- HTML-Tags löschen (`<div>`, `<section>`, etc.)
- CSS-Klassen ändern (`class="..."`)
- JavaScript-Code ändern (`<script>`)
- Struktur der Seite ändern
- TailwindCSS-CDN-Link ändern
- Font Awesome-Link ändern

### 🚨 Niemals löschen

- `<!DOCTYPE html>`
- `<html>`, `<head>`, `<body>` Tags
- `<meta>` Tags
- `<script>` Tags
- CSS `<style>` Bereiche
- Navigation-Struktur

---

## 11. Fehler beheben

### Problem: Seite sieht kaputt aus

**Ursache:** Wahrscheinlich HTML-Tag oder CSS-Klasse gelöscht

**Lösung:**
1. Änderung rückgängig machen (Strg+Z)
2. Oder: Backup-Version wiederherstellen
3. Oder: Entwickler kontaktieren

### Problem: Bild wird nicht angezeigt

**Checkliste:**
- [ ] Ist der Dateipfad korrekt? (`assets/images/bild.jpg`)
- [ ] Ist das Bild hochgeladen?
- [ ] Ist der Dateiname korrekt geschrieben?
- [ ] Ist die Dateiendung korrekt? (`.jpg`, nicht `.JPG`)

### Problem: Link funktioniert nicht

**Checkliste:**
- [ ] Ist die Ziel-Datei vorhanden?
- [ ] Ist der Pfad korrekt? (`contact.html`, nicht `Contact.html`)
- [ ] Bei externen Links: `https://` vorhanden?

### Problem: Änderungen werden nicht angezeigt

**Lösung:**
1. Browser-Cache leeren (Strg+F5)
2. Prüfen ob Datei wirklich hochgeladen wurde
3. In FileZilla: Zeitstempel der Datei prüfen

---

## 12. Backup erstellen

### Vor jeder Änderung

**Lokal:**
```bash
# Ordner kopieren
cp -r liefermax-website liefermax-website-backup-2026-02-18
```

**Von Server herunterladen:**
1. FileZilla öffnen
2. Kompletten `liefermax-website` Ordner herunterladen
3. Umbenennen in `liefermax-website-backup-DATUM`

**Automatisches Backup-Script:**
```bash
#!/bin/bash
DATE=$(date +%Y-%m-%d)
lftp -u su******,password sftp://server:22 << EOF
mirror liefermax-website backup-$DATE
exit
EOF
```

---

## 13. Checkliste vor dem Hochladen

- [ ] Änderungen lokal getestet (Live Server)
- [ ] Alle Links funktionieren
- [ ] Bilder werden angezeigt
- [ ] Text ist korrekt (Rechtschreibung)
- [ ] Backup erstellt
- [ ] Mobile Ansicht geprüft (Browser-Entwicklertools)
- [ ] Kontaktformular getestet (falls geändert)

---

## 14. Support & Hilfe

### Bei technischen Problemen

1. **Backup wiederherstellen** (siehe Abschnitt 12)
2. **Entwickler kontaktieren**
3. **Strato-Support** (für Server-Probleme): https://www.strato.de/faq/

### Nützliche Links

- **HTML-Tutorial**: https://www.w3schools.com/html/
- **Bild-Komprimierung**: https://tinypng.com/
- **Farben auswählen**: https://coolors.co/
- **Icons**: https://fontawesome.com/icons

---

## 15. Video-Tutorials (Empfohlen)

### Visual Studio Code Grundlagen
- YouTube: "Visual Studio Code Tutorial for Beginners"
- Dauer: ~30 Minuten

### HTML Grundlagen
- YouTube: "HTML Tutorial for Beginners"
- Dauer: ~1 Stunde

### FileZilla Tutorial
- YouTube: "FileZilla Tutorial - How to Upload Files"
- Dauer: ~15 Minuten

---

## Zusammenfassung

**Workflow für Änderungen:**

1. **Backup erstellen** (FileZilla: Ordner herunterladen)
2. **Dateien lokal bearbeiten** (Visual Studio Code)
3. **Lokal testen** (Live Server)
4. **Auf Server hochladen** (FileZilla)
5. **Im Browser testen** (https://liefermax.com)
6. **Bei Problemen**: Backup wiederherstellen

**Bei Unsicherheit:**
- Lieber Entwickler fragen
- Backup immer griffbereit haben
- Kleine Änderungen einzeln hochladen und testen

---

**Erstellt**: Februar 2026  
**Version**: 1.0  
**Projekt**: LieferMax Website Redesign

**Viel Erfolg mit Ihrer Website! 🚀**

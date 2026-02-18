# LieferMax Website - Deployment Zusammenfassung

## Statisches Deployment zu Strato

Die LieferMax-Website ist als **statische HTML-Website** mit PHP-Kontaktformular entwickelt und für Strato-Hosting optimiert.

---

## 📁 Deployment-Dateien

| Datei | Beschreibung |
|-------|--------------|
| `STRATO-DEPLOYMENT.md` | Vollständige Deployment-Anleitung mit lftp |
| `HTML-EDITOR-ANLEITUNG.md` | Kunden-Anleitung für HTML-Editoren und Wartung |
| `deploy-to-strato.sh` | Automatisches Deployment-Script |
| `assets/php/contact-form.php` | Strato-kompatibles Kontaktformular |

---

## 🚀 Quick Start

### 1. Deployment durchführen

```bash
# Script ausführbar machen (bereits erledigt)
chmod +x deploy-to-strato.sh

# Zugangsdaten im Script anpassen
vim deploy-to-strato.sh
# Zeile 31-33: SFTP_USER, SFTP_HOST anpassen

# Deployment starten
./deploy-to-strato.sh
```

### 2. Domain bei Strato konfigurieren

Der Kunde muss im Strato-Kundenlogin:
1. **Domains** → **Domain-Verwaltung**
2. Domain auswählen (z.B. `liefermax.com`)
3. **Zielverzeichnis** auf `/liefermax-website` setzen
4. **Speichern**

### 3. Kontaktformular testen

1. Website aufrufen: `https://liefermax.com/contact.html`
2. Testmail senden
3. Prüfen ob E-Mail ankommt

---

## 📋 Wichtige Strato-Anforderungen

### PHP Mail-Funktion

**Strato erlaubt nur:**
- ✅ `mail()`-Funktion (PHP native)
- ✅ `From`-Header muss von eigener Domain sein (`@liefermax.com`)
- ❌ Externe SMTP-Server (Gmail, etc.) **nicht erlaubt**
- ❌ Externe `From`-Adressen werden blockiert

**Konfiguration in `contact-form.php`:**
```php
// Zeile 19: Empfänger
define('RECIPIENT_EMAIL', 'info@liefermax.com');

// Zeile 160: From muss @liefermax.com sein
$headers[] = 'From: kontakt@liefermax.com';
```

### SFTP-Zugang

**Benötigt vom Kunden:**
- Server: `501****03.ssh.w*.strato.hosting` (individuell)
- Port: `22`
- Benutzername: `su******` (automatisch generiert)
- Passwort: Vom Kunden vergeben
- Typ: **SFTP** (ausreichend für statische Website)

---

## 🛠️ Kunden-Support

### HTML-Editor Empfehlung

**Für den Kunden empfohlen:**
1. **Visual Studio Code** (kostenlos, benutzerfreundlich)
   - Mit Live Server Extension
   - Download: https://code.visualstudio.com/

2. **FileZilla** für SFTP-Upload
   - Download: https://filezilla-project.org/

**Vollständige Anleitung:** `HTML-EDITOR-ANLEITUNG.md`

### Workflow für Kunden

1. **Dateien herunterladen** (FileZilla)
2. **Lokal bearbeiten** (VS Code)
3. **Lokal testen** (Live Server)
4. **Hochladen** (FileZilla)
5. **Online testen** (Browser)

---

## 📦 Deployment-Inhalt

### HTML-Seiten
```
index.html              # Startseite
products.html           # Produkte
contact.html            # Kontakt
integration.html        # Integration
bestell-app.html        # Bestell-App
portal.html             # Portal
weitere-tools.html      # Weitere Tools
impressum.html          # Impressum
datenschutz.html        # Datenschutz
agb.html                # AGB
```

### Assets-Struktur
```
assets/
├── css/                # Stylesheets (inline in HTML)
├── js/                 # JavaScript-Dateien
├── images/             # Bilder, Logo
│   └── logo.jpg
└── php/
    └── contact-form.php  # Kontaktformular
```

---

## ✅ Deployment-Checkliste

### Vor dem Deployment
- [x] Strato SFTP-Zugangsdaten vom Kunden erhalten
- [x] E-Mail-Adresse in `contact-form.php` angepasst
- [x] `From`-Header auf `@liefermax.com` gesetzt
- [x] Alle HTML-Dateien getestet
- [x] Bilder optimiert
- [x] Links geprüft

### Deployment
- [ ] `deploy-to-strato.sh` Zugangsdaten anpassen
- [ ] Script ausführen
- [ ] Erfolgreiche Upload-Bestätigung

### Nach dem Deployment
- [ ] Domain-Ziel bei Strato gesetzt
- [ ] Website erreichbar (https://liefermax.com)
- [ ] Alle Seiten laden
- [ ] Navigation funktioniert
- [ ] Kontaktformular getestet
- [ ] Test-E-Mail erhalten
- [ ] Mobile Version getestet
- [ ] SSL-Zertifikat aktiv

### Kunden-Übergabe
- [ ] `HTML-EDITOR-ANLEITUNG.md` übergeben
- [ ] FileZilla-Zugang eingerichtet
- [ ] VS Code installiert und konfiguriert
- [ ] Erste Änderung gemeinsam durchgeführt
- [ ] Backup-Strategie erklärt

---

## 🔧 Troubleshooting

### Kontaktformular sendet keine E-Mails

**Checkliste:**
1. PHP-Version prüfen: `phpinfo.php` erstellen
2. `From`-Header ist `@liefermax.com`?
3. `RECIPIENT_EMAIL` korrekt?
4. Spam-Ordner prüfen
5. PHP-Fehlerlog prüfen: `error_log` auf Server

### Verbindung schlägt fehl

**Prüfen:**
- Benutzername korrekt?
- Passwort korrekt?
- Server-Hostname korrekt?
- Port 22 erreichbar?
- SFTP-Zugang bei Strato aktiv?

### Änderungen werden nicht angezeigt

**Lösung:**
- Browser-Cache leeren (Strg+F5)
- Datei wirklich hochgeladen?
- Zeitstempel in FileZilla prüfen
- Richtiges Verzeichnis?

---

## 📞 Support-Kontakte

**Strato-Support:**
- Website: https://www.strato.de/faq/
- Telefon: Siehe Strato-Kundenlogin

**Entwickler-Support:**
- Bei technischen Problemen
- Bei Struktur-Änderungen
- Bei komplexen Anpassungen

---

## 🎯 Nächste Schritte

### Sofort
1. Strato-Zugangsdaten vom Kunden erhalten
2. Zugangsdaten in `deploy-to-strato.sh` eintragen
3. Deployment durchführen
4. Domain-Ziel setzen lassen
5. Website testen

### Optional (Zukunft)
- CMS-Integration (WordPress) - siehe `CMS-MIGRATION-PLAN.md`
- Mitgliederbereich - siehe `MEMBERSHIP-ANALYSIS.md`
- Weitere Features nach Kundenwunsch

---

## 📚 Weitere Dokumentation

- `README.md` - Projekt-Übersicht
- `PLANNING.md` - Design-System und Architektur
- `TASK.md` - Aufgabenliste
- `PROJECT-RULES.md` - Entwicklungsrichtlinien
- `STRATO-INSTALLATION.md` - Strato-spezifische Infos

---

**Status**: ✅ Bereit für Deployment  
**Erstellt**: Februar 2026  
**Version**: 1.0

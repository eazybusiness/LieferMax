# LieferMax Website - Strato SFTP Deployment Guide

## Übersicht

Diese Anleitung beschreibt das Deployment der statischen LieferMax-Website auf Strato-Hosting per SFTP mit `lftp`.

---

## 1. Voraussetzungen

### Auf dem lokalen System
- [x] `lftp` installiert (bereits vorhanden)
- [x] Statische HTML-Dateien und Assets bereit
- [x] Git-Repository aktuell

### Vom Kunden benötigt
- [ ] Strato SFTP-Zugangsdaten:
  - Server-Hostname (z.B. `501****03.ssh.w*.strato.hosting`)
  - Benutzername (z.B. `su******`)
  - Passwort
  - Port: 22
- [ ] Domain-Name (z.B. `liefermax.com`)
- [ ] E-Mail-Adresse für Kontaktformular (z.B. `info@liefermax.com`)

---

## 2. Strato SFTP-Zugang einrichten

### 2.1 Kunde muss SFTP-Zugang anlegen

Der Kunde muss im Strato-Kundenlogin einen SFTP-Zugang erstellen:

1. Anmelden bei [STRATO-Kundenlogin](https://www.strato.de/apps/CustomerService)
2. Navigation: **Datenbanken und Webspace** → **SFTP & SSH**
3. Klick auf **+ Neu anlegen**
4. Einstellungen:
   - **Kommentar**: "LieferMax Website"
   - **Passwort**: Sicheres Passwort vergeben
   - **Typ**: SFTP (ausreichend für statische Website)
   - **Startverzeichnis**: Root-Verzeichnis oder spezifischer Ordner
5. **Speichern** - Benutzername wird automatisch generiert

### 2.2 Zugangsdaten notieren

Der Kunde erhält:
- **Server**: z.B. `501****03.ssh.w*.strato.hosting`
- **Port**: `22`
- **Benutzername**: z.B. `su******`
- **Passwort**: Das vergebene Passwort

---

## 3. Lokale Vorbereitung

### 3.1 Dateien für Upload vorbereiten

Die folgenden Dateien müssen hochgeladen werden:

```
liefermax-redesign/
├── index.html
├── products.html
├── contact.html
├── integration.html
├── bestell-app.html
├── portal.html
├── weitere-tools.html
├── impressum.html
├── datenschutz.html
├── agb.html
└── assets/
    ├── css/
    ├── js/
    ├── images/
    └── php/
        └── contact-form.php
```

### 3.2 Kontaktformular konfigurieren

**Wichtig**: Vor dem Upload die E-Mail-Adresse in `assets/php/contact-form.php` anpassen:

```php
// Zeile 19: Empfänger-E-Mail anpassen
define('RECIPIENT_EMAIL', 'info@liefermax.com'); // <- Kunde-E-Mail eintragen

// Zeile 160: From-Adresse muss von der Domain sein
$headers[] = 'From: kontakt@liefermax.com'; // <- Domain-E-Mail verwenden
```

**Strato-Anforderung**: Der `From`-Header muss eine E-Mail-Adresse der eigenen Domain sein (z.B. `kontakt@liefermax.com`). Externe E-Mail-Adressen werden von Strato blockiert.

---

## 4. SFTP-Upload mit lftp

### 4.1 Verbindung testen

Zuerst Verbindung testen:

```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22
```

Nach erfolgreicher Verbindung:
```bash
ls          # Verzeichnisinhalt anzeigen
pwd         # Aktuelles Verzeichnis anzeigen
exit        # Verbindung beenden
```

### 4.2 Verzeichnisstruktur auf Strato erstellen

Option A: Neuen Ordner für die Website erstellen (empfohlen):

```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
mkdir liefermax-website
cd liefermax-website
mkdir assets
cd assets
mkdir css
mkdir js
mkdir images
mkdir php
exit
EOF
```

Option B: In bestehendes Verzeichnis hochladen (z.B. `public_html`):

```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
cd public_html
ls
exit
EOF
```

### 4.3 Dateien hochladen

**Automatisches Upload-Script erstellen:**

Erstelle eine Datei `deploy-to-strato.sh`:

```bash
#!/bin/bash

# Strato SFTP Deployment Script für LieferMax Website
# Verwendung: ./deploy-to-strato.sh

# Konfiguration
SFTP_USER="su******"              # <- Strato Benutzername
SFTP_HOST="501****03.ssh.w*.strato.hosting"  # <- Strato Server
SFTP_PORT="22"
REMOTE_DIR="liefermax-website"    # <- Zielverzeichnis auf Strato
LOCAL_DIR="/home/nop/CascadeProjects/liefermax-redesign"

echo "=========================================="
echo "LieferMax Website - Strato SFTP Deployment"
echo "=========================================="
echo ""
echo "Server: $SFTP_HOST"
echo "User: $SFTP_USER"
echo "Remote Dir: $REMOTE_DIR"
echo ""

# Passwort abfragen
read -sp "Strato SFTP Passwort: " SFTP_PASS
echo ""
echo ""

# Upload mit lftp
lftp -u "$SFTP_USER,$SFTP_PASS" sftp://"$SFTP_HOST:$SFTP_PORT" << EOF
set sftp:auto-confirm yes
set ssl:verify-certificate no

# Ins Zielverzeichnis wechseln
cd $REMOTE_DIR

# HTML-Dateien hochladen
lcd $LOCAL_DIR
mput *.html

# Assets hochladen
mirror -R --verbose --delete-first $LOCAL_DIR/assets assets

# Berechtigungen setzen
chmod 644 *.html
chmod 755 assets
chmod 755 assets/css
chmod 755 assets/js
chmod 755 assets/images
chmod 755 assets/php
chmod 644 assets/php/contact-form.php

# Verzeichnisinhalt anzeigen
ls -la

bye
EOF

echo ""
echo "=========================================="
echo "Deployment abgeschlossen!"
echo "=========================================="
echo ""
echo "Nächste Schritte:"
echo "1. Domain-Ziel bei Strato auf '$REMOTE_DIR' setzen"
echo "2. Website testen: https://liefermax.com"
echo "3. Kontaktformular testen"
echo ""
```

**Script ausführbar machen:**

```bash
chmod +x deploy-to-strato.sh
```

**Deployment durchführen:**

```bash
./deploy-to-strato.sh
```

### 4.4 Manuelle Upload-Befehle (Alternative)

Falls das Script nicht funktioniert, manuell hochladen:

```bash
cd /home/nop/CascadeProjects/liefermax-redesign

lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
cd liefermax-website

# HTML-Dateien hochladen
mput *.html

# Assets-Ordner hochladen (rekursiv)
mirror -R assets assets

# Berechtigungen setzen
chmod 644 *.html
chmod 755 assets
chmod 644 assets/php/contact-form.php

ls -la
exit
EOF
```

---

## 5. Domain-Konfiguration bei Strato

### 5.1 Domain-Ziel ändern

Der Kunde muss im Strato-Kundenlogin das Domain-Ziel anpassen:

1. Anmelden bei [STRATO-Kundenlogin](https://www.strato.de/apps/CustomerService)
2. Navigation: **Domains** → **Domain-Verwaltung**
3. Domain auswählen (z.B. `liefermax.com`)
4. **Zielverzeichnis** ändern auf: `/liefermax-website` (oder gewählter Ordner)
5. **Speichern**

### 5.2 DNS-Propagation

- Änderungen können bis zu 24 Stunden dauern
- In der Regel aktiv nach 1-2 Stunden
- Testen mit: `nslookup liefermax.com`

---

## 6. PHP-Kontaktformular testen

### 6.1 Voraussetzungen prüfen

**Strato PHP-Anforderungen:**
- PHP ist ab Paket "Hosting Starter" verfügbar
- `mail()`-Funktion ist verfügbar
- Externe SMTP-Server sind **nicht** erlaubt
- `From`-Header muss von der eigenen Domain sein

### 6.2 Kontaktformular testen

1. Website aufrufen: `https://liefermax.com/contact.html`
2. Formular ausfüllen und absenden
3. Prüfen ob E-Mail bei `info@liefermax.com` ankommt
4. Prüfen ob Bestätigungsmeldung angezeigt wird

### 6.3 Fehlersuche

Falls E-Mails nicht ankommen:

**A. PHP-Fehlerlog prüfen:**
```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22
cd liefermax-website
get error_log
exit
cat error_log
```

**B. From-Adresse prüfen:**
- Muss `@liefermax.com` sein
- Nicht `@gmail.com` oder andere externe Domains

**C. PHP-Version prüfen:**
Erstelle Datei `phpinfo.php`:
```php
<?php phpinfo(); ?>
```

Upload und aufrufen: `https://liefermax.com/phpinfo.php`

**Wichtig**: Nach Test `phpinfo.php` wieder löschen!

**D. Spam-Ordner prüfen:**
- E-Mails können im Spam-Ordner landen
- Ggf. Absender als vertrauenswürdig markieren

---

## 7. Website-Updates durchführen

### 7.1 Einzelne Datei aktualisieren

```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
cd liefermax-website
put index.html
exit
EOF
```

### 7.2 Komplettes Re-Deployment

```bash
./deploy-to-strato.sh
```

### 7.3 Nur Assets aktualisieren

```bash
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
cd liefermax-website
mirror -R --verbose assets assets
exit
EOF
```

---

## 8. Sicherheit & Best Practices

### 8.1 Dateirechte

**Empfohlene Berechtigungen:**
- HTML-Dateien: `644` (rw-r--r--)
- PHP-Dateien: `644` (rw-r--r--)
- Verzeichnisse: `755` (rwxr-xr-x)
- Bilder/Assets: `644` (rw-r--r--)

**Berechtigungen setzen:**
```bash
chmod 644 *.html
chmod 644 assets/php/*.php
chmod 755 assets
chmod 755 assets/css
chmod 755 assets/js
chmod 755 assets/images
```

### 8.2 .htaccess für zusätzliche Sicherheit

Erstelle `.htaccess` im Root-Verzeichnis:

```apache
# Sicherheitsheader
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
</IfModule>

# PHP-Dateien vor direktem Zugriff schützen (außer contact-form.php)
<FilesMatch "\.php$">
    Order Deny,Allow
    Deny from all
</FilesMatch>
<FilesMatch "contact-form\.php$">
    Order Allow,Deny
    Allow from all
</FilesMatch>

# Verzeichnis-Listing deaktivieren
Options -Indexes

# HTTPS erzwingen (falls SSL-Zertifikat vorhanden)
# <IfModule mod_rewrite.c>
#     RewriteEngine On
#     RewriteCond %{HTTPS} off
#     RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
# </IfModule>
```

### 8.3 Backup-Strategie

**Vor jedem Update:**
```bash
# Backup vom Server herunterladen
lftp -u su******,password sftp://501****03.ssh.w*.strato.hosting:22 << EOF
mirror liefermax-website backup-$(date +%Y%m%d)
exit
EOF
```

---

## 9. Troubleshooting

### Problem: Verbindung schlägt fehl

**Lösung:**
```bash
# Verbindung mit Debug-Modus testen
lftp -d -u su******,password sftp://501****03.ssh.w*.strato.hosting:22
```

Prüfen:
- [ ] Benutzername korrekt?
- [ ] Passwort korrekt?
- [ ] Server-Hostname korrekt?
- [ ] Port 22 erreichbar?
- [ ] Firewall blockiert Port 22?

### Problem: Kontaktformular sendet keine E-Mails

**Checkliste:**
- [ ] PHP-Version >= 7.4?
- [ ] `mail()`-Funktion verfügbar?
- [ ] `From`-Header ist `@liefermax.com`?
- [ ] `RECIPIENT_EMAIL` korrekt gesetzt?
- [ ] Spam-Ordner geprüft?
- [ ] PHP-Fehlerlog geprüft?

### Problem: 403 Forbidden Error

**Lösung:**
```bash
# Dateirechte korrigieren
chmod 644 *.html
chmod 755 assets
```

### Problem: 404 Not Found

**Lösung:**
- Domain-Ziel bei Strato prüfen
- Verzeichnisstruktur auf Server prüfen
- `.htaccess` auf Fehler prüfen

---

## 10. Checkliste für Go-Live

### Vor dem Deployment
- [ ] Alle HTML-Dateien getestet (lokal)
- [ ] Kontaktformular-E-Mail-Adresse angepasst
- [ ] Bilder optimiert (WebP, komprimiert)
- [ ] Links geprüft (keine toten Links)
- [ ] Mobile Responsiveness getestet
- [ ] Browser-Kompatibilität getestet

### Deployment
- [ ] SFTP-Zugangsdaten vom Kunden erhalten
- [ ] Verzeichnisstruktur auf Strato erstellt
- [ ] Dateien hochgeladen
- [ ] Dateirechte gesetzt
- [ ] `.htaccess` hochgeladen

### Nach dem Deployment
- [ ] Domain-Ziel bei Strato gesetzt
- [ ] Website erreichbar (https://liefermax.com)
- [ ] Alle Seiten laden korrekt
- [ ] Navigation funktioniert
- [ ] Kontaktformular getestet
- [ ] Test-E-Mail erhalten
- [ ] Mobile Version getestet
- [ ] SSL-Zertifikat aktiv (HTTPS)

### Kunde informieren
- [ ] Login-Daten dokumentiert
- [ ] HTML-Editor-Anleitung übergeben (siehe KUNDEN-ANLEITUNG.md)
- [ ] Support-Kontakt bereitgestellt
- [ ] Backup-Strategie erklärt

---

## 11. Kontakt & Support

Bei Problemen:
1. Strato-Support kontaktieren: https://www.strato.de/faq/
2. PHP-Fehlerlog prüfen
3. Browser-Konsole auf JavaScript-Fehler prüfen

---

## Anhang: Nützliche lftp-Befehle

```bash
# Verbindung herstellen
lftp -u username,password sftp://host:22

# Verzeichnis wechseln (remote)
cd /pfad/zum/verzeichnis

# Verzeichnis wechseln (lokal)
lcd /lokaler/pfad

# Dateien auflisten (remote)
ls -la

# Dateien auflisten (lokal)
!ls -la

# Einzelne Datei hochladen
put datei.html

# Mehrere Dateien hochladen
mput *.html

# Ordner hochladen (rekursiv)
mirror -R lokaler-ordner remote-ordner

# Datei herunterladen
get datei.html

# Ordner herunterladen (rekursiv)
mirror remote-ordner lokaler-ordner

# Datei löschen
rm datei.html

# Ordner löschen
rm -r ordner

# Berechtigungen ändern
chmod 644 datei.html

# Aktuelles Verzeichnis anzeigen
pwd

# Verbindung beenden
exit
```

---

**Erstellt**: Februar 2026  
**Version**: 1.0  
**Projekt**: LieferMax Website Redesign

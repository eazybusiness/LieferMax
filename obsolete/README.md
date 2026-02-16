# Obsolete Files - Archiv

**Datum**: 5. Februar 2026  
**Grund**: Projekt-Aufräumung - HTML-First Strategie

---

## 📋 Was ist hier drin?

### 🔄 Backup-Dateien (.bak)
- **agb.html.bak** - Vorherige Version
- **bestell-app.html.bak** - Vorherige Version
- **contact.html.bak** - Vorherige Version
- **datenschutz.html.bak** - Vorherige Version
- **impressum.html.bak** - Vorherige Version
- **index.html.bak** - Vorherige Version
- **integration.html.bak** - Vorherige Version
- **portal.html.bak** - Vorherige Version
- **products.html.bak** - Vorherige Version
- **weitere-tools.html.bak** - Vorherige Version

### 📝 Veraltete Planungsdokumente
- **BID.md** - Business Requirements (veraltet)
- **CMS-DECISION.md** - CMS-Entscheidung (WordPress vs. Decap)
- **CONTRIBUTING.md** - Contributing Guidelines (nicht benötigt)
- **DEPLOYMENT.md** - Deployment-Anleitung (veraltet)
- **IMPLEMENTATION-PLAN.md** - Implementierungsplan (Phase 1)
- **MILESTONES.md** - Projekt-Meilensteine (veraltet)
- **NEXT-STEPS.md** - Nächste Schritte (veraltet)
- **PROJECT-STRUCTURE.md** - Projektstruktur (veraltet)
- **QUICK-START.md** - Schnellstart-Anleitung (veraltet)
- **README-WORDPRESS.md** - WordPress README (nicht benötigt)
- **SETUP-INSTRUCTIONS.md** - Setup-Anleitung (veraltet)
- **TESTREPORT.md** - Test-Report (veraltet)
- **UPLOAD-FIX.md** - Upload-Fix (veraltet)
- **WORDPRESS-DEVELOPMENT-PLAN.md** - WordPress-Entwicklungsplan
- **WORDPRESS-IS-RUNNING.md** - WordPress Status (veraltet)
- **XML-CLARIFICATION.md** - XML-Klärung (veraltet)

### 🛠️ Veraltete Skripte & Konfigurationen
- **docker-compose.yml** - Docker-Konfiguration (nicht benötigt)
- **fix-wordpress-permissions.sh** - WordPress Fix-Skript
- **package.json** - Node.js Konfiguration (nicht benötigt)
- **package-lock.json** - Node.js Lock-File (nicht benötigt)
- **setup.sh** - Setup-Skript (veraltet)
- **update-design.sh** - Design-Update-Skript (veraltet)
- **update-navigation.sh** - Navigation-Update-Skript (veraltet)
- **wordpress-setup-guide.sh** - WordPress Setup-Guide

### 📁 Veraltete Verzeichnisse
- **node_modules/** - Node.js Module (nicht benötigt)
- **scraped-content/** - Gescrapte Inhalte (veraltet)
- **scripts/** - Alte Skripte (veraltet)
- **tests/** - Alte Tests (veraltet)
- **wordpress-theme/** - WordPress Theme (nicht benötigt)
- **wordpress-uploads/** - WordPress Uploads (nicht benötigt)

### 📄 Sonstiges
- **Benutzernamen.txt** - Test-Benutzernamen (veraltet)

---

## 🎯 Warum wurden diese Dateien verschoben?

### HTML-First Strategie
Das Projekt wurde von einer WordPress-basierten Lösung zu einer reinen HTML-Lösung umgestellt.

### Aktuelle Architektur
- **Frontend**: Statische HTML-Dateien
- **Styling**: TailwindCSS + Custom CSS
- **Deployment**: GitHub Pages
- **Optional**: Decap CMS (später)

### Nicht mehr benötigt
- WordPress-spezifische Dateien
- Node.js/Build-System
- Docker-Konfigurationen
- Alte Planungsdokumente

---

## ⚠️ Wichtiger Hinweis

**Diese Dateien können gelöscht werden!**

Sie wurden nur zur Sicherheit archiviert. Wenn alles funktioniert, kann dieser Ordner komplett gelöscht werden.

---

## 🔄 Wiederherstellung

Falls doch eine Datei benötigt wird:
```bash
# Beispiel: Wiederherstellung einer Backup-Datei
cp obsolete/index.html.bak index.html

# Beispiel: Wiederherstellung eines Dokuments
cp obsolete/CMS-DECISION.md CMS-DECISION.md
```

---

**Erstellt**: 5. Februar 2026  
**Status**: Archiviert (kann gelöscht werden)

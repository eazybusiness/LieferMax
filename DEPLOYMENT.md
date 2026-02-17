# LieferMax CMS - Deployment Anleitung

## 📦 Projekt-Übersicht

Dieses ist die CMS-Version der LieferMax Website, gebaut mit:
- **Astro** - Modernes Static Site Generator Framework
- **Decap CMS** - Git-basiertes Headless CMS für Content-Verwaltung
- **TailwindCSS v4** - Utility-First CSS Framework
- **TypeScript** - Type-Safe Content Collections

---

## 🗂️ Verzeichnisstruktur

```
liefermax-cms/
├── src/
│   ├── components/          # Wiederverwendbare Komponenten
│   │   ├── Navigation.astro # Haupt-Navigation
│   │   └── Footer.astro     # Footer
│   ├── layouts/             # Layout-Templates
│   │   └── BaseLayout.astro # Basis-Layout mit Meta-Tags
│   ├── pages/               # Seiten (Auto-Routing)
│   │   └── index.astro      # Homepage
│   ├── content/             # Content Collections (Markdown)
│   │   ├── config.ts        # Content Schema Definitionen
│   │   ├── pages/           # Seiten-Inhalte
│   │   ├── products/        # Produkt-Daten
│   │   └── settings/        # Globale Einstellungen
│   └── styles/
│       └── global.css       # Globale Styles + Custom CSS
├── public/
│   ├── admin/               # Decap CMS Admin Panel
│   │   ├── index.html       # CMS Interface
│   │   └── config.yml       # CMS Konfiguration
│   └── assets/
│       └── images/          # Alle Bilder
├── dist/                    # Build Output (nach npm run build)
├── astro.config.mjs         # Astro Konfiguration
├── package.json             # Dependencies
└── tsconfig.json            # TypeScript Config
```

---

## 🚀 SSH-Deployment zum Kunden

### Option 1: Komplettes Projekt (Empfohlen für Entwicklung)

**1. Projekt auf Server kopieren:**
```bash
# Von lokalem Rechner
scp -r liefermax-cms/ user@server:/var/www/liefermax/

# Oder mit rsync (besser für Updates)
rsync -avz --exclude 'node_modules' --exclude 'dist' \
  liefermax-cms/ user@server:/var/www/liefermax/
```

**2. Auf Server Dependencies installieren:**
```bash
ssh user@server
cd /var/www/liefermax
npm install
```

**3. Build erstellen:**
```bash
npm run build
```

**4. Webserver auf `dist/` Ordner zeigen lassen**

---

### Option 2: Nur Build-Output (Empfohlen für Produktion)

**1. Lokal bauen:**
```bash
cd liefermax-cms
npm run build
```

**2. Nur `dist/` Ordner hochladen:**
```bash
# dist/ Ordner enthält die fertige statische Website
scp -r dist/* user@server:/var/www/html/

# Oder mit rsync
rsync -avz --delete dist/ user@server:/var/www/html/
```

**3. Webserver konfigurieren:**
- Nginx/Apache auf `/var/www/html/` zeigen lassen
- Fertig! ✅

---

## 🔧 Webserver-Konfiguration

### Nginx Beispiel:

```nginx
server {
    listen 80;
    server_name liefermax.com www.liefermax.com;
    
    root /var/www/html;
    index index.html;
    
    location / {
        try_files $uri $uri/ =404;
    }
    
    # Gzip Kompression
    gzip on;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;
    
    # Cache für statische Assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

### Apache Beispiel:

```apache
<VirtualHost *:80>
    ServerName liefermax.com
    ServerAlias www.liefermax.com
    DocumentRoot /var/www/html
    
    <Directory /var/www/html>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    # Gzip Kompression
    <IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/json
    </IfModule>
    
    # Cache für statische Assets
    <IfModule mod_expires.c>
        ExpiresActive On
        ExpiresByType image/jpg "access plus 1 year"
        ExpiresByType image/jpeg "access plus 1 year"
        ExpiresByType image/png "access plus 1 year"
        ExpiresByType text/css "access plus 1 month"
        ExpiresByType application/javascript "access plus 1 month"
    </IfModule>
</VirtualHost>
```

---

## 📝 Content-Verwaltung

### Für den Kunden (Manuell):

**1. CMS öffnen:**
- URL: `https://liefermax.com/admin/`
- Mit GitHub Account anmelden (einmalig einrichten)

**2. Content bearbeiten:**
- Seiten auswählen
- Text/Bilder ändern
- Speichern & Publish
- Website wird automatisch neu gebaut

**3. Typische Aufgaben:**
- Text ändern: Seite → Feld bearbeiten → Speichern
- Bild hochladen: Media Library → Upload → Auswählen
- Produkt hinzufügen: Produkte → New → Felder ausfüllen

### Für AI Agent (Automatisiert):

**Via GitHub API:**
```javascript
// Content programmatisch ändern
const octokit = new Octokit({ auth: process.env.GITHUB_TOKEN });

await octokit.repos.createOrUpdateFileContents({
  owner: 'eazybusiness',
  repo: 'LieferMax',
  path: 'src/content/pages/home.md',
  message: 'Update homepage via AI Agent',
  content: Buffer.from(newContent).toString('base64'),
  sha: fileSha,
});
```

---

## 🛠️ Entwicklung

### Lokale Entwicklung starten:

```bash
cd liefermax-cms
npm install
npm run dev
```

Website läuft auf: `http://localhost:4321`

### CMS lokal testen:

```bash
# Terminal 1: Astro Dev Server
npm run dev

# Terminal 2: Decap CMS Proxy
npx decap-server
```

CMS öffnen: `http://localhost:4321/admin/`

### Build testen:

```bash
npm run build
npm run preview
```

---

## 📋 Deployment-Checkliste

### Vor dem Deployment:

- [ ] `npm run build` erfolgreich
- [ ] Alle Bilder in `public/assets/images/`
- [ ] `astro.config.mjs` mit korrekter `site` URL
- [ ] Content Collections vollständig
- [ ] Navigation Links korrekt
- [ ] Meta Tags gesetzt

### Nach dem Deployment:

- [ ] Website lädt korrekt
- [ ] Alle Seiten erreichbar
- [ ] Bilder laden
- [ ] Navigation funktioniert
- [ ] Responsive auf Mobile
- [ ] CMS Admin erreichbar (wenn gewünscht)

---

## 🔄 Update-Workflow

### Content-Updates (ohne Code-Änderungen):

1. Im CMS Content ändern
2. Speichern & Publish
3. Automatischer Build (wenn GitHub Actions konfiguriert)
4. Oder manuell: `npm run build` → `dist/` hochladen

### Code-Updates (Design/Funktionen):

1. Lokal entwickeln: `npm run dev`
2. Testen: `npm run build && npm run preview`
3. Commiten: `git commit -m "Update XYZ"`
4. Auf Server deployen (siehe oben)

---

## 🎯 Vorteile dieser Lösung

### Für den Kunden:
✅ **Einfache Content-Verwaltung** - Kein HTML nötig
✅ **Visueller Editor** - WYSIWYG für Markdown
✅ **Media Library** - Drag & Drop Bild-Upload
✅ **Vorschau** - Änderungen vor Publish prüfen
✅ **Sicher** - Kein direkter Server-Zugriff

### Für AI Agent:
✅ **API-Zugriff** - Programmatische Updates
✅ **Git-basiert** - Versionierung inklusive
✅ **Strukturiert** - Markdown + Frontmatter
✅ **Batch-Updates** - Mehrere Änderungen gleichzeitig

### Technisch:
✅ **Schnell** - Statische HTML-Dateien
✅ **Sicher** - Keine Datenbank, kein PHP
✅ **SEO-optimiert** - Perfect Lighthouse Scores
✅ **Wartbar** - Komponenten-basiert
✅ **Skalierbar** - Einfach erweiterbar

---

## 📞 Support & Dokumentation

**Astro Docs:** https://docs.astro.build
**Decap CMS Docs:** https://decapcms.org/docs
**TailwindCSS Docs:** https://tailwindcss.com/docs

---

## 🚨 Troubleshooting

### Build-Fehler:

**Problem:** `Invalid URL`
**Lösung:** `site` in `astro.config.mjs` setzen

**Problem:** `Module not found`
**Lösung:** `npm install` ausführen

### CMS-Probleme:

**Problem:** CMS lädt nicht
**Lösung:** `public/admin/index.html` und `config.yml` prüfen

**Problem:** Keine Bilder im CMS
**Lösung:** `media_folder` in `config.yml` prüfen

### Deployment-Probleme:

**Problem:** 404 Fehler
**Lösung:** Webserver DocumentRoot auf `dist/` setzen

**Problem:** CSS lädt nicht
**Lösung:** Pfade in `astro.config.mjs` prüfen

---

## 📊 Performance

**Lighthouse Scores (Ziel):**
- Performance: 95+
- Accessibility: 100
- Best Practices: 100
- SEO: 100

**Optimierungen:**
- Statische HTML-Generierung
- Optimierte Bilder (WebP)
- Minified CSS/JS
- Gzip Kompression
- Browser Caching

---

## 🔐 Sicherheit

**Best Practices:**
- Keine Datenbank = Keine SQL Injection
- Statische Files = Keine Code Execution
- Git-basiert = Vollständige Versionierung
- HTTPS erzwingen (Webserver-Konfiguration)
- Regelmäßige npm Updates

---

**Viel Erfolg beim Deployment! 🚀**

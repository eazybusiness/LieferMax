# Deployment-Optionen für LieferMax Astro CMS

## Aktueller Stand
- **Hosting**: Strato Webhosting (nur SFTP-Zugriff)
- **CMS**: Astro + Decap CMS
- **Build**: Generiert statische HTML/CSS/JS Dateien

---

## ✅ Option 1: GitHub Actions + SFTP (EMPFOHLEN)

**Vorteile:**
- ✅ Automatisches Deployment bei Git Push
- ✅ Funktioniert mit Strato SFTP
- ✅ Kostenlos (GitHub Actions)
- ✅ Decap CMS funktioniert (Git-basiert)

**Workflow:**
1. Content-Änderung im Decap CMS → Git Commit
2. GitHub Actions triggert automatisch
3. Build: `npm run build` → `/dist` Ordner
4. SFTP Upload zu Strato
5. Website aktualisiert

**Setup:**
```yaml
# .github/workflows/deploy.yml
name: Deploy to Strato via SFTP

on:
  push:
    branches: [ main ]

jobs:
  build-and-deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      
      - name: Setup Node.js
        uses: actions/setup-node@v4
        with:
          node-version: '20'
          
      - name: Install dependencies
        run: npm ci
        working-directory: ./liefermax-cms
        
      - name: Build
        run: npm run build
        working-directory: ./liefermax-cms
        
      - name: Deploy via SFTP
        uses: SamKirkland/FTP-Deploy-Action@v4.3.5
        with:
          server: ${{ secrets.SFTP_SERVER }}
          username: ${{ secrets.SFTP_USERNAME }}
          password: ${{ secrets.SFTP_PASSWORD }}
          local-dir: ./liefermax-cms/dist/
          server-dir: /
          protocol: ftps
```

**GitHub Secrets einrichten:**
- `SFTP_SERVER`: z.B. `sftp.strato.de`
- `SFTP_USERNAME`: Ihr Strato FTP-Benutzername
- `SFTP_PASSWORD`: Ihr Strato FTP-Passwort

---

## Option 2: Manuelles Deployment

**Für Entwicklung/Testing:**
1. Lokal: `npm run build` im `liefermax-cms` Ordner
2. FTP-Client (FileZilla, Cyberduck): `/dist` Inhalt hochladen
3. Fertig

**Nachteil:** Manueller Aufwand bei jeder Änderung

---

## Option 3: Netlify/Vercel (Alternative Hosting)

**Wenn Strato-Wechsel gewünscht:**

### Netlify (EMPFOHLEN für CMS)
- ✅ **Kostenlos** für kleine Projekte
- ✅ **Decap CMS perfekt integriert** (früher Netlify CMS)
- ✅ **Automatisches Deployment** bei Git Push
- ✅ **CDN inklusive** (schneller als Strato)
- ✅ **HTTPS automatisch**
- ✅ **Eigene Domain** möglich (liefermax.com)
- ❌ Hosting-Wechsel nötig

**Setup:** 
1. Netlify Account erstellen
2. GitHub Repo verbinden
3. Build Command: `npm run build`
4. Publish Directory: `dist`
5. **Fertig!** - Automatisches Deployment

### Vercel
- Ähnlich wie Netlify
- Auch kostenlos für kleine Projekte
- Etwas weniger CMS-fokussiert

---

## Decap CMS Authentifizierung

**Wichtig für alle Optionen:**

Decap CMS braucht **Git-Gateway** für Authentifizierung:

### Mit Netlify (einfachste Lösung):
1. Netlify Identity aktivieren
2. Git Gateway aktivieren
3. Benutzer einladen
4. **Fertig!** - CMS funktioniert unter `/admin`

### Mit Strato + GitHub OAuth:
1. GitHub OAuth App erstellen
2. Backend in `config.yml`:
```yaml
backend:
  name: github
  repo: eazybusiness/LieferMax
  branch: main
```
3. Benutzer brauchen GitHub-Zugriff auf Repo
4. Login über GitHub Account

---

## Kostenvergleich

| Option | Kosten/Monat | Aufwand | CMS-Support |
|--------|--------------|---------|-------------|
| **Strato + GitHub Actions** | ~4-8€ (Strato) | Mittel | ✅ Gut |
| **Netlify Free** | 0€ | Minimal | ✅ Perfekt |
| **Netlify Pro** | $19 | Minimal | ✅ Perfekt |
| **Vercel Free** | 0€ | Minimal | ✅ Gut |

---

## Empfehlung

### Für den Kunden:

**Kurzfristig (jetzt):**
- ✅ **Strato behalten** + GitHub Actions SFTP Deployment
- Funktioniert mit bestehendem Hosting
- Kein Hosting-Wechsel nötig
- Decap CMS mit GitHub OAuth

**Langfristig (optional):**
- 💡 **Wechsel zu Netlify** erwägen
- Bessere CMS-Integration
- Schnelleres Hosting (CDN)
- Einfacheres Deployment
- Möglicherweise günstiger (Free Tier)

---

## Nächste Schritte

1. ✅ **Seiten-Migration abschließen** (products, integration, contact, etc.)
2. ⚙️ **GitHub Actions Workflow einrichten** (SFTP zu Strato)
3. 🧪 **Testen**: Content-Änderung → automatisches Deployment
4. 📋 **Kunde informieren** über Deployment-Prozess
5. 💬 **Optional**: Netlify-Wechsel mit Kunde besprechen

---

## Technische Details

**Astro Build Output:**
```
dist/
├── index.html          # Statische HTML
├── products.html       # Statische HTML
├── assets/
│   ├── images/        # Alle Bilder
│   ├── *.css          # Minified CSS
│   └── *.js           # Minified JS
└── admin/             # Decap CMS Admin Panel
    ├── index.html
    └── config.yml
```

**Strato braucht nur:**
- Webspace für statische Dateien
- SFTP-Zugriff (✅ vorhanden)
- **Kein** Node.js, npm, SSH

**Alles funktioniert!** 🎉

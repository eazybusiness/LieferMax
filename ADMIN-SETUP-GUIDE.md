# Decap CMS Admin-Zugang Einrichtung

## Aktueller Stand (Feb 17, 2026)

✅ **Fertig:**
- Astro-Projekt initialisiert
- Decap CMS konfiguriert
- Index-Seite vollständig migriert (11 Bilder)
- BaseLayout, Navigation, Footer aktualisiert
- Dev-Server läuft auf `http://localhost:4322/`

🔄 **Nächster Schritt:** Admin-Zugang einrichten und testen

---

## Option 1: GitHub OAuth (EMPFOHLEN für Strato)

### Vorteile:
- ✅ Funktioniert mit jedem Hosting (inkl. Strato)
- ✅ Kostenlos
- ✅ Benutzer brauchen GitHub-Account
- ✅ Volle Git-Kontrolle

### Schritte:

#### 1. GitHub OAuth App erstellen

1. Gehe zu: https://github.com/settings/developers
2. Klicke auf "New OAuth App"
3. Fülle aus:
   - **Application name**: `LieferMax CMS`
   - **Homepage URL**: `https://eazybusiness.github.io/LieferMax/` (oder Ihre Domain)
   - **Authorization callback URL**: `https://api.netlify.com/auth/done`
   - **Application description**: `Content Management System für LieferMax Website`
4. Klicke "Register application"
5. **Notiere:**
   - Client ID (z.B. `Iv1.abc123def456`)
   - Client Secret (z.B. `1234567890abcdef...`)

#### 2. Netlify OAuth Gateway einrichten

**Warum Netlify?** Auch wenn Sie auf Strato hosten, brauchen Sie Netlify nur für die OAuth-Authentifizierung (kostenlos).

1. Gehe zu: https://app.netlify.com/
2. Erstelle kostenlosen Account
3. Gehe zu: https://app.netlify.com/sites/YOUR-SITE/settings/identity
4. Aktiviere "Identity" (kostenlos)
5. Unter "Services" → "Git Gateway" → "Enable Git Gateway"
6. Füge GitHub OAuth Credentials hinzu:
   - Client ID: `[von Schritt 1]`
   - Client Secret: `[von Schritt 1]`

#### 3. Decap CMS Config aktualisieren

Datei: `liefermax-cms/public/admin/config.yml`

```yaml
backend:
  name: github
  repo: eazybusiness/LieferMax
  branch: main
  base_url: https://api.netlify.com
  auth_endpoint: auth

# Rest bleibt gleich
local_backend: true
media_folder: "public/assets/images"
public_folder: "/assets/images"
locale: "de"
# ... collections ...
```

#### 4. Benutzer einladen

**Option A: GitHub Repo-Zugriff**
1. Gehe zu: https://github.com/eazybusiness/LieferMax/settings/access
2. Lade Kunde als Collaborator ein
3. Kunde braucht GitHub-Account

**Option B: Netlify Identity**
1. In Netlify: Settings → Identity → Invite users
2. E-Mail-Adresse des Kunden eingeben
3. Kunde erhält Einladung per E-Mail

#### 5. Testen

1. Öffne: `https://eazybusiness.github.io/LieferMax/admin/`
2. Klicke "Login with GitHub"
3. Autorisiere die App
4. Du solltest das CMS Dashboard sehen
5. Bearbeite die Index-Seite
6. Speichere → Git Commit wird erstellt
7. Prüfe GitHub: Neuer Commit sollte da sein

---

## Option 2: Netlify Identity (EINFACHER, aber Hosting-Wechsel)

### Vorteile:
- ✅ Einfachste Einrichtung
- ✅ Keine GitHub-Accounts nötig
- ✅ E-Mail-basierte Einladungen
- ✅ Perfekte CMS-Integration
- ❌ Erfordert Netlify-Hosting (Wechsel von Strato)

### Schritte:

#### 1. Netlify Site erstellen

1. Gehe zu: https://app.netlify.com/
2. "Add new site" → "Import an existing project"
3. Verbinde GitHub Repo: `eazybusiness/LieferMax`
4. Build Settings:
   - **Base directory**: `liefermax-cms`
   - **Build command**: `npm run build`
   - **Publish directory**: `liefermax-cms/dist`
5. "Deploy site"

#### 2. Netlify Identity aktivieren

1. Site Settings → Identity → "Enable Identity"
2. Settings → Identity → "Registration" → "Invite only"
3. Settings → Identity → "Git Gateway" → "Enable Git Gateway"

#### 3. Decap CMS Config aktualisieren

```yaml
backend:
  name: git-gateway
  branch: main

# Rest bleibt gleich
```

#### 4. Benutzer einladen

1. Identity → "Invite users"
2. E-Mail des Kunden eingeben
3. Kunde erhält Einladung
4. Kunde erstellt Passwort
5. Kann sich unter `/admin` einloggen

---

## Lokale Entwicklung

Für lokales Testen (ohne GitHub OAuth):

```bash
# Terminal 1: Astro Dev Server
cd liefermax-cms
npm run dev

# Terminal 2: Decap CMS Proxy (für lokales Backend)
npx decap-server
```

Dann öffne: `http://localhost:4322/admin/`

**Hinweis:** Im lokalen Modus werden Änderungen direkt in Dateien geschrieben (kein Git).

---

## Test-Checkliste

Nach Admin-Einrichtung testen:

- [ ] Login funktioniert
- [ ] CMS Dashboard lädt
- [ ] Index-Seite ist sichtbar und editierbar
- [ ] Alle Felder sind vorhanden:
  - [ ] Titel, Beschreibung
  - [ ] Hero Titel, Untertitel, Badge
  - [ ] Hero Stats (2 Einträge)
  - [ ] Screenshots (4 Bilder)
  - [ ] Produkte (6 Einträge)
  - [ ] COPA Integration (Titel, Beschreibung, 3 Features)
  - [ ] Body (Markdown)
- [ ] Text-Änderung speichern
- [ ] Bild hochladen/ändern
- [ ] Git Commit wird erstellt
- [ ] Änderungen sind auf GitHub sichtbar
- [ ] Website wird neu gebaut (GitHub Actions oder Netlify)
- [ ] Änderungen sind live sichtbar

---

## Troubleshooting

### Problem: "Error loading config.yml"
**Lösung:** Prüfe YAML-Syntax in `public/admin/config.yml`

### Problem: "Login failed"
**Lösung:** 
- Prüfe GitHub OAuth Credentials
- Prüfe Callback URL
- Prüfe Netlify Git Gateway Status

### Problem: "Cannot save changes"
**Lösung:**
- Prüfe GitHub Repo-Zugriff
- Prüfe Branch-Name (main vs master)
- Prüfe Netlify Git Gateway

### Problem: "Images not uploading"
**Lösung:**
- Prüfe `media_folder` und `public_folder` in config.yml
- Prüfe Schreibrechte auf GitHub Repo

---

## Nächste Schritte nach erfolgreichem Test

1. ✅ Admin funktioniert → Alle anderen Seiten migrieren
2. 📋 Migration-Reihenfolge:
   - products.html (20 Bilder, komplex)
   - integration.html
   - contact.html
   - agb.html, datenschutz.html, impressum.html (einfach)
3. 💾 SFTP-Backup der Live-Site erstellen
4. 📅 Deployment-Plan mit Kunde abstimmen
5. 🚀 GitHub Actions SFTP Workflow implementieren
6. 🎉 Go-Live

---

## Kontakt & Support

**GitHub Repo:** https://github.com/eazybusiness/LieferMax
**Decap CMS Docs:** https://decapcms.org/docs/
**Netlify Docs:** https://docs.netlify.com/

Bei Problemen: Prüfe Browser-Konsole (F12) für Fehlermeldungen.

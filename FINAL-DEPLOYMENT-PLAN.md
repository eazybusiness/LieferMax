# LieferMax - Final Deployment Plan

**Erstellt:** 17. Februar 2026  
**Status:** Ready for Implementation

---

## 🎯 Deployment-Strategie

### Primäre Option: Netlify (Empfohlen)
**Kostenlos, automatisch, CMS-integriert**

### Fallback Option: Statische HTML für Strato
**Falls Kunde Domain nicht umstellen möchte**

---

## 📦 Option 1: Netlify Deployment (EMPFOHLEN)

### Vorteile für den Kunden:
- ✅ **Kostenlos** (Netlify Free Tier: 100GB Bandbreite/Monat)
- ✅ **Schneller** als Strato (globales CDN)
- ✅ **Einfaches CMS** - Texte/Bilder ändern ohne HTML-Kenntnisse
- ✅ **Automatische Updates** - Änderung im CMS → 30 Sekunden → Live
- ✅ **Automatisches HTTPS**
- ✅ **Eigene Domain** möglich (liefermax.com)

### Was der Kunde tun muss:
1. **Domain umstellen** (bei Strato DNS-Einstellungen):
   - A-Record auf Netlify IP: `75.2.60.5`
   - Oder CNAME auf: `[site-name].netlify.app`
2. **Login-Daten erhalten** (von dir)
3. **Fertig!** - CMS unter `liefermax.com/admin/` nutzen

### Deployment-Schritte:

#### 1. Netlify Account & Site erstellen
```bash
# Netlify CLI installieren (einmalig)
npm install -g netlify-cli

# In Projekt-Ordner
cd /home/nop/CascadeProjects/liefermax-redesign/liefermax-cms

# Netlify Login
netlify login

# Neue Site erstellen
netlify init
```

**Einstellungen:**
- Build Command: `npm run build`
- Publish Directory: `dist`
- Site Name: `liefermax` (oder verfügbarer Name)

#### 2. Netlify Identity & Git Gateway aktivieren
```bash
# In Netlify Dashboard:
# 1. Site Settings → Identity → Enable Identity
# 2. Settings → Identity → Services → Git Gateway → Enable
# 3. Identity → Invite users → Kunde's Email
```

#### 3. CMS Config anpassen
Datei: `public/admin/config.yml`
```yaml
backend:
  name: git-gateway
  branch: main

media_folder: "public/assets/images"
public_folder: "/assets/images"

collections:
  - name: "pages"
    label: "Seiten"
    files:
      - label: "Startseite"
        name: "home"
        file: "src/content/pages/home.md"
        fields:
          - {label: "Titel", name: "title", widget: "string"}
          - {label: "Beschreibung", name: "description", widget: "text"}
          - {label: "Inhalt", name: "body", widget: "markdown"}
```

#### 4. Automatisches Deployment
```bash
# Push zu GitHub
git add .
git commit -m "feat: configure for Netlify deployment"
git push origin main

# Netlify baut automatisch bei jedem Push
```

#### 5. Custom Domain einrichten
**Im Netlify Dashboard:**
- Site Settings → Domain Management → Add Custom Domain
- Domain: `liefermax.com` oder `www.liefermax.com`
- DNS-Anweisungen für Kunde dokumentieren

---

## 📦 Option 2: Statische HTML für Strato (Fallback)

### Für wen geeignet?
- Kunde möchte **nicht** Domain umstellen
- Kunde möchte bei Strato bleiben
- Seltene Content-Updates (1-2x pro Monat)

### Content-Bearbeitung ohne HTML-Kenntnisse:

#### A) Lokaler WYSIWYG Editor (Einfachste Lösung)
**BlueGriffon** (kostenlos, WYSIWYG HTML Editor):
- Download: http://bluegriffon.org/
- HTML-Datei öffnen
- Text/Bilder wie in Word bearbeiten
- Speichern → via FTP zu Strato hochladen

#### B) Online HTML Editor
**HTML-Online.com/editor/**:
- HTML-Code einfügen
- Visuell bearbeiten
- Code kopieren → in Datei speichern → hochladen

#### C) CMS lokal + manueller Upload
```bash
# 1. Lokal CMS nutzen
cd liefermax-cms
npm run dev
# CMS öffnen: http://localhost:4321/admin/

# 2. Content bearbeiten

# 3. Build erstellen
npm run build

# 4. dist/ Ordner via FTP zu Strato hochladen
```

### Statischer Export-Script
Erstelle: `export-static.sh`
```bash
#!/bin/bash
# Statischen Export für Strato erstellen

cd liefermax-cms

echo "📦 Building static site..."
npm run build

echo "📁 Creating export package..."
cd dist
zip -r ../liefermax-static-$(date +%Y%m%d).zip .
cd ..

echo "✅ Export fertig: liefermax-static-$(date +%Y%m%d).zip"
echo "📤 Inhalt via FTP zu Strato hochladen"
```

**Nutzung:**
```bash
chmod +x export-static.sh
./export-static.sh
# → Erstellt ZIP-Datei
# → Kunde entpackt und lädt via FTP hoch
```

---

## 🔄 Content-Update Workflows

### Mit Netlify (Option 1):
```
Kunde loggt in CMS ein (liefermax.com/admin/)
         ↓
Text/Bild ändern im visuellen Editor
         ↓
"Publish" klicken
         ↓
30 Sekunden warten
         ↓
✅ Live auf liefermax.com
```

### Mit Strato + lokalem CMS (Option 2):
```
Kunde öffnet lokales CMS (localhost:4321/admin/)
         ↓
Text/Bild ändern
         ↓
Build erstellen (npm run build)
         ↓
FTP-Client öffnen (FileZilla)
         ↓
dist/ Ordner hochladen
         ↓
✅ Live auf liefermax.com
```

### Mit Strato + WYSIWYG Editor (Option 2 einfach):
```
Kunde öffnet BlueGriffon
         ↓
HTML-Datei von Strato herunterladen
         ↓
Text/Bild ändern (wie in Word)
         ↓
Speichern
         ↓
Via FTP hochladen
         ↓
✅ Live auf liefermax.com
```

---

## 💰 Kostenvergleich

| Option | Hosting | Kosten/Monat | CMS | Aufwand |
|--------|---------|--------------|-----|---------|
| **Netlify** | Netlify | 0€ | ✅ Integriert | Minimal |
| **Strato + CMS lokal** | Strato | 4-8€ | ✅ Lokal | Mittel |
| **Strato + WYSIWYG** | Strato | 4-8€ | ❌ Manuell | Hoch |

---

## 📋 Empfehlung für den Kunden

### Szenario A: Kunde ist technik-affin
→ **Netlify** (Option 1)
- Einfachstes CMS
- Keine FTP-Kenntnisse nötig
- Automatisch, schnell, kostenlos

### Szenario B: Kunde möchte bei Strato bleiben
→ **Strato + lokales CMS** (Option 2C)
- CMS-Komfort behalten
- Manueller Upload nötig
- Etwas mehr Aufwand

### Szenario C: Kunde möchte minimale Technik
→ **Strato + BlueGriffon** (Option 2A)
- WYSIWYG wie Word
- Kein Terminal, kein npm
- Einfach für nicht-technische User

---

## 🚀 Nächste Schritte

### Phase 1: Netlify Setup (Empfohlen)
1. ✅ CMS-Migration abschließen (alle Seiten)
2. ✅ Netlify Account erstellen
3. ✅ Site deployen
4. ✅ Netlify Identity konfigurieren
5. ✅ Kunde einladen & testen
6. ✅ Custom Domain einrichten (optional)

### Phase 2: Dokumentation
1. ✅ Anleitung für Kunde: "CMS nutzen"
2. ✅ Anleitung: "Domain zu Netlify umstellen"
3. ✅ Fallback-Anleitung: "Statischer Export für Strato"
4. ✅ Video-Tutorial aufnehmen (optional)

### Phase 3: Übergabe
1. ✅ Kunde Login-Daten geben
2. ✅ Gemeinsam erste Änderung testen
3. ✅ Entscheidung: Netlify oder Strato?
4. ✅ Bei Netlify: Domain umstellen
5. ✅ Bei Strato: Export-Script übergeben

---

## 📞 Support-Optionen für Kunde

### Netlify CMS (Option 1):
- **Dokumentation:** Decap CMS Docs (https://decapcms.org/docs)
- **Video-Tutorials:** YouTube "Netlify CMS Tutorial"
- **Support:** Netlify Community Forum

### WYSIWYG Editor (Option 2):
- **BlueGriffon:** http://bluegriffon.org/pages/Download
- **Tutorial:** "BlueGriffon Basics" auf YouTube
- **Alternative:** Adobe Dreamweaver (kostenpflichtig)

---

## ✅ Erfolgsmetriken

**Netlify Deployment erfolgreich wenn:**
- [ ] Site läuft auf `[name].netlify.app`
- [ ] CMS erreichbar unter `/admin/`
- [ ] Kunde kann einloggen
- [ ] Content-Änderung → automatisch live
- [ ] Custom Domain funktioniert (optional)

**Strato Fallback erfolgreich wenn:**
- [ ] Statischer Export funktioniert
- [ ] Kunde kann HTML-Dateien bearbeiten
- [ ] FTP-Upload funktioniert
- [ ] Site läuft auf Strato

---

## 🎯 Finale Entscheidung

**Ich empfehle:** Netlify (Option 1)

**Begründung:**
1. **Kostenlos** statt 4-8€/Monat
2. **Schneller** (CDN vs. Shared Hosting)
3. **Einfacher** für Kunde (kein FTP)
4. **Professioneller** (automatische Deployments)
5. **Zukunftssicher** (einfach erweiterbar)

**Kunde kann jederzeit wechseln:**
- Netlify → Strato: Statischen Export nutzen
- Strato → Netlify: Domain umstellen

---

**Bereit für Implementation! 🚀**

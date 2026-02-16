# LieferMax WordPress - Quick Start Guide

**WordPress läuft ✅ → Jetzt konfigurieren**

---

## 🚀 Schnellstart (5 Minuten)

```bash
# Interaktiven Setup-Assistenten starten
./wordpress-setup-guide.sh
```

**Oder manuell:**

---

## 📋 Checkliste

### ✅ Step 1: WordPress installiert
WordPress läuft auf: **http://localhost:8080**

---

### 🎨 Step 2: Theme aktivieren

```
http://localhost:8080/wp-admin
→ Design → Themes
→ "LieferMax Redesign" aktivieren
```

---

### 📥 Step 3: XML importieren

```
Dashboard → Werkzeuge → Daten importieren
→ WordPress Importer installieren
→ Datei: client_input/liefermaxgfgh...xml
→ ✓ Anhänge herunterladen
→ Absenden
```

**Ergebnis**: 17 Seiten importiert

---

### 🔗 Step 4: Permalinks

```
Dashboard → Einstellungen → Permalinks
→ "Beitragsname"
→ Speichern
```

---

### 📱 Step 5: Menü erstellen

```
Dashboard → Design → Menüs
→ "Hauptmenü" erstellen
→ Seiten hinzufügen:
  - LieferMax
  - LieferMax-CHECK
  - LieferMax-MAP
  - ShopWare & WooCommerce
  - Bestell App
  - Kontakt
→ Position: "Primary Menu"
→ Speichern
```

---

### 🎨 Step 6: Logo hochladen

```
Dashboard → Design → Customizer
→ Website-Identität
→ Logo: wordpress-theme/assets/images/logo.png
→ Veröffentlichen
```

---

### 🌐 Step 7: ngrok Demo

```bash
# In neuem Terminal:
ngrok http 8080

# Notiere URL: https://abc123.ngrok.io
```

```
Dashboard → Einstellungen → Allgemein
→ WordPress-Adresse: https://abc123.ngrok.io
→ Website-Adresse: https://abc123.ngrok.io
→ Speichern
```

**Demo-Link**: https://abc123.ngrok.io

---

### 🧪 Step 8: Tests

```bash
# Test-Suite öffnen
cat tests/test-suite.md

# Seiten testen:
- / (Homepage)
- /liefermax/
- /liefermax-check/
- /liefermax-map/
- /weitere-tools/
- /bestell-app/
- /kontakt/
```

**Prüfen**:
- ✓ Logo sichtbar
- ✓ Farben schlicht (Grau + Rot-Akzent)
- ✓ Navigation funktioniert
- ✓ Mobile Menu (Hamburger)
- ✓ Responsive Design

---

## 🎯 Fertig!

**Demo-Link an Kunde senden**: https://abc123.ngrok.io

---

## 📞 Hilfe

**Detaillierte Anleitung**: `NEXT-STEPS.md`  
**Interaktiver Assistent**: `./wordpress-setup-guide.sh`  
**Test-Suite**: `tests/test-suite.md`  
**Troubleshooting**: `SETUP-INSTRUCTIONS.md`

---

**Viel Erfolg! 🚀**

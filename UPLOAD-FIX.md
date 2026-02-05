# WordPress Upload-Permissions Fix

**Problem**: `wp-content/uploads/2026/02 kann nicht angelegt werden`  
**Status**: ✅ GEFIXT

---

## 🔧 Lösung

Das Problem sind die Berechtigungen im Docker-Container. WordPress kann keine Verzeichnisse erstellen.

### Automatischer Fix (ausgeführt)

```bash
# Berechtigungen wurden bereits fixt:
sudo docker exec liefermax-wordpress chown -R www-data:www-data /var/www/html/wp-content
sudo docker exec liefermax-wordpress chmod -R 755 /var/www/html/wp-content
sudo docker exec liefermax-wordpress mkdir -p /var/www/html/wp-content/uploads/2026/02
```

### Für zukünftige Probleme

```bash
# Fix-Script ausführen
./fix-wordpress-permissions.sh
```

---

## 🚀 WordPress Installation fortsetzen

**Öffnen Sie**: http://localhost:8080

Die WordPress-Installation sollte jetzt ohne Fehler durchlaufen!

---

## 📋 Installationsschritte

1. **Sprache**: Deutsch wählen
2. **Datenbank**: Weiter (ist vorkonfiguriert)
3. **Website-Info**:
   - Titel: `LieferMax`
   - Benutzer: `admin`
   - Passwort: [Sicheres Passwort]
   - E-Mail: `info@liefermax.com`
4. **Installieren** → **Anmelden**

---

## 🎯 Nach der Installation

Nach erfolgreicher Installation:

```bash
# Setup-Assistent starten
./wordpress-setup-guide.sh
```

Oder manuell:
1. **Theme aktivieren**: Design → Themes → LieferMax Redesign
2. **XML importieren**: Werkzeuge → Daten importieren
3. **Menüs konfigurieren**: Design → Menüs
4. **Logo hochladen**: Design → Customizer

---

## 🐛 Troubleshooting

### Falls das Problem wieder auftritt

```bash
# Fix erneut ausführen
./fix-wordpress-permissions.sh

# Oder manuell:
sudo docker exec liefermax-wordpress chown -R www-data:www-data /var/www/html/wp-content
sudo docker exec liefermax-wordpress chmod -R 755 /var/www/html/wp-content
```

### Falls Container nicht läuft

```bash
# Container neu starten
sudo docker-compose up -d

# Dann Fix ausführen
./fix-wordpress-permissions.sh
```

---

## ✅ Status

- [x] Docker-Container laufen
- [x] Upload-Verzeichnisse mit korrekten Berechtigungen
- [x] WordPress bereit für Installation
- [x] Fix-Script erstellt

---

**🎉 WordPress ist jetzt bereit für die Installation!**

#!/bin/bash

################################################################################
# LieferMax Website - Strato SFTP Deployment Script
################################################################################
#
# Dieses Script lädt die statische LieferMax-Website per SFTP auf Strato hoch.
# 
# Verwendung:
#   1. Script ausführbar machen: chmod +x deploy-to-strato.sh
#   2. Zugangsdaten unten anpassen
#   3. Script ausführen: ./deploy-to-strato.sh
#
# Voraussetzungen:
#   - lftp installiert (bereits vorhanden)
#   - Strato SFTP-Zugangsdaten
#
################################################################################

set -e  # Bei Fehler abbrechen

# Farben für Output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

################################################################################
# KONFIGURATION - HIER ANPASSEN
################################################################################

# Strato SFTP-Zugangsdaten (vom Kunden erhalten)
SFTP_USER="su******"                                    # <- Strato Benutzername
SFTP_HOST="501****03.ssh.w*.strato.hosting"           # <- Strato Server
SFTP_PORT="22"
REMOTE_DIR="liefermax-website"                         # <- Zielverzeichnis auf Strato

# Lokales Projektverzeichnis
LOCAL_DIR="/home/nop/CascadeProjects/liefermax-redesign"

# Dateien die hochgeladen werden sollen
HTML_FILES="*.html"
ASSETS_DIR="assets"

################################################################################
# FUNKTIONEN
################################################################################

print_header() {
    echo -e "${BLUE}=========================================="
    echo -e "LieferMax Website - Strato SFTP Deployment"
    echo -e "==========================================${NC}"
    echo ""
}

print_info() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

check_prerequisites() {
    print_info "Prüfe Voraussetzungen..."
    
    # lftp installiert?
    if ! command -v lftp &> /dev/null; then
        print_error "lftp ist nicht installiert!"
        echo "Bitte installieren: sudo apt install lftp"
        exit 1
    fi
    print_success "lftp ist installiert"
    
    # Lokales Verzeichnis existiert?
    if [ ! -d "$LOCAL_DIR" ]; then
        print_error "Lokales Verzeichnis nicht gefunden: $LOCAL_DIR"
        exit 1
    fi
    print_success "Lokales Verzeichnis gefunden"
    
    # HTML-Dateien vorhanden?
    if ! ls $LOCAL_DIR/*.html 1> /dev/null 2>&1; then
        print_error "Keine HTML-Dateien gefunden in: $LOCAL_DIR"
        exit 1
    fi
    print_success "HTML-Dateien gefunden"
    
    # Assets-Ordner vorhanden?
    if [ ! -d "$LOCAL_DIR/assets" ]; then
        print_error "Assets-Ordner nicht gefunden: $LOCAL_DIR/assets"
        exit 1
    fi
    print_success "Assets-Ordner gefunden"
    
    echo ""
}

show_config() {
    print_info "Deployment-Konfiguration:"
    echo "  Server:      $SFTP_HOST"
    echo "  Port:        $SFTP_PORT"
    echo "  Benutzer:    $SFTP_USER"
    echo "  Remote Dir:  $REMOTE_DIR"
    echo "  Local Dir:   $LOCAL_DIR"
    echo ""
}

get_password() {
    # Passwort sicher abfragen
    read -sp "$(echo -e ${YELLOW}Strato SFTP Passwort eingeben: ${NC})" SFTP_PASS
    echo ""
    echo ""
    
    if [ -z "$SFTP_PASS" ]; then
        print_error "Kein Passwort eingegeben!"
        exit 1
    fi
}

test_connection() {
    print_info "Teste SFTP-Verbindung..."
    
    # Verbindungstest
    if lftp -u "$SFTP_USER,$SFTP_PASS" sftp://"$SFTP_HOST:$SFTP_PORT" << EOF > /dev/null 2>&1
set sftp:auto-confirm yes
set ssl:verify-certificate no
pwd
bye
EOF
    then
        print_success "Verbindung erfolgreich!"
    else
        print_error "Verbindung fehlgeschlagen!"
        echo "Bitte prüfen:"
        echo "  - Benutzername korrekt?"
        echo "  - Passwort korrekt?"
        echo "  - Server erreichbar?"
        exit 1
    fi
    echo ""
}

create_remote_structure() {
    print_info "Erstelle Verzeichnisstruktur auf Server..."
    
    lftp -u "$SFTP_USER,$SFTP_PASS" sftp://"$SFTP_HOST:$SFTP_PORT" << EOF
set sftp:auto-confirm yes
set ssl:verify-certificate no

# Hauptverzeichnis erstellen (falls nicht vorhanden)
mkdir -p $REMOTE_DIR
cd $REMOTE_DIR

# Assets-Struktur erstellen
mkdir -p assets
mkdir -p assets/css
mkdir -p assets/js
mkdir -p assets/images
mkdir -p assets/php

bye
EOF
    
    print_success "Verzeichnisstruktur erstellt"
    echo ""
}

upload_files() {
    print_info "Starte Datei-Upload..."
    echo ""
    
    lftp -u "$SFTP_USER,$SFTP_PASS" sftp://"$SFTP_HOST:$SFTP_PORT" << EOF
set sftp:auto-confirm yes
set ssl:verify-certificate no
set xfer:clobber on

# Ins Zielverzeichnis wechseln
cd $REMOTE_DIR

# Lokales Verzeichnis setzen
lcd $LOCAL_DIR

# HTML-Dateien hochladen
echo "Uploading HTML files..."
mput -O . *.html

# Assets hochladen (rekursiv mit mirror)
echo "Uploading assets..."
mirror -R --verbose --delete-first --parallel=3 assets assets

# Berechtigungen setzen
echo "Setting permissions..."
chmod 644 *.html
chmod 755 assets
chmod 755 assets/css
chmod 755 assets/js
chmod 755 assets/images
chmod 755 assets/php
chmod 644 assets/php/contact-form.php

# Verzeichnisinhalt anzeigen
echo "Remote directory contents:"
ls -lah

bye
EOF
    
    if [ $? -eq 0 ]; then
        print_success "Alle Dateien erfolgreich hochgeladen!"
    else
        print_error "Fehler beim Upload!"
        exit 1
    fi
    echo ""
}

show_summary() {
    echo ""
    print_header
    print_success "Deployment erfolgreich abgeschlossen!"
    echo ""
    echo -e "${GREEN}✓${NC} HTML-Dateien hochgeladen"
    echo -e "${GREEN}✓${NC} Assets hochgeladen"
    echo -e "${GREEN}✓${NC} Berechtigungen gesetzt"
    echo ""
    echo -e "${YELLOW}Nächste Schritte:${NC}"
    echo "  1. Domain-Ziel bei Strato auf '$REMOTE_DIR' setzen"
    echo "  2. Website testen: https://liefermax.com"
    echo "  3. Kontaktformular testen"
    echo "  4. Mobile Ansicht prüfen"
    echo ""
    echo -e "${BLUE}Dokumentation:${NC}"
    echo "  - STRATO-DEPLOYMENT.md (Deployment-Anleitung)"
    echo "  - HTML-EDITOR-ANLEITUNG.md (Kunden-Anleitung)"
    echo ""
}

################################################################################
# HAUPTPROGRAMM
################################################################################

main() {
    print_header
    
    # Voraussetzungen prüfen
    check_prerequisites
    
    # Konfiguration anzeigen
    show_config
    
    # Passwort abfragen
    get_password
    
    # Verbindung testen
    test_connection
    
    # Bestätigung einholen
    echo -e "${YELLOW}Möchten Sie fortfahren? (y/n)${NC}"
    read -r CONFIRM
    if [ "$CONFIRM" != "y" ] && [ "$CONFIRM" != "Y" ]; then
        print_warning "Deployment abgebrochen."
        exit 0
    fi
    echo ""
    
    # Verzeichnisstruktur erstellen
    create_remote_structure
    
    # Dateien hochladen
    upload_files
    
    # Zusammenfassung anzeigen
    show_summary
}

# Script starten
main

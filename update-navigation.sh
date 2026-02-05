#!/bin/bash

# Script to update navigation on all HTML pages
# Adds new pages: Bestell-App, Portal, Weitere Tools

echo "Updating navigation on all HTML pages..."

# Define the new navigation HTML (desktop)
NEW_NAV_DESKTOP='                        <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                        <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition">Produkte</a>
                        <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell-App</a>
                        <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition">Shop-Integration</a>
                        <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition">Portal</a>
                        <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition">COPA</a>
                        <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition">Kontakt</a>'

# Define the new navigation HTML (mobile)
NEW_NAV_MOBILE='                    <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Home</a>
                    <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Produkte</a>
                    <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Bestell-App</a>
                    <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Shop-Integration</a>
                    <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Portal</a>
                    <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">COPA</a>
                    <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Kontakt</a>'

# List of HTML files to update
FILES=(
    "index.html"
    "products.html"
    "integration.html"
    "contact.html"
    "impressum.html"
    "datenschutz.html"
    "agb.html"
    "bestell-app.html"
    "portal.html"
    "weitere-tools.html"
)

for file in "${FILES[@]}"; do
    if [ -f "$file" ]; then
        echo "Updating $file..."
        
        # Create backup
        cp "$file" "$file.bak"
        
        # Use Python for more reliable multi-line replacement
        python3 << 'PYTHON_SCRIPT'
import sys
import re

file = sys.argv[1]

with open(file, 'r', encoding='utf-8') as f:
    content = f.read()

# Desktop navigation pattern (between <div class="ml-10 flex items-center space-x-8"> and </div> before mobile menu)
desktop_pattern = r'(<div class="ml-10 flex items-center space-x-8">)(.*?)(</div>\s*</div>\s*<div class="md:hidden">)'

# Mobile navigation pattern (between <div class="flex flex-col space-y-4 px-4"> and Demo anfragen button)
mobile_pattern = r'(<div class="flex flex-col space-y-4 px-4">)(.*?)(<a href="contact\.html" class="gradient-bg)'

new_desktop_nav = '''
                        <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                        <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition">Produkte</a>
                        <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell-App</a>
                        <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition">Shop-Integration</a>
                        <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition">Portal</a>
                        <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition">COPA</a>
                        <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition">Kontakt</a>
                        <a href="contact.html" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                            Demo anfragen
                        </a>
                    '''

new_mobile_nav = '''
                    <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Home</a>
                    <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Produkte</a>
                    <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Bestell-App</a>
                    <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Shop-Integration</a>
                    <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Portal</a>
                    <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">COPA</a>
                    <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Kontakt</a>
                    '''

# Replace desktop navigation
content = re.sub(desktop_pattern, r'\1' + new_desktop_nav + r'\3', content, flags=re.DOTALL)

# Replace mobile navigation
content = re.sub(mobile_pattern, r'\1' + new_mobile_nav + r'\3', content, flags=re.DOTALL)

with open(file, 'w', encoding='utf-8') as f:
    f.write(content)

print(f"Updated {file}")
PYTHON_SCRIPT
        python3 -c "$(cat << 'PYTHON_SCRIPT'
import sys
import re

file = '$file'

with open(file, 'r', encoding='utf-8') as f:
    content = f.read()

# Desktop navigation pattern
desktop_pattern = r'(<div class="ml-10 flex items-center space-x-8">)(.*?)(</div>\s*</div>\s*<div class="md:hidden">)'

# Mobile navigation pattern
mobile_pattern = r'(<div class="flex flex-col space-y-4 px-4">)(.*?)(<a href="contact\.html" class="gradient-bg)'

new_desktop_nav = '''
                        <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                        <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition">Produkte</a>
                        <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell-App</a>
                        <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition">Shop-Integration</a>
                        <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition">Portal</a>
                        <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition">COPA</a>
                        <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition">Kontakt</a>
                        <a href="contact.html" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                            Demo anfragen
                        </a>
                    '''

new_mobile_nav = '''
                    <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Home</a>
                    <a href="products.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Produkte</a>
                    <a href="bestell-app.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Bestell-App</a>
                    <a href="weitere-tools.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Shop-Integration</a>
                    <a href="portal.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Portal</a>
                    <a href="integration.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">COPA</a>
                    <a href="contact.html" class="text-gray-600 hover:text-red-600 font-medium transition py-2">Kontakt</a>
                    '''

content = re.sub(desktop_pattern, r'\1' + new_desktop_nav + r'\3', content, flags=re.DOTALL)
content = re.sub(mobile_pattern, r'\1' + new_mobile_nav + r'\3', content, flags=re.DOTALL)

with open(file, 'w', encoding='utf-8') as f:
    f.write(content)

print(f'Updated {file}')
PYTHON_SCRIPT
)"
        
    else
        echo "Warning: $file not found"
    fi
done

echo "Navigation update complete!"
echo "Backup files created with .bak extension"

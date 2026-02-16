#!/bin/bash

# Update navigation on all HTML pages

FILES=(
    "index.html"
    "products.html"
    "integration.html"
    "contact.html"
    "bestell-app.html"
    "portal.html"
    "weitere-tools.html"
    "agb.html"
    "datenschutz.html"
    "impressum.html"
)

for file in "${FILES[@]}"; do
    if [ -f "$file" ]; then
        echo "Updating navigation in $file..."
        
        # Use Python for complex multi-line replacement
        python3 << 'PYTHON_SCRIPT'
import sys
import re

file = sys.argv[1]

with open(file, 'r', encoding='utf-8') as f:
    content = f.read()

# Desktop Navigation Pattern - find and replace
desktop_nav_old = r'<div class="hidden md:flex items-center gap-8">.*?</div>\s*</div>\s*<div class="md:hidden">'

desktop_nav_new = '''<div class="hidden md:flex items-center gap-8">
                        <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                        <a href="products.html#liefermax" class="text-gray-600 hover:text-red-600 font-medium transition">LieferMax</a>
                        <a href="products.html#check" class="text-gray-600 hover:text-red-600 font-medium transition">LM-CHECK</a>
                        <a href="products.html#map" class="text-gray-600 hover:text-red-600 font-medium transition">LM-MAP</a>
                        <a href="products.html#shop" class="text-gray-600 hover:text-red-600 font-medium transition">ShopWare & WooCommerce</a>
                        <a href="products.html#apps" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell App</a>
                        <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                            App testen
                        </a>
                    </div>
                </div>
                <div class="md:hidden">'

content = re.sub(desktop_nav_old, desktop_nav_new, content, flags=re.DOTALL)

# Mobile Navigation Pattern
mobile_nav_old = r'<div id="mobile-menu" class="hidden md:hidden.*?</div>\s*</div>'

mobile_nav_new = '''<div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 py-4">
            <div class="flex flex-col gap-4 px-4">
                <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                <a href="products.html#liefermax" class="text-gray-600 hover:text-red-600 font-medium transition">LieferMax</a>
                <a href="products.html#check" class="text-gray-600 hover:text-red-600 font-medium transition">LM-CHECK</a>
                <a href="products.html#map" class="text-gray-600 hover:text-red-600 font-medium transition">LM-MAP</a>
                <a href="products.html#shop" class="text-gray-600 hover:text-red-600 font-medium transition">ShopWare & WooCommerce</a>
                <a href="products.html#apps" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell App</a>
                <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold text-center hover:shadow-lg transition">
                    App testen
                </a>
            </div>
        </div>'''

content = re.sub(mobile_nav_old, mobile_nav_new, content, flags=re.DOTALL)

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

# Desktop Navigation Pattern - find and replace
desktop_nav_old = r'<div class="hidden md:flex items-center gap-8">.*?</div>\s*</div>\s*<div class="md:hidden">'

desktop_nav_new = '''<div class="hidden md:flex items-center gap-8">
                        <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                        <a href="products.html#liefermax" class="text-gray-600 hover:text-red-600 font-medium transition">LieferMax</a>
                        <a href="products.html#check" class="text-gray-600 hover:text-red-600 font-medium transition">LM-CHECK</a>
                        <a href="products.html#map" class="text-gray-600 hover:text-red-600 font-medium transition">LM-MAP</a>
                        <a href="products.html#shop" class="text-gray-600 hover:text-red-600 font-medium transition">ShopWare & WooCommerce</a>
                        <a href="products.html#apps" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell App</a>
                        <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                            App testen
                        </a>
                    </div>
                </div>
                <div class="md:hidden">'

content = re.sub(desktop_nav_old, desktop_nav_new, content, flags=re.DOTALL)

# Mobile Navigation Pattern
mobile_nav_old = r'<div id="mobile-menu" class="hidden md:hidden.*?</div>\s*</div>'

mobile_nav_new = '''<div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 py-4">
            <div class="flex flex-col gap-4 px-4">
                <a href="index.html" class="text-gray-600 hover:text-red-600 font-medium transition">Home</a>
                <a href="products.html#liefermax" class="text-gray-600 hover:text-red-600 font-medium transition">LieferMax</a>
                <a href="products.html#check" class="text-gray-600 hover:text-red-600 font-medium transition">LM-CHECK</a>
                <a href="products.html#map" class="text-gray-600 hover:text-red-600 font-medium transition">LM-MAP</a>
                <a href="products.html#shop" class="text-gray-600 hover:text-red-600 font-medium transition">ShopWare & WooCommerce</a>
                <a href="products.html#apps" class="text-gray-600 hover:text-red-600 font-medium transition">Bestell App</a>
                <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold text-center hover:shadow-lg transition">
                    App testen
                </a>
            </div>
        </div>'''

content = re.sub(mobile_nav_old, mobile_nav_new, content, flags=re.DOTALL)

with open(file, 'w', encoding='utf-8') as f:
    f.write(content)

print(f'Updated {file}')
PYTHON_SCRIPT
)"
    fi
done

echo "Navigation update complete!"

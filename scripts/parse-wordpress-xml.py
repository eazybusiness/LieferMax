#!/usr/bin/env python3
"""
WordPress XML Parser
Extracts all pages and content from WordPress export XML
"""

import xml.etree.ElementTree as ET
import json
import html
from pathlib import Path

# WordPress namespaces
NAMESPACES = {
    'content': 'http://purl.org/rss/1.0/modules/content/',
    'wp': 'http://wordpress.org/export/1.2/',
    'excerpt': 'http://wordpress.org/export/1.2/excerpt/',
}

def clean_html(text):
    """Remove HTML tags and decode entities"""
    if not text:
        return ""
    # Decode HTML entities
    text = html.unescape(text)
    return text

def parse_wordpress_xml(xml_file):
    """Parse WordPress XML export and extract pages"""
    tree = ET.parse(xml_file)
    root = tree.getroot()
    
    pages = []
    
    # Find all items
    for item in root.findall('.//item'):
        # Check if it's a page
        post_type = item.find('wp:post_type', NAMESPACES)
        if post_type is not None and post_type.text == 'page':
            # Extract page data
            title = item.find('title')
            post_id = item.find('wp:post_id', NAMESPACES)
            post_name = item.find('wp:post_name', NAMESPACES)
            status = item.find('wp:status', NAMESPACES)
            content = item.find('content:encoded', NAMESPACES)
            excerpt = item.find('excerpt:encoded', NAMESPACES)
            
            # Only process published pages
            if status is not None and status.text == 'publish':
                page_data = {
                    'id': post_id.text if post_id is not None else '',
                    'title': title.text if title is not None else '',
                    'slug': post_name.text if post_name is not None else '',
                    'content': content.text if content is not None else '',
                    'excerpt': excerpt.text if excerpt is not None else '',
                }
                
                pages.append(page_data)
                print(f"✓ Found page: {page_data['title']} (ID: {page_data['id']})")
    
    return pages

def main():
    xml_file = Path(__file__).parent.parent / 'client_input' / 'liefermaxgfghlieferscheinfahrerverkaufssystem.WordPress.2026-02-05.xml'
    output_dir = Path(__file__).parent.parent / 'wordpress-content'
    
    print("🔍 Parsing WordPress XML Export...")
    print(f"📄 File: {xml_file}")
    print()
    
    # Create output directory
    output_dir.mkdir(exist_ok=True)
    
    # Parse XML
    pages = parse_wordpress_xml(xml_file)
    
    print()
    print(f"✅ Found {len(pages)} published pages")
    print()
    
    # Save each page as JSON
    for page in pages:
        page_file = output_dir / f"{page['slug']}.json"
        with open(page_file, 'w', encoding='utf-8') as f:
            json.dump(page, f, ensure_ascii=False, indent=2)
        print(f"💾 Saved: {page_file.name}")
    
    # Save summary
    summary = {
        'total_pages': len(pages),
        'pages': [{'id': p['id'], 'title': p['title'], 'slug': p['slug']} for p in pages]
    }
    
    summary_file = output_dir / 'summary.json'
    with open(summary_file, 'w', encoding='utf-8') as f:
        json.dump(summary, f, ensure_ascii=False, indent=2)
    
    print()
    print(f"📊 Summary saved: {summary_file}")
    print()
    print("=" * 50)
    print("Pages found:")
    print("=" * 50)
    for page in pages:
        print(f"  • {page['title']} (/{page['slug']})")

if __name__ == '__main__':
    main()

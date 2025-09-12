# 🍋 Lemonade Component: Meta

[![Packagist](https://img.shields.io/packagist/v/lemonade/component_meta.svg)](https://packagist.org/packages/lemonade/component_meta)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

Lightweight OOP component for generating SEO & social meta tags (HTML `<meta>`, OpenGraph, Twitter Cards, DC tags, …) in Lemonade Framework projects.

---

## ✨ Features
- Strongly typed `MetaData` object
- Unified `MetaEntityInterface` for all meta entities
- Minimalistic tag classes (`MetaTag`, `OpenGraphTag`, `TwitterTag`, `DcTag`, `LinkTag`, `TitleTag`)
- Extensible: add your own meta entities or custom tags
- Safe HTML escaping and `readonly` properties
- Implements `Stringable` → render directly in templates

---

## 🚀 Installation

```bash
  composer require lemonade/component_meta
```

## 🔧 Usage

```php
use Lemonade\Meta\MetaData;
use Lemonade\Meta\MetaFactory;

// 1. Prepare meta data
// Create a data object that contains all information for SEO and social networks.
$data = new MetaData(
    websiteName: "Lemonade Framework",
    title: "Knihovna pro meta tagy",
    description: "Elegantní a efektivní PHP knihovna pro generování HTML meta tagů. Ideální pro webové stránky a CMS.",
    keywords: "php, framework, seo, meta, tagy, web, vývoj, knihovna",
    author: "Honza Mudrák",
    robots: "index,follow",
    canonical: "https://lemonadeframework.cz/",
    image: "https://cdn.lemonadeframework.cz/framework/small/color.png",
    custom: [
        "google-site-verification" => "J-QyBfS-jXv18vF-k4B2SgM_mD3E0E2Y9VzV8F",
        "robots" => "index,follow",
        "seznam-wmt" => "1234567890abcdef",
        "og:type" => "website",
        "og:locale" => "cs_CZ",
        "fb:app_id" => "1234567890",
        "twitter:site" => "@lemonade_cz"
    ]
);

// 2. Create a factory instance for generating tags
// Pass in the prepared data.
$metaFactory = new MetaFactory($data);

// 3. Generate and output HTML code
// MetaFactory implements Stringable, so you can echo it directly
echo $metaFactory;

```

## 📖 Changelog
All notable changes are documented in the [CHANGELOG.md](CHANGELOG.md).

## 📜 License
Released under the [MIT License](LICENSE).  
Copyright © 2025 Jan Mudrák

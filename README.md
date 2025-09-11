
```php
<?php

// Načtení Composer autoloaderu
require 'vendor/autoload.php';

use Lemonade\Meta\MetaData;
use Lemonade\Meta\MetaFactory;

// 1. Připravte data pro meta tagy
// Vytvořte datový objekt, který bude obsahovat všechny informace pro SEO a sociální sítě.
$data = new MetaData(
    websiteName: "Lemonade Framework",
    title: "Knihovna pro meta tagy",
    description: "Elegantní a efektivní PHP knihovna pro generování HTML meta tagů. Ideální pro webové stránky a CMS.",
    keywords: "php, framework, seo, meta, tagy, web, vývoj, knihovna",
    author: "Jan Mudrák",
    canonical: "https://lemonadeframework.cz/komponenty/meta",
    image: "https://lemonadeframework.cz/assets/images/logo.png",
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

// 2. Vytvořte instanci továrny pro generování tagů
// Předejte jí připravená data.
$metaFactory = new MetaFactory($data);

// 3. Volitelné: Nastavte dynamické hodnoty
// Přidejte název webu k titulku stránky.
$metaFactory->setDynamicTitle(); // Výsledek: "Knihovna pro meta tagy - Lemonade Framework"

// 4. Vygenerujte a vypište HTML kód
echo $metaFactory->toHtml();

```

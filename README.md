
```php


$meta = new \Lemonade\Meta\MetaFactory($author);
$meta->setTitle("název stránky"); // pokud jsme jinde nez na homepage
$meta->setAuthor("authorWebu");
$meta->setDescription("popisek webu");
$meta->setKeywords("klicova slova");
$meta->setCanonical("canonicalUrl");
$meta->setImage("imageUrl");

// google a seznam veriface (defacto custom)
$meta->setGoogleVerification("dsadsads");
$meta->setSeznamVerification("Dasds");

// vlastniMeta
$meta->addCustomMeta("googleMapId", "googleMapId");
$meta->addCustomMeta("seznamMapId", "seznamMapId");

$html = $meta->toHtml();

echo $html;
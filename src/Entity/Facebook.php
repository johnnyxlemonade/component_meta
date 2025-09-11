<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

use Lemonade\Meta\Tag\OpenGraphTag;

final class Facebook extends AbstractMetaEntity
{
    public function render(): string
    {
        $tags = [];

        // základní OG tagy
        $tags[] = new OpenGraphTag('og:title', $this->data->title);
        $tags[] = new OpenGraphTag('og:description', $this->data->description);
        $tags[] = new OpenGraphTag('og:url', $this->data->getCanonicalUrl());
        $tags[] = new OpenGraphTag('og:image', $this->data->image);
        $tags[] = new OpenGraphTag('og:locale', $this->data->custom['og:locale'] ?? 'cs_CZ');
        $tags[] = new OpenGraphTag('og:type', $this->data->custom['og:type'] ?? 'website');

        // Přidání Facebook App ID, pokud je nastaveno
        if (!empty($this->data->custom['fb:app_id'])) {
            $tags[] = new OpenGraphTag('fb:app_id', $this->data->custom['fb:app_id']);
        }

        // Dynamické přidání dalších custom tagů, pokud existují
        foreach ($this->data->custom as $key => $value) {
            // Předpokládáme, že všechny custom tagy jsou OG tagy
            if (strpos($key, 'og:') === 0 && !empty($value)) {
                $tags[] = new OpenGraphTag($key, $value);
            }
        }

        return $this->renderTags($tags);
    }
}

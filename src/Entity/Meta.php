<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

use Lemonade\Meta\MetaData;
use Lemonade\Meta\Tag\MetaTag;
use Lemonade\Meta\Tag\LinkTag;
use Lemonade\Meta\Tag\TitleTag;

final class Meta extends AbstractMetaEntity
{
    public function render(): string
    {
        $tags = [];

        // základní SEO tagy
        $tags[] = new MetaTag('charset', $this->data->charset);
        $tags[] = new TitleTag($this->data->getTitle());
        $tags[] = new MetaTag('description', $this->data->description);
        $tags[] = new MetaTag('keywords', $this->data->keywords);
        $tags[] = new MetaTag('author', $this->data->author);
        $tags[] = new MetaTag('viewport', $this->data->viewport);
        $tags[] = new MetaTag('robots', $this->data->robots);

        // přidáme standardní meta tagy
        $tags[] = new MetaTag('generator', 'Lemonade CMS [lemonadeframework.cz]');
        $tags[] = new MetaTag('rating', 'General');
        $tags[] = new MetaTag('web_author', 'lemonadeframework.cz');

        // canonical tag s parametry
        $tags[] = new LinkTag('canonical', $this->data->getCanonicalUrl());

        // image tag
        $tags[] = new LinkTag('image_src', $this->data->image);

        // custom meta tagy (key => value)
        foreach ($this->data->custom as $key => $value) {
            $tags[] = new MetaTag($key, $value);
        }

        return $this->renderTags($tags);
    }
}

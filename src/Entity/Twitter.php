<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

use Lemonade\Meta\Tag\TwitterTag;

final class Twitter extends AbstractMetaEntity
{
    public function render(): string
    {
        $tags = [];

        // základní Twitter Card
        $tags[] = new TwitterTag('twitter:card', $this->data->custom['twitter:card'] ?? 'summary');
        $tags[] = new TwitterTag('twitter:title', $this->data->title);
        $tags[] = new TwitterTag('twitter:description', $this->data->description);
        $tags[] = new TwitterTag('twitter:image', $this->data->image);

        // pokud máme autora / handle
        if (!empty($this->data->custom['twitter:creator'])) {
            $tags[] = new TwitterTag('twitter:creator', $this->data->custom['twitter:creator']);
        }

        return $this->renderTags($tags);
    }
}

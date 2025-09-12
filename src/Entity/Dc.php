<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

use Lemonade\Meta\Tag\DcTag;

final class Dc extends AbstractMetaEntity
{
    public function render(): string
    {
        $tags = [];

        // DC metatags
        $tags[] = new DcTag('title', $this->data->getTitle());
        $tags[] = new DcTag('description', $this->data->description);
        $tags[] = new DcTag('keywords', $this->data->keywords);
        $tags[] = new DcTag('creator', $this->data->author);
        $tags[] = new DcTag('publisher', $this->data->author);
        $tags[] = new DcTag('rights', $this->data->author);

        return $this->renderTags($tags);
    }
}

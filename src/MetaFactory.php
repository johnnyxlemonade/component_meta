<?php declare(strict_types=1);

namespace Lemonade\Meta;

use Lemonade\Meta\Entity\Meta;
use Lemonade\Meta\Entity\Facebook;
use Lemonade\Meta\Entity\Twitter;
use Lemonade\Meta\Entity\Dc;

final class MetaFactory
{
    private MetaData $data;

    public function __construct(MetaData $data)
    {
        $this->data = $data;
    }

    public function setDynamicTitle(): void
    {
        if (!empty($this->data->title)) {
            $this->data->title = $this->data->title . ' - ' . $this->data->websiteName;
        } else {
            $this->data->title = $this->data->websiteName;
        }
    }

    public function toHtml(): string
    {
        $html = PHP_EOL;

        // Předáváme parametr $indentTags do jednotlivých tříd
        $html .= (new Meta($this->data))->render();
        $html .= (new Facebook($this->data))->render();
        $html .= (new Twitter($this->data))->render();
        $html .= (new Dc($this->data))->render();

        $html .= PHP_EOL;

        return $html;
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}

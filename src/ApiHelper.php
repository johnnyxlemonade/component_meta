<?php declare(strict_types = 1);

namespace Lemonade\Meta;

use function trim;
use function str_replace;
use function preg_replace;
use function strip_tags;

trait ApiHelper
{
    /**
     * Clean and escape the input string.
     */
    public function plain(?string $text): ?string
    {
        return $text !== null && $text !== ''
            ? trim(str_replace('"', '&quot;', preg_replace("/\s+/", " ", strip_tags($text))))
            : null;
    }
}

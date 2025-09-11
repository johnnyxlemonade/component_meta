<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

/**
 * Interface pro třídy, které poskytují výstup.
 */
interface EntityInterface
{
    /**
     * Vygeneruje výstup pro daný objekt.
     *
     * Tato metoda by měla vracet formátovaný řetězec, který reprezentuje výstup objektu.
     * V případě meta tagů to bude pravděpodobně HTML kód.
     */
    public function getOutput(): string;
}

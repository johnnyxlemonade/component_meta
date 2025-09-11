<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

abstract class EntityAbstract implements EntityInterface
{
    /**
     * Data
     */
    protected array $data = [];

    /**
     * Tab
     */
    protected string $tab = "\t";

    /**
     * Constructor
     */
    public function __construct(array $data = []) {
        $this->data = $data;
    }

    /**
     * {@inheritDoc}
     * @see \Lemonade\Meta\Entity\EntityInterface::getOutput()
     */
    public function getOutput(): string
    {
        $code = "";

        if (!empty($this->data)) {
            $code .= PHP_EOL;

            foreach ($this->data as $key => $val) {
                $func = \sprintf("_%s", $key);

                // Check if method exists and process value
                if (method_exists($this, $func)) {
                    if (is_string($val) && $this->_notEmpty($val)) {
                        $code .= $this->$func($key, $val) . PHP_EOL;
                    } elseif (is_array($val)) {
                        $code .= $this->$func($key, $val);
                    }
                }
            }
        }

        return $code;
    }

    /**
     * Check if value is not empty
     */
    protected function _notEmpty(?string $value): bool
    {
        return !empty($value);
    }

    /**
     * Standard meta tag
     */
    protected function _standardMeta(): string
    {
        return $this->tab . '<meta name="{key}" content="{val}" />';
    }

    /**
     * Property meta tag
     */
    protected function _propertyMeta(): string
    {
        return $this->tab . '<meta property="{key}" content="{val}" />';
    }
}

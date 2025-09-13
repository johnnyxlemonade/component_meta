<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\MetaData;
use Lemonade\Meta\MetaFactory;
use Lemonade\Meta\Entity\MetaEntityInterface;

final class MetaFactoryTest extends TestCase
{
    public function testToHtmlReturnsNonEmptyString(): void
    {
        $data = new MetaData(
            websiteName: 'TestSite',
            title: 'Test Page',
            description: 'Some description',
            image: 'https://example.com/img.png'
        );

        $factory = new MetaFactory($data);
        $html = $factory->toHtml();

        $this->assertStringContainsString('Test Page', $html);
        $this->assertStringContainsString('og:title', $html);
        $this->assertStringContainsString('twitter:title', $html);
    }

    public function testToStringEqualsToHtml(): void
    {
        $data = new MetaData(websiteName: 'TestSite');
        $factory = new MetaFactory($data);

        $this->assertSame($factory->toHtml(), (string)$factory);
    }

    public function testAddEntityAddsCustomEntity(): void
    {
        $data = new MetaData(websiteName: 'TestSite');
        $factory = new MetaFactory($data);

        $customEntity = new class implements MetaEntityInterface {
            public function render(): string
            {
                return '<meta name="foo" content="bar">' . PHP_EOL;
            }
        };

        $factory->addEntity($customEntity, 99);
        $html = $factory->toHtml();

        $this->assertStringContainsString('<meta name="foo" content="bar">', $html);
    }

    public function testRemoveEntityRemovesPreviouslyAddedEntity(): void
    {
        $data = new MetaData(websiteName: 'TestSite');
        $factory = new MetaFactory($data);

        $customEntity = new class implements MetaEntityInterface {
            public function render(): string
            {
                return '<meta name="foo" content="bar">' . PHP_EOL;
            }
        };

        $factory->addEntity($customEntity, 99);
        $factory->removeEntity($customEntity::class);

        $html = $factory->toHtml();

        $this->assertStringNotContainsString('<meta name="foo" content="bar">', $html);
    }
}

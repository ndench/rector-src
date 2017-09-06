<?php declare(strict_types=1);

namespace Rector\TriggerExtractor\Tests;

use Rector\Tests\AbstractContainerAwareTestCase;
use Rector\TriggerExtractor\Deprecation\DeprecationCollector;
use Rector\TriggerExtractor\TriggerExtractor;

final class TriggerExtractorTest extends AbstractContainerAwareTestCase
{
    /**
     * @var TriggerExtractor
     */
    private $triggerExtractor;

    /**
     * @var DeprecationCollector
     */
    private $deprecationCollector;

    protected function setUp(): void
    {
        $this->triggerExtractor = $this->container->get(TriggerExtractor::class);
        $this->deprecationCollector = $this->container->get(DeprecationCollector::class);
    }

    public function test(): void
    {
        $this->triggerExtractor->scanDirectories([__DIR__ . '/TriggerExtractorSource']);
        $this->assertCount(2, $this->deprecationCollector->getDeprecations());
    }
}

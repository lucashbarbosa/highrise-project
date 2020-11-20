<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LayoutsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LayoutsTable Test Case
 */
class LayoutsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LayoutsTable
     */
    protected $Layouts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Layouts',
        'app.Pages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Layouts') ? [] : ['className' => LayoutsTable::class];
        $this->Layouts = $this->getTableLocator()->get('Layouts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Layouts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

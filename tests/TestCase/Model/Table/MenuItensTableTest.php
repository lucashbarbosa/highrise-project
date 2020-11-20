<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuItensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuItensTable Test Case
 */
class MenuItensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuItensTable
     */
    protected $MenuItens;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MenuItens',
        'app.Menus',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MenuItens') ? [] : ['className' => MenuItensTable::class];
        $this->MenuItens = $this->getTableLocator()->get('MenuItens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MenuItens);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

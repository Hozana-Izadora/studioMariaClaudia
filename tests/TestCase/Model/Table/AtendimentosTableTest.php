<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtendimentosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtendimentosTable Test Case
 */
class AtendimentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AtendimentosTable
     */
    protected $Atendimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Atendimentos',
        'app.Agendas',
        'app.Horarios',
        'app.Clients',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Atendimentos') ? [] : ['className' => AtendimentosTable::class];
        $this->Atendimentos = $this->getTableLocator()->get('Atendimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Atendimentos);

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

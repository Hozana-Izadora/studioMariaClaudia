<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgendasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgendasTable Test Case
 */
class AgendasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgendasTable
     */
    protected $Agendas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Agendas',
        'app.Atendimentos',
        'app.Horarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Agendas') ? [] : ['className' => AgendasTable::class];
        $this->Agendas = $this->getTableLocator()->get('Agendas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Agendas);

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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>

<?php
$this->assign('title', __('Material') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Materiais' => ['action'=>'index'],
      'Vizualizar',
    ]
  ])
);
?>

<div class="view card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($material->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <td><?= $this->Number->format($material->id_material) ?></td>
      </tr>
      <tr>
        <tr>
            <th><?= __('Descrição do Material') ?></th>
            <td><?= h($material->material_description) ?></td>
        </tr>
            <th><?= __('Quantidade de Material') ?></th>
            <td><?= $this->Number->format($material->material_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Data da Compra') ?></th>
            <td><?= $material->material_purchaseday? $material->material_purchaseday->i18nFormat('dd/MM/Y'):'' ?></td>
        </tr>
        <tr>
            <th><?= __('Data de Expiração') ?></th>
            <td><?= $material->material_expiration->i18nFormat('dd/MM/Y') ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= ($material->created->i18nFormat('dd/MM/Y')) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= ($material->modified->i18nFormat('dd/MM/Y')) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Deletar'),
          ['action' => 'delete',  $material->id_material],
          ['confirm' => __('Deseja realmente excluir # {0}?',  $material->id_material), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Editar'), ['action' => 'edit',  $material->id_material], ['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>



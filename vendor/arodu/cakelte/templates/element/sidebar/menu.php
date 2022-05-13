<li class="nav-item has-treeview">
  <a href="#" class="nav-link bg-pink">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Clientes
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Clients/index') ?>" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Vizualizar</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Clients/add') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Cadastrar</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link bg-pink">
    <i class="nav-icon fas fa-coffee"></i>
    <p>
      Serviços
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Services/index') ?>" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Vizualizar</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Services/add') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Cadastrar</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link bg-pink">
    <i class="nav-icon fas fa-paint-brush"></i>
    <p>
      Materiais
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Materials/index') ?>" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Vizualizar</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= $this->Url->build('/Materials/add') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Cadastrar</p>
      </a>
    </li>
  </ul>
</li>
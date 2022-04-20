<?php
  $breadcrumb = empty($breadcrumb) ? [] : $breadcrumb;

  if(!empty($home) && $home==true){
    $breadcrumb = array_merge(['Home'=>'/'], $breadcrumb);
  }
?>

<ol class="breadcrumb float-sm-right">
  <?php
    foreach ($breadcrumb as $key => $value) {
      if(is_numeric($key)){
        echo '<li class="breadcrumb-item text-pink">'.$value.'</li>';
      }else{
        echo '<li class="breadcrumb-item text-pink ">'.$this->Html->link($key, $value, ['escape'=>false,'class'=>'text-maroon']).'</li>';
      }
    }
  ?>
</ol>

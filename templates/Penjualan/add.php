<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 * @var \Cake\Collection\CollectionInterface|string[] $pelanggans
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan form content">
            <?= $this->Form->create($penjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Penjualan') ?></legend>
                <?php
                    echo $this->Form->control('tanggal_penjualan');
                    echo $this->Form->control('total_harga');
                    echo $this->Form->control('pelanggan_id', ['options' => $pelanggans, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

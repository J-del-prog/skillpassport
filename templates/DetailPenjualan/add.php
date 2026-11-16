<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailPenjualan $detailPenjualanEntity
 * @var \Cake\Collection\CollectionInterface|string[] $penjualans
 * @var \Cake\Collection\CollectionInterface|string[] $produks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Detail Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailPenjualan form content">
            <?= $this->Form->create($detailPenjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Detail Penjualan') ?></legend>
                <?php
                    echo $this->Form->control('penjualan_id', ['options' => $penjualans]);
                    echo $this->Form->control('produk_id', ['options' => $produks]);
                    echo $this->Form->control('jumlah_produk');
                    echo $this->Form->control('subtotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

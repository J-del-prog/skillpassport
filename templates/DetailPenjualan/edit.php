<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailPenjualan $detailPenjualanEntity
 * @var string[]|\Cake\Collection\CollectionInterface $penjualans
 * @var string[]|\Cake\Collection\CollectionInterface $produks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detailPenjualanEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detailPenjualanEntity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detail Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailPenjualan form content">
            <?= $this->Form->create($detailPenjualanEntity) ?>
            <fieldset>
                <legend><?= __('Edit Detail Penjualan') ?></legend>
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

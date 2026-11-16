<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailPenjualan $detailPenjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detail Penjualan'), ['action' => 'edit', $detailPenjualanEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detail Penjualan'), ['action' => 'delete', $detailPenjualanEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailPenjualanEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detail Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detail Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailPenjualan view content">
            <h3><?= h($detailPenjualanEntity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Penjualan') ?></th>
                    <td><?= $detailPenjualanEntity->hasValue('penjualan') ? $this->Html->link($detailPenjualanEntity->penjualan->id, ['controller' => 'Penjualans', 'action' => 'view', $detailPenjualanEntity->penjualan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Produk') ?></th>
                    <td><?= $detailPenjualanEntity->hasValue('produk') ? $this->Html->link($detailPenjualanEntity->produk->nama_produk, ['controller' => 'Produks', 'action' => 'view', $detailPenjualanEntity->produk->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jumlah Produk') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->jumlah_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Penjualan'), ['action' => 'edit', $penjualanEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Penjualan'), ['action' => 'delete', $penjualanEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan view content">
            <h3><?= h($penjualanEntity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pelanggan') ?></th>
                    <td><?= $penjualanEntity->hasValue('pelanggan') ? $this->Html->link($penjualanEntity->pelanggan->nama_pelanggan, ['controller' => 'Pelanggan', 'action' => 'view', $penjualanEntity->pelanggan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $penjualanEntity->hasValue('user') ? $this->Html->link($penjualanEntity->user->nama, ['controller' => 'Users', 'action' => 'view', $penjualanEntity->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Harga') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->total_harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Penjualan') ?></th>
                    <td><?= h($penjualanEntity->tanggal_penjualan) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detail Penjualan') ?></h4>
                <?php if (!empty($penjualanEntity->detail_penjualan)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produk Id') ?></th>
                            <th><?= __('Jumlah Produk') ?></th>
                            <th><?= __('Subtotal') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($penjualanEntity->detail_penjualan as $detailPenjualan) : ?>
                        <tr>
                            <td><?= h($detailPenjualan->id) ?></td>
                            <td><?= h($detailPenjualan->produk_id) ?></td>
                            <td><?= h($detailPenjualan->jumlah_produk) ?></td>
                            <td><?= h($detailPenjualan->subtotal) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DetailPenjualan', 'action' => 'view', $detailPenjualan->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DetailPenjualan', 'action' => 'edit', $detailPenjualan->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'DetailPenjualan', 'action' => 'delete', $detailPenjualan->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $detailPenjualan->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
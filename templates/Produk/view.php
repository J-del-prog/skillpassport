<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produk $produkEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produk'), ['action' => 'edit', $produkEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produk'), ['action' => 'delete', $produkEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk view content">
            <h3><?= h($produkEntity->nama_produk) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Produk') ?></th>
                    <td><?= h($produkEntity->nama_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($produkEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Harga') ?></th>
                    <td><?= $this->Number->format($produkEntity->harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stok') ?></th>
                    <td><?= $this->Number->format($produkEntity->stok) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detail Penjualan') ?></h4>
                <?php if (!empty($produkEntity->detail_penjualan)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Penjualan Id') ?></th>
                            <th><?= __('Jumlah Produk') ?></th>
                            <th><?= __('Subtotal') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produkEntity->detail_penjualan as $detailPenjualan) : ?>
                        <tr>
                            <td><?= h($detailPenjualan->id) ?></td>
                            <td><?= h($detailPenjualan->penjualan_id) ?></td>
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
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetailPenjualan> $detailPenjualan
 */
?>
<div class="detailPenjualan index content">
    <?= $this->Html->link(__('New Detail Penjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detail Penjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('penjualan_id') ?></th>
                    <th><?= $this->Paginator->sort('produk_id') ?></th>
                    <th><?= $this->Paginator->sort('jumlah_produk') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailPenjualan as $detailPenjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($detailPenjualanEntity->id) ?></td>
                    <td><?= $detailPenjualanEntity->hasValue('penjualan') ? $this->Html->link($detailPenjualanEntity->penjualan->id, ['controller' => 'Penjualans', 'action' => 'view', $detailPenjualanEntity->penjualan->id]) : '' ?></td>
                    <td><?= $detailPenjualanEntity->hasValue('produk') ? $this->Html->link($detailPenjualanEntity->produk->nama_produk, ['controller' => 'Produks', 'action' => 'view', $detailPenjualanEntity->produk->id]) : '' ?></td>
                    <td><?= $this->Number->format($detailPenjualanEntity->jumlah_produk) ?></td>
                    <td><?= $this->Number->format($detailPenjualanEntity->subtotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailPenjualanEntity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailPenjualanEntity->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detailPenjualanEntity->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detailPenjualanEntity->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
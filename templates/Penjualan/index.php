<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Penjualan> $penjualan
 */
?>
<div class="penjualan index content">
    <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Penjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_penjualan') ?></th>
                    <th><?= $this->Paginator->sort('total_harga') ?></th>
                    <th><?= $this->Paginator->sort('pelanggan_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $penjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($penjualanEntity->id) ?></td>
                    <td><?= h($penjualanEntity->tanggal_penjualan) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->total_harga) ?></td>
                    <td><?= $penjualanEntity->hasValue('pelanggan') ? $this->Html->link($penjualanEntity->pelanggan->nama_pelanggan, ['controller' => 'Pelanggan', 'action' => 'view', $penjualanEntity->pelanggan->id]) : '' ?></td>
                    <td><?= $penjualanEntity->hasValue('user') ? $this->Html->link($penjualanEntity->user->nama, ['controller' => 'Users', 'action' => 'view', $penjualanEntity->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $penjualanEntity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $penjualanEntity->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $penjualanEntity->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->id),
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
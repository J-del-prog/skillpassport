<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pelanggan $pelangganEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pelanggan'), ['action' => 'edit', $pelangganEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pelanggan'), ['action' => 'delete', $pelangganEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pelangganEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pelanggan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pelanggan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pelanggan view content">
            <h3><?= h($pelangganEntity->nama_pelanggan) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Pelanggan') ?></th>
                    <td><?= h($pelangganEntity->nama_pelanggan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nomor Telepon') ?></th>
                    <td><?= h($pelangganEntity->nomor_telepon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pelangganEntity->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Alamat') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pelangganEntity->alamat)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Penjualan') ?></h4>
                <?php if (!empty($pelangganEntity->penjualan)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tanggal Penjualan') ?></th>
                            <th><?= __('Total Harga') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pelangganEntity->penjualan as $penjualan) : ?>
                        <tr>
                            <td><?= h($penjualan->id) ?></td>
                            <td><?= h($penjualan->tanggal_penjualan) ?></td>
                            <td><?= h($penjualan->total_harga) ?></td>
                            <td><?= h($penjualan->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Penjualan', 'action' => 'view', $penjualan->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Penjualan', 'action' => 'edit', $penjualan->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Penjualan', 'action' => 'delete', $penjualan->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $penjualan->id),
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
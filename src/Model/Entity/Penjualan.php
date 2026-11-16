<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penjualan Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $tanggal_penjualan
 * @property string $total_harga
 * @property int|null $pelanggan_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Pelanggan $pelanggan
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DetailPenjualan[] $detail_penjualan
 */
class Penjualan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'tanggal_penjualan' => true,
        'total_harga' => true,
        'pelanggan_id' => true,
        'user_id' => true,
        'pelanggan' => true,
        'user' => true,
        'detail_penjualan' => true,
    ];
}

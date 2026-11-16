<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailPenjualan Entity
 *
 * @property int $id
 * @property int $penjualan_id
 * @property int $produk_id
 * @property int $jumlah_produk
 * @property string $subtotal
 *
 * @property \App\Model\Entity\Penjualan $penjualan
 * @property \App\Model\Entity\Produk $produk
 */
class DetailPenjualan extends Entity
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
        'penjualan_id' => true,
        'produk_id' => true,
        'jumlah_produk' => true,
        'subtotal' => true,
        'penjualan' => true,
        'produk' => true,
    ];
}

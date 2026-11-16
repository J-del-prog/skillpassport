<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pelanggan Entity
 *
 * @property int $id
 * @property string $nama_pelanggan
 * @property string|null $alamat
 * @property string|null $nomor_telepon
 *
 * @property \App\Model\Entity\Penjualan[] $penjualan
 */
class Pelanggan extends Entity
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
        'nama_pelanggan' => true,
        'alamat' => true,
        'nomor_telepon' => true,
        'penjualan' => true,
    ];
}

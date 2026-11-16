<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailPenjualanFixture
 */
class DetailPenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'detail_penjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'penjualan_id' => 1,
                'produk_id' => 1,
                'jumlah_produk' => 1,
                'subtotal' => 1.5,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailPenjualan Model
 *
 * @property \App\Model\Table\PenjualanTable&\Cake\ORM\Association\BelongsTo $Penjualans
 * @property \App\Model\Table\ProdukTable&\Cake\ORM\Association\BelongsTo $Produks
 *
 * @method \App\Model\Entity\DetailPenjualan newEmptyEntity()
 * @method \App\Model\Entity\DetailPenjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailPenjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetailPenjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailPenjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetailPenjualanTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('detail_penjualan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Penjualans', [
            'foreignKey' => 'penjualan_id',
            'className' => 'Penjualan',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Produks', [
            'foreignKey' => 'produk_id',
            'className' => 'Produk',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('penjualan_id')
            ->notEmptyString('penjualan_id');

        $validator
            ->integer('produk_id')
            ->notEmptyString('produk_id');

        $validator
            ->integer('jumlah_produk')
            ->requirePresence('jumlah_produk', 'create')
            ->notEmptyString('jumlah_produk');

        $validator
            ->decimal('subtotal')
            ->requirePresence('subtotal', 'create')
            ->notEmptyString('subtotal');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['penjualan_id'], 'Penjualans'), ['errorField' => 'penjualan_id']);
        $rules->add($rules->existsIn(['produk_id'], 'Produks'), ['errorField' => 'produk_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penjualan Model
 *
 * @property \App\Model\Table\PelangganTable&\Cake\ORM\Association\BelongsTo $Pelanggans
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DetailPenjualanTable&\Cake\ORM\Association\HasMany $DetailPenjualan
 *
 * @method \App\Model\Entity\Penjualan newEmptyEntity()
 * @method \App\Model\Entity\Penjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Penjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Penjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Penjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PenjualanTable extends Table
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

        $this->setTable('penjualan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pelanggans', [
            'foreignKey' => 'pelanggan_id',
            'className' => 'Pelanggan',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DetailPenjualan', [
            'foreignKey' => 'penjualan_id',
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
            ->date('tanggal_penjualan')
            ->requirePresence('tanggal_penjualan', 'create')
            ->notEmptyDate('tanggal_penjualan');

        $validator
            ->decimal('total_harga')
            ->requirePresence('total_harga', 'create')
            ->notEmptyString('total_harga');

        $validator
            ->integer('pelanggan_id')
            ->allowEmptyString('pelanggan_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['pelanggan_id'], 'Pelanggans'), ['errorField' => 'pelanggan_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

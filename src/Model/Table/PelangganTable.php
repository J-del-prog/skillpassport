<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pelanggan Model
 *
 * @property \App\Model\Table\PenjualanTable&\Cake\ORM\Association\HasMany $Penjualan
 *
 * @method \App\Model\Entity\Pelanggan newEmptyEntity()
 * @method \App\Model\Entity\Pelanggan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pelanggan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pelanggan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pelanggan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pelanggan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pelanggan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pelanggan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pelanggan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pelanggan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pelanggan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pelanggan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pelanggan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pelanggan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pelanggan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pelanggan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pelanggan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PelangganTable extends Table
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

        $this->setTable('pelanggan');
        $this->setDisplayField('nama_pelanggan');
        $this->setPrimaryKey('id');

        $this->hasMany('Penjualan', [
            'foreignKey' => 'pelanggan_id',
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
            ->scalar('nama_pelanggan')
            ->maxLength('nama_pelanggan', 100)
            ->requirePresence('nama_pelanggan', 'create')
            ->notEmptyString('nama_pelanggan');

        $validator
            ->scalar('alamat')
            ->allowEmptyString('alamat');

        $validator
            ->scalar('nomor_telepon')
            ->maxLength('nomor_telepon', 15)
            ->allowEmptyString('nomor_telepon');

        return $validator;
    }
}

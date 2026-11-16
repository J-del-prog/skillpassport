<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DetailPenjualan Controller
 *
 * @property \App\Model\Table\DetailPenjualanTable $DetailPenjualan
 */
class DetailPenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DetailPenjualan->find()
            ->contain(['Penjualans', 'Produks']);
        $detailPenjualan = $this->paginate($query);

        $this->set(compact('detailPenjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Detail Penjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailPenjualanEntity = $this->DetailPenjualan->get($id, contain: ['Penjualans', 'Produks']);
        $this->set(compact('detailPenjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailPenjualanEntity = $this->DetailPenjualan->newEmptyEntity();
        if ($this->request->is('post')) {
            $detailPenjualanEntity = $this->DetailPenjualan->patchEntity($detailPenjualanEntity, $this->request->getData());
            if ($this->DetailPenjualan->save($detailPenjualanEntity)) {
                $this->Flash->success(__('The detail penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detail penjualan could not be saved. Please, try again.'));
        }
        $penjualans = $this->DetailPenjualan->Penjualans->find('list', limit: 200)->all();
        $produks = $this->DetailPenjualan->Produks->find('list', limit: 200)->all();
        $this->set(compact('detailPenjualanEntity', 'penjualans', 'produks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detail Penjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailPenjualanEntity = $this->DetailPenjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailPenjualanEntity = $this->DetailPenjualan->patchEntity($detailPenjualanEntity, $this->request->getData());
            if ($this->DetailPenjualan->save($detailPenjualanEntity)) {
                $this->Flash->success(__('The detail penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detail penjualan could not be saved. Please, try again.'));
        }
        $penjualans = $this->DetailPenjualan->Penjualans->find('list', limit: 200)->all();
        $produks = $this->DetailPenjualan->Produks->find('list', limit: 200)->all();
        $this->set(compact('detailPenjualanEntity', 'penjualans', 'produks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detail Penjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailPenjualanEntity = $this->DetailPenjualan->get($id);
        if ($this->DetailPenjualan->delete($detailPenjualanEntity)) {
            $this->Flash->success(__('The detail penjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The detail penjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

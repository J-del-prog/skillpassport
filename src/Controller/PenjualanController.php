<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Penjualan Controller
 *
 * @property \App\Model\Table\PenjualanTable $Penjualan
 */
class PenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Penjualan->find()
            ->contain(['Pelanggans', 'Users']);
        $penjualan = $this->paginate($query);

        $this->set(compact('penjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: ['Pelanggans', 'Users', 'DetailPenjualan']);
        $this->set(compact('penjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $penjualanEntity = $this->Penjualan->newEmptyEntity();
        if ($this->request->is('post')) {
            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $this->request->getData());
            if ($this->Penjualan->save($penjualanEntity)) {
                $this->Flash->success(__('The penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
        }
        $pelanggans = $this->Penjualan->Pelanggans->find('list', limit: 200)->all();
        $users = $this->Penjualan->Users->find('list', limit: 200)->all();
        $this->set(compact('penjualanEntity', 'pelanggans', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $this->request->getData());
            if ($this->Penjualan->save($penjualanEntity)) {
                $this->Flash->success(__('The penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
        }
        $pelanggans = $this->Penjualan->Pelanggans->find('list', limit: 200)->all();
        $users = $this->Penjualan->Users->find('list', limit: 200)->all();
        $this->set(compact('penjualanEntity', 'pelanggans', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penjualanEntity = $this->Penjualan->get($id);
        if ($this->Penjualan->delete($penjualanEntity)) {
            $this->Flash->success(__('The penjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The penjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

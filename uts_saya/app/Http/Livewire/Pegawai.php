<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Post;

class Pegawai extends Component
{
    public $pegawais, $nama, $alamat, $pegawai_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->pegawais = Pegawai::all();
        return view('livewire.pegawai');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->nama = '';
        $this->alamat = '';
    }
    
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
    
        Pegawai::updateOrCreate(['id' => $this->pegawai_id], [
            'nama' => $this->nama,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', $this->pegawai_id ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $this->pegawai_id = $id;
        $this->nama= $pegawai->nama;
        $this->alamat = $pegawai->alamat;
    
        $this->openModal();
    }
    
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
} 
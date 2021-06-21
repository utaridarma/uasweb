<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Type;
use Livewire\WithPagination;

class types extends Component
{
    use WithPagination;

    //public $types;
    public $search;
    public $isOpen = 0;
    public $typeId, $type, $kualitas;
    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        //$this->types = type::all();
        return view('livewire.types',[
            'types' => Type::where('type','like', $searchParams)->latest()
                            ->orWhere('kualitas', 'like', $searchParams)->latest()->paginate(5)
        ]);
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
                [
                    'type' => 'required',
                ]
            );

            Type::updateOrCreate(['id' => $this->typeId], [
                'type' => $this->type,
            ]);

            $this->hideModal();

            session()->flash('info', $this->typeId ? 'type Update Successfully' : 'type Created Successfully');

            $this->typeId = '';
            $this->type = '';

    }

    public function edit($id){
        $type = Type::findOrFail($id);
        $this->typeId = $id;
        $this->type = $type->type;


        $this->showModal();
    }

    public function delete($id){
        Type::find($id)->delete();
        session()->flash('delete','type Deleted Successfully');
    }

}

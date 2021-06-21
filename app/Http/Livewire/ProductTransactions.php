<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductTransaction;

class ProductTransactions extends Component
{

    public function render()
    {

        return view('livewire.product-transactions', [
            'productstransactions'=> ProductTransaction::all()
        ]);
    }
}
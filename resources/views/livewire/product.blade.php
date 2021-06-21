<div class="py-4">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg py-4 px-4">
            <div class="flex mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <button wire:click="showModal()" class="py-1 px-4 text-sm rounded text-green-500 font-semibold border border-green-500 hover:text-white font-bold hover:bg-green-500 hover:border-transparent focus:outline-none">Add</button></a>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <input wire:model="search" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500 " aria-hidden="true" placeholder="Search">
                </div>
            </div>
                            @if($isOpen)
                                @include('livewire.createproduct')
                            @endif
                            @if(session()->has('info'))
                                <div class="bg-green-500 border-2 border-green-300 rounded-b mb-2 py-3">
                                    <div>
                                        <h1 class="text-white font-bold mb-2">{{session('info')}}</h1>
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('delete'))
                                <div class="bg-red-500 border-2 border-red-300 rounded-b mb-2 py-3">
                                    <div>
                                        <h1 class="text-white font-bold ml-4">{{session('delete')}}</h1>
                                    </div>
                                </div>
                            @endif
            <table class="table-fixed w-full">
                <thead class="bg-blue-300 text-center">
                    <tr>
                        <th class="px-4 py-2 text-white">No</th>
                        <th class="px-4 py-2 text-white" width="10%">Image</th>
                        <th class="px-4 py-2 text-white">Nama</th>
                        <th class="px-4 py-2 text-white">Kategori</th>
                        <th class="px-4 py-2 text-white">Qty</th>
                        <th class="px-4 py-2 text-white">Harga</th>
                        <th class="px-4 py-2 text-white">Action </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1;?>
                    @foreach ($products as $index=>$product )
                    <tr>
                        <td>{{$id}}</td>
                        <td><img src="{{ url('storage/images/'. $product->image)}}" alt="product image" class="img-fluid"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->qty}}</td>
                        <td>Rp {{number_format($product['price'],2,',','.') }}</td>
                        <td>
                            <button wire:click="edit({{$product->id}} )" class="py-1 px-4 text-sm rounded text-blue-500 font-semibold border border-blue-500 hover:text-white font-bold hover:bg-blue-500 hover:border-transparent focus:outline-none">Edit</button></a>
                            <button wire:click="delete({{$product->id}} )" class="py-1 px-4 text-sm rounded text-red-500 font-semibold border border-red-500 hover:text-white font-bold hover:bg-red-500 hover:border-transparent focus:outline-none">Delete</button></a>
                        </td>
                    </tr>
                    <?php $id++; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 ">
                {{$products->links()}}
            </div>
            <x-jet-dialog-modal wire:model="confirmingProductDeletion">
                <x-slot name="title">
                    {{ __('Delete Product') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete your Product?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('confirmingProductDeletion', false)" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="delete({{$confirmingProductDeletion}} )" wire:loading.attr="disabled">
                        {{ __('Delete Product') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </div>

        
    </div>
</div>

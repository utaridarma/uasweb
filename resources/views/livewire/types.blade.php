<div class="py-2">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg py-4 px-4">
            <div class="flex mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <button wire:click="showModal()" class="py-1 px-4 text-sm rounded text-green-500 font-semibold border border-green-500 hover:text-white font-bold hover:bg-green-500 hover:border-transparent focus:outline-none">Add</button></a>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <input wire:model="search" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500 " aria-hidden="true" placeholder="Search">
                </div>
            </div>
                            @if($isOpen)
                                @include('livewire.createtype')
                            @endif
                            @if(session()->has('info'))
                            <div class="bg-green-500 border-2 border-green-600 rounded-b mb-2 py-3">
                                <div>
                                    <h1 class="text-white font-bold ml-4">{{session('info')}}</h1>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('delete'))
                            <div class="bg-red-500 border-2 border-red-600 rounded-b mb-2 py-3">
                                <div>
                                    <h1 class="text-white font-bold ml-4">{{session('delete')}}</h1>
                                </div>
                            </div>
                        @endif
            <table class="table-fixed w-full">
                <thead class="bg-blue-300 text-center">
                    <tr>
                        <th class="px-4 py-2 text-white">No</th>
                        <th class="px-4 py-2 text-white">Kategori</th>
                        <th class="px-4 py-2 text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1;?>
                    @foreach ($types as $type )
                    <tr>
                        <td>{{$id}}</td>
                        <td>{{$type->type}}</td>
                        <td>
                            <button wire:click="edit({{$type->id}} )" class="py-1 px-4 text-sm rounded text-blue-500 font-semibold border border-blue-500 hover:text-white font-bold hover:bg-blue-500 hover:border-transparent focus:outline-none">Edit</button></a>
                            <button wire:click="delete({{$type->id}} )" class="py-1 px-4 text-sm rounded text-red-500 font-semibold border border-red-500 hover:text-white font-bold hover:bg-red-500 hover:border-transparent focus:outline-none">Delete</button></a>
                        </td>
                    </tr>
                    <?php $id++; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 ">
                {{$types->links()}}
            </div>
        </div>


        
    </div>
</div>

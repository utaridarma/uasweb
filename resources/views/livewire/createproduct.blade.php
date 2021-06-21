<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <form>
        <div class="bg-white px-4 pt-2 pb-4 sm:p-6 sm:pb-4">
               <div>
                   <h1 class="font-bold text-center mb-4">INSERT PRODUCT</h1>
               </div>
               <div class="form-group mb-2">
                        <input wire:model="productId" type="hidden" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500" placeholder="Jersey">
               </div>
               <div class="form-group">
                        <label>Product Image</label>
                        <div class="custom-file">
                            <input wire:model="image" type="file" class="custom-file-input" id="customFile">
                            <label for="customFile" class='custom-file-label'>Choose Image</label>
                            @error('image') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        @if($image)
                            <label class="mt-2">Image Preview:</label>
                            <img src="{{$image->temporaryUrl()}}" class="img-fluid" alt="Preview Image">
                        @endif
            </div>
               <div class="form-group mb-2">
                        <label for="name" class="block">name</label>
                        <input wire:model="name" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500" placeholder="name">
                        @error('name') <h1 class="text-red-500">{{$message}}</h1> @enderror

                </div>
               <div class="form-group mb-2">
                        <label>Type</label>
                        <select wire:model="type" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500" placeholder="type">
                            <option value="">-Choose-</option>
                            @foreach ( $types as $type)
                            <option value="{{$type->type}}">{{$type->type}}</option>
                            @endforeach
                        </select>

                </div>
                <div class="form-group mb-2">
                        <label for="qty" class="block">Qty</label>
                        <input wire:model="qty" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500" placeholder="qty">
                        @error('qty') <h1 class="text-red-500">{{$message}}</h1> @enderror
               </div>
               <div class="form-group mb-2">
                        <label for="price" class="block">price</label>
                        <input wire:model="price" type="text" class="shaddow appearance-none border rounded w-full py-2 px-3 text-blue-500" placeholder="price">
                        @error('price') <h1 class="text-red-500">{{$message}}</h1> @enderror
               </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button wire:click.prevent="store()" class="py-1 px-4 text-sm rounded text-green-500 font-semibold border border-green-500 hover:text-white font-bold hover:bg-green-500 hover:border-transparent focus:outline-none">Save</button></a>
            <button wire:click.prevent="hideModal()" class="py-1 px-4 text-sm rounded text-red-500 font-semibold border border-red-500 hover:text-white font-bold hover:bg-red-500 hover:border-transparent focus:outline-none mr-2">Cancel</button></a>
        </div>
      </div>
    </div>
  </div>

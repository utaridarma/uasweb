<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8 mb-9">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
            <div class="flex mb-1">
                <div class="flex-auto w-full col-7 mb-6 md:mb-0 ">
                    <h2 class="font-weight-bold">Products Transactions</h2>
                </div>
            </div>

            {{-- <button type="button" class="w-1/6 bg-red-500 hover:bg-red-700 text-white font-bold my-1 py-2 px-2 rounded float-right mb-3" wire:click="deleteAll()" onclick="confirm('Are you sure you want to delete all?') || event.stopImmediatePropagation()">
                <div>Delete All<i class="ml-2 fas fa-trash-alt"></i></div>
            </button> --}}

            <table class="table-fixed w-full text-center border-b">
                <thead class="bg-blue-300 text-center">
                    <tr>
                        <th class="w-auto px-4 py-2 text-white">Product Id</th>
                        <th class="w-auto px-4 py-2 text-white">Product Name</th>
                        <th class="w-auto px-4 py-2 text-white">Invoice</th>
                        <th class="w-auto px-4 py-2 text-white">Qty</th>
                        <th class="w-auto px-4 py-2 text-white">Date</th>
                        {{-- <th class="w-auto px-4 py-2 text-white">Action</th> --}}
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($productstransactions as $pt)
                    <tr class="">
                        <td>{{ $pt->product_id }}</td>
                        <td>{{ $pt->product->name }}</td>
                        <td>{{ $pt->invoice_number }}</td>
                        <td>{{ $pt->qty }}</td>
                        <td>{{ $pt->created_at }}</td>
                        {{-- <td>
                            <button type="button" class="w-1/4 bg-red-500 hover:bg-red-700 text-white font-bold my-1 py-2 px-2 rounded" wire:click="delete({{ $pt->id }})" onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()">
                                <div class="fas fa-trash-alt"></div>
                            </button>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- create button --}}
            @include('webmaster.partials.create-product')
            {{-----------------------------------------}}
                <div class="text-gray-900">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>image</th>
                                <th>name</th>
                                <th>description</th>
                                <th>category</th>
                                <th>price</th>
                                <th>stock</th>
                                <th>update</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr valign='middle'>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    <img width="100" src="{{asset('storage/images/product/'.$product->image)}}" alt="">
                                </td>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->desc}}
                                </td>
                                <td>
                                    {{$product->category->name}}
                                </td>
                                <td>
                                    {{$product->price}}
                                </td>
                                <td>
                                    {{$product->stock}}
                                </td>
                                <td>
                                    @include('webmaster.partials.update-product')
                                </td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-transparent border border-0">
                                            <i class="fa-solid fa-trash fa-lg" style="color: #f71818;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</x-app-layout>
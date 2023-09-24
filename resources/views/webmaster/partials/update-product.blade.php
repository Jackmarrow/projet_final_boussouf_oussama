<!-- Button trigger modal -->
<button type="button" class="btn btn-primary bg-transparent border border-0" data-bs-toggle="modal" data-bs-target="#updateModal{{$product->id}}">
    <i class="fa-solid fa-pen-to-square fa-lg" style="color: #00ad03;"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal{{$product->id}}" tabindex="-1" aria-labelledby="updateModal{{$product->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateModal{{$product->id}}Label">Update Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action={{route('product.update', $product->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" value="{{$product->name}}" type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input class="form-control" value="{{$product->desc}}" type="text" name="desc" id="desc">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control" value="{{$product->price}}" type="number" name="price" id="price">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" value="{{$product->stock}}" type="number" name="stock" id="stock">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
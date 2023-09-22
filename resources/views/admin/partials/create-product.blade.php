<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createModal">
    Create New Product
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Update Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control"  type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input class="form-control"  type="text" name="desc" id="desc">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control" type="number" name="price" id="price">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="number" name="stock" id="stock">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- dalam file edit.blade.php -->
<div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit product -->
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <!-- Pilihan kategori -->
                            <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Aksesoris</option>
                            <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Sports</option>
                            <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Pakaian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Product Code:</label>
                        <input type="text" class="form-control" id="code" name="product_code" value="{{ $product->product_code }}" required>
                    </div>
                    <!-- Tambahkan field-form lainnya sesuai kebutuhan -->
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit:</label>
                        <input type="text" class="form-control" id="unit" name="unit" value="{{ $product->unit }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ $product->name }}">

    <label>Description</label>
    <textarea name="description">{{ $product->description }}</textarea>

    <label>Price</label>
    <input type="text" name="price" value="{{ $product->price }}">

    <button type="submit">Update</button>
</form>

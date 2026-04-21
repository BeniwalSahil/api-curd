<h2>Create Product</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label>Name</label>
    <input type="text" name="name">

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Price</label>
    <input type="text" name="price">

    <button type="submit">Save</button>
</form>

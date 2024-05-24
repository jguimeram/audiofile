<div class="container col-lg-3">
    <form class="row g-3" method="POST" action="products/create">
        <div class=" col-md-12">
            <label for="product" class="form-label">Name of the product</label>
            <input type="text" class="form-control" id="product">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" placeholder="description..." rows="10"></textarea>
        </div>
        <div class="col-md-2">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price">
        </div>
        <div class="col-md-2">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" class="form-control" id="stock">
        </div>
        <div class="col-md-4">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" id="picture">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
</div>
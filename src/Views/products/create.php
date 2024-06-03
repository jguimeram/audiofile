<?= $message; ?>
<main>
    <div class="container">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <form class="row g-3" method="POST" action="/products/create">
            <!--    <div class=" col-md-4">
                <label for="ref" class="form-label">Reference:</label>
                <input type="text" class="form-control" id="ref" readonly>
            </div> -->
            <div class=" col-md-12">
                <label for="product" class="form-label">Name of the product</label>
                <input type="text" class="form-control" id="product" name="productname" required>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="description..." rows="10"
                    name="description" required></textarea>
            </div>
            <div class="col-md-2">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="col-md-2">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="col-md-4">
                <label for="category" class="form-label">Category</label>
                <select id="category" class="form-select" name="categoryid" required>
                    <option selected>1</option>
                    <option>2</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>
</main>
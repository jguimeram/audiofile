<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <a href="/products/create">New Product</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $product) : ?>
                        <tr>
                            <td><?= $product['id'] ?>
                            <td><?= $product['productname']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td><?= $product['stock']; ?></td>
                            <td><?= $product['categoryid']; ?></td>
                            <td>
                                <a href="/products/update/<?= $product['id'] ?>" class=" btn btn-success">Edit</a>
                                <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
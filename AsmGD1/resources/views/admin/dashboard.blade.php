@extends('admin/layoutAdmin')
@section('title')
    Admin Dashboard Page
@endsection
@section('dashboard')
        <main class="main-content main-content--expanded">
                <div class="main-content__header">
                        <h1 class="main-content__title">Product Management Nhưng bằng JS</h1>
                        <div class="main-content__actions">
                                <button class="button button--primary" id="addProductBtn">Add Product</button>
                        </div>
                </div>
                <div class="product-table">
                        <div class="product-table__header">
                                <div>ID</div>
                                <div>Name</div>
                                <div>Price</div>
                                <div>Stock</div>
                                <div>Actions</div>
                        </div>
                        <div class="product-table__row" data-id="1">
                                <div>1</div>
                                <div>Laptop Pro</div>
                                <div>$1200</div>
                                <div>50</div>
                                <div class="product-table__actions">
                                        <button class="button button--primary edit-btn">Edit</button>
                                        <button class="button button--danger delete-btn">Delete</button>
                                </div>
                        </div>
                        <div class="product-table__row" data-id="2">
                                <div>2</div>
                                <div>Wireless Mouse</div>
                                <div>$25</div>
                                <div>200</div>
                                <div class="product-table__actions">
                                        <button class="button button--primary edit-btn">Edit</button>
                                        <button class="button button--danger delete-btn">Delete</button>
                                </div>
                        </div>
                </div>
        </main>

<!-- Modal for Add/Edit Product -->
        <div class="modal" id="productModal">
                <div class="modal__content">
                        <h2 class="modal__title">Add/Edit Product</h2>
                        <form id="productForm">
                                <div class="form-group">
                                        <label for="productName">Product Name</label>
                                        <input type="text" id="productName" required>
                                </div>
                                <div class="form-group">
                                        <label for="productPrice">Price</label>
                                        <input type="number" id="productPrice" step="0.01" required>
                                </div>
                                <div class="form-group">
                                        <label for="productStock">Stock</label>
                                        <input type="number" id="productStock" required>
                                </div>
                                <div class="main-content__actions">
                                        <button type="button" class="button button--secondary" id="closeModal">Cancel</button>
                                        <button type="submit" class="button button--primary">Save</button>
                                </div>
                        </form>
                </div>
        </div>
@endsection




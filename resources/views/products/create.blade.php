@extends('products.layout')

@section('content')
<style>
    body {
        background: #e3f2fd;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 800px;
        margin-top: 10px;
    }

    .card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.6s ease-out;
    }

    @keyframes slideIn {
        0% { transform: translateY(30px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e3a8a;
        letter-spacing: 1px;
    }

    .btn-back {
        background-color: #ff6f61;
        color: white;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #ff4e42;
        transform: scale(1.05);
    }

    .form-group label {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .form-group input,
    .form-group textarea {
        border-radius: 8px;
        padding: 14px;
        border: 1px solid #ddd;
        background: #f9fafb;
        width: 100%;
        font-size: 1rem;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #1e3a8a;
        background-color: #f1f5f9;
        outline: none;
        box-shadow: 0 0 8px rgba(30, 58, 138, 0.2);
    }

    .form-group textarea {
        height: 180px;
        resize: none;
    }

    .btn-submit {
        background-color: #1e3a8a;
        color: white;
        padding: 14px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        width: 100%;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #2563eb;
        transform: scale(1.05);
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    .alert-danger ul {
        margin-top: 10px;
    }

    .alert-danger li {
        font-size: 1rem;
        list-style: none;
    }
</style>

<div class="container">
    <!-- Card container -->
    <div class="card">
        <!-- Page header -->
        <div class="page-header">
            <h2>Thêm sản phẩm mới</h2>
            <a href="{{ route('products.index') }}" class="btn-back">
                <i class="bi bi-arrow-left-circle"></i> Quay lại
            </a>
        </div>

        <!-- Error messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Có một số vấn đề với dữ liệu bạn nhập.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Add Product Form -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <!-- Product Name and Detail -->
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
            </div>
            <div class="form-group">
                <label for="detail">Chi tiết sản phẩm:</label>
                <textarea id="detail" name="detail" class="form-control" placeholder="Mô tả chi tiết sản phẩm" required></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-submit">Thêm sản phẩm</button>
            </div>
        </form>
    </div>
</div>
@endsection

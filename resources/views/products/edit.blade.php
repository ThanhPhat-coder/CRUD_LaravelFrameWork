@extends('products.layout')

@section('content')
<style>
    body {
        background: #f3f4f6;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 900px;
        margin-top: 50px;
    }

    .card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .btn-back {
        background-color: #4e73df;
        color: white;
        border-radius: 30px;
        padding: 12px 24px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s, transform 0.2s ease;
    }

    .btn-back:hover {
        background-color: #2e59d9;
        transform: scale(1.05);
    }

    .form-group label {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ddd;
        background: #f8f9fa;
        width: 100%;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #4e73df;
        background-color: #f1f5fb;
        outline: none;
    }

    .form-group textarea {
        height: 150px;
        resize: none;
    }

    .btn-primary {
        background-color: #4e73df;
        color: white;
        padding: 12px 24px;
        font-size: 1.1rem;
        border-radius: 30px;
        border: none;
        width: 100%;
        transition: transform 0.2s ease, background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
        transform: scale(1.05);
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 30px;
        font-size: 1rem;
    }
</style>

<div class="container">
    <!-- Card container -->
    <div class="card">
        <!-- Page header -->
        <div class="page-header">
            <h2>Chỉnh sửa sản phẩm</h2>
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

        <!-- Edit Product Form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Product Name and Detail -->
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="detail">Chi tiết sản phẩm:</label>
                <textarea id="detail" name="detail" class="form-control" placeholder="Mô tả chi tiết sản phẩm">{{ $product->detail }}</textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </form>
    </div>
</div>
@endsection

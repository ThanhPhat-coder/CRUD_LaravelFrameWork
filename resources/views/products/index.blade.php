@extends('products.layout')

@section('content')
<style>
    .content-container {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-10px);
    }
    .card img {
        height: 200px;
        object-fit: cover;
    }
    .card-body {
        padding: 15px;
    }
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .btn-group .btn {
        min-width: 80px;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    /* Màu sắc và hiệu ứng hover cho nút */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
        transform: scale(1.05);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: scale(1.05);
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
  
</style>

<div class="container mt-5">
    <div class="content-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Quản lý sản phẩm</h2>
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}">
                <i class="bi bi-plus-circle"></i> Thêm sản phẩm mới 
            </a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thành công!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLpg8mTA9MSTmfGOJU2OqPLJjz3HPgU2F8Vg&s" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->detail, 100) }}</p>
                        <div class="btn-group" role="group" aria-label="Action buttons">
                            <a class="btn btn-sm btn-info" href="{{ route('products.show', $product->id) }}">
                                <i class="bi bi-eye"></i> Xem
                            </a>
                            <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">
                                <i class="bi bi-pencil"></i> Sửa
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

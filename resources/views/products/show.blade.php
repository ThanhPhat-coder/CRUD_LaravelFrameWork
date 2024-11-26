@extends('products.layout')

@section('content')
<style>
    .content-container {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.9));
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .page-header {
        margin-bottom: 30px;
        text-align: center;
    }

    .page-header h2 {
        font-size: 2rem;
        color: #4a90e2;
        font-weight: 600;
    }

    .product-detail {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s ease-in-out;
    }

    .product-detail:hover {
        transform: translateY(-5px);
    }

    .form-group strong {
        font-size: 1.1rem;
        font-weight: 500;
        color: #333;
    }

    .form-group p {
        font-size: 1rem;
        color: #666;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 12px 25px;
        font-size: 1.1rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
        transform: scale(1.05);
    }

</style>

<div class="container mt-5">
    <div class="content-container">
        <!-- Page header -->
        <div class="page-header">
            <h2 class="text-primary">Chi tiết sản phẩm</h2>
            <a class="btn btn-primary" href="{{ route('products.index') }}">
                <i class="bi bi-arrow-left-circle"></i> Quay lại
            </a>
        </div>

        <!-- Product details -->
        <div class="row">
            <div class="col-md-12">
                <div class="product-detail">
                    <div class="form-group">
                        <strong>Tên sản phẩm:</strong>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="form-group">
                        <strong>Chi tiết:</strong>
                        <p>{{ $product->detail }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

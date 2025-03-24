@extends('layout.app')
@section('content')
<style>
    .bg {
        background-image: url('{{ asset('images/base_data/bg-base-data.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 2rem 0px;
    }

    .custom-gradient-shadow {
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(255, 0, 102, 0.3),
            0 0 50px -10px rgba(255, 102, 178, 0.8),
            0 0 50px -10px rgba(255, 153, 204, 0.8);
        background-color: #ffffff;
    }

    .title-section {
        font-size: 60px;
        font-weight: bold;
        color: white;
        text-shadow:
            2px 2px 0px rgba(0, 0, 0, 0.8),
            4px 4px 5px rgba(0, 0, 0, 0.5);
    }

    .img-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .img-hover:hover {
        transform: scale(1.1);
    }

</style>
<div class="bg">
    <div class="container custom-gradient-shadow">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="fs-1 fw-bold mt-5">โครงสร้างองค์กร</div>

            <style>
                .a4-size {
                    width: 794px;
                    height: 1123px;
                    object-fit: contain;
                    align-content: center;
                }

            </style>

            <div>
                <img src="{{ asset('images/personnel_chart/st01-3.png') }}" class="a4-size" alt="">
            </div>

        </div>

    </div>
</div>

@endsection

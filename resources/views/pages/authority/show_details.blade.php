@extends('layout.main.app')
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

</style>
<div class="bg py-5">
    <div class="container py-5 custom-gradient-shadow">
        <div class=" d-flex flex-column justify-content-center p-5">
            <div class="fs-1 fw-bold mb-4 text-center" style="color: #FF66B2;">อำนาจหน้าที่ <br>{{ $AuthorityType->type_name }}</div>


            <p class="card-text">{!! $AuthorityDetails->details ?? '' !!}</p>

            @if($AuthorityDetails && $AuthorityDetails->files->where('files_type', 'pdf')->isNotEmpty())
            <div class="row justify-content-center">
                @foreach($AuthorityDetails->files->where('files_type', 'pdf') as $file)
                <div class="d-flex justify-content-center">
                    <embed src="{{ asset('storage/' . $file->files_path) }}" type="application/pdf" width="100%" height="800px">
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center"></p>
            @endif

            <br>

            @if($AuthorityDetails && $AuthorityDetails->files->whereIn('files_type', ['jpg', 'jpeg', 'png'])->isNotEmpty())
            <div class="row justify-content-center">
                @foreach($AuthorityDetails->files->whereIn('files_type', ['jpg', 'jpeg', 'png']) as $file)
                <div class="col-md-3" style="text-align: center;">
                    <img src="{{ asset('storage/' . $file->files_path) }}" class="img-fluid rounded mx-auto d-block">
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center"></p>
            @endif

        </div>
    </div>
</div>


@endsection

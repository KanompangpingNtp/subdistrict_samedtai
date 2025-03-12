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
            <div class="fs-1 fw-bold mb-4 mt-5">{{ $agency->personnel_agency_name }}</div>

            @if ($agency->ranks->count() > 0)
            <!-- จัดกลุ่มข้อมูลตาม status และเรียงลำดับ -->
            @php
            // จัดกลุ่ม details ตาม status
            $groupedDetails = collect();
            foreach ($agency->ranks as $rank) {
            if ($rank->details->count() > 0) {
            foreach ($rank->details as $detail) {
            $groupedDetails->push($detail);
            }
            }
            }

            // เรียงลำดับตาม status (1 -> 2 -> 3)
            $sortedDetails = $groupedDetails->sortBy('status')->groupBy('status');
            @endphp

            <?php
            if (!function_exists('formatPhone')) {
                function formatPhone($phone) {
                    if (preg_match('/^(.*?)(\d{2,}-\d{3,}-\d{4,})$/', $phone, $matches)) {
                        return trim($matches[1]) ? trim($matches[1]) . '<br>' . trim($matches[2]) : trim($matches[2]);
                    }
                    return $phone; // แสดงค่าเดิมหากไม่มีการจับคู่
                }
            }
            ?>

            <!-- แสดงผลตามกลุ่ม status -->
            @foreach ($sortedDetails as $status => $details)
            <div class="w-100 mb-4 px-5">
                {{-- <h4 class="text-center mb-3">Status: {{ $status }}</h4> --}}
                @foreach ($details->chunk(3) as $chunk)
                <div class="row mb-3 justify-content-center">
                    @if ($chunk->count() == 1)
                    <!-- ถ้ามี 1 ข้อมูล: แสดงตรงกลาง -->
                    @foreach ($chunk as $detail)
                    <div class="col-md-4">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center lh-1 p-3">
                            @if ($detail->images->count() > 0)
                            @foreach ($detail->images as $image)
                            <img src="{{ asset('storage/' . $image->post_photo_file) }}" alt="Personnel Image" style="width: auto; height: 250px; object-fit: cover;">
                            @endforeach
                            @else
                            <p>No images available for this person.</p>
                            @endif

                            <!-- แสดงข้อมูลของแต่ละรายการ fs-4-->
                            <div class="mt-2" style="font-size: 18px;">
                                {{ $detail->full_name }}<br>
                                {{ $detail->department ?? '' }}<br>
                                {{-- {{ $detail->phone }} --}}
                                {{-- {!! preg_replace('/(\d{2,}-\d{3,}-\d{4,})/', '<br>$1', $detail->phone) !!} --}}
                                @php
                                $phone = $detail->phone;
                                if (preg_match('/^(.*?)(\d{2,}-\d{3,}-\d{4,})$/', $phone, $matches)) {
                                echo trim($matches[1]) ? trim($matches[1]) . '<br>' . trim($matches[2]) : trim($matches[2]);
                                } else {
                                echo $phone; // แสดงค่าเดิมหากไม่มีการจับคู่
                                }
                                @endphp
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @elseif ($chunk->count() == 2)
                    <div class="row justify-content-between">
                        <!-- แสดงข้อมูลของ first item -->
                        <div class="col-md-5">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center lh-1 p-3">
                                @if ($chunk->first()->images->count() > 0)
                                @foreach ($chunk->first()->images as $image)
                                <img src="{{ asset('storage/' . $image->post_photo_file) }}" alt="Personnel Image" style="width: auto; height: 250px; object-fit: cover;">
                                @endforeach
                                @else
                                <p>No images available for this person.</p>
                                @endif
                                <div class="mt-2" style="font-size: 18px;">
                                    {{ $chunk->first()->full_name }}<br>
                                    {{ $chunk->first()->department ?? '' }}<br>
                                    {{-- {{ $chunk->first()->phone }} --}}
                                    {!! formatPhone($chunk->first()->phone) !!}
                                </div>
                            </div>
                        </div>
                        <!-- แสดงข้อมูลของ last item -->
                        <div class="col-md-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center lh-1 p-3">
                                @if ($chunk->last()->images->count() > 0)
                                @foreach ($chunk->last()->images as $image)
                                <img src="{{ asset('storage/' . $image->post_photo_file) }}" alt="Personnel Image" style="width: auto; height: 250px; object-fit: cover;">
                                @endforeach
                                @else
                                <p>No images available for this person.</p>
                                @endif
                                <div class="mt-2" style="font-size: 18px;">
                                    {{ $chunk->last()->full_name }}<br>
                                    {{ $chunk->last()->department ?? '' }}<br>
                                    {{-- {{ $chunk->last()->phone }} --}}
                                    {!! formatPhone($chunk->last()->phone) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- ถ้ามี 3 ข้อมูล: แสดงเต็มแถว -->
                    @foreach ($chunk as $detail)
                    <div class="col-md-4">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center lh-1 p-3">
                            @if ($detail->images->count() > 0)
                            @foreach ($detail->images as $image)
                            <img src="{{ asset('storage/' . $image->post_photo_file) }}" alt="Personnel Image" style="width: auto; height: 250px; object-fit: cover;">
                            @endforeach
                            @else
                            <p>No images available for this person.</p>
                            @endif

                            <!-- แสดงข้อมูลของแต่ละรายการ -->
                            <div class="mt-2" style="font-size: 18px;">
                                {{ $detail->full_name }}<br>
                                {{ $detail->department ?? '' }}<br>
                                {{-- {{ $detail->phone }} --}}
                                @php
                                $phone = $detail->phone;
                                if (preg_match('/^(.*?)(\d{2,}-\d{3,}-\d{4,})$/', $phone, $matches)) {
                                echo trim($matches[1]) ? trim($matches[1]) . '<br>' . trim($matches[2]) : trim($matches[2]);
                                } else {
                                echo $phone;
                                }
                                @endphp
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @endforeach

            </div>
            @endforeach
            @else
            <p>No ranks available for this agency.</p>
            @endif

            {{-- <a href="{{ url()->previous() }}" class="mt-3">Back</a> --}}

            <div class="text-center">
                @if ($photos->count() > 0)
                <!-- Carousel แสดงภาพ -->
                <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($photos as $index => $photo)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $photo->group_photo_file) }}" class="d-block rounded" alt="รูปแนบ">
                        </div>
                        @endforeach
                    </div>
                    <!-- ปุ่มเลื่อนซ้าย -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <!-- ปุ่มเลื่อนขวา -->
                    <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @endif

                <br>
                <br>
            </div>

        </div>

        <style>
            .carousel-item img {
                width: 655px;
                height: 437px;
                object-fit: cover;
            }

        </style>

    </div>
</div>
</div>

@endsection

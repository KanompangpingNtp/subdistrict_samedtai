<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.min.js"></script>
</head>
<body>
    <style>
        @font-face {
            font-family: 'THSarabunNewBold';
            src: url('/fonts/THSarabunNewBold.ttf') format('truetype');
            font-weight: normal;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: auto;
            position: relative;
        }

        .fullscreen-image {
            width: 100vw;
            height: 100vh;
            position: relative;
            /* ให้ปุ่มอ้างอิงตำแหน่งจากตรงนี้ */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fullscreen-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            /* ทำให้ภาพอยู่ล่างสุด */
        }

        @media (max-width: 1300px) {
            .fullscreen-image {
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: auto;
                overflow-x: scroll;
            }

            .fullscreen-image img {
                min-width: 100%;
                min-height: 100%;
                object-fit: contain;
            }

        }

        .button-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            display: flex;
            gap: 20px;
            /* ปกติให้ห่าง 20px */
        }

        /* เมื่อจอเล็กกว่า 1300px */
        @media (max-width: 1300px) {
            .button-container {
                /* flex-direction: column; */
                align-items: center;
                gap: 5px;
            }

            .login-button {
                width: 90%;
                max-width: 280px;
                /* ปรับขนาดปุ่มให้พอดี */
            }
        }

        .login-button {
            margin-top: 700px;
            width: 280px;
            height: 50px;
            border-radius: 20px;
            border: none;
            background: linear-gradient(145deg, #ffffff, #e3e3e3);
            color: black;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2),
                -4px -4px 10px rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            font-family: 'THSarabunNewBold';
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            position: relative;
        }

        .login-button:hover {
            background: linear-gradient(145deg, #e3e3e3, #ffffff);
            box-shadow: 6px 6px 15px rgba(0, 0, 0, 0.3),
                -6px -6px 15px rgba(255, 255, 255, 0.6);
            transform: scale(1.05);
        }

    </style>

    <div class="fullscreen-image">
        @foreach($Image as $item)
        <img id="background-image" src="{{ asset('storage/' . $item->files_path) }}" alt="รูปภาพอินโทร">
        @endforeach

        <div class="button-container">

            <a href="{{route('HomeIndex')}}" class="login-button">
                <strong style="font-size: 30px">เข้าสู่เว็บไซต์</strong>
            </a>

            @if($Button && $item->button_name)
            <a href="{{ $item->button_link }}" class="login-button">
                <strong style="font-size: 30px">{{ $item->button_name }}</strong>
            </a>
            @endif

        </div>
    </div>

    <script>
        window.onload = function() {
            var img = document.querySelector('#background-image');
            var colorThief = new ColorThief();
            if (img.complete) {
                var color = colorThief.getColor(img);
                document.body.style.backgroundColor = 'rgb(' + color.join(',') + ')';
            } else {
                img.onload = function() {
                    var color = colorThief.getColor(img);
                    document.body.style.backgroundColor = 'rgb(' + color.join(',') + ')';
                };
            }
        };

    </script>

</body>
</html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .qr-code {
            width: 50%;
        }

        .package-label {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 1px solid #000;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .flex-row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .flex-col {
            flex-direction: column;
            width: 50%;
        }
    </style>
</head>
<div>
    @foreach($labels as $label)
        <div class="package-label flex-row">
            <div style="float:left; margin: 10px;" >
                {!! DNS2D::getBarcodeHTML($label->qrcode_link, 'QRCODE') !!}
            </div>
            <div class="flex-container flex-col flex-wrap">
                <h1 class="font-semibold text-l text-gray-800 leading-tight">Name: </h1>
                <p class="text-gray-600 leading-tight">{{ $label->receiver_name }}</p>

                <h1 class="font-semibold text-l text-gray-800 leading-tight">Address: </h1>
                <p class="text-gray-600 leading-tight">{{ $label->street }}</p>

            </div>
        </div>
    @endforeach
</div>

</html>

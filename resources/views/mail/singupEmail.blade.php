<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>app</title>
</head>
<body>
    <h4>Halo {{ $email_data['name'] }}Selamat datang di website saya </h4>
    <br>
<h5>Selamat datang di stodioPhotoapp</h5>
    <p>Silahkan klick untuk verifikasi </p><br>
    <h5> <a href="{{ url('') }}/verifyLogin/{{ $email_data['verify'] }}">click here!</a> </h5>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; line-height: 1.5; color: #333;">
        <h1 style="color: #0056b3;">Un utente ha chiesto di lavorare con noi</h1>
        <h2 style="color: #333;">Ecco i suoi dati:</h2>
        <p style="margin: 0; font-size: 16px;">Nome: <strong style="color: #0056b3;">{{ $user->name }}</strong></p>
        <p style="margin: 0; font-size: 16px;">Email: <strong style="color: #0056b3;">{{ $user->email }}</strong></p>
        <p style="margin: 20px 0 10px; font-size: 16px;">
            Se vuoi renderl* revisor, clicca qui:
        </p>
        <a href="{{ route('make.revisor', compact('user')) }}"
            style="display: inline-block; text-decoration: none; background-color: #28a745; color: #fff; padding: 10px 15px; border-radius: 5px; font-weight: bold; font-size: 16px;">Rendi
            revisor</a>
    </div>
</body>

</html>

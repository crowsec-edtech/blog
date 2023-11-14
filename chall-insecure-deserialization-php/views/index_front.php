<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="/views/main.js"></script>
    <title>Index</title>
</head>
<body>
    <style>
        body {
            background-color: rgb(39, 39, 65);
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>


    <div class="container">
        <h1>Objeto Auth serializado</h1>
        <pre style="font-size: 20px"><?=$auth?></pre>
        <br/><br/>
        <h2>Verifique as informações do seu usuário</h2>
        <form>
            <input style="padding: 10px; width: 48%; " type="text" id="payload" placeholder="Objeto Serializado">
            <button style="padding: 12px; background-color: rgb(136, 128, 228); color: black; border: 0;" id="button-submit" type="button">Verificar</button>
        </form>
        <pre style="font-size: 20px" id="response"></pre>
    </div>

</body>
</html>
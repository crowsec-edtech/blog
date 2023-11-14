<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Check url</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-900 text-white">
    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-2xl mb-8 font-bold">Check url health </h1>
        <div class="flex flex-col">
            <input type="text" placeholder="http://example.com/" name="url" id="url" class="p-1 rounded-sm w-96 h-full text-black">
            <button type="submit" class="bg-red-700 hover:bg-red-800 p-1 rounded-sm h-full mt-2 font-bold" onclick="send()">Send</button>
        </div>
    </div>

    <script>
        function send() {
            var url = $("#url").val()
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.post("/", {_token, url}, (data)=>{
                if(data.length > 0)
                {
                    alert('UP');
                }else {
                    alert('DOWN');
                }
            })
        }
    </script>
</body>
</html>
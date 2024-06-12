<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>XSS Lab</title>
</head>

<body>
    <header class="bg-gray-900">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            
            <div class="flex lg:flex">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8" src="https://hackingclub.com/wp-content/uploads/2022/04/Group-5.svg" alt="">
                </a>
            </div>
            
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/" class="text-lg font-semibold leading-6 text-white hover:text-slate-400 transition-all">XSS Reflected</a>
                <a href="/dom.php" class="text-lg font-semibold leading-6 text-slate-400 hover:text-white transition-all">XSS DOM-Based</a>
                <a href="/stored.php" class="text-lg font-semibold leading-6 text-white hover:text-slate-400 transition-all">XSS Stored</a>
            </div>
            <div></div>
        </nav>
    </header>

    <main class="mt-12">
        <div class="flex flex-col items-center">
            <div class="mt-8 w-2/4 flex justify-center">
                <form onsubmit="message(event)" class="flex flex-col space-y-4 p-6 w-2/4">
                    <h1 class="text-4xl font-semibold text-gray-700">Contact us - DOM-Based attack</h1>
                    <span class="text-green-500 hidden" id="message"></span>
                    <div class="flex flex-row space-x-4 pt-8">
                        <input name="name" id="name" class="border border-2 border-gray-400 py-1.5 px-3 w-full outline-none focus:border-gray-800" type="text" required placeholder="Your name">
                        <input name="email" class="border border-2 border-gray-400 py-1.5 px-3 w-full outline-none focus:border-gray-800" type="email" required placeholder="Email">
                    </div>
                    <div class="flex flex-col">
                        <input name="phone" class="border border-2 border-gray-400 py-1.5 px-3 w-full outline-none focus:border-gray-800" type="text" placeholder="Phone number">
                    </div>
                    <div class="flex">
                        <textarea name="comment" class="border border-2 border-gray-400 py-1.5 px-3 w-full resize-none h-28 outline-none focus:border-gray-800" required placeholder="Comment"></textarea>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="mt-2 py-2 px-8 bg-gray-800 hover:bg-gray-600 transition-all text-white">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function message(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;

            if(name) {
                const messageDiv = document.getElementById('message');
                const message = `Thank you ${name} for contacting us`;

                messageDiv.innerHTML = message;
                messageDiv.classList.remove('hidden');
            }
        }
    </script>

</body>

</html>
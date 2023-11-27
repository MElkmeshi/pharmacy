<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>User View</h1>
    <ul id="ul">

    </ul>
    <form method="POST" id="form">
        @csrf
        <input type="text" id="input-message" name="message">
        <input type="submit" value="Send">
    </form>
    <script>
        const inputMessage = document.getElementById("input-message");
        setTimeout(() => {
            window.Echo.channel('public.chat.1').listen('.chat-message', (e) => {
                let ul = document.getElementById('ul');
                let li = document.createElement('li');
                li.innerHTML = e.username + " " + e.message;
                ul.appendChild(li);
            });
        }, 200);
        const form = document.getElementById("form");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            // let ul = document.getElementById('ul');
            // let li = document.createElement('li');
            // li.innerHTML = inputMessage.value;
            // ul.appendChild(li);
            axios.post("/sendmessage", {
                message: inputMessage.value,
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>

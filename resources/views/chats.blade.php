<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Admin View</h1>
    <ul id="ul">
        @foreach ($chats as $chat)
            <li id="{{ $chat->from }}">{{ $chat->from_name }} {{ $chat->message }}</li>
        @endforeach

    </ul>
    <ul id="users">
    </ul>
    <form method="POST" id="form">
        @csrf
        <input type="text" id="input-message" name="message">
        <input type="hidden" id="input-to" name="to" value="3">
        <input type="submit" value="Send">
    </form>
    <button id="fathy-button">Fathy</button>
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
        const inputTo = document.getElementById("input-to");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            // let ul = document.getElementById('ul');
            // let li = document.createElement('li');
            // li.innerHTML = inputMessage.value;
            // ul.appendChild(li);
            axios.post("/sendmessage", {
                message: inputMessage.value,
                to: inputTo.value
            });
        });
        const fathyButton = document.getElementById("fathy-button");
        fathyButton.addEventListener("click", async (e) => {
            e.preventDefault();
            const res = await axios.get("/messages?user=2", {
                message: inputMessage.value,
                to: inputTo.value
            });
            res.data.forEach(element => {
                let ul = document.getElementById('ul');
                let li = document.createElement('li');
                li.innerHTML = element.from_user_database.name + " " + element.message;
                ul.appendChild(li);
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>

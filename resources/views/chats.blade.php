{{-- <!DOCTYPE html>
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
        <input type="hidden" id="input-to" name="to" value="2">
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
</body>

</html>


<!DOCTYPE html>
<html> --}}

<head>
    <title>Chat</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }

    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }

    .card {
        height: 500px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.4) !important;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
    }

    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
        -webkit-border-radius: ;
        -moz-border-radius: ;
        -ms-border-radius: ;
        -o-border-radius: ;
    }

    .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
        -webkit-border-radius: ;
        -moz-border-radius: ;
        -ms-border-radius: ;
        -o-border-radius: ;
    }

    .container {
        align-content: center;
    }

    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .type_msg {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .contacts {
        list-style: none;
        padding: 0;
    }

    .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .active {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .user_img {
        height: 60px;
        width: 60px;
        border: 1.5px solid #f5f6fa;
    }

    .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }

    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }

    .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 13px;
        right: 13px;
        border: 1.5px solid white;
    }

    .offline {
        background-color: #c23616 !important;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info span {
        font-size: 20px;
        color: white;
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .video_cam {
        margin-left: 50px;
        margin-top: 5px;
    }

    .video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }

    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -ms-border-radius: 25px;
        -o-border-radius: 25px;
    }

    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -ms-border-radius: 25px;
        -o-border-radius: 25px;
    }

    .received_msg {
        justify-content: start;
    }

    .msg_cotainer_receive {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: rgb(244, 244, 17);
        padding: 10px;
        position: relative;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -ms-border-radius: 25px;
        -o-border-radius: 25px;

    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    /* width */

    ::-webkit-scrollbar {
        width: 10px;
    }


    /* Track */

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }


    /* Handle */

    ::-webkit-scrollbar-thumb {
        background: #888;
    }


    /* Handle on hover */

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    @media(max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }
</style>

<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts" id="contacts">
                            @foreach ($chats as $chat)
                                <li data-id="{{ $chat->from }}">
                                    <div class="d-flex bd-highlight users">
                                        <div class="user_info">
                                            <span>{{ $chat->from_name }}</span>
                                            <br>
                                            <p style="font-size: 15px">{{ $chat->message }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="user_info">
                                <span id="activeName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        <!-- Your chat messages go here -->

                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        let activeItem = null;
        let activeId = null;
        let activeName = null;

        $('.contacts').on('click', 'li', function() {
            const clickedItem = $(this);
            if (clickedItem.hasClass('active')) {
                return;
            } else {
                if (activeItem) {
                    activeItem.removeClass('active');
                }
                clickedItem.addClass('active');
                activeItem = clickedItem;
                activeId = clickedItem.attr('data-id');
                activeName = clickedItem.find('span').text();
                $('#activeName').text(activeName);
                $('.msg_card_body').empty();
                axios.get("/messages?user=" + activeId).then((res) => {
                    res.data.forEach(element => {
                        if (element.from == activeId) {
                            appendMessage(element.from_name, element.message,
                                getNiceTime(element.created_at), false);
                        } else {
                            appendMessage(element.from_name, element.message,
                                getNiceTime(element.created_at), true);
                        }
                    });
                });
            }
        });

        window.Echo.channel('public.chat.1').listen('.chat-message', (data) => {
            console.log(data);
            if (data.to.id != 1) {
                return;
            }
            const existingUser = $('.contacts li').filter(`[data-id="${data.from.id}"]`);
            if (existingUser.length > 0) {
                existingUser.remove();
            }
            const newUserItem = $(`
                    <li data-id="${data.from.id}" class="${!!activeId && activeId == data.from.id ? 'active' : ''}">
                        <div class="d-flex bd-highlight users">
                            <div class="user_info">
                                <span>${data.from.name}</span>
                                <p style="font-size: 15px">${data.message}</p>
                            </div>
                        </div>
                    </li>
                `)
            $('#contacts').prepend(newUserItem);
            if (activeId == data.from.id) {

                appendMessage(data.from.name, data.message, getCurrentTime(), false);
            }
        });

        function sendMessage(message, ) {
            const time = getCurrentTime();
            if (activeId == null) {
                return;
            }
            axios.post("/sendmessage", {
                message: message,
                to: activeId
            });
            const existingUser = $('.contacts li').filter(`[data-id="${activeId}"]`);
            if (existingUser.length > 0) {
                existingUser.find('p').text("You: " + message);
            }
            appendMessage(activeName, message, time, true);
        }

        // Append messages to the chat window
        function appendMessage(username, message, time, isNotification) {
            const chatBody = $('.msg_card_body');
            const msgContainer = $('<div class="d-flex justify-content-end mb-4"></div>');

            if (!isNotification) {
                // If it's not a notification, it's a received message
                msgContainer.addClass('received_msg');
                msgContainer.append(`
					  <div class="msg_cotainer_receive">
						  ${message}
						  <span class="msg_time">${time}</span>
					  </div>
				  `);
            } else {
                // If it's a notification, it's a sent message
                msgContainer.append(`
					  <div class="msg_cotainer_send">
						  ${message}
						  <span class="msg_time">${time}</span>
					  </div>
				  `);
            }
            chatBody.append(msgContainer);
            // Scroll to the bottom of the chat window
            chatBody.scrollTop(chatBody[0].scrollHeight);
        }

        // Get the current time in HH:mm format
        function getCurrentTime() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function getNiceTime(time) {
            const now = new Date(time);
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }
        // Send a message when the user presses Enter
        $('.type_msg').keypress(function(e) {
            if (e.which === 13) {
                e.preventDefault();
                e.stopPropagation();
                const message = $(this).val();
                if (message.trim() !== '') {
                    sendMessage(message);
                    $(this).val('');
                }
            }
        });
        // Send a message when the send button is clicked
        $('.send_btn').click(function() {
            const message = $('.type_msg').val();
            if (message.trim() !== '') {
                sendMessage(message);
                $('.type_msg').val('');
            }
        });

    });
</script>

</html>

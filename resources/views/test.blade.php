<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d66a197ad7a4ce6555da', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('public');
        channel.bind('chat', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>public</code>
        with event name <code>chat</code>.
    </p>
</body>

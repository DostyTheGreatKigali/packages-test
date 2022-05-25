<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flexible Countdown Timer</title>
</head>
<body>
    <h1 style="text-align: center" class="target"></h1>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('vendor/flexible-countdown/js/flexible-countdown.js') }}"></script>

    <script>
        flexible_countdown_init({
            future: "2022-03-22 00:00:00",
            target: ".target",
            expiry_message: "The Official Kotoko Fabucensus Launch is Starting Soon",
            reload_page: false,
            suffix: true,
            show_days: true
        });
    </script>
</body>
</html>

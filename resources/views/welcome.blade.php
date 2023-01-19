<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body class="antialiased">

<button class="test_et" type="button">Test Et</button>

<hr>

<input type="text" class="message" placeholder="Mesajınız" required>
<button type="button" class="send">Gönder</button>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"
        integrity="sha512-59oxERSDGj1eMzmFW3acSaBHEMNi2GaeQC7nQYcTqM0vgcnavi4BpUhLkcJQE2G6fdtn8JVj7brt0EZuBV0ogQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var socket = io("http://localhost:3000");

    $(document).ready(function () {
        //  BAĞLANTI TEST
        $(".test_et").click(function () {
            socket.emit("test",{
                "message" : "Sağlam Çalışıyor"
            });

            socket.on("test_sonuc",function (data) {
                console.log(data);
            })
        });

        // MESAJ GONDER
        $(".send").click(function () {
            var mesaj = $(".message").val();

            socket.emit("mesaj_gonder",{
                "data" : mesaj
            });

            socket.on("mesaj_sonuc",function (data) {
                console.log("Socket Gelen Mesaj: "+data);
            });
        });
    })
</script>
</body>
</html>

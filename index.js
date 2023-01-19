const app = require('express')();
const http = require('http').createServer(app);
const io = require('socket.io')(http);

const PORT = 3000;

io.on("connection",function (socket) {
    console.log("Ben Katıldım");

    // BAĞLANTI TEST
    socket.on("test",function (data) {
        io.emit("test_sonuc",data.message);
    });

    // MESAJ GONDER
    socket.on("mesaj_gonder",function (data) {
        io.emit("mesaj_sonuc",data.data)
    });

    socket.on("disconnect",function () {
        console.log("Ben Katıldım ve Çıkış Yaptım");
    });
});

http.listen(3000,function (){
    console.log(`${PORT} portu dinleniyor`);
});

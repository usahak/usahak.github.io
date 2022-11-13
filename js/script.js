// // ambil Element 
// var keyword = document.getElementById('keyword');
// var wadah = document.getElementById('wadah');
// var cari = document.getElementById('cari');

//     //tambahkan event ketika di ketik
// keyword.addEventListener('keyup', function() { 

//     //buat object ajax
//     var ajax = new XMLHttpRequest(); 

//     //cek kesiapannya
//     ajax.onreadystatechange = function() {
//         if (ajax.readyState == 4 && ajax.status == 200) {
//             wadah.innerHTML = ajax.responseText;
//         }
//     }

//     //lakukanlah
//     ajax.open('GET', 'ajax/siswa.php?keyword=' + keyword.value, true);
//     ajax.send();

// });

// menggunkan jquery
$(document).ready(function() {
    $('#cari').hide();

    //event saat di klik
    $('#keyword').on('keyup', function() {
        $('#wadah').load('ajax/siswa.php?keyword'= + $('#keyword').val());
    });
});
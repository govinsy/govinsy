//Fungsi Survey
$(document).ready(function () {
    let jumlahPertanyaan = $('#survei-pertanyaan ul').length; // Hitung jumlah ul
    let urutan = 1;


    //Fungsi bila tombol siap diclick
    $('#sudah-siap').on('click', function () {
        $(`#survei-proses`).removeClass('hilang');
        $(`#kesiapan`).addClass('hilang');
    });
    //End fungsi tombol siap



    // Ubah background li pada parent input radio saat memilih jawaban
    $('#survei-pertanyaan input').on("change", function () {
        //Fungsi ubah backround proses
        $(`#survei-pertanyaan #P${urutan} .color-blue-bg`).removeClass('color-blue-bg');
        $(this).closest('#survei-pertanyaan ul li').addClass('color-blue-bg');
        //End fungsi ubah background

        //Ubah background indikator pertanyaan
        $(`#indikator-pertanyaan #IP${urutan}`).removeClass('color-gray-bg');
        $(`#indikator-pertanyaan #IP${urutan}`).addClass('color-blue-bg');
        // End ubah indikator pertanyaan

        $(`#survei-pertanyaan #P${urutan}`).removeClass('pilih');
        $(`#survei-pertanyaan #P${urutan}`).addClass('pilih');//Tambahkan class sebagai indikator apabila sudah memilih jawaban sesuai urutan pertanyaan
        if (urutan == jumlahPertanyaan) {
            $('#selesai').addClass('lengkap');
            $('#selesai').removeClass('hilang');
        }

    });
    // End Fungsi ubah background

    if (urutan == 1) {
        $('#survei-pertanyaan #P1').removeClass('hilang');
    }



    //Fungsi bila tombol selanjutnya diclick
    $('#lanjut').on('click', function () {
        if ($(`#survei-pertanyaan #P${urutan}`).hasClass('pilih')) {
            $(`#survei-pertanyaan #P${urutan}`).addClass('hilang');
            urutan += 1;
            if (urutan > 1) {
                $(`#survei-pertanyaan #P${urutan}`).removeClass('hilang');
                $('#kembali').removeClass('hilang');
            }

            if (urutan == jumlahPertanyaan) {
                $('#lanjut').addClass('hilang');
                if ($('#selesai').hasClass('lengkap')) {
                    $('#selesai').removeClass('hilang');
                }
            }
        }
        else {
            alert('Pilih salah satu opsi sebelum lanjut ke pertanyaan berikutnya');
        }

    });
    // End fungsi tombol selanjutnya



    //Fungsi bila tombol sebelumnya diclick
    $('#kembali').on('click', function () {
        $(`#survei-pertanyaan #P${urutan}`).addClass('hilang');
        urutan -= 1;
        if (urutan > 1) {
            $(`#survei-pertanyaan #P${urutan}`).removeClass('hilang');
            if ($('#kembali').hasClass('hilang')) {
                $('#kembali').removeClass('hilang');
                $('#selesai').addClass('hilang');
            }
        }

        if (urutan != jumlahPertanyaan) {
            if ($('#lanjut').hasClass('hilang')) {
                $('#lanjut').removeClass('hilang');
                $('#selesai').addClass('hilang');
            }
        }

        if (urutan == 1) {
            $('#survei-pertanyaan #P1').removeClass('hilang');
            $('#selesai').addClass('hilang');
            $('#kembali').addClass('hilang');
        }
        console.log(urutan);

    });
    //End fungsi tombol sebelumnya


    //Create Indikator urutan pertanyaan
    for (i = 1; i <= jumlahPertanyaan; i++) {
        $('#indikator-pertanyaan').append('<li id="IP' + i + '" class="py-1 color-gray-bg mx-2"></li>');
    }
    //End indikator

});
//End fungsi survey




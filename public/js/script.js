$(document).ready(function () {


    //Fungsi Survey
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


// Fungsi crop dan upload gambar
$(document).ready(function () {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');
    var cropper;

    $('#upload_image').change(function (event) {
        var files = event.target.files;

        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function () {
        canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 600
        });
        let filename = $("#upload_image")[0].files[0];

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: 'http://localhost/govinsy/public/pengguna/profile',
                    method: 'POST',
                    data: {
                        image: base64data,
                        name: filename.name,
                        crop: true
                    },
                    success: function (data) {
                        location.reload();
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                    }
                });
            };
        });
    });

});
// End fungsi crop dan upload gambar


//Ambil data provinsi
$(document).ready(function () {

    let ambilProv = function (input = '', ulProv = '') {

        $(input).on('keypress', function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                event.preventDefault();
                return false;
            }
        });

        var magicalTimeout = 800;
        var timeout;

        $(input).keyup(function () {
            const url = $(this).data('url');
            const prov_names = $(this).val();

            clearTimeout(timeout);
            timeout = setTimeout(function () {
                $.ajax({
                    url: url + '/Statistik/cariProv',
                    method: 'POST', dataType: 'JSON',
                    data: {
                        prov_name: prov_names
                    },
                    success: function (data) {

                        $(ulProv).removeClass('hilang');


                        if (data.length == 0) {
                            $(ulProv).css('width', '100%');
                            $(ulProv).html("<li style='width: 100%;' class='list-none pl-4 pr-5 d-block py-2 color-content-font'> Data provinsi tidak ditemukan </li>");

                        }
                        else {

                            var liProv = '';
                            for (var i = 0; i < data.length; i++) {
                                liProv += "<li style='width:100%' class='list-none pl-4 d-block py-2'><a style='width:100%;height:100%;' class='d-block color-content-font text-decoration-none' href='" + url + "/statistik/provinsi?domain_id=" + data[i].prov_id + "&nama_provinsi=" + data[i].prov_name + "'><img width='5%' class='mr-2' src='" + url + "/img/provinsi/logo/" + data[i].prov_id + ".png'> Provinsi " + data[i].prov_name + "</a></li>";
                            }
                            $(ulProv).html(liProv);
                        }

                    },
                    error: function () {
                        $(ulProv).addClass('hilang');
                        $(ulProv).html('');
                    }
                });
            }, magicalTimeout);
        }).trigger("keyup");
    };


    if ($(window).width() < 768) {
        ambilProv('#cariProvMob', '#dataProvMob');
    }
    else {
        ambilProv('#cariProv', '#dataProv');
    }


});

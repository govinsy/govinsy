$(document).ready(function () {
    $(function () {
        $("[rel='tooltip']").tooltip();
    });

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



//Fungsi Form Validation
$(document).ready(function () {
    jQuery(function () {
        // jQuery("#ValidNumber").validate({
        //     expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
        //     message: "Should be a number"
        // });
        jQuery("#inputEmail").validate({
            expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) { $('#emailValid i').addClass('color-green-font'); $('#emailValid i').addClass('fa-check'); $('#emailValid i').removeClass('fa-times'); $('#emailValid i').removeClass('color-red-font'); return true; } else { $('#emailValid i').removeClass('color-green-font'); $('#emailValid i').removeClass('fa-check'); $('#emailValid i').addClass('fa-times'); $('#emailValid i').addClass('color-red-font'); return false; }",
        });
        jQuery("#inputPassword1").validate({
            expression: "if (VAL.length >= 8) { $('#password i').addClass('color-green-font'); $('#password i').addClass('fa-check'); $('#password i').removeClass('fa-times'); $('#password i').removeClass('color-red-font'); return true; } else { $('#password i').removeClass('color-green-font'); $('#password i').removeClass('fa-check'); $('#password i').addClass('fa-times'); $('#password i').addClass('color-red-font'); return false; }",
        });
        jQuery("#inputPassword1").validate({
            expression: "if (VAL.match(/\s?[a-z0-9\_]+[A-Z]/)) { $('#password_spc i').addClass('color-green-font'); $('#password_spc i').addClass('fa-check'); $('#password_spc i').removeClass('fa-times'); $('#password_spc i').removeClass('color-red-font'); return true; } else { $('#password_spc i').removeClass('color-green-font'); $('#password_spc i').removeClass('fa-check'); $('#password_spc i').addClass('fa-times'); $('#password_spc i').addClass('color-red-font'); return false; }",
        });
        jQuery("#inputPassword1").validate({
            expression: "if (VAL.match(/^[a-z0-9]+$/gi)) { $('#password_chr i').addClass('color-green-font'); $('#password_chr i').addClass('fa-check'); $('#password_chr i').removeClass('fa-times'); $('#password_chr i').removeClass('color-red-font'); return true; } else { $('#password_chr i').removeClass('color-green-font'); $('#password_chr i').removeClass('fa-check'); $('#password_chr i').addClass('fa-times'); $('#password_chr i').addClass('color-red-font'); return false; }",
        });
        jQuery("#inputPassword2").validate({
            expression: "if (VAL == jQuery('#inputPassword1').val() && VAL ) { $('#password1 i').addClass('color-green-font'); $('#password1 i').addClass('fa-check'); $('#password1 i').removeClass('fa-times'); $('#password1 i').removeClass('color-red-font'); return true; } else { $('#password1 i').removeClass('color-green-font'); $('#password1 i').removeClass('fa-check'); $('#password1 i').addClass('fa-times'); $('#password1 i').addClass('color-red-font'); return false; }",
        });
    });
});
//End Fungsi Form Validation



$(document).ready(function () {

    $('#togglePassword').on('click', function () {
        $("#togglePassword").toggleClass("toggled");
        $('#togglePassword').addClass('fa-eye');
        $('#togglePassword').removeClass('fa-eye-slash');
        $('form input[type=password]').addClass('passwordToggle');
        $('.passwordToggle').attr('type', 'password');

        if ($("#togglePassword").hasClass("toggled")) {
            $('.passwordToggle').attr('type', 'text');
            $('#togglePassword').removeClass('fa-eye');
            $('#togglePassword').addClass('fa-eye-slash');
        }
    });

});


$(document).ready(function () {

    $('#more').on('click', function () {
        if ($('#morle').hasClass('hilang')) {
            $("#morle").removeClass("hilang");
            $("#more").html('Lihat Lebih Sedikit');
        }
        else {
            $("#morle").addClass("hilang");
            $("#more").html('Lihat Lebih Banyak');
        }
    });

});

$(document).ready(function () {

    $(".switch").enhancedSwitch();

    $("#activeFirst").enhancedSwitch('setTrue');

    $(".switch").click(function () {
        var selectedSwitch = $(this);
        selectedSwitch.enhancedSwitch('toggle');
        console.log(selectedSwitch.enhancedSwitch('state'));
        const url = $(this).data('url');
        const userID = $(this).data('uid');
        const userTema = $(this).data('tema');
        const nowURL = $(this).data('now');

        $.ajax({
            url: url + "/pengguna/gantiTema",
            type: "POST",
            data: {
                userID: userID,
                userTema: userTema
            },
            success: function () {
                document.location.href = nowURL;
            }
        });

    });

});


$description = $(".descriptions");

$('.enabled').hover(function () {

    $description.addClass('active');
    let prov_id = $(this).closest('g').attr('id');
    $('.' + prov_id).removeClass('hilang');
}, function () {
    $description.removeClass('active');
    $('.map-prov').addClass('hilang');
});

$(document).on('mousemove', function (e) {

    if ($("#page").data('page') == "Home") {
        $description.css({
            left: e.clientX + 20,
            top: e.clientY - 230
        });
    }
    else if ($("#page").data('page') == "Statistik") {
        $description.css({
            left: e.clientX + 15,
            top: e.clientY - 320,
            width: '200px',
        });
    }


});


for (k = 1000; k <= 9400; k += 100) {
    if ($('.' + k).hasClass('bahaya')) {
        $('#' + k + ' .map-loc').addClass('color-red-fill');
    }
    else if ($('.' + k).hasClass('peringatan')) {
        $('#' + k + ' .map-loc').addClass('color-yellow-fill');
    }
    else if ($('.' + k).hasClass('siaga')) {
        $('#' + k + ' .map-loc').addClass('color-green-fill');
    }
}



$(document).ready(function () {
    if ($("#page").data('page') == "Statistik") {
        $(".enabled").click(function () {
            let prov_id = $(this).closest('g').attr('id');
            const url = $('#map_desc').data('url');
            $('#map_desc').removeClass('hilang');
            $('.enabled').removeClass('color-blue-fill');
            $(this).addClass('color-blue-fill');


            $.ajax({
                url: url + "/Statistik/ambilProvinsi",
                type: "POST",
                data: {
                    provID: prov_id,
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#map_desc h4').html('<img class="float-left size-20 mr-2" src="' + url + '/img/provinsi/logo/' + data[0].id_prov + '.png"> Provinsi ' + data[0].nama_prov);
                    $('#populasi').html(data[0].populasi + ' <sub>Jiwa</sub>');
                    $('#luas_wilayah').html(data[0].luas_wilayah + ' <sub>KM <sup>2</sup></sub>');
                    $('#map_desc a').attr('href', url + '/statistik/provinsi?domain_id=' + data[0].id_prov + '&nama_provinsi=' + data[0].nama_prov);
                    $('#map_spot').css('background-image', 'url(' + url + '/img/provinsi/spot/' + data[0].id_prov + '.jpg)');
                    $('#map_spot').css('background-size', 'cover');
                    console.log(data[0].id_prov);
                }
            });

        });

        // //Deskripsi Provinsi Map
        // $('.enabled').click(function (e) {

        //     $description.addClass('active');
        //     let prov_id = $(this).closest('g').attr('id');
        //     $('.' + prov_id).removeClass('hilang');

        //     $description.css({
        //         left: e.clientX + 20,
        //         top: e.clientY - 230
        //     });
        // }, function () {
        //     $description.removeClass('active');
        //     $('.map-prov').addClass('hilang');
        // });
    }

});
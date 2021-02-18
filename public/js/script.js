$(function () {

    $(".tampilModalTambah").on("click", function () {
        $("#judulModal").html("Tambah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Tambah Data");
        $(".modal-body form").attr("action", "http://localhost/Phpmvc/public/mahasiswa/tambah");
        $.ajax({
            success: function (data) {
                $('#nim').val('');
                $('#nama').val('');
                $('#jurusan').val('');
                $('#email').val('');
            }
        });
    });

    $(".tampilModalUbah").on("click", function () {
        $("#judulModal").html("Ubah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr("action", "http://localhost/Phpmvc/public/mahasiswa/ubah");

        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/Phpmvc/public/mahasiswa/getUbah",
            data: {
                id: id
            },
            method: "post",
            dataType: "json",
            success: function (data) {
                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#jurusan').val(data.jurusan);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });
    });
});
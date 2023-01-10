$(function () {
  $(".modalAdd").on("click", function () {
    $("#modalTitle").html("Tambah Data Siswa");
    $(".modal-footer [type=submit]").html("Tambah Data");

    $("#nama").val("");
    $("#kelas").val($("#kelas option:first").val());
    $("#jurusan").val($("#jurusan option:first").val());
  });

  $(".modalEdit").on("click", function () {
    $("#modalTitle").html("Edit Data Siswa");
    $(".modal-footer [type=submit]").html("Edit Data");
    $("form").attr("action", "http://localhost/phpmvc/public/siswa/edit");

    const id = $(this).data("id");

    // Menggunakan AJAX
    // $.ajax({
    //   url: `http://localhost/phpmvc/public/siswa/getEdit`,
    //   data: { id },
    //   method: "POST",
    //   dataType: "json",
    //   success: (data) => {
    //     $("#id").val(data.id);
    //     $("#nama").val(data.nama);
    //     $("#kelas").val(data.kelas);
    //     $("#jurusan").val(data.jurusan);
    //   },
    // });

    // Menggunakan Fetch
    fetch("http://localhost/phpmvc/public/siswa/getEdit", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id }),
    })
      .then((response) => response.json())
      .then((data) => {
        $("#id").val(data.id);
        $("#nama").val(data.nama);
        $("#kelas").val(data.kelas);
        $("#jurusan").val(data.jurusan);
      })
      .catch((error) => console.error(error));
  });
});

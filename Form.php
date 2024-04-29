<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="form.css" />
    <link href="fontawesome-free-6.5.2-web/css/all.css" rel="stylesheet"/>
    <link href="fontawesome-free-6.5.2-web/css/solid.css" rel="stylesheet"/>
    <link href="fontawesome-free-6.5.2-web/css/regular.css" rel="stylesheet"/>
    <script src="jquery-3.7.1.js"></script>
    <script src="datamahasiswa.js"></script>
  </head>
  <body>
    <form action="" autocomplete="off" method="post" id="formulir-pendaftaran" style="display:none">
      <fieldset>
        <legend>Data Pribadi</legend>
        
        <div>
          <label for="nama">Nama</label>
          <input
            type="text"
            name="nama"
            id="nama"
            placeholder="Masukkan Nama"
            size="5"
            class="form-input"
          />
        </div>

        <div>
          <label for="domisili">Domisili</label>
          <select id="domisili" name="domisili">
            <option value="Parepare">Parepare</option>
            <option value="Barru">Barru</option>
            <option value="Sidrap">Sidrap</option>
            <option value="Pinrang">Pinrang</option>
            <option value="Makassar">Makassar</option>
          </select>
        </div>

        <div>
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" id="tempat_lahir" name="tempat_lahir" list="daftar_tempat_lahir" />
            <datalist id="daftar_tempat_lahir">
              <option value="Parepare">
              <option value="Barru">
              <option value="Sidrap">
              <option value="Pinrang">
              <option value="Makassar">
          </datalist>
        </div>

        <div>
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" />
        </div>

        <div>
          <label for="alamat">Alamat</label>
          <input
            type="text"
            name="alamat"
            id="alamat"
            placeholder="Jl.contoh"
            size="5"
            class="form-input"
          />
        </div>

        <div>
          <label for="email">Email</label>
          <input 
          type="text"
          name="email"
          id="email"
          placeholder="contoh@gmail.com"
          size="5"
          class="form-input"
          />
        </div>

        <div>
          <label for="nomor_telpon">Nomor Telpon</label>
          <input 
          type="text"
          name="nomor_telpon"
          id="nomor_telpon"
          placeholder="08**********"
          size="5"
          class="form-input"
          />
        </div>

        <div>
          <label>Jenis Kelamin</label>
          <div class="flex">
              <label><input type="radio" name="jenis_kelamin" value="L"/> Laki-Laki</label>
              <label><input type="radio" name="jenis_kelamin" value="P"/> Perempuan</label>
          </div> 
        </div> 

        <div>
          <button type="reset" name="reset" ><i class="fa-solid fa-xmark"></i>BATAL</button>
          <button type="submit" name="submit" onclick= "insert();"><i class="fa-regular fa-floppy-disk"></i> SIMPAN </button>
        </div>
      </fieldset>
    </form>
    <div id="table-container">
        <button type="button" id="tambah_mahasiswa"><i class="fa-solid fa-user-plus" onclick=""></i> TAMBAH MAHASISWA</button>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Domisili</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telpon</th>
                    <th>Jenis Kelamin</th>
                    <th>  </th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>
    <script>
        var form = document.getElementById("formulir-pendaftaran");
        function handleForm(event) { event.preventDefault();}
        form.addEventListener('submit', handleForm);

        function insert(){
          $(document).ready(function(){
            $.ajax({
              url:'function.php',
              type: 'POST',
              data: {
                nama: $("input[name=nama]").val(),
                email: $("input[name=email]").val(),
                domisili: $("#domisili").val(), // Mengambil nilai dari select domisili
                tempat_lahir: $("input[name=tempat_lahir]").val(),
                tanggal_lahir: $("input[name=tanggal_lahir]").val(),
                nomor_telpon: $("input[name=nomor_telpon]").val(),
                jenis_kelamin: $("input[name=jenis_kelamin]:checked").val(),
                alamat: $("input[name=alamat]").val(),
                action: "insert"
              },
              success:function(response){
                if(response == 1) {
                  alert("Data berhasil ditambahkan!");
                }
                else {
                  alert("Gagal menambahkan data!");
                }
              }
            });
          });
        }
        
        $('#tambah_mahasiswa').click(function() {
          $('#formulir-pendaftaran').show();
          $('#table-container').hide();
        });
    </script>
  </body>
</html>
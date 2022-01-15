<?php 
//Proses Delete data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id_anggota = '$id'");
    if ($query_delete) {
        ?>
        
        <div class="alert alert-success">
                    DATA BERSAHIL DIHAPUS !!!  
                </div>

        
        
        <?php
         header('refresh: 2; url=http://localhost/perpus_nurul/admin.php?page=anggota');   
    }
}

  //Proses Insert Tambah Data
        if (isset($_POST['submit'])) 
        {

        $id_anggota = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $tanggal_lahir = $_POST['tgl_lahir'];
        $no_telpon = $_POST['tlp'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['gender'];

        $query_insert = mysqli_query($konek,"INSERT INTO anggota 
        VALUES ('$id','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$no_telp','$alamat','$jenis_kelamin')" );

        // MEMBUAT NOTIFIKASI JIKA BERHASIL/TIDAK DISIMPAN DATANYA
        if ($query_insert) {
            ?>
                <div class="alert alert-success">
                    DATA BERSAHIL DISMPAN !!!  
                </div>

            <?php
           header('refresh: 2; url=http://localhost/perpus_nurul/admin.php?page=anggota');   
        
        
        }else{
            ?>
            <div class="alert alert-success">
                DATA BERSAHIL DISMPAN !!!  
       </div>
                <?php
        }

        }
  //
?>
<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>

<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>Id Anggota</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tgl Lahir</th>
        <th>Tlp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT*FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['id_anggota']; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle"><?php echo $row['jurusan']; ?></td>
        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>
        <td valign="middle"><?php echo $row['no_telpon']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jenis_kelamin']; ?></td>
        <td valign="middle">
       
       <!--HAPUS DATA -->

        <a href="?page=anggota&delete&id=<?php echo $row['id_anggota']; ?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">HAPUS</i></button>
        </a>
            <!--UBAH DATA -->

            <button class="btn btn-success"><i class="fas fa-edit">UBAH</i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data Anggota
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
     
     
      <!-- Form Input Anggota  -->
         <form action="" method="post">

         <div class="form-group mt-2">
            <input class="form-control" type="text" name ="id_anggota" placeholder="Id_anggota" required>
        </div>
        
         <div class="form-group mt-2">
            <input class="form-control" type="text" name ="nis" placeholder="NIS" required>
        </div>

        <div class="form-group mt-2">
            <input class="form-control" type="text" name ="nama" placeholder="Nama Siswa" required>
        </div>

        
       
        <div class="class form grup mt-2">
            <select class="form-control" name="kelas">
                <option value="">Pilih kelas</option>
                <option value="RPL1">RPL1</option>
                <option value="RPL2">RPL2</option>
                <option value="RPL3">RPL3</option>
                <option value="RPL4">RPL4</option>
                </select>    
        </div>

        <div class="class form grup mt-2">
            <select class="form-control" name="jurusan">
                <option value="">Pilih Jurusan</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Kendaran Ringan">TKR</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik</option>
                <option value="Teknik Audio Video">Teknik Audio Video</option>
                </select>    
        </div>

        <div class="form-group mt-2">
            <div class="input-group">
            <span class="input-group-text">Tanggal Lahir</span>
              <input class="form-control" type="date" name ="tgl_lahir" placeholder="tgl_lahir" required>
            </div>
        </div>


          <div class="form-group mt-2">
                <input class="form-control" type="text" name ="no_telp" placeholder="notelp" required>
          </div>

          <div class="form-group mt-2">
                <textarea class="form-control" type="text" name ="alamat" placeholder="alamat" required></textarea>
          </div>

          <div class="class form group mt-2">
            <select class="form-control" name="jenis_kelamin" id="">
            <option value="">Jenis Kelamin</option>
            <option value="L">L</option>
            <option value="p">P</option>
            </select>
        </div>
      
     

      <!--END FORM INPUT ANGGOTA -->
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">submit</button>

        </form>
      </div>
    </div>
  </div>
</div>

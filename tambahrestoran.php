</table>
    <h3>Tambahkan Data</h3>
    <form method="post" action="">
    <table>
        <tr>
            <td width="130">Nama Restoran:</td>
            <td><input type="text" name="nama" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Gambar Restoran:</td>
            <td><input type="text" name="gambar"autocomplete="off"></td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td><input type="text" name="alamat" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Telepon:</td>
            <td><input type="text" name="telepon" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Jam buka - Jam tutup:</td>
            <td><input type="text" name="jam_buka" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Deskripsi:</td>
            <td><input type="text" name="deskripsi" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Menu:</td>
            <td><input type="text" name="menu" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Rating Restoran:</td>
            <td><input type="text" name="rating_restoran" required autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value ="Simpan" name="proses"></td>
        </tr>
    </table>
    </form>
<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($mysqli,"insert into restoran set
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    telepon = '$_POST[telepon]',
    jam_buka_jam_tutup = '$_POST[jam_buka]',
    deskripsi = '$_POST[deskripsi]',
    menu = '$_POST[menu]',
    rating_restoran = '$_POST[rating_restoran]'");
    echo "Data restoran baru berhasil tersimpan."; 
header("Location: index.php?page=restoran");


}
?>
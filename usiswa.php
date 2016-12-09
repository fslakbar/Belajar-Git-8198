<?php

// update 9 des 2016
// m. faisal akbar

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = $_GET['a'];
if(!is_numeric($id)){
	exit('Access Forbidden');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new nationality();
$data_nation = $nation->readAllNationality();

if(empty($data)){
	exit('Data Not Found');
}

$dt = $data[0];

?>
<h1>Edit data siswa</h1>
<form action="edtsiswa.php"a=<?php echo $id?> method="POST" enctype="multipart/form-data">
	NIS:<br />
	<input type="text" value="<?php echo $dt['id_siswa']?>"
		name="in_nis" readonly="true"><br />
	Nama Lengkap:<br />
	<input type="text" name="in_name" value="<?php echo $dt['full_name']?>"><br />
	Email:<br />
	<input type="text" name="in_email" value="<?php echo $dt['email']?>"><br />
	Kewarganegaraan:<br />
	<select name="in_nation">
		<option value=""> --Pilih Negara-- </option>
		<?php foreach($data_nation as $n): ?>
		<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":""?>
		<option value="<?php echo $n['id_nationality']?>">
			<?php echo $n['nationality']?>
		</option>
			<?php endforeach?>
	</select>
	
	<br />
	Foto : <input type="file" name="in_foto">
	
	<br />
	<input type="submit" name="kirim" value="simpan">
	
</form>

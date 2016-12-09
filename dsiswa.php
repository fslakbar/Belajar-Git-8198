<?php

// update 9 des 2016
// m. faisal akbar

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['a'];
if(!is_numeric($id)){
	exit('Access Forbidden');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

if(empty($data)){
	exit('Data Not Found');
}

$dt = $data[0];

?>
<table border="1px">
	<tr>
		<th>id siswa</th>
		<th>full name</th>
		<th>email</th>
		<th>negara</th>
		<th>tanggal lahir</th>
	</tr>
	<?php foreach($data as $a) :?>
		<tr>
			<td><?php echo $a['id_siswa']; ?></td>
			<td><?php echo $a['full_name']; ?></td>
			<td><?php echo $a['email']; ?></td>
			<td><?php echo $a['nationality']; ?></td>
			<td><?php echo $a['date_ob']; ?></td>
		</tr>
	<?php endforeach ?>
	</table>
	<a href= "siswa.php">kembali</a>


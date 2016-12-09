<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/age.php');

$age='';
$siswa = new Siswa();
$hitungAge = new Age($age);
$data = $siswa->readAllSiswa();

?>
<h1> Data Siswa</h1>
<table border="1px">
	<tr>
		<th>ID</th>
		<th>Nama Lengkap</th>
		<th>Email</th>
		<th>Tanggal Lahir</th>
		<th>Negara</th>
		<th>Usia</th>
		<th>Detail</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	$n = 1;
	foreach($data as $a) :?>
		<tr>
			<td><?php echo $a['id_siswa']; ?></td>
			<td><?php echo $a['full_name']; ?></td>
			<td><?php echo $a['email']; ?></td>
			<td><?php echo $a['date_ob']; ?></td>
			<td><?php echo $a['nationality']; ?></td>
			<td>
			<?php
				$tanggal = $a['date_ob'];
				if(!empty($tanggal)){
				$exec = $hitungAge->age($tanggal);
				echo $exec->y."tahun ".$exec->m." Bulan ".$exec->d."hari";
				}else if($a['date_ob'] == 0000-00-00){
					echo '<p style="color:red;">Data Tidak Valid</p>';
				}else{
					echo '<p style="color:red;">Data Tidak Valid</p>';
				}
			?>
			</td>
			
			<td>
				<a href="dsiswa.php?a=<?php echo $a['id_siswa']?>">
				Detail</a>
			</td>
			
			<td>
				<a href="usiswa.php?a=<?php echo $a['id_siswa']?>">
				Edit
				</a>
			</td>
			
			<td>
				<a href="delsiswa.php?a=<?php echo $a['id_siswa']?>">
				Delete
				</a>
			</td>
		</tr>
	<?php 
		$n++;
		endforeach ?>
	</table>
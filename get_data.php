<?php
    include 'koneksi.php';
 
    $nama_siswa=  '%' . htmlspecialchars($_POST['nama_siswa']) . '%';
 
    $i = 1;
    $query = "SELECT * FROM tbl_siswa WHERE nama_siswa LIKE ? ORDER BY nama_siswa ASC LIMIT 10";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param("s", $nama_siswa);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
    while ($row = $res1->fetch_assoc()) {
        $data[$i]['id'] = $row['id'];
        $data[$i]['nama_siswa'] = $row['nama_siswa'];
        $data[$i]['alamat'] = $row['alamat'];
        $data[$i]['avatar'] = $row['avatar'];
 
        $i++;
	} 
 
    $out = array_values($data);
    echo json_encode($out);
?>
    

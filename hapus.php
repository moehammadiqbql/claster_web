<?php
require 'functions.php';

$id = $_GET["id_barang"];

if (hapus($id) > 0) {
	echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href = 'tambah.php';
			</script>
		";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location.href = 'tambah.php';
			</script>
		";
}

<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA LAPORAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />

    
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@iconify/iconify@2.0.0-rc.6/dist/iconify.min.js"></script>

    <style type="text/css" media="print">
        @page {
            size: 29.7cm 21cm;
            margin: 10mm 12mm 10mm 12mm;
            /* change the margins as you want them to be. */
        }
    </style>
</head>
<body>

	<center>

		<h2>DATA LAPORAN SENSUS POHON</h2>
		<small><?php echo $date_first.' - '.$date_second.', blok '.$blok.', Baris '.$baris.', No Pohon '.$no_pohon; ?></small>

	</center>


	<table class="uk-table uk-table-small uk-table-middle" border="1" style="width: 100%; font-size: 10px">
		<tr>
            <th class="uk-text-center">Tanggal</th>
            <th class="uk-text-center">Kode</th>
            <th class="uk-text-center">Jumlah Buah</th>
            <th class="uk-text-center">Buah Rusak</th>
            <th class="uk-text-center">Buah Siap Panen</th>
            <th class="uk-text-center">Sisa Buah</th>
            <th class="uk-text-center">Foto</th>
            <th class="uk-text-center">Status</th>
        </tr>
		<?php 
		$no = 1;
		foreach ($laporan as $b) {
        ?>
		<tr>
            <td class="uk-text-center"><?php echo date('d F Y', strtotime($b->create_at)); ?></td>
            <td class="uk-text-center"><?php echo $b->kode_pohon; ?></td>
            <td class="uk-text-center"><?php echo $b->jml_buah; ?></td>
            <td class="uk-text-center"><?php echo $b->buah_rusak; ?></td>
            <td class="uk-text-center"><?php echo $b->buah_sp_pn; ?></td>
            <td class="uk-text-center"><?php echo $b->sisa; ?></td>
            <td class="uk-text-center"><img style="width:70px;" src="<?php echo base_url(); ?>assets/img/laporan/<?php echo $b->foto; ?>"></td>
            <td class="uk-text-center">
                <?php
                if($b->status == 'benar')
                {
                ?>
                <span class="uk-text-success"><span class="iconify" data-icon="ant-design:check-circle-filled" data-inline="false"></span> Benar</span>
                <?php
                }
                if($b->status == 'salah')
                {
                ?>
                <span class="uk-text-danger"><span class="iconify" data-icon="ant-design:close-circle-filled" data-inline="false"></span> Salah</span>
                <?php
                }
                ?>
            </td>
        </tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>
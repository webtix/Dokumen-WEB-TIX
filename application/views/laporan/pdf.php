<table width="100%" border="1" style="border-collapse:collapse; text-align:center;">
	<thead>
		<tr>
			<th colspan="4"><h3>Laporan Penjualan</h3></th>
		</tr>
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
			<th>Jumlah Penonton</th>
			<th>Jumlah Pendapatan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pemesanan as $key => $val): ?>
			<tr>
				<td><?php echo $key + 1 ?></td>
				<td><?php echo $val['Tanggal'] ?></td>
				<td><?php echo $val['JumlahPenonton'] ?></td>
				<td>Rp. <?php echo number_format($val['JumlahPendapatan'], 0) ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?php

class Manager_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list_rank_menu($search = FALSE)
	{
		if ($search === FALSE) {
			$SQL = "
				SELECT menu.nama_menu, menu.harga, sum(detail_transaksi.jumlah_beli) AS jumlah_beli, transaksi.tanggal
				FROM menu LEFT JOIN detail_transaksi ON menu.id = detail_transaksi.id_menu
						LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
				WHERE
					(detail_transaksi.jumlah_beli IS NULL)
					OR
					(MONTH(transaksi.tanggal)= MONTH(CURRENT_DATE()) AND YEAR(transaksi.tanggal)=YEAR(CURRENT_DATE())) 
				GROUP BY menu.id
				ORDER BY detail_transaksi.jumlah_beli DESC
			";
			$query = $this->db->query($SQL);
			return $query->result();
		}
	}

}

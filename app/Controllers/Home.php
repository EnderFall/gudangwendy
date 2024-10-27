<?php

namespace App\Controllers;
use App\Models\M_belajar;
use TCPDF;
use Dompdf\Dompdf;



class Home extends BaseController
{

/*
Level 1 Admin
Level 2 Manager
Level 3 leader gudang
Level 4 Gudang masuk
Level 5 Gudang Keluar
*/
	public function index()
	{
		echo view('header');
		echo view('login');	
		echo view('footer');
	}

//Login
	public function aksi_login() 
	{
		$a=$this->request->getPost('nama');
		$b=$this->request->getPost('pass');

		$Joyce= new M_belajar;
		$wendy = array (
			'username'=>$a,
			'password'=>$b,
		);

		$cek = $Joyce->edit('user',$wendy);
		
		if($cek != null){
			session()->set('id', $cek->id_user);
			session()->set('u', $cek->username);
			session()->set('level', $cek->level);

			return redirect()->to('dashboard');
		} else {
			return redirect()->to('index');
		}
	}
	public function logout(){
		session()->destroy();
		return redirect()->to('index');
	}
	public function dashboard()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('dashboard');
		echo view('footer');
		} else {
			return redirect()->to('index');
		}
	}


//Tabel Barang	
	public function barangfn()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('Barang/barangfl', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function laporanbarang()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('Barang/laporanbarang', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function printbarang()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$a=$this->request->getpost('tglmasuk');
		$b=$this->request->getpost('tglklr');
		
		$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
		
		echo view('Barang/printbarang', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function excelbrg()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$a=$this->request->getpost('tglmasuk');
		$b=$this->request->getpost('tglklr');
		
		$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
		
		echo view('Barang/excelbarang', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function printexcel()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$a=$this->request->getpost('tglmasuk');
		$b=$this->request->getpost('tglklr');
		
		$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
		
		echo view('Barang/printexcel', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
}


public function pdfbrg()
{
	if (session()->get('level')==1 || session()->get('level')==3){
	
	$Joyce= new M_belajar;
	$a=$this->request->getpost('tglmasuk');
	$b=$this->request->getpost('tglklr');
	
	$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
	
	echo view('Barang/pdfbarang', $wendy);
	
}else if (session()->get('id')>0){
	return redirect()->to('error');
} else {
	return redirect()->to('index');
}
}

public function pdfprint() {
    if (session()->get('level') == 1 || session()->get('level') == 3) {

        $Joyce = new M_belajar();
		$a = $this->request->getPost('tglmasuk');
        $b = $this->request->getPost('tglklr');
        $wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg = barang.id_brg', 'tanggal >=', $a, 'tanggal <=', $b);



// Create new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Sample PDF');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Set content
$html = file_get_contents('Barang/pdfbrg');

// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output the PDF (I => Inline, D => Download, F => Save to file)
$pdf->Output('sample.pdf', 'I'); // Use 'I' to view in the browser or 'D' to force download

	} else if (session()->get('id') > 0) {   
        return redirect()->to('error');
    } else {
        return redirect()->to('index');
    }
}


	public function inputbarang()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		echo view('header');
		echo view('menu');
		echo view('Barang/inputbarang');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
}
public function hapus_barang($id){
	if (session()->get('level')==1 || session()->get('level')==3){
	$Joyce= new M_belajar;
	$wece= array('id_brg' => $id);
	$wendy['anjas'] = $Joyce->hapus('barang', $wece);
	return redirect()->to('barangfn');
} else if (session()->get('id')>0){
	return redirect()->to('error');
} else {
	return redirect()->to('index');
}
}

	public function edit_barang($id){
		if (session()->get('level')==1 || session()->get('level')==3){
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$wendy['anjas'] = $Joyce->edit('barang', $wece);
		echo view('header');
		echo view('menu');
		echo view('Barang/editbrg', $wendy);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barang(){
		if (session()->get('level')==1 || session()->get('level')==3){
		$a=$this->request->getpost('nama');
		$b=$this->request->getpost('kodebrg');
		$c=$this->request->getpost('stokbrg');
		$id=$this->request->getpost('idbrg');
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$data = array(
			"nama_brg"=>$a,
			"kode_brg"=>$b,
			"stok"=>$c
		);
	
		$Joyce->updat('barang', $data,$wece);
		return redirect()->to('barangfn');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	 }
	 
	 
	 public function simpan_barang(){
		if (session()->get('level')==1 || session()->get('level')==3){
	    
	    $b=$this->request->getpost('nama_brg');
	    $c=$this->request->getpost('kode_brg');
	    $d=$this->request->getpost('stok_brg');
		$data = array(
			
			"nama_brg"=>$b,
			"kode_brg"=>$c,
			"stok"=>$d
		);
		$Joyce= new M_belajar;
		$Joyce->input('barang', $data);
		return redirect()->to('barangfn');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}


	//Barang Masuk

	public function barangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('BrgM/barangmasuk', $brm);
		echo view('footer');
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function laporanbarangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('BrgM/laporanbrgm', $brm);
		echo view('footer');
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function tabelbarangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		
		
		echo view('BrgM/tabelbrgm', $brm);
		
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function hapus_barangmasuk($id){
		if (session()->get('level')==1 || session()->get('level')==3){
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$wendy['anjas'] = $Joyce->hapus('brg_masuk', $wece);
		return redirect()->to('barangmasuk');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function edit_barangmsk($id){
		if (session()->get('level')==1 || session()->get('level')==3){
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_masuk', $wece);
		echo view('header');
		echo view('menu');
		echo view('BrgM/editbrgmsk', $wendy);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barangmsk(){
		if (session()->get('level')==1 || session()->get('level')==3){
		$a=$this->request->getpost('idbrg');
		$b=$this->request->getpost('jumlahbrg');
		$c=$this->request->getpost('tanggalmsk');
		$id=$this->request->getpost('idbm');
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
	
		$Joyce->updat('brg_masuk', $data,$wece);
		return redirect()->to('barangmasuk');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	 }
	public function tbm(){
		if (session()->get('level')==1 || session()->get('level')==3){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('BrgM/tbarangmasuk', $wendy);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}

	 }
	 public function simpan_barang_m(){
		if (session()->get('level')==1 || session()->get('level')==3){
	    $a=$this->request->getpost('id_brgm');
	    $b=$this->request->getpost('jumlahbrg');
	    $c=$this->request->getpost('tanggalmsk');
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
		$Joyce= new M_belajar;
		$Joyce->input('brg_masuk', $data);
		return redirect()->to('barangmasuk');
	
	} else if (session()->get('id')>0){
	return redirect()->to('error');
} else {
	return redirect()->to('index');
}
	}


	//Barang Keluar
	public function barangkeluar()
	{
		if (session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==5){
		$brgklr= new M_belajar;
		$brk['keluarbrg'] = $brgklr->join('brg_keluar', 'barang', 'brg_keluar.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('BrgK/barangkeluar', $brk);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function hapus_barangkeluar($id){
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$wendy['anjas'] = $Joyce->hapus('brg_keluar', $wece);
		return redirect()->to('barangkeluar');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function edit_barangklr($id){
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_keluar', $wece);
		echo view('header');
		echo view('menu');
		echo view('BrgK/editbrgklr', $wendy);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barangklr(){
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		$a=$this->request->getpost('nama');
		$b=$this->request->getpost('kodebrg');
		$c=$this->request->getpost('stokbrg');
		$id=$this->request->getpost('idbrg');
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$data = array(
			"nama_brg"=>$a,
			"kode_brg"=>$b,
			"stok"=>$c
		);
	
		$Joyce->updat('brg_keluar', $data,$wece);
		return redirect()->to('barangkeluar');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	 }
	 public function laporanbarangklr()
	 {
		 if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		 
		 $Joyce= new M_belajar;
		 $wendy['anjas'] = $Joyce->tampil('brg_keluar');
		 echo view('header');
		 echo view('menu');
		 echo view('BrgK/tblbrgk', $wendy);
		 echo view('footer');
	 }else if (session()->get('id')>0){
		 return redirect()->to('error');
	 } else {
		 return redirect()->to('index');
	 }
	 }
	 public function printbarangk()
	{
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('brg_keluar');
		
		echo view('BrgK/printbrgklr', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function tbk(){
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('BrgK/tbarangkeluar', $wendy);
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}

	 }
	 public function simpan_barang_k(){
		if (session()->get('level')==1 || session()->get('level')==3|| session()->get('level')==5){
	    $a=$this->request->getpost('id_brgk');
	    $b=$this->request->getpost('jumlahbrg');
	    $c=$this->request->getpost('tanggalmsk');
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
		
		$Joyce= new M_belajar;
		$Joyce->input('brg_keluar', $data);
		return redirect()->to('barangkeluar');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	 //Tabel User
	public function tabeldatauser()
	{
		if (session()->get('level')==1){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('user');
		echo view('header');
		echo view('menu');
		echo view('User/tabeluser', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function inputuser()
	{
		if (session()->get('level')==1){
		echo view('header');
		echo view('menu');
		echo view('User/inputuser');
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function hapus_user($id){
		if (session()->get('level')==1){
		$Joyce= new M_belajar;
		$wece= array('id_user' => $id);
		$wendy['anjas'] = $Joyce->hapus('user', $wece);
		return redirect()->to('tabeluser');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	





	//Tabel Karyawan
	public function tabeldatakaryawan()
	{
		if(session()->get('level') ==1 || session()->get('level')==2){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('karyawan');
		echo view('header');
		echo view('menu');
		echo view('Karyawan/tabelkaryawan', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	

	
	public function inputkaryawan()
	{
		if(session()->get('level') ==1 || session()->get('level')==2){
		echo view('header');
		echo view('menu');
		echo view('Karyawan/tambahkry');
		echo view('footer');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
}
	
public function simpan_karyawan(){
	if(session()->get('level') ==1 || session()->get('level')==2){
	$Joyce= new M_belajar;

	$a=$this->request->getpost('nama');
	$b=$this->request->getpost('email');
	$c=$this->request->getpost('pw');
	$d=$this->request->getpost('nik');
	$e=$this->request->getpost('jk');
	$f=$this->request->getpost('tmptlhr');
	$g=$this->request->getpost('dt');
	$h=$this->request->getpost('alamat');
	$i=$this->request->getpost('nohp');
	$j=$this->request->getpost('lvl');

	$data = array(
		"username"=>$b,
		"password"=>$c,
		"level"=>$j
	);
	$data2 = array (
			"nama"=>$a,
			"nik"=>$d,
			"tmpt_lahir"=>$f,
			"tgl_lahir"=>$g,
			"jenis_kelamin"=>$e,
			"alamat"=>$h,
			"no_telp"=>$i
	);
	$where=array(
		"username"=>$b,

	);
	
	$wendy=$Joyce->edit('user',$where);
	$Joyce->input('user', $data);
	$Joyce->input('karyawan', $data2, $where);
	return redirect()->to('tabeldatakaryawan');
} else if (session()->get('id')>0){
	return redirect()->to('error');
} else {
	return redirect()->to('index');
}
}

	public function hapus_karyawan($id){
		if(session()->get('level') ==1 || session()->get('level')==2){
		$Joyce= new M_belajar;
		$wece= array('id_user' => $id);
		$wendy['anjas'] = $Joyce->hapus('karyawan', $wece);
		return redirect()->to('tabelkaryawan');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}






	//Barang Rusak
	public function barangrusak()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('barangrusak');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}
	public function error (){
		echo view('error');
	}
	

	public function laporan()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('laporan');
		echo view('footer');
		} else {
			return redirect()->to('index');
		}
	}
	
	
}

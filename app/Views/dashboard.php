<h2 align="center">Halaman Utama</h2>

<h3 align="center">Hello "<?php
echo session()->get('u');
?>"!
</h3>

<h4>You are "<?php
if (session()->get('level') == 1){
    echo "Admin Gudang";
} else if(session()->get('level') == 2){
    echo "Manager Gudang";
} else if(session()->get('level') == 3){
    echo "Leader Gudang";
}else if(session()->get('level') == 4){
    echo "Karyawan Gudang Masuk";
}else if(session()->get('level') == 5){
    echo "Karyawan Gudang Keluar";
} else{
    echo "Unavailable";
}
?>" </h4>
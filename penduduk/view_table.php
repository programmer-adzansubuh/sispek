<script src="../js/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <?php 
        require '../functions.php';
        $penduduk = query("SELECT tabelalamat.blok, tabelpenduduk.nik, tabelpenduduk.tempat_lahir, tabelpenduduk.tanggal_lahir, tabelpenduduk.agama, tabelpenduduk.nama, tabelpenduduk.jenis_kelamin, tabelpenduduk.status_perkawinan, tabelpenduduk.status_dan_keluarga FROM tabelalamat INNER JOIN tabelpenduduk");
        
        $result = array();

        $i = 1; 
        foreach ($penduduk as $pen){

            $result[] = array(
                $i++,
                $pen["nik"],
                $pen["nama"],
                $pen["tempat_lahir"],
                $pen["tanggal_lahir"],
                $pen["agama"],
                $pen["jenis_kelamin"],
                $pen["blok"],
                $pen["status_perkawinan"],
                $pen["status_dan_keluarga"],
                "Aksi"
            );

            }

        ?>

    <table id="data" class="table table-hovered table-reponsive">
        <thead>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status Kawin</th>
                <th>Status Dalam Keluarga</th>
                <th rowspan="2">Tindakan</th>
                
        </thead>
    </table>
        

  <script type="text/javascript">

if($(window).width() < 700){
scrollValue = true;
}

$(document).ready(function(params) {

var tableData = <?php echo json_encode($result); ?>;  
var scrollValue = false;

    $('#data').DataTable({
          data: tableData,
          responsive: true,
          "scrollX": scrollValue

    });
    
});


  </script>

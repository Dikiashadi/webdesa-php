<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/highcharts.js"></script>
   <script src="assets/js/highcharts-3d.js"></script>

<?php
 require'koneksi.php';
 ?>
      <script type="text/javascript">
    $(function(){
   var
   chart1,chart2;
      chart1 = new Highcharts.Chart({
        chart:{
          renderTo:'grafikKasus',
          type:'column',
        },
        title:{
          text:'Siswa Yang Sering Melanggar'
        },
        xAxis: {
          categories:['siswa']
        },
        yAxis:{
          title:{
            text:'Jumlah Pelanggaran'
          }
        },
        series:
        [
        <?php
       
        $sql="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis ORDER BY jumlah_kasus Desc LIMIT 5";
        $query=mysqli_query($koneksi,$sql) or die(mysqli_error());
        while ($temp=mysqli_fetch_array($query))
        {
          $siswa=$temp['nama_siswa'];
          $sql_jumlah="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis WHERE nama_siswa='$siswa' ORDER BY jumlah_kasus Desc LIMIT 5";
          $query_jumlah=mysqli_query($koneksi,$sql_jumlah)or die(mysqli_error());
          while ($data=mysqli_fetch_array($query_jumlah))
          {
            $jumlah=$data['jumlah_kasus'];
          }
        ?>
        {
          name:'<?php echo $siswa;?>',
          data:[<?php echo $jumlah;?>]
        },
        <?php
        }
        ?>
        ]
      });


       chart2 = new Highcharts.Chart({
        chart:{
          renderTo:'grafikKategori',
          type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
          }
        },
        title:{
          text:'Kategori Pelanggaran Yang Sering Dilakukan siswa'
        },
        tooltif:{
          formatter:function(){
            return'<b>'+
            this.point.name+'</b>:'+ Highcharts.numberFormat(this.percentage,2)+'%';
          }
        },

        plotOptions:{
          pie:{
            allowPointSellect:true,
            cursor:'pointer',
            dataLabels:{
              enabled:true,
              color:'#000000',
              connectorColor:'green',
              formatter:function()
              {
                return '<b>' + this.point.name + '</b>:' + Highcharts.numberFormat(this.percentage,2) + '%';
              }
            }
          }
        },
        series:[{
          type:'pie',
          name:'Kategori Pelanggaran',
          data:[
          <?php
          $ql="SELECT tipe_pelanggaran, COUNT(*) as jumlah FROM tab_kasus JOIN tab_pelanggaran ON tab_kasus.id_pelanggaran=tab_pelanggaran.id_pelanggaran JOIN tab_kategoripelanggaran ON tab_pelanggaran.id_tipe=tab_kategoripelanggaran.id_tipe group by tipe_pelanggaran order by count(*) desc";
          $que=mysqli_query($koneksi,$ql);
          while ($row=mysqli_fetch_array($que)){
            $kategori=$row['tipe_pelanggaran'];
            $jum=$row['jumlah'];
            ?>
            [
              '<?php echo $kategori ?>',<?php echo $jum;?>
            ],
            <?php
          }
          ?>
          ]
        }]
      });
     
    });
    </script>
  
</head>
<body>

<div class="row">
          <div class="col-lg-12">
            <h1>HOME<small> <?php echo $_SESSION['level'];?> </small></h1>
            <ol class="breadcrumb">
              <h5 class="text-warning"><?php $hari=date('l,d-M-Y'); echo $hari;?></h5>
             <h4 class="text-info"><?php  echo $_SESSION['username'];?> </h4>
              </ol>
          </div>
        </div>
          <?php
        if($_SESSION['level']=="admin"){
      ?>
          
         <div class="container">
        <div class="row row-table">
        	<div class="col-md-5 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
            </div>
            <div class="panel-body">

              <div id="grafikKasus"></div>

         </div>
       </div>
     </div>
      


          <div class="col-md-5 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
            </div>
            <div class="panel-body">
               <div id="grafikKategori"></div>
              <div></div>

         </div>
       </div>
      </div>
<?php
    }else{
      ?>

         <div class="panel panel-info">
          <div class="panel-heading">
            <b>Pelanggaran Terbaru <?php  echo $_SESSION['username'];?></b>
          </div>
          <div class="panel-body">
              <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              
                  <th>Kode Kasus</th>
                  <th>Tanggal</th>
                  <th>Nama Siswa</th> 
                  <th>Kelas </th>
                  <th>Pelanggaran</th>
                  <th>Minus Point</th> 
                 
                </tr>
            <?php 
            $nis=$_SESSION['nis'];
            $q="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran WHERE s.nis='$nis'  ORDER BY tgl_kasus DESC LIMIT 1";
             $data=mysqli_query($koneksi,$q);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
 
                   <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>
          <?php
          }
            ?>
          
         
</div>
</form>
 </div>
</table>
</div>
</div>
        </div><!-- /.row -->
      <?php
    }
    ?>
  </div>
</div>

<div class="row">
          <div class="col-lg-12">
<div class="panel panel-info">
          <div class="panel-heading">
            <b>Pelanggaran Terbaru</b>
          </div>
          <div class="panel-body">
              <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              
                  <th>Kode Kasus</th>
                  <th>Tanggal</th>
                  <th>Nama Siswa</th> 
                  <th>Kelas </th>
                  <th>Pelanggaran</th>
                  <th>Minus Point</th> 
                 
                </tr>
            <?php 
            $q="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran ORDER BY tgl_kasus DESC LIMIT 2";
             $data=mysqli_query($koneksi,$q);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
 
                   <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>
          <?php
          }
            ?>
          
         
</div>
</form>
 </div>
</table>
</div>
</div>
        </div><!-- /.row -->
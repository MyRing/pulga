<?php  include('headscripts.php'); ?>
<body>
<?  //CONNECTING WITH THIS YEAR DB
    if($_GET['id']){
        $id=addslashes($_GET['id']);
    }elseif($_POST['id']){
        $id=addslashes($_POST['id']);
    }

    $query=" SELECT * FROM TBL_print14 WHERE id = '".$id."' ";
    $result = mysql_query($query);
    $row=mysql_fetch_array($result);

    //Capitalize           
    $in=$row['name'];
    $lowercaseTitle = strtolower($in);
    $capitname= ucwords($lowercaseTitle);
                          
?>

    <script>  
        $("a").tooltip(); // this will trigger a tooltip on all <a> elements 
    </script> 
    <script type="text/javascript">
      $(document).ready(function(){
          $('#target').photoMosaic({            
              columns: 3,           
              width : 580,
              padding: 1,
              modal_name : 'prettyPhoto',
              modal_ready_callback: function($pm) {
                  $('a[rel^="prettyPhoto"]', $pm).prettyPhoto({
                      theme: 'dark_rounded',
                      overlay_gallery: false
                  });
              }   
          });        
      });
    </script>
    <style type="text/css">
        /* body{background:#ccc;} */
        #container{width:450px; margin:5px auto 0px auto;}   
    </style>
    <script type="text/javascript">
      var PMalbum = [
          {
              src: "img/279/p5.jpg",
              caption: "<?php echo $capitname;?>"
          },
          {
              src: "img/279/p4.jpg",
              caption: "<?php echo $capitname;?>"
          },
          {
              src: "img/279/p3.jpg",
              caption: "<?php echo $capitname;?>"
          },
          {
              src: "img/279/p2.jpg",
              caption: "<?php echo $capitname;?>"
          }

      ];
    </script>
    <div class="container">   
<?php 
    $backcolor="#FFE02B";
?>   
      <!-- ::::::::::::::::::::::ROW 1:::::::::::::::::::::: -->
        <div class="row">
            <div class="span12">    
              <a href="index.php" border="0">
                <img src="img/header.png" width="950" height="90" alt="header" />
              </a>
            </div>    
        </div>
      <!-- ::::::::::::::::::::::ROW 2:::::::::::::::::::::: -->
        <div class="row">     
            <div class="span5" style=""> 
                <p><small><?php // echo $row['id']; ?></small></p>
                <h1 class="lead" style="font-size:4em; line-height:40px;"><?php echo $capitname?></h1> 
                <h3 class="lead" style="font-size:2em; color:gray;"><?php echo $row['state']; ?></h3>       
<?php 
    echo $row['description']; 
?> 
                <br/><br/><br/>
 
          <!-- JUST FOR HOTELS -->
<?php $service=$row['service'];
    if($service!=2){           
?>

                <table class="table table-condensed">
                    <tr>
                        <td><i class="icon-th-large"></i> </td><td>Rooms:</td><td><?php echo $row['room']; ?></td>
                    <tr/>
                    <tr>
                        <td><i class="icon-ok"></i></td><td>Max Occupancy:</td><td><?php echo $row['occu']; ?></td>
                    <tr/>
                    <tr>
                        <td><i class="icon-user"></i></td><td>Child Age:</td><td><?php echo $row['chil']; ?></td>
                    <tr/>
                </table>
                <table  class="table table-condensed">  
                    <tr>
                        <td><i class="icon-flag"></i></td><td>Amenities:</td>
                        <td>&nbsp;&nbsp;</td>
                        <td>
                            <span style="color:#BAB08D;"> 
<?php 
        $lower = $row['amen'];
        echo $lower; 
?>
                            </span>
                        </td>
                    <tr/>  
                </table>     
<?php
    }
?>
  
            </div> <!-- cierra span -->
            <div class="span5" style="text-align: left;">
<?php 
$zip=$row['zip'];
if($zip ==1){          
?> 
                <a class="btn btn-primary" href="zip/<?php echo $row['id']; ?>.zip">
                    <i class="icon-arrow-down"></i><i class="icon-picture"></i> Download Photos
                </a>  
<?php 
}else{ 
  echo "";
}
?> 
                 
                <a class="btn btn-danger" href="index.php" style="margin-right:0px;"></i><i class="icon-backward"></i>Go Back</a> 
              
                <br/><br/>  

                <!-- UNCOMMENT THIS TO HAVE MOSAIC BACK
                <div id="container">
                   <div id="target">
                   </div>
                </div>
                -->
                <img src="img/slides/<?php echo $row['id']; ?>_a.jpg" alt="<?php echo $row['name']; ?>" />
                <img src="img/slides/<?php echo $row['id']; ?>_b.jpg" alt="<?php echo $row['name']; ?>" />
            </div><!-- cierra span -->
            <div class="span2" style="text-align: right; background-color:#ccc;">
                <span class="lead" style="padding:0 10px 3px 0;">More <br/>TeamPlayers</span>
<?php             
$thiscity=$row['state'];
$query=" SELECT name,state,id FROM TBL_print14 WHERE exist=5 AND service=0 AND state='".$thiscity."' ORDER BY listorder limit 4";
$result = mysql_query($query);
while($row=mysql_fetch_array($result)){
    $name=$row['name'];
    $state=$row['state'];
    $id=$row['id'];
    other2($name,$state,"thumbs/s_$id.jpg",$id);
};
?>
        </div>    
        <div class="row"> 
          <div class="span12" style="text-align: center; font-size:1em; color:#ccc;">
                <strong>X</strong>Y
          </div>
          <br/> <br/> 
        </div>    
      </div>
    <!-- ::::::::::::::::::::::ROW 3:::::::::::::::::::::: -->
  </div> <!-- final DIV -->
  <!--<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>-->
  <script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
  <script src="js/bootstrap-image-gallery.min.js"></script>     
</body> 

<?php  
    include('headscripts.php'); 
?> 
<body onLoad="init()"> 
<?php  //CONNECTING WITH THIS YEAR DB

    if($_GET['id']){
        $id=$_GET['id'];
    }elseif($_POST['id']){
        $id=$_POST['id'];
    }
    $query=" SELECT * FROM TBL_print13 WHERE id = '".$id."'";
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
    <div class="container">  
<?php 
    $backcolor="#FFE02B";
?>     
    <!-- ::::::::::::::::::::::ROW 1:::::::::::::::::::::: -->
    <!-- ::::::::::::::::::::::ROW 2:::::::::::::::::::::: -->
        <div class="row">   
            <div class="span12" style="text-align: right; background-color:#FFF;">
                <br/>
<?php
    $thiscity=$row['state'];        
    //$query=" SELECT name,state,id,description,zip FROM TBL_print13 WHERE exist=5 AND service=0 ORDER BY state";
    $query=" SELECT name,state,id,description,zip,room,occu,chil,service FROM TBL_print14 WHERE exist=5 AND status_agreement=2 ORDER BY state";
?>
                <div style="position:fixed; top:0px; left:0px; width:90px; padding:5px 50px; background-color:white; 
                border-bottom-style:solid; border-bottom:1px #CCC; font-size:0.7em; ">
                    <span class="lead">Team Players Content</span>
                    <hr/>
        
<?php
    $prev1='';
    $result = mysql_query($query);
    while($row=mysql_fetch_array($result)){
        $state=$row['state'];
        if($state==$prev1){}else{
            echo "<a href='#$state'> $state <br/> </a>";
            $prev1=$state;
        }
    }
?>
                </div>  
                <br/><br/>
<?php
    $prev2='';
    $result = mysql_query($query);
    while($row=mysql_fetch_array($result)){  
        $name=$row['name'];
        $state=$row['state'];
        $id=$row['id'];
        $description=$row['description'];
        $zip=$row['zip'];
        $service=$row['service'];
        $room=$row['room'];
        $occu=$row['occu'];
        $chil=$row['chil'];
                
                
        if($state==$prev2){echo '**';}else{ 
?>  
                <div style="background-color:orange; padding:0px 4px;">
                    <p><a id="<?php echo $state;?>"><?php echo $state;?></a></p>
                </div>      
<?php 
        $prev2=$state; 
        }
        /* other2($name,$state,"thumbs/s_$id.jpg",$id); */
        test1($name,$state,$id,$description,$zip,$room,$occu,$chil,$service);
    };
?>
            </div>  
        </div>
        <!-- ::::::::::::::::::::::ROW 3:::::::::::::::::::::: -->
    </div> <!-- final DIV -->
    <!--<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>-->
    <script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
    <script src="js/bootstrap-image-gallery.min.js"></script>
</body>
      

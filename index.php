<?php  
    include ("headscripts.php"); 
?>
<body onLoad="init()">

<!-- LOADING LOGO  -->
<div id="loading" style="position:absolute; width:100%; height:100%; background-color: black; filter: alpha(opacity=75);-moz-opacity: 0.75; opacity: 0.75; text-align:center; "> <br/><br/><br/><br/><br/>
    <br/><br/><br/>
    <!-- <img src="images/loadlogo.gif" border="0" style="margin:0 0 -100px 0;">  <br>-->
    <img src="/img/loader7.gif" width="200px" border="0"> 
    <br/><br/>
    <span style="color:white; font-size:10px;"> Updating database... </span> <br/><br/><br/>
</div>

<script>
    var ld=(document.all);
    var ns4=document.layers;
    var ns6=document.getElementById&&!document.all;
    var ie4=document.all;
    if (ns4)
        ld=document.loading;
    else if (ns6)
        ld=document.getElementById("loading").style;
    else if (ie4)
        ld=document.all.loading.style;
    function init(){
        if(ns4){ld.visibility="hidden";}
        else if (ns6||ie4) ld.display="none";
    }
</script>
 

<div class="content">

<?php
    if($_GET['ex']){
        $ex=$_GET['ex'];
    }elseif($_POST['ex']){
        $ex=$_POST['ex'];
    }

    if($_GET['presscode']){
        $presscode=$_GET['presscode'];
    }elseif($_POST['presscode']){
        $presscode=$_POST['presscode'];
    }

    if($_GET['id']){
        $id=$_GET['id'];
    }elseif($_POST['id']){
        $id=$_POST['id'];
    }

    if($_GET['person']){
        $person=$_GET['person'];
    }elseif($_POST['person']){
        $person=$_POST['person'];
    }

    if($_GET['area']){
        $area=$_GET['area'];
    }elseif($_POST['area']){
        $area=$_POST['area'];
    }

    /* DESCRIPTIONS FOR NUMERIC VALUES AT DB */

    $result = mysql_query("SELECT * FROM tblPro WHERE id=$id");      
    $row = mysql_fetch_array($result);
    $proid=$row['proid'];
    $code=$row['code'];

    
    if(!$ex){
        $query="SELECT SUM(status_pages) FROM TBL_print14 WHERE exist=1 AND status_agreement=2;";
        $result = mysql_query($query);
        $temp=mysql_fetch_array($result);
        $pagesnumber = $temp[0];

        $query="SELECT name, COUNT(name) FROM TBL_print14  WHERE status_photos=1 AND status_description=1 AND exist=1 AND status_agreement=2 OR status_agreement=3;";
        $result = mysql_query($query);
        $temp=mysql_fetch_array($result);
        $ready = $temp[1];

        //Charging the City Titles
        $query="select state, COUNT(exist) as mystate FROM $tiempo WHERE exist=$filtro;";
        $result = mysql_query($query);

        while($num_rows=mysql_fetch_array($result)){
            $statearray[$num_rows['state']]=$num_rows['mystate'];              
            print_r('statearray');
        }

        switch($area){
            case 'east': $area="AND area='east'";
                         $titarea="East Coast ";
                         $titarea2="";
            break;
            case 'west': $area="AND area='west'";
                         $titarea="West Coast ";
                         $titarea2="";
            break;      
            default: $titarea="Showing All";
                     $titarea2="(Description M)";     
        }

        /* $query="SELECT * FROM TBL_print14 WHERE exist=5 $area ORDER BY neworder,listorder,state,service"; */
        $query="SELECT * FROM TBL_print14 WHERE exist=5 $area ORDER BY state";
        /* $query="SELECT * FROM TBL_print14 WHERE exist=5 ORDER BY state,service "; */

        //echo $query;
        $result = mysql_query($query);

        //echo " <br/> $result";
        //if(mysql_num_rows($result)>0){
        if(true){

            $i=0;   

?>
    <!-- DESIGN TABS -->
    <div class="container" style="background-color:white;"> <!-- START CONTAINER  -->
        <div class="row"> <!-- START ROW   -->
            <div class="span12"> <!-- START SPAN12   -->
<?php  //echo $tiempo." - ". $filtro; ?>        

            <!-- ::::::::::::::::::::::ROW 1:::::::::::::::::::::: -->
                <div class="row">
                    <div class="span12"> 
                        <img src="img/header_950x90.jpg" width="950" height="90" alt="header" />
                    </div>
                </div>  
                <br/> 
                <!--  SLIDER START -->
                <div class="row">
                    <div class="span8"> 
<?php 
            include('slider.php'); 
?>
                    <!-- SLIDE FINISH HERE, LIST START   -->
                        <span class="lead" style="font-size:2.6em; color:#333;">
                            <img src="img/icotuto.png"> <?php echo $titarea; ?>
                        </span>
                        <span class="lead" style="font-size:2.6em; color:#999;">Project X</span>
                        <br/>
                        <span style="color:#777; font-size:1em;"> &nbsp; &nbsp; &nbsp;<?php echo $titarea2; ?></span>
                        <span style="float:right;">
                            <div class="btn-toolbar">
                                <div class="btn-group">
                                    <a class="btn" href="index.php?area=west"><img src="img/icoeast.png"> Filter P</a>
                                    <a class="btn" href="index.php?area=east"><img src="img/icowest.png"> Filter Q</a>
                                    <a class="btn" href="index.php"><img src="img/icotuto.png"> Show all</a>
                                </div>
                            </div> 
                        </span>         
                        <table class="table table-condensed">
                
                    <!--TABLE TITLES-->
<?php
            $currentcity='';
            $lastcity='';
            //while($row=mysql_fetch_array($result)){
            while($row=mysql_fetch_array($result)){
                unset($arr2);       
                $i++;
                $lastcity=$currentcity;
                $currentcity=$row['state'];          
                $id = $row['id'];
                $estado=$row['lock1'];

                if($currentcity!=$lastcity){
?>                  
                            <tr>
                                <td colspan="6">
                                    <div class="statebox" style="background-color:#FFF; font-size:1.5em;">
                                        <?php echo $row['state']; ?>
                                    </div>
                                </td>
                            </tr>
<?php 
                }  
?>
                            <!-- INICIA NUEVO RESULTADO      -->    
                            <tr>               
                                <!-- Column 1 -->                       
                                <td width="<?php echo $col1;?>">
<?php
                if($row['service']==2){
                    echo "<p><small>(service)</small></p>";
                }
?> 
                                </td>
                                <!-- Column 2 -->                       
                                <td>
                                    <a href="det.php?id=<?php echo $row['id'] ?>">
                                        <div>
                                            <!-- HOTEL NAME -->   
<?php                       
                $in=$row['name'];
                $lowercaseTitle = strtolower($in);
                $capitalized= ucwords($lowercaseTitle);
                if($row['service']==2){                
?>                  
                                            <span style="font-size:1.5em; color:green;"  class="lead">
                                                <?php echo $capitalized ?>
                                            </span>      
<?php 
                }else{ 
?>
                                            <span style="font-size:1.5em;"  class="lead">
                                                <?php echo $capitalized ?>
                                            </span> 
<?php
                } 
?>   
                                            <!-- HOTEL NAME --> 
                                            <br/>       
                                        </div>
                                    </a> 
                                </td>
                                <!-- Column 3 -->   
                                <td>
                                    <!--p>
                                        <small><span>Description:</span><?php //echo $row['description']?></small>  
                                    </p-->
                                    <span style="color:#ccc; font-size:0.5em;">
                                        <?php echo $row['id']; ?>
                                    </span>
                                    <a class="btn btn-primary btn-warning btn-mini" href="det.php?id=<?php echo $row['id'] ?>">
                                        <i class="icon-plus"></i>Info
                                    </a>
                                </td>                      
                                <!-- COLUMN 4-->
                                <td>
                                <!-- <a class="btn btn-primary btn-mini" href="#"><i class="icon-arrow-down"></i><i class="icon-picture"></i> Download Photos</a> --> 
                                </td>
                            </tr>                   
                            <!-- FINALIZA NUEVO RESULTADO        -->     
<?php 
            }
?>     
                        </table>
                    </div>  <!-- END OF THIS SPAN -->
                    <div class="span4">  
                        <span class="lead" style="font-size:3.3em; line-height: 29px;">
                            Welcome to <br/>Project X<br/> 
                            <span style="color:gray;">Subtitle Y</span>
                        </span>
                        <br/><br/><br/>
                        <p>
                        Description of the project
                        </p>    
                        <br/><br/><br/><br/> 
                        <span class="lead" style="font-size:2.6em; color:gray;"> <img src="img/icotuto.png"> Related Q</span><br/><br/>
        
<?php 
function box1($id){ 
?>
    <div style="margin:2px; float:right;"><img src="" width="144px"/></div>
<?php
};
?>
<?php
            $qry = "SELECT name, LEFT(name, 1) AS first_char FROM albums 
            WHERE UPPER(LEFT(name, 1)) BETWEEN 'A' AND 'Z'
            OR LEFT(name, 1) BETWEEN '0' AND '9' ORDER BY name";  
?>
<?php  //BEST SELLERS
            $query=" SELECT name,state,id FROM TBL_print14 WHERE exist=5 AND service=0 AND popular BETWEEN 1 AND 49 ORDER BY popular";
            $result = mysql_query($query);
            while($row=mysql_fetch_array($result)){      
                $name=$row['name'];
                $state=$row['state'];
                $id=$row['id'];
                other2($name,$state,"thumbs/s_$id.jpg",$id);
            }      
?>
 
                        <br/><br/><br/><br/><br/>
                        <span class="lead" style="font-size:2.6em; color:gray;">
                            <img src="img/icotuto.png"> Related Y
                        </span>
                        <br/><br/>
        
<?php  //RECENTLY ADDED
            $query=" SELECT name,state,id FROM TBL_print14 WHERE exist=5 AND service=0 AND popular BETWEEN 50 AND 99 ORDER BY popular";
            $result = mysql_query($query);
                while($row=mysql_fetch_array($result)){
                    $name=$row['name'];
                    $state=$row['state'];
                    $id=$row['id'];
                    other2($name,$state,"thumbs/s_$id.jpg",$id); 
                }                      
?>
    
                    </div> <!--FINISH SPAN-->           
                </div> <!--FINISH ROW-->
            </div> <!-- FINISH SPAN 12 -->
        </div>  <!--FINISH ROW-->
    </div>  <!--FINISH CONTAINER-->
<?php
        }  //END if results exist
    }           
?>

            
</div><!-- FINISH CONTENT -->
</body>





<!-- ::::::::    OTHER2 FUNCTION    :::::::::::::::::::::::::::::::::::::::: -->
                    
<?php function other2($name,$city,$image,$id){ ?>
<a href="det.php?id=<?php echo $id;?>">
    <div style="margin:5px; float:left; height:120px; width:120px; padding:9px 5px; background-repeat: no-repeat; background-position: 0 0px; background-image: url(img/<?php echo $image;?>); border-color: #333333; border-style: solid; border-width: 1px;">
        <div style="background-color:black; padding:0px 4px;">
            <p><small><?php //echo $id.'-';?><?php echo $city;?></small></p>
        </div>  
        <div class="lead" style="background-color:white; padding:2px 4px; font-size:1.2em; margin-top:-7px; line-height: 13px; ">
            <?php echo $name;?>
        </div>  
    <span style="position:relative; top:0px; right:0px;"><img src="img/icon.png" width="25" height="25"/></span>
    </div>
</a>
<?php }?>
                    
<!-- ::::::::    OTHER3 FUNCTION    :::::::::::::::::::::::::::::::::::::::: -->    
                
<?php function other3($name,$city,$image){ ?>                   
<div style="margin:5px; float:left; height:240px; width:240px; padding:9px 5px; background-repeat: no-repeat; background-position: 0 0px; background-image: url(img/<?php echo $image;?>);">            
    <div style="background-color:black; padding:0px 4px;"><p><small><?php echo $city;?></small></p></div>               
    <div class="lead" style="background-color:white; padding:2px 4px; font-size:1.2em; margin-top:-7px; line-height: 13px; "><?php echo $name;?></div>                  
    <span style="position:relative; top:0px; right:0px;"><img src="img/icon.png" width="25" height="25"/></span>    
</div>          
<?php }?>
                    
                    
                    
<!-- ::::::::    CITYBOX FUNCTION   :::::::::::::::::::::::::::::::::::::::: -->                                    
<?php function citybox($city,$color){ ?>                
    <div style="margin:5px; float:left; height:120px; width:120px; padding:9px 5px; background-color:<?php echo $color;?>">         
        <div class="lead"><?php echo $name;?></div>
    </div>                  
<?php }?>
                    
                    
<!-- ::::::::    TEST FUNCTION  :::::::::::::::::::::::::::::::::::::::: -->
                    
<?php function test1($name,$city,$id,$desc,$zip,$room,$occu,$chil,$service){ ?>
<div>
    <div style="background-color:black; padding:0px 4px;"><p><small><?php echo $id.'-';?><?php echo $city;?></small></p></div> 
    <div class="lead" style="background-color:white; padding:2px 4px; font-size:1.2em; margin-top:-7px; line-height: 13px; ">
        <?php echo $name;?>
    </div>
    <?php if($service==2){}else{ ?>
    <span>
        <?php  if(empty($room)){ echo "<span class='redtxt'>Missing Room Info</span><br/>";}else{echo "Rooms: <strong>$room </strong>- ";}?>
        <?php  if(empty($occu)){ echo "<span class='redtxt'>Missing Occup Info</span><br/>";}else{echo "Occu: <strong>$occu </strong>- ";}?>
        <?php  if(empty($chil)){ echo "<span class='redtxt'>Missing Child Info</span><br/>";}else{echo "Child: <strong>$chil </strong>- ";}?>
    </span>
    <?php } ?>
    <?php
        $filename = "/zip/$id.zip";
        if($zip==1){
            echo "<span> <a href='$filename'> - HI RES PHOTOS OK</a></span>";       
        }else{ 
            echo "<span class='yeltxt'><a href='$filename' style='color:black;'>Not Confirmed ZIP</a></span>";
        };
    ?>     
    <br/><br/>        
    <span class="lead">Thumbnail: <img src="img/thumbs/s_<?php echo $id;?>.jpg" height="50" class="yeltxt"/></span>
    <span class="lead">slide <strong>A: </strong><img src="img/slides/<?php echo $id;?>_a.jpg" height="120" class="yeltxt"/></span>
    <span class="lead">slide <strong>B: </strong><img src="img/slides/<?php echo $id;?>_b.jpg" height="120" class="yeltxt"/></span>
    <?php  if(empty($desc)){ echo "<span class='redtxt'>Missing Description</span><br/>";}else{?>    
        <div style="width:200px; font-size:0.8em; line-height:9px; float:right;"><?php echo $desc;?></div>
        <br/><br/><br/>
    <? }?>
</div>
<?php }?>
                    
                    

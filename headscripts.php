<!DOCTYPE html>
<!--!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Project X</title>
    <link href="css/bootstrap.css" rel="stylesheet">

<!-- BARRA -->  
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>  
    <script type="text/javascript" src="js/bootstrap-popover.js"></script>
    <script type="text/javascript" src="js/bootstrap-modal.js"></script>
    
<!-- PHOTOMOSAIC  LINIKS     -->
    <link rel="stylesheet" type="text/css" href="css/css_photomosaic/photoMosaic.screen.css" />
    <script src="data/photoMosaic.data.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/js_photomosaic/jquery.photoMosaic.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/css_photomosaic/prettyPhoto.css" />
    <script src="js/js_photomosaic/jquery.prettyPhoto.js" type="text/javascript"></script>
    
<!-- NIVO SLIDER START -->
    <link rel="stylesheet" href="css/css_nivo/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/css_nivo/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/css_nivo/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/js_nivo/jquery.nivo.slider.js"></script>

<!-- MY TEAM CSS-->
     <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
                
    <!-- <script type="text/javascript" src="js/css3-multi-column.js"></script> -->
    
    <script type='text/javascript'>
        $(document).ready(function () {
            if ($("[rel=tooltip]").length) {
                $("[rel=tooltip]").tooltip();
            }
       });
    </script> 
    <script type='text/javascript'>
        $(document).ready(function () {
            if ($("[rel=popover]").length) {
                $("[rel=popover]").popover({placement:'top'});
            }  
        });
    </script>  
    <script type='text/javascript'>
        $(document).ready(function () {
            if ($("[rel=modal]").length) {
                $("[rel=modal]").modal({backdrop:'true'});
            }  
       });
    </script>

    <?php include('functions.php'); ?>

</head>

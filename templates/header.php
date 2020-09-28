<?php require 'includes/model.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
        
        <title>Linkmarky</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
        
        <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/1029/1029183.svg" type="image/x-icon" />
        <link rel="icon" href="https://image.flaticon.com/icons/svg/1029/1029183.svg" type="image/x-icon">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
        
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
    * {font-family: 'Inter', -apple-system, "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif !important; }
    
    .uk-input { border-radius:5px !important; }
    .uk-input:focus { border:1px solid #6E58FF !important; }
    
    .uk-button { border-radius: 5px !important;text-transform:none !important; }
    .uk-button-default { background:#6E58FF !important;color:#fff !important;border:none !important; }
    .uk-button-default:hover { border:none !important; }
    
    a { color:#6E58FF !important; }
    
    a.nav-hover, a.nav-hover-active {font-weight: normal !important;color:#000 !important;}
    .nav-hover {border-bottom:2px solid rgba(0,0,0, 0);padding-bottom:-40px !important;}
    .nav-hover:hover { border-bottom:2px solid #6E58FF;  }
    .nav-hover-active {border-bottom:2px solid #6E58FF;}
    
    .folders {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 5px;
      /*margin: 20px auto;*/
    }
    .folder {
      height: 110px;
      background: #dadada;
    }
    .folder-big {
      grid-column: 1/-1;
    }
    
    .substr {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
       
    }

    .tag {
        background: #E0DBFF;
        width:90px;
        border-radius: 50px;
        padding:5px 10px;
        color:#6E58FF;
        margin:0 5px;
        font-size: 12px;
        text-align: center
    }
    
    .button-folder { height:24px;width:24px;background:url(assets/folder-add.png);outline:none !important; }
    .button-folder:focus {background:url(assets/folder-add-hover.png) !important;border:none !important;}
    </style>
</head>
<body>
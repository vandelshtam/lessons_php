<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=7">
    <title><?= $title;?></title>
</head>
<body>
    
    <main id="js-page-content" role="main" class="page-content mt-3">
        
        <?php if(isset($_SESSION['success'])):;?>
        <div class="alert alert-success" role="alert">
        <?php flashMessage::display_flash('success') ;?>
        </div>
        <?php endif;?>

        <?php if(isset($_SESSION['danger'])):;?>
        <div class="alert alert-danger" role="alert">
        <?php flashMessage::display_flash('danger') ;?>
        </div>
        <?php endif;?> 
        
        <?php if(isset($_SESSION['info'])):;?>
        <div class="alert alert-info" role="alert">
        <?php flashMessage::display_flash('info') ;?>
        </div>
        <?php endif;?>

            
            
    </main>

    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>    
</body>
</html>
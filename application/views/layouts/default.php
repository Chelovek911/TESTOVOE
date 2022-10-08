<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/main.scss" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/public\scripts\slick.min.js"></script>

    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" style="width: 101%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Список товаров</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                
            </div>
            <div class="row justify-content-right style_block">
                <div class="col mx-2 p-1 ">

                    <a href=/basket>
                        <div>
                            <img class="img_shop" src="/public\images\about\icons8-очистить-корзину-50.png">
                            <div style="position:absolute ; top:-8px; left: 32px;">
                                <div class="div">

                                    <img src="/public\images\about\Ellipse 3.png">
                                    <div style="position:relative;" class="centered2"></div>
                                </div>


                            </div>
                        </div>


                    </a>

                </div>
            </div>

        </div>

    </nav>

</header>
<?php echo $content; ?>



</html>
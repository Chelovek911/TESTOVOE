<body class="body1">
    <div class="container ">
        <div class="row">
            <div class="col ms-5">
            <div class="row ">
                    <div class="col my-2">
                        <h1 class="text-center">
                           Подробно о товаре
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-8">
                        <div class="slider">
                            
                            <?php foreach ($photo as $val) : ?>
                                <div class="slider_item">

                                    <img class="img_tovars " src="/public/tovImg/<?php echo $val['id'] ?>.jpg">

                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-8">
                        <?php foreach ($data as $value) : ?>
                            <p class="font-monospace" style="overflow: hidden;">О товаре: <?php echo $value['descr'] ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <form class="myForm" action="/main/add" method="POST">
                    <input type='text' name='id_of_tovar' value='<?php echo $value['id'] ?>' class="invisible">
                    <div>

                        <button type="submit" class="btn btn-success">Добавить в корзину</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                dots: true,
                autoplay: true,
                speed: 1500,
                autoplaySpeed: 1500,
            });


        });
    </script>

</body>
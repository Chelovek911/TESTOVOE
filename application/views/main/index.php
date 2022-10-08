<body class="body1">
    <div class="container">
        <div class="row ">
            <div class="col">
                <div class="text-center m-2">
                    <h1>Список товаров</h1>
                </div>

                <?php foreach ($list as $val) : ?>


                    <div class="row justify-content-center style_block ">
                        <div class="col-md-6 bg-white rounded shadow mb-3  d-flex ">
                            <a style="text-decoration: none; color:black;" href="/tovars/<?php echo $val['id'] ?> " target="_blank">
                                <div class="row p-4">
                                    <div class="col">

                                        <img class="rounded img_index" src="/public/tovImg/<?php echo $val['photo'] ?>.jpg">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="font-monospace mx-2" style="overflow: hidden;"><?php echo $val['name'] ?> </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="font-monospace mx-2" style="overflow: hidden;"><?php echo $val['text'] ?> руб</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
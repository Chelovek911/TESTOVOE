<body class="body1">
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="row ">
                    <div class="col my-2">
                        <h1 class="text-center">
                            Корзина товара
                        </h1>
                    </div>
                </div>
                <?php if(!empty($row)){?>

                <?php foreach ($row as $value) : ?>
                    <div class="row justify-content-center my-2">
                        <div class="col-6 d-flex bg-white justify-content-center rounded border border-2 shadow border-success">
                            <div class="row">
                                <div class="col ">

                                    <p class=" font-monospace p-3 m-0">Наименование: <?php echo ($value['name'])  ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="p-3 m-0 font-monospace"><b>Стоимость:</b> <?php echo ($value['text'])  ?> руб</p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
                <?php } else {?>
                    <h1>Корзина пуста!</h1>
                    <?php }?>
            </div>
        </div>
    </div>

</body>
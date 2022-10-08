<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" type="text" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Цена</label>
                                <input class="form-control" type="number" rows="3" name="text">
                            </div>
                            <div class="form-group">
                                <label>Изображение (Не менее двух штук)</label>
                                <input class="form-control" type="file" name="img[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
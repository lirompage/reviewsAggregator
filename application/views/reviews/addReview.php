<div class="container">
    <h1>Оставить отзыв</h1>
        <form action="add-new-review" method="post" enctype="multipart/form-data">
            <input class="input_text" type="text" placeholder="Имя пользователя" name="user_name"><br>
            <p class="sm-p">Оцените товар 1-10:</p>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <textarea class="input_text" rows="10" cols="45" placeholder="Комментарий" name="comment"></textarea><br>
            <input type="hidden" name="product_id" value="<?= $_GET['product_id'] ?>">

            <input class="button2" type="submit" name="submit" value="Добавить отзыв">
        </form>
</div>

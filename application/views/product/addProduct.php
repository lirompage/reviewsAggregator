<div class="container">
    <h1>Добавление товара</h1>
        <form action="add-new-product" method="post" enctype="multipart/form-data">
            <input class="input_text" type="text" required placeholder="Название товара" name="product_name"><br>
            <input required name="img" type="file"><br>
            <input class="input_text" required type="number" placeholder="Цена" name="price"><br>
            <input class="input_text" required type="text" placeholder="Имя пользователя" name="user_name"><br>
            <input class="button2" type="submit" name="submit" value="Добавить Товар">
        </form>
</div>

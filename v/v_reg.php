<h3><?php if(isset($text)){echo $text;}?></h3>
<br>
<form method="post">
    <label>
        <input type="text" name="login" placeholder="Введите имя пользователя" required>
    </label>
    <label>
        <input type="password" name="password" placeholder="Введите пароль" required>
    </label>
    <input type="submit" name="button" value="Зарегистрироваться">
</form>

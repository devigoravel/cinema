<h2>Добавить новость</h2>

<form action="/news/create/" method="POST">
    <input type="text" name="slug" placeholder="slug"><br>
    <input type="text" name="title" placeholder="название новости"><br>
    <textarea name="text" placeholder="текст новости"></textarea><br>
    <input type="submit" name="submit" value="Добавить новость"><br>
</form>
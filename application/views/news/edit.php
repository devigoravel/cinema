<h2>Редактировать новость</h2>

<form action="/news/edit/" method="POST">
    <input type="text" name="slug" value="<?php echo $slug_news; ?>" placeholder="slug"><br>
    <input type="text" name="title" name="slug" value="<?php echo $title_news; ?>"  placeholder="название новости"><br>
    <textarea name="text" name="slug" placeholder="текст новости"><?php echo $content_news; ?></textarea><br>
    <input type="submit" name="submit" value="Редактировать новость"><br>
</form>
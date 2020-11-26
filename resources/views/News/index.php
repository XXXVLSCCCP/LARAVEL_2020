<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center">Главная</h1>

<ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/project">Проект</a></li>
    <li><a href="/news">Новости</a></li>
</ul>

<h2 style="text-align: center">Cписок новостей</h2>


<ul>
    <?php foreach ($news as $item):?>
    <li><a href="/news/<?=$item['id']?>"><?=$item['title']?></a></li>
     <?php endforeach; ?>

</ul>

<ul>

        <li><a href="/news/category/1">Новости относящие к первой категории</a></li>
        <li><a href="/news/category/2">Новости относящие ко второй категории</a></li>
        <li><a href="/news/category/sport">Новости относящие к спорту</a></li>
        <li><a href="/news/category/programming">Новости относящие программирвоанию</a></li>



</ul>



</body>
</html>

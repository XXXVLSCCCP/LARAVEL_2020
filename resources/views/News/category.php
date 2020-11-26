<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
</head>
<body>

<h1>Новости первой категории</h1>





<?php foreach ($news as $newsCtegory):?>

<h3><?=$newsCtegory['title']?></h3>

<p><?=$newsCtegory['text']?></p>



<?php endforeach;

?>



</body>
</html>

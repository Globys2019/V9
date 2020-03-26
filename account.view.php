<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <style>
        .out {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .out1 {
            background-color: white;
            box-shadow: 0 0 0;
            border: none;
            border-radius: 50%;
        }

        .im {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        #file {
            display: none;
        }

        .images {
            width: 200px;
            height: 200px;
        }

        .imgMy {
            width: 250px;
            height: 200px;
            border-radius: 10px;
        }

        .formButton {
            position: absolute;
            top: 10px;
            left: 41%;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">

        <form class="formButton" action="imageDonload.php" method="post" enctype="multipart/form-data">
            <label for="file"><img src="img\3.png" class="im"></label>
            <input type="file" name="file" id="file">
            <button name="down" class="down">Подтвердить загрузку</button>
            <button type="submit" name="out" class="out1"><img src="img\2.jpg" class="out"></button>
        </form>

        <h3>Мои изображения</h3>

        <?php foreach ($im as $img) : ?>
            <img class="imgMy mt-2" src="img\<?= $img->image ?>">
        <? endforeach; ?>


        <h3 class="mt-5">Все изображения на сайте</h3>
        <?php foreach ($images as $img) : ?>
            <img class="imgMy mt-2" src="img\<?= $img->image ?>">
        <? endforeach; ?>




    </div>

</body>

</html>
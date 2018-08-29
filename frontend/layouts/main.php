<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">VIVT MVC</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/?route=page/index">Главная</a></li>
                    <li><a href="/?route=page/about">О компании</a></li>
                    <li><a href="/?route=page/delivery">Доставка</a></li>
                    <li><a href="/?route=page/students">Студентам</a></li>
                </ul>
            </div>
        </nav>
        <?php echo $content ?>
    </body>
</html>

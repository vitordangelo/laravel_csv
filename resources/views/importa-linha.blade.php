<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Importação de Linha V2Bus (.CSV)</h1>
                <form action="/importa-linha" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="file" name="csv">
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </body>
</html>

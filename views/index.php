<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i18n</title>
    <style>
        * {
            color: #444;
        }
        body {
            background-color: #eee;
            font-family: Futura, Verdana, sans-serif;
        }
        body > div {
            background-color: #fff;
            padding: 20px 30px;
            max-width: 600px;
            margin: 50px auto;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-shadow: 5px 5px 15px #ddd;
        }
        h1 {
            margin-top: 0;
        }
        form {
            margin-bottom: 40px;
        }
        form > div {
            display: grid;
            grid-template-columns: 100px 250px;
        }
    </style>
</head>
<body>
    <div>
        <h1>NewCorp.</h1>

        <form>
            <div>
                <span>&nbsp;</span>
                <p><?php echo $data['copy']['welcome'][0] ?? 'LABEL MISSING' ?> Stefan, <?php echo $data['copy']['welcome'][1] ?? 'LABEL MISSING' ?></p>
            </div>
            <div>
                <label for="name_first"><?php echo $data['copy']['name_first'][0] ?? 'LABEL MISSING' ?></label>
                <input type="text" name="name_first" id="name_first">
            </div>
            <div>
                <label for="name_last"><?php echo $data['copy']['name_last'][0] ?? 'LABEL MISSING' ?></label>
                <input type="text" name="name_last" id="name_last">
            </div>
        </form>

        <hr>

        <div>Switch to <a href="/de">de</a> | <a href="/en">en</a></div>
    </div>
</body>
</html>
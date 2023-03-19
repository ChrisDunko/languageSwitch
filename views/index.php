<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index | View</title>
    <style>
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

    <div>Switch to <a href="/de">DE</a> | <a href="/en">EN</a></div>


<!--    <pre>--><?php //print_r($data) ?><!--</pre>-->
</body>
</html>
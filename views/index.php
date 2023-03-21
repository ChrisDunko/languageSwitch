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
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <div id="contentcontainer">
        <h1>NewCorp.</h1>

        <form>
            <div>
                <span>&nbsp;</span>
                <p>{{copy.welcome[0]}} Stefan, {{copy.welcome[1]}}</p>
            </div>
            <div>
                <label for="name_first">{{copy.name_first[0]}}</label>
                <input type="text" name="name_first" id="name_first">
            </div>
            <div>
                <label for="name_last">{{copy.name_last[0]}}</label>
                <input type="text" name="name_last" id="name_last">
            </div>
        </form>

        <hr>

        <div>Switch to <a href="/de">de</a> | <a href="/en">en</a></div>
    </div>
    <script>
        const app = new Vue({
            el: '#contentcontainer',
            data() {
                return {
                    copy: JSON.parse('<?php echo json_encode($data['copyObject']) ?>')
                }
            }
        });
    </script>
</body>
</html>
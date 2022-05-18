<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Лабораторные работы</title>
    <link rel = "stylesheet" href = "/styles/style.css">
    <script type = "text/javascript" src = "/scripts/lab2script.js"></script>
</head>
<body>
<h1>Лабораторная работа №2</h1>
<form>
    <table>
        <tr>
            <td colspan="2">Ввод осуществлять в формате пар элементов</td>
        </tr>
        <tr>
            <td>Ввод</td>
            <td><input type="text" id = "append" value=""/><br></td>
        </tr>
        <tr>
            <td colspan="3">
                <input id="add" type="button" value="Добавить" onclick=append();>
                <input id="analyze"type="button" value="Анализ" onclick=main();>
                <input id="clear"type="button" value="Очистить" onclick=clear_();>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label id="res">Результат: </label><br>
                <label id="matrix"></label>
                <label id="result_of_analyze"></label>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
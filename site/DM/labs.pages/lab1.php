<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Лабораторные работы</title>
    <link rel = "stylesheet" href = "/styles/style.css">
    <script type = "text/javascript" src = "/scripts/lab1script.js"></script>
</head>
<body>
<h1>Лабораторная работа №1</h1>
<form>
    <table>
        <tr>
            <td colspan="2">Ввод осуществлять в формате ibij ibij ibij...,<br> где i - четная цифра, b - буква, j - нечетная цифра</td>
            <td rowspan="5">
                <p><input id="jn" name="operation" type="radio"><label for="jn">Объединение</label></p>
                <p><input id="cs" name="operation" type="radio"><label for="cs">Пересечение</label></p>
                <p><input id="add1" name="operation" type="radio"><label for="add1">Дополнение из 1го во 2ой</label></p>
                <p><input id="add2" name="operation" type="radio"><label for="add2">Дополнение из 2го в 1й</label></p>
                <p><input id="df" name="operation" type="radio"><label for="df">Симметрическая разность</label></p>
            </td>
        </tr>
        <tr>
            <td>Первое множество</td>
            <td><input type="text" id = "mass1" value=""/><br></td>
        </tr>
        <tr>
            <td>Второе множество</td>
            <td><input type="text" id = "mass2" value=""/><br></td>
        </tr>
        <tr>
            <td>
                <label id = "res">Результат: </label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="Подсчитать" onclick=main();></td>
        </tr>
    </table>
</form>

</body>
</html>
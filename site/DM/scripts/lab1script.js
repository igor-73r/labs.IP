let errmsg = ""

function  ifval(mass, pos) {
    let ok = false
    if (mass[0] !== '') {
        for (var i = 0; i < mass.length; i++){
            if (mass[i].length !== 4) {
                errmsg += ('\nДлина ' + (i + 1) + "го эллемента " + pos + "го множества не равна 4м")
                continue
            }
            for (var j = 0; j < mass[i].length; j++) {
                if (j !== 1) {
                    if (isNaN(mass[i][j]) === true)
                        errmsg += ('\n' + (j + 1) + 'й символ ' + (i + 1) + 'го элемента ' + pos + 'го множества - массива не цифра!')
                    else if (j !== 3 && mass[i][j] % 2 !== 0)
                        errmsg += ('\n' + (j + 1) + 'й символ ' + (i + 1) + 'го элемента ' + pos + 'го множества - нечетная цифра(ожидается четная)!')
                    else if (j === 3 && mass[i][j] % 2 === 0)
                        errmsg += ('\n' + (j + 1) + 'й символ ' + (i + 1) + 'го элемента ' + pos + 'го множества - четная цифра(ожидается нечетная)!')
                }
                else if (isNaN(mass[i][j]) === false) {
                    errmsg += ('\n' + (j + 1) + 'й символ ' + (i + 1) + 'го элемента ' + pos + 'го множества - массива не буква!')
                }
            }
        }
    }
    else {
        errmsg += ('\n' + pos + 'й пустой!')
    }
    if (errmsg === '')
        ok = true
    return ok
}


function join(a1, a2) {
    let temp = a1
    for (let i = 0; i < a2.length; i++)
        if (temp.includes(a2[i]) === false)
            temp.push(a2[i])
    return temp
}


function cross(a1, a2) {
    let temp = []
    for (let i = 0; i < a1.length; i++) {
        if (a2.includes(a1[i]) === true && temp.includes(a1[i]) === false)
            temp.push(a1[i])
    }
    return temp
}


function add1(a1, a2) {
    let temp = []
    for (let i = 0; i < a1.length; i++) {
        if (temp.includes(a1[i]) === false && a2.includes(a1[i]) === false)
            temp.push(a1[i])
    }
    return temp
}


function add2(a1, a2) {
    let temp = []
    for (let i = 0; i < a2.length; i++) {
        if (temp.includes(a2[i]) === false && a1.includes(a2[i]) === false)
            temp.push(a2[i])
    }
    return temp
}

function diff(a1, a2) {
    let temp = []
    for (let i = 0; i < a1.length; i++) {
        if (a2.includes(a1[i]) === false)
            temp.push(a1[i])
    }
    for (let i = 0; i < a2.length; i++) {
        if (a1.includes(a2[i]) === false)
            temp.push(a2[i])
    }
    return temp
}


function main() {
    let mass1 = document.getElementById('mass1')
    let mass2 = document.getElementById('mass2')
    let arr1 = (mass1.value).split(' ')
    let arr2 = (mass2.value).split(' ')

    if (ifval(arr1, 1) === false && ifval(arr2, 2) === false) {
        alert(errmsg)
        errmsg = ''
    }
    else if (ifval(arr1, 1) === false || ifval(arr2, 2) === false) {
        alert(errmsg)
        errmsg = ''
    }

    else {
        let res = null
        if  ((document.getElementById("jn")).checked)
            res = join(arr1, arr2)
        if  ((document.getElementById("cs")).checked)
            res = cross(arr1, arr2)
        if  ((document.getElementById("add1")).checked)
            res = add1(arr1, arr2)
        if  ((document.getElementById("add2")).checked)
            res = add2(arr1, arr2)
        if  ((document.getElementById("df")).checked)
            res = diff(arr1, arr2)
        if(res !== null)
            document.getElementById("res").innerHTML = 'Результат: {' + res + '}'
        else
            alert("Выберите действие!")
    }
}
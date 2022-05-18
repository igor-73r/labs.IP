let elems = []
let more_elems = []
let Matrix = []



function append() {
    let temp = (document.getElementById("append").value).split(' ')
    if (ifval(temp) === true) {
        elems.push(temp)
        document.getElementById("res").innerHTML = makeItButifull();
    }
}


function ifval(temp) {
    let ok = true
    if (temp.length > 2) {
        alert("Элементов больше двух!")
        ok = false
    }
    else if (temp.length < 2) {
        alert("Элементов меньше двух!")
        ok = false
    }
    for (let i = 0; i < temp.length; i++) {
        for (let j = 0; j < temp[i].length; j++) {
            if(temp[i][j] < '1' || temp[i][j] > '9' && temp[i][j].lower < 'a' || temp[i][j].lower > 'z') {
                alert(temp[i][j] + " - недопустимый символ!")
                ok = false
            }
        }
    }
    return ok
}


function makeItButifull() {
    let temp = ""
    for (let i = 0; i < elems.length; i++) {
        if(temp.length === 0)
            temp += '(' + elems[i] + ')'
        else
            temp += ', (' + elems[i] + ')'
    }
    return 'Результат: {' + temp + '}'
}


function makeItMoreButifull() {
    let temp = ""
    for (let i = 0; i < more_elems.length; i++) {
        for (let j = 0; j < more_elems.length; j++) {
            temp += Matrix[i][j] + ' '
        }
        temp += "<br>"
    }
    return temp
}

function remove() {
    let arr = []
    for (let i = 0; i < elems.length; i++) {
        for (let j = 0; j < elems[i].length; j++) {
            arr.push(elems[i][j])
        }
    }
    arr.sort();
    for(let i = 0; i < arr.length - 1; i++)
    {
        if(arr[i] === arr[i+1])
        {
            arr.splice(i,1)
            i--
        }
    }
    return arr
}


function createMatrix() {
    Matrix = []
    more_elems = []

    more_elems = remove()
    for (let i = 0; i < more_elems.length; i++) {
        let temp = []
        for (let j = 0; j < more_elems.length; j++) {
            if (elems.some(e => [more_elems[i], more_elems[j]].every((v, i) => v === e[i])))
                temp.push(1)
            else
                temp.push(0)
        }
        Matrix.push(temp)
    }
    document.getElementById("matrix").innerHTML = makeItMoreButifull()
}


function multiplication() {
    let temp = []

    for (let i = 0; i < Matrix.length; i++) {
        temp[i] = []
    }
    for (let k = 0; k < Matrix.length; k++) {
        for (let i = 0; i < Matrix.length; i++) {
            let e = 0
            for (let j = 0; j < Matrix.length; j++) {
                e += Matrix[i][j] * Matrix[j][k]
            }
            temp[i][k] = e
        }
    }
    return temp
}


function clear_() {
    elems = []
    document.getElementById("res").innerHTML = "Результат: "
    document.getElementById("result_of_analyze").innerHTML = ""
    document.getElementById("matrix").innerHTML = ""
}


function main() {
    createMatrix()
    let reflect = " "
    let symm = " "
    let trans = " "

    for (let i = 0; i < Matrix.length; i++) {
        for (let j = 0; j < Matrix[i].length; j++) {
            if (i === j && Matrix[i][j] === 0)
                reflect = " не "
            if (Matrix[i][j] !== Matrix[j][i])
                symm = " не "
            if (Matrix[i][j] === 0 && multiplication()[i][j] === 1)
                trans = " не "
        }
    }
    let res = reflect + "рефлексивно<br>" + symm + "симметрично<br>" + trans + "транзитивно"
    document.getElementById("result_of_analyze").innerHTML = res
}

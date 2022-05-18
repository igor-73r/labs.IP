let numberImg = 1;
const countImg = 5;
const countLn = 10;
const speed = 100;
const path = "../images/gallery/";

function GenerateImg () {
    let hight_of_line = 500 /countLn
    let Image = path+numberImg+".jpg"
    for (let i=0; i < countLn; i++){
        let item = $("<div></div>")
        item.addClass("elementImg")
        item.css("height", hight_of_line+"px")
        item.css("background-image", 'url('+Image+')')
        item.css("background-position-y", - i * hight_of_line + "px")
        $("#mainImage").append(item);
    }
}

function leftChange () {
    if (numberImg > 1) {
        numberImg--
    }
    else {
        numberImg = countImg
    }
    leftAnim()
}

function rightChange () {
    if (numberImg < countImg) {
        numberImg++
    }
    else {
        numberImg = 1;
    }
    rightAnim()
}

function rightAnim () {
    let Image = path+numberImg+".jpg"
    let i = 1
    $("#mainImage div").each(function(){
        if(i % 2 === 0){
            $(this).hide(speed*i, function(){
                $(this).css("background-image",'url('+Image+')')
                $(this).show(speed*i);
            })
        }else{
            $(this).slideUp(speed*i, function(){
                $(this).css("background-image",'url('+Image+')')
                $(this).slideDown(speed*i)
            })
        }
        i++
    })
}

function leftAnim () {
    let Image = path+numberImg+".jpg"
    let i = 1;

    $("#mainImage div").each(function(){
        if(i % 2 === 0){
            $(this).hide(speed*i, function(){
                $(this).css("background-image",'url('+Image+')')
                $(this).show(speed*i)
            })
        }else{
            $(this).slideUp(speed*i, function(){
                $(this).css("background-image",'url('+Image+')')
                $(this).slideDown(speed*i)
            })
        }
        i++
    })
}

$( document ).ready(function() {GenerateImg();});
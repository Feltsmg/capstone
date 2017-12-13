function ymd(d) {
    var b = d.toString();
    var ba = b.split(" ");
    return ba[1] + " " + ba[2] + " " + ba[3];
}
function nameChange () {
    myDog.name = document.getElementById("namefield").value;
    document.getElementById("dogname").innerHTML = myDog.name;
}
function birthdateChange () {
    myDog.setBirthdate(parseInt(document.getElementById("yearfield").value),
        parseInt(document.getElementById("monthfield").value),
        parseInt(document.getElementById("dayfield").value));
    document.getElementById("dogbirthday").innerHTML = ymd(myDog.birthdate);
}
function trickChange () {
    var t = "";
    switch (document.getElementById("trickfield").value) {
        case "idle":
            t = myDog.idle();
            break;
        case "sit":
            t = myDog.sit();
            break;
        case "fetch":
            t = myDog.fetch();
            break;
        case "shake":
            t = myDog.shake();
            break;
        case "down":
            t = myDog.down();
    }
    document.getElementById("currenttrick").innerHTML = t;
}

function init() {
    var dog = JSON.parse(localStorage.getItem("myDog"));
    if (dog == null) {
        myDog = new Dog("Lilly", 2006, 04, 01);
    } else {
        var date = new Date(dog.birthdate);
        myDog = new Dog(dog.name, date.getFullYear(), date.getMonth() + 1, date.getDate());
    }
    //myDog = new Dog("Lilly", 2006, 04, 01);
    document.getElementById("dogname").innerHTML = myDog.name;
    document.getElementById("dogbirthday").innerHTML = ymd(myDog.birthdate);
    document.getElementById("currenttrick").innerHTML = myDog.idle();
    document.getElementById("namefield").value = myDog.name;
    document.getElementById("yearfield").value = myDog.birthdate.getFullYear();
    document.getElementById("monthfield").value = myDog.birthdate.getMonth() + 1;
    document.getElementById("dayfield").value = myDog.birthdate.getDate();
    document.getElementById("trickfield").value = "idle";
    document.getElementById("namefield").onchange = nameChange;
    document.getElementById("yearfield").onchange = birthdateChange;
    document.getElementById("monthfield").onchange = birthdateChange;
    document.getElementById("dayfield").onchange = birthdateChange;
    document.getElementById("trickfield").onchange = trickChange;
}

function store() {
    localStorage.setItem("myDog", JSON.stringify(myDog));
}

window.onload = init;
window.onunload = store;

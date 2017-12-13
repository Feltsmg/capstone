function changeName()
{
    var name = document.getElementById("name").value;
    return name;
}

function changeBirthdateYear()
{
    var year = document.getElementById("year").value;
    return year;
}

function changeBirthdateMonth()
{
    var month = document.getElementById("month").value;
    return month;
}

function changeBirthdateDay()
{
    var day = document.getElementById("day").value;
    return day;
}

function changeTrick()
{
    var trick = document.getElementById("mySelect").value;
    return trick;
}

function init()
{
    var myDog = new Dog(changeName(), changeBirthDateYear(), changeBirthDateMonth(),
                            changeBirthDateDay());
    document.getElementById("dogName").innerHTML = myDog.name;
    document.getElementById("dogBirthdate").innerHTML = myDog.setBirthdate();
    switch(changeTrick())
    {
        case Sit:
            document.getElementById("trick").innerHTML = myDog.sit();
            break;
        case Fetch:
            document.getElementById("trick").innerHTML = myDog.fetch();
            break;
        case Shake:
            document.getElementById("trick").innerHTML = myDog.shake();
            break;
        case Down:
            document.getElementById("trick").innerHTML = myDog.down();
            break;
        default:
            document.getElementById("trick").innerHTML = myDog.idle();
    }
}

window.onload init;

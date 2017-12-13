
function Dog(name, year, month, day) {
    this.name = name;
    this.setBirthdate = function (year, month, day) {
        this.birthdate = new Date(year, month-1, day);
    };
    this.setBirthdate(year, month, day);
    this.idle = function () {
        return this.name + " is idle";
    };
    this.sit = function () {
        return this.name + " is sitting";
    };
    this.fetch = function () {
        return this.name + " is fetching";
    };
    this.shake = function () {
        return this.name + " is shaking hands";
    };
    this.down = function () {
        return this.name + " is lying down";
    };
}

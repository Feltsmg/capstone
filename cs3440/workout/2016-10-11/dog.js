function Dog(name, year, month, day)
{
    this.name = name;
    this.year = year;
    this.month = month;
    this.day = day;
    
    this.setBirthdate = function() {
        var birthdate = new Date(year, month, day);
        return birthdate;
    };
    
    
    this.idle = function()
    {
        var idleString = name + " is idle";
        return idleString;
    };

    this.sit = function()
    {
        var sitString = name + " is sitting";
        return sitString;
    };

    this.fetch = function()
    {
        var fetchString = name + " is fetching";
        return fetchString;
    };

    this.shake = function()
    {
        var shakeString = name + " is shaking hands";
        return shakeString;
    };

    this.down = function()
    {
        var downString = name + " is lying down";
        return downString;
    };
}


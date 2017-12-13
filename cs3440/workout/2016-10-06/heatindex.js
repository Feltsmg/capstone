function heatindex(temperature, humidity)
{
    this.temperature = temperature;
    this.humidity = humidity;
    var heatIndex = -42.379;
    if (temperature < 80 || humidity < 40)
    {
        return temperature;
    }
    heatIndex += (2.04901523 * temperature);
    heatIndex += (10.14333127 * humidity);
    heatIndex += (-0.22475541 * temperature * humidity);
    heatIndex += (-6.83783 * Math.pow(10, -3)) * Math.pow(temperature, 2);
    heatIndex += (-5.481717 * Math.pow(10, -2)) * Math.pow(humidity, 2);
    heatIndex += ((1.22874 * Math.pow(10, -3)) * Math.pow(temperature, 2) * humidity);
    heatIndex += ((8.5282 * Math.pow(10, -4)) * temperature * Math.pow(humidity, 2));
    heatIndex += ((-1.99 * Math.pow(10, -6)) * Math.pow(temperature, 2) * Math.pow(humidity, 2));
    return Math.round(heatIndex);
}


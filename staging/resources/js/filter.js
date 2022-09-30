import moment from 'moment'
import Vue from 'vue'

Vue.filter('timeformat', (arg) => {
    return moment(arg).format("MMM Do YYYY")
})

Vue.filter('sortlength', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
})

Vue.filter('capitalizedWord', function (value) {
    if (!value) return '';
    let splitStr = value.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        // You do not need to check if i is larger than splitStr length, as your for does that for you
        // Assign it back to the array
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
    }
    // Directly return the joined string
    return splitStr.join(' ');
})

Vue.filter('currencyConvert',function(amount){
//convert number to rupee
if(amount >= 10000000) amount = (amount/10000000).toFixed(2) + ' Cr';
    else if(amount >= 100000) amount = (amount/100000).toFixed(2) + ' Lac';
    else if(amount >= 1000) amount = (amount/1000).toFixed(2) + ' K';
    return amount;
})
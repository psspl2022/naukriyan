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
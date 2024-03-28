
/**
 * 
 * @param {string} cookie name of the cookie your searching for 
 * @param {string} source full variable containing the cookies (ussually document.cookie)
 * @returns {string} -1 if cookie doesnt exist otherwise the value of the coookie
 */
export function findcookie(cookie, source) {
    var allcookies = source;
    var cookiearray = allcookies.split(';');
    for (var i = 0; i < cookiearray.length; i++) {
        var named = cookiearray[i].split('=')[0];
        if (named == cookie)
            return cookiearray[i].split('=')[1]; // Value of Cookie    
    }
    return '-1';
}

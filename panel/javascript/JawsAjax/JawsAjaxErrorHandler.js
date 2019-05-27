/**
 * Server error handler
 */
function JawsAjaxServerError(error) 
{
    //Take the error and parse to see if it's a JawsServerError or a bug in the code
    var errorMessage = error.message;
    //JawsServerError pattern
    var pattern = /^\[(.*?)\]\s+(-)\s+(.*?)/;
    //Test..
    if (pattern.test(errorMessage)) {
        var errorSplitted = errorMessage.split(pattern);
        var errorCode     = errorSplitted[1];
        errorMessage      = errorSplitted[4];
        switch(errorCode) {
        case 'NOPERMISSION': //Not granted?
            alert(errorMessage);
            break;
        case 'NOSESSION': //No session?
            window.location = 'admin.php';
            break;
        case 'NOTLOGGED': //Session expired?
            alert(errorMessage + '...');
            window.location = 'admin.php';
            break;            
        }
    }
}

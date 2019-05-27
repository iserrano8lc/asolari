/**
 * Show the response
 */
function showResponse(message){
    var messageDiv = document.getElementById('msgbox');
    messageDiv.innerHTML = message['message'];
    messageDiv.className = message['css'];
    new Effect.Appear(messageDiv);
    hideResponseBox(messageDiv);
}

/**
 * Hide response boxes - Fast Code
 */
function hideResponseBox(name, timehide)
{
    if (typeof(timehide) == 'undefined') {
        timehide = '3000';
    }

    setTimeout('hideResponseBoxCallback("' + name.id + '")', timehide);
}

/**
 * Hide response boxes - JS Action (callback)
 */
function hideResponseBoxCallback(name)
{
    new Effect.Fade(name);
}

/**
 * Show working notification.
 */
function showWorkingNotification(msg)
{
    if (!msg) {
        msg = loading_message;
    }
    $('working_notification').innerHTML = msg;
    $('working_notification').setAttribute('style', 'display: table-cell;');
}

/**
 * Hide working notification
 */
function hideWorkingNotification()
{
    $('working_notification').setAttribute('style', 'display: none;');
}

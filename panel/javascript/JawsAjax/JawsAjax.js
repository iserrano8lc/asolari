/**
 * Repaints a combo
 */
function paintCombo(combo, oddColor, evenColor)
{
    if (evenColor == undefined) {
        evenColor = '#fff';
    }
    
    var color  = evenColor;
    for(var i=0; i<combo.length; i++) {
        combo.options[i].style.backgroundColor = color;;
        if (i % 2 == 0) {
            color = oddColor;
        } else {
            color = evenColor;
        }
    }
}

/**
 * Change the value of the editor/textarea
 */
function changeEditorValue(name, value)
{
    var usingMCE = typeof tinyMCE == 'undefined' ? false : true;
    if (usingMCE) {
        tinyMCE.execInstanceCommand(name, "mceFocus");
        tinyMCE.setContent(value);
    } else {
        $(name).value = value;
    }
}

/**
 * Get the value of the editor/textarea
 */
function getEditorValue(name)
{
    var usingMCE = typeof tinyMCE == 'undefined' ? false : true;
    if (usingMCE) {
        return tinyMCE.getContent();
    } else {
        return $(name).value;
    }
}

/**
 * Reset a (piwi)datagrid:
 *  - Clean all data
 *  - Set the new data
 *  - Repaint
 */
function resetGrid(name, data)
{
    $(name).reset();
    $(name).fillWithArray(data);
    $(name).repaint();
}

/**
 * Class JawsDatagrid
 */
var JawsDataGrid = {

    /**
     * Get the previous Values and prepares the datagrid
     */
    getPreviousValues: function() {
        var previousValues = $(this.name).getPreviousPagerValues();
        var ajaxObject     = $(this.name).objectName;
        var result         = ajaxObject.getdata(previousValues);
        resetGrid($(this.name), result);
        $(this.name).previousPage();
    },

    /**
     * Get the next Values and prepares the datagrid
     */
    getNextValues: function() {
        var nextValues     = $(this.name).getNextPagerValues();
        var ajaxObject     = $(this.name).objectName;
        var result         = ajaxObject.getdata(nextValues);
        resetGrid($(this.name), result);
        $(this.name).nextPage();
    },

    /**
     * Only retrieves information with the current page the pager has and prepares the datagrid
     */
    getData: function() {
        var currentPage = $(this.name).currentPage;
        var ajaxObject  = $(this.name).objectName;
        var result      = ajaxObject.getdata(currentPage);
        resetGrid($(this.name), result);
    }
}

/**
 * Prepares the datagrid with basic data
 */
function initDataGrid(name, objectName)
{
    if ($(name) == undefined) {
        return true;
    }

    if (objectName == undefined) {
        return true;
    }


    $(name).objectName   = objectName;
    JawsDataGrid.name    = name;

    $(name + '_pagerPreviousAnchor').onclick = function() {
        JawsDataGrid.getPreviousValues();
    }
    $(name + '_pagerNextAnchor').onclick = function() {
        JawsDataGrid.getNextValues();
    }

    getDG();
}

/**
 * Fast method to retrieve datagrid data
 */
function getDG()
{
    JawsDataGrid.getData();
}


/**
 * Changes the text of a button with a stock
 */
function changeButtonText(button, message)
{
    var buttonInner = button.innerHTML.substr(0, button.innerHTML.indexOf("&nbsp;"));
    button.innerHTML = buttonInner + "&nbsp;" + message;
    button.value     = message;
}

/**
 * Similar to PHP-trim fuction
 */
function jawsTrim(str)
{
    return str.replace(/^\s*|\s*$/g, '');
}

function initJawsObservers()
{
    var forms = document.getElementsByTagName('form');
    for(var i=0; i<forms.length; i++) {
        new Form.Observer(forms[i], 1, jawsFormCallback);
    }
}


function jawsFormCallback(form, elements)
{
    elements = elements.split('&');
    for(var i=0; i<elements.length; i++) {
        var elementName = elements[i].split('=')[0];
        var element     = form.elements[elementName];
        switch(element.type) {
        case 'text':
            element.value = element.value.unescapeHTML();
            break;
        }
        //var element = $(element
        //alert($elements.type);
    }
}

/**
 * Creates an image link
 *
 *   <a href="link"><img src="imgSrc" border="0" title="text" /></a>
 */
function createImageLink(imgSrc, link, text, space) 
{
    var linkElement = document.createElement('a');
    linkElement.href = link;
    if (space == true) {
        linkElement.style.paddingRight = '3px';
    }
    
    var image = document.createElement('img');
    image.border = '0';
    image.src = imgSrc;
    image.title = text;
    
    linkElement.appendChild(image);

    return linkElement;
}

/**
 * Resets a combo
 */
function resetCombo(combo)
{
    while(combo.options.length != 0) {
        combo.options[0] = null;
    }
}

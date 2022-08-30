function validate(formularz) {
    const imie = formularz.elements["f_imie"];
    const nazwisko = formularz.elements["f_nazwisko"];
    const kod = formularz.elements["f_kod"];
    const ulica = formularz.elements["f_ulica"];
    const miasto = formularz.elements["f_miasto"];
    const email = formularz.elements["f_email"];
    const isCityValid = checkStringAndFocus(miasto, "Puste miasto", isWhiteSpaceOrEmpty);
    const isStreetValid = checkStringAndFocus(ulica, "Pusta ulica", isWhiteSpaceOrEmpty);
    const isCodeValid = checkStringAndFocus(kod, "Pusty kod", isWhiteSpaceOrEmpty);
    const isEmailValid = checkStringAndFocus(email, "Bledny mail", isIncorrectEmail);
    const isSurnameValid = checkStringAndFocus(nazwisko, "Puste nazwisko", isWhiteSpaceOrEmpty);
    const isNameValid = checkStringAndFocus(imie, "Puste imie", isWhiteSpaceOrEmpty);
    return isCityValid && isStreetValid && isEmailValid && isCodeValid && isSurnameValid && isNameValid
}

function checkStringAndFocus(obj, msg, validationPredicate) {
    let str = obj.value;
    let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
    if (validationPredicate(str)) {
        document.getElementById(errorFieldName).innerHTML = msg;
        obj.focus();
        return false;
    }
    else {
        document.getElementById(errorFieldName).innerHTML = "";
        return true;
    }
}

function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}

function isIncorrectEmail(str) {
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    return !email.test(str)
}

function showElement(e) {
    document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
    document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e) {
    if (e) {
        if (i % 2 == 1) {
            e.setAttribute("style", "background-color: Aqua;");
        }
        e = e.nextSibling;
        while (e && e.nodeType != 1) {
            e = e.nextSibling;
        }
        alterRows(++i, e);
    }
}

alterRows(1, document.getElementsByTagName("tr")[0])

function nextNode(e) {
    while (e && e.nodeType != 1) {
        e = e.nextSibling;
    }
    return e;
}

function prevNode(e) {
    while (e && e.nodeType != 1) {
        e = e.previousSibling;
    }
    return e;
}

function swapRows(b) {
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
    if (form.value.length > maxSize)
        form.value = form.value.substring(0, maxSize);
    else
        msg.innerHTML = maxSize - form.value.length;
}
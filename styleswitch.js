
function setTheme(theme) {

    localStorage.setItem('style', theme)
    document.querySelector('#stylesheet-id').href = `${theme}.css`
}

setTheme(localStorage.getItem('style') || 'second')
window.addEventListener('DOMContentLoaded', () => {
    document.querySelector('a.link-back').addEventListener('click', e => {
        e.preventDefault()
        window.history.back()
    })
})
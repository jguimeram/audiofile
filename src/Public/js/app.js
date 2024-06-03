function hideBanner() {
    const flash = document.getElementById('flash')

    if (flash) {
        setTimeout(() => {
            flash.style.display = 'none'
        }, 2000)
    }
}


document.addEventListener("DOMContentLoaded", () => {
    hideBanner()
})


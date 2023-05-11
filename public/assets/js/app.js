menuToggle.addEventListener("click", function () {
    menuToggle.classList.toggle(
        "active"
    ); /* tambahkan class active ketika tombol di klik */
});

function dropdown() {
    return {
        open: false,
        toggle() {
            this.open = !this.open;
        },
    };
}

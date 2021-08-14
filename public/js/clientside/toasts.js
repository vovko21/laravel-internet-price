let toastElList = [].slice.call(document.querySelectorAll('.toast'))
let toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl)
})

for (let i = 0; i < toastList.length; i++) {
    toastList[i].show();
}

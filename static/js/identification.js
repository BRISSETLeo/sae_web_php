document.addEventListener('DOMContentLoaded', function () {
    var alogo = document.querySelector('#header-identification div a');
    var imglogo = document.querySelector('img[alt="Logo"]');

    function handleClick(a) {
        window.location.href = a.href;
    }

    imglogo.addEventListener("click", function () { handleClick(alogo) });
});
window.onload = function() {
    window.addEventListener('scroll', function(e) {
        if (pageYOffset > 400) {
            document.getElementById('header').style.backgroundColor = '#111111';
        } else {
            document.getElementById('header').style.backgroundColor = '';
        }
    });
}
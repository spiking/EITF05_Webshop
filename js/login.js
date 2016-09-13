$(window, document, undefined).ready(function () {

    $('input').blur(function () {
        var $this = $(this);
        if ($this.val())
            $this.addClass('used');
        else
            $this.removeClass('used');
    });

    var $ripples = $('.ripples');

    $ripples.on('click.Ripples', function (e) {

        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find('.ripplesCircle');

        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;

        $circle.css({
            top: y + 'px'
            , left: x + 'px'
        });

        $this.addClass('is-active');

    });

    $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function (e) {
        $(this).removeClass('is-active');
    });

});

function showDiv() {

    document.getElementById('emailDiv').style.display = "block"
    document.getElementById('addressDiv').style.display = "block"
    document.getElementById('registerText').onclick = hideDiv;
    document.getElementById('registerText').innerHTML = "Already have an account?"
    document.getElementById('title').innerHTML = 'Sign Up'
    document.getElementById('loginButton').innerHTML = 'Sign Up'
}

function hideDiv() {

    document.getElementById('emailDiv').style.display = "none";
    document.getElementById('addressDiv').style.display = "none";
    document.getElementById('registerText').onclick = showDiv;
    document.getElementById('registerText').innerHTML = "Don't have an account?"
    document.getElementById('title').innerHTML = 'Login'
    document.getElementById('loginButton').innerHTML = 'Login'
}

function clearData() {
    $("#usernameInput").val('');
    $("#emailInput").val('');
    $("#addressInput").val('');
    $("#passwordInput").val('');
    console.log("I've been called");
}
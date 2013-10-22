$(document).ready(function () {
    $("#logout").click(function () {
        yam.getLoginStatus(
            function (response) {
                alert("in login status");
                if (response.authResponse) {
                    yam.logout(function (response) {
                        alert("user was logged out");
                    })
                }
            }
        );
    });
});

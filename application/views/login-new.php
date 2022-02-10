<style>
    .materialContainer {
        width: 100%;
        max-width: 460px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }

    .box {
        transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
        -webkit-transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .box {
        position: relative;
        top: 0;
        opacity: 1;
        float: left;
        padding: 60px 50px 40px 50px;
        width: 100%;
        background: #fff;
        border-radius: 10px;
        transform: scale(1);
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        z-index: 5;
    }

    .title {
        width: 100%;
        float: left;
        line-height: 46px;
        font-size: 34px;
        font-weight: 700;
        letter-spacing: 2px;
        color: #ED2553;
        position: relative;
    }

    .title:before {
        content: "";
        width: 5px;
        height: 100%;
        position: absolute;
        top: 0;
        left: -50px;
        background: #ED2553;
    }

    .box:before {
        content: "";
        width: 100%;
        height: 30px;
        border-radius: 10px;
        position: absolute;
        top: -10px;
        background: rgba(255, 255, 255, 0.6);
        left: 0;
        transform: scale(0.95);
        -webkit-transform: scale(0.95);
        -ms-transform: scale(0.95);
        z-index: -1;
    }

    .input {
        position: relative;
    }

    .input,
    .button {
        margin-top: 30px;
        height: 70px;
    }

    .input {
        width: 100%;
        float: left;
    }

    .input {
        transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input:before {
        content: "";
        background: rgba(0, 0, 0, 0.1);
        z-index: 3;
    }

    .input:before,
    .input .spin {
        width: 100%;
        height: 1px;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .input label,
    .input input,
    .input .spin {
        transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input label,
    .input input,
    .input .spin {
        width: 100%;
        float: left;
    }

    .input label {
        font-family: "Roboto", sans-serif;
        font-size: 24px;
        color: rgba(0, 0, 0, 0.8);
        font-weight: 300;
    }

    .input label {
        position: absolute;
        top: 10px;
        left: 0;
        z-index: 2;
        cursor: pointer;
        line-height: 60px;
        opacity: 0.8;
    }

    .input input {
        position: relative;
    }

    .input input {
        height: 60px;
        top: 10px;
        border: none;
        background: transparent;
        font-family: "Roboto", sans-serif;
        font-size: 24px;
        color: rgba(0, 0, 0, 0.8);
        font-weight: 300;
    }

    .input .spin {
        background: #ED2553;
        z-index: 4;
        width: 0;
    }

    .button {
        transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .button {
        width: 100%;
        float: left;
    }

    .input,
    .button {
        margin-top: 30px;
        height: 70px;
    }

    .button {
        position: relative;
    }

    .button {
        margin-top: 20px;
        margin: 40px 0;
        overflow: hidden;
        z-index: 2;
    }

    .button.login {
        width: 60%;
        left: 20%;
    }

    .button.login {
        margin-top: 30px;
    }

    .button button {
        width: 100%;
        float: left;
    }

    .button button {
        position: relative;
    }

    .button button {
        font-family: "Roboto", sans-serif;
        font-size: 24px;
        color: rgba(0, 0, 0, 0.8);
        font-weight: 300;
    }

    .button button {
        width: 100%;
        line-height: 64px;
        left: 0%;
        background-color: transparent;
        border: 3px solid rgba(0, 0, 0, 0.1);
        font-weight: 900;
        font-size: 18px;
        color: rgba(0, 0, 0, 0.2);
    }

    .button button {
        background-color: #fff;
        color: #ED2553;
        border: none;
    }

    .button button {
        cursor: pointer;
        position: relative;
        z-index: 2;
    }

    .button.login button {
        transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .button.login button {
        width: 100%;
        line-height: 64px;
        left: 0%;
        background-color: transparent;
        border: 3px solid rgba(0, 0, 0, 0.1);
        font-weight: 900;
        font-size: 18px;
        color: rgba(0, 0, 0, 0.2);
    }
    .button.login button:hover {
        color: #ED2553;
        border-color: #ED2553;
    }

    .button.login button i.fa {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        line-height: 60px;
        transform: scale(0) rotate(-45deg);
        -webkit-transform: scale(0) rotate(-45deg);
        -ms-transform: scale(0) rotate(-45deg);
    }

    .pass-forgot {
        width: 100%;
        float: left;
        text-align: center;
        color: rgba(0, 0, 0, 0.4);
        font-size: 18px;
    }

    .remember {
        position: relative;
        float: left;
        height: 20px;
        margin-top: 30px;
        width: 100%;
    }
    .remember input{
        height: 20px;
        width: 20px;
    }
    .remember label{
        vertical-align: super;
        margin-left: 10px;
    }
    




    html {
        overflow: hidden;
    }

    body {
        background-image: url(<?php echo base_url('assets/img/login-background.png'); ?>);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
        font-family: "Roboto", sans-serif;
        overflow: hidden;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style-type: none;
        outline: none;
    }

    *:after,
    *::before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style-type: none;
        outline: none;
    }

</style>
<html>

<head>
    <title>TS Fire Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div class="materialContainer">
        <div class="error-box">
        
        </div>
        <div class="box">
            <form action="<?php echo base_url(); ?>login/check_login" method="post">
                <?php if($this->session->flashdata('error_message')!=''){ ?>
                    <div class="alert alert-danger">
                      <strong> <?php echo  $this->session->flashdata('error_message');?></strong>
                    </div>
                <?php } ?>
                <div class="title">LOGIN</div>
                <div class="input">
                    <label for="name">Username</label>
                    <input type="text" name="username" id="name">
                    <span class="spin"></span>
                </div>
                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" name="password" id="pass">
                    <span class="spin"></span>
                </div>
                <div class="remember">
                    <input type="checkbox">
                    <label>Remember me</label>
                </div>
                <div class="button login">
                    <button><span>LOGIN</span> <i class="fa fa-check"></i></button>
                </div>
                <a href="" class="pass-forgot">Forgot your password?</a>
            </form>
        </div>
    </div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        setTimeout(function(){
            $('.alert-danger').fadeOut();
        },3000);
        $(function() {

            $(".input input").focus(function() {

                $(this).parent(".input").each(function() {
                    $("label", this).css({
                        "line-height": "18px",
                        "font-size": "18px",
                        "font-weight": "100",
                        "top": "0px"
                    })
                    $(".spin", this).css({
                        "width": "100%"
                    })
                });
            }).blur(function() {
                $(".spin").css({
                    "width": "0px"
                })
                if ($(this).val() == "") {
                    $(this).parent(".input").each(function() {
                        $("label", this).css({
                            "line-height": "60px",
                            "font-size": "24px",
                            "font-weight": "300",
                            "top": "10px"
                        })
                    });

                }
            });

            $(".button").click(function(e) {
                var pX = e.pageX,
                    pY = e.pageY,
                    oX = parseInt($(this).offset().left),
                    oY = parseInt($(this).offset().top);

                $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
                $('.x-' + oX + '.y-' + oY + '').animate({
                    "width": "500px",
                    "height": "500px",
                    "top": "-250px",
                    "left": "-250px",

                }, 600);
                $("button", this).addClass('active');
            })

            $(".alt-2").click(function() {
                if (!$(this).hasClass('material-button')) {
                    $(".shape").css({
                        "width": "100%",
                        "height": "100%",
                        "transform": "rotate(0deg)"
                    })

                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "initial"
                        })
                    }, 600)

                    $(this).animate({
                        "width": "140px",
                        "height": "140px"
                    }, 500, function() {
                        $(".box").removeClass("back");

                        $(this).removeClass('active')
                    });

                    $(".overbox .title").fadeOut(300);
                    $(".overbox .input").fadeOut(300);
                    $(".overbox .button").fadeOut(300);

                    $(".alt-2").addClass('material-buton');
                }

            })

            $(".material-button").click(function() {

                if ($(this).hasClass('material-button')) {
                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "hidden"
                        })
                        $(".box").addClass("back");
                    }, 200)
                    $(this).addClass('active').animate({
                        "width": "700px",
                        "height": "700px"
                    });

                    setTimeout(function() {
                        $(".shape").css({
                            "width": "50%",
                            "height": "50%",
                            "transform": "rotate(45deg)"
                        })

                        $(".overbox .title").fadeIn(300);
                        $(".overbox .input").fadeIn(300);
                        $(".overbox .button").fadeIn(300);
                    }, 700)

                    $(this).removeClass('material-button');

                }

                if ($(".alt-2").hasClass('material-buton')) {
                    $(".alt-2").removeClass('material-buton');
                    $(".alt-2").addClass('material-button');
                }

            });

        });

    </script>
</body>

</html>

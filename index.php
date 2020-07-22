<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/startpage.css" /> -->

    <style>
    body {
        background-color: #38ff0026;
    }

    .col-lg-12.cent {
        margin-top: 8%;
    }

    /*responsive*/

    @media (max-width: 1366px) {}

    @media (max-width: 1280px) {
        .col-lg-12.cent {
            margin-top: 50%;
        }
    }

    @media (max-width: 1080px) {}

    @media (max-width: 1024px) {}

    @media (max-width: 991px) {}

    @media (max-width: 768px) {
        .col-lg-12.cent {
            margin-top: 50%;
        }
    }

    @media (max-width: 736px) {
        .col-lg-12.cent {
            margin-top: 60%;
        }
    }

    @media (max-width: 640px) {}

    @media (max-width: 568px) {}

    @media (max-width: 480px) {}

    @media (max-width: 440px) {}

    @media (max-width: 414px) {}

    @media (max-width: 384px) {}

    @media (max-width: 375px) {}

    @media (max-width: 360px) {
        .col-lg-12.cent {
            margin-top: 82%;
        }
    }
    </style>
</head>

<!-- <body onload="myFunction()"> -->

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 cent">
                    <img src="./image/w3logo.png" class="mx-auto d-block" style="width: 50%;" />
                </div>
            </div>
        </div>
    </div>

    <script>
    function pageRedirect() {
        window.location.replace("login.php");
    }
    setTimeout("pageRedirect()", 1000);
    //     function myFunction() {
    //         window.location.replace("login.php");
    // }
    </script>
</body>

</html>
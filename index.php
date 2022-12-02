<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SafeChip Search Demo</title>
</head>

<body>
    <div class="container-fluid">
        <form class="d-flex" action="" method="post" enctype="multipart/form-data">
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Search Chip</label>
                    <br>
                    <input type="number" name="chip" id="chip" class="form-control w-50 d-inline-block" placeholder="Enter Chip Number" aria-describedby="helpId">
                    <button type="submit" name="search" class="btn btn-primary d-inline-block">Search</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    define('USERNAME', "safechip");
    define('PASSWORD', "SafeCHIP2022");
    define('USERNAME_INFO', "safechipinfo");
    define('PASSWORD_INFO', "SafeCHIPinfo2022");

    if(isset($_REQUEST['search'])){
        if(!empty($_REQUEST['chip'])){
            define('CHIP_NUMBER', $_REQUEST['chip']);

            $url = "https://identibase-api-live.azurewebsites.net/api/chips/checkchip?username=" . USERNAME . "&password=" . PASSWORD . "&chipnumber=" . CHIP_NUMBER;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            $data = curl_exec($ch);
            curl_close($ch);

            $url_info = "https://identibase-api-live.azurewebsites.net/api/chips/checkchip?username=" . USERNAME_INFO . "&password=" . PASSWORD_INFO . "&chipnumber=" . CHIP_NUMBER;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_URL, $url_info);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            $data_info = curl_exec($ch);
            curl_close($ch);

            echo "Chip Result: " . $data . "<br>" . "Chip Info Result: " . $data_info;
        }
    }
?>

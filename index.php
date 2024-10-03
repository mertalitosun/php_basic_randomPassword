<?php
    function createPassword($passwordLength = 8){
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!*_.?";
        $password = "";

        for ($i = 0; $i < $passwordLength; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $password;
    }

    $errorMessage = ""; 
    $password = "";

    if (isset($_POST['passwordLength'])) {
        $passwordLength = intval($_POST['passwordLength']);
        
        if ($passwordLength >= 8 && $passwordLength <= 20) {
            $password = createPassword($passwordLength);
        } else {
            $errorMessage = "Lütfen şifre uzunluğunu 8 ile 20 arasında girin.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Create Random Password</title>
</head>
<body>
    

    <div class="container my-5">
        <h1 class="text-center">Rastgele Şifre Üretici</h1>
        <div class="password-form my-3">
            <form method="post">
                <div class="mb-3">
                    <label for="passwordLength" class="form-label">Şifre uzunluğunu seçin</label>
                    <input type="number" name="passwordLength" id="passwordLength" min="8" max="20" class="form-control" value="8">
                    <div class="form-text">Şifre uzunluğu 8 - 20 arasında olmalıdır.</div>
                </div>
                <input type="submit" value="Şifre Üret" class="btn btn-primary" id="form-submit">
            </form>

            <?php if($errorMessage) {?>
                <p class="text-danger my-3"><?php echo $errorMessage; ?></p>
            <?php } elseif ($password) {?>
                <p class="my-3">Oluşturulan Şifre: <strong><?php echo $password; ?></strong></p>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        const passwordLength = document.getElementById("passwordLength");
        const submit = document.getElementById("form-submit");
        
        submit.addEventListener("click",(event)=>{
            if (!passwordLength.value || passwordLength.value > 20 || passwordLength.value < 8 ) {
                event.preventDefault();
                alert("Lütfen şifre uzunluğunu referans değerler arasında girin.");
                passwordLength.value = 8;
            }
        })
        
    </script>
</body>
</html>
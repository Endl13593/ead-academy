<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EAD - Academy- Login</title>
    <link rel="stylesheet" type="text/css" href="<?= BASE; ?>assets/css/login.css">
</head>
<body>
    <form method="POST">
        <div class="login">LOGIN - PAINEL</div>
        <hr>
        <?php if (!empty($aviso))  : ?>
            <div class="aviso">
                <?= $aviso; ?>
            </div>
        <?php endif; ?>
        <input type="email" name="email" placeholder="E-mail"><br><br>

        <input type="password" name="senha" placeholder="*****"><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
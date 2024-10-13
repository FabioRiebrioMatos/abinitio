<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ab Initio</title>
    <!-- favicon -->
    <link rel="icon" href="/img/logo1.ico">
    <link rel="stylesheet" href="/css/styles-contact.css">
    <link rel="stylesheet" href="css/mobile.css" media="only screen and (max-width: 768px)">
    <!-- icons social-media -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <?php include 'includes/header-back.php'; ?>

    <?php
    $mensagem_sucesso = "";
    $mensagem_erro = ""; // Para armazenar mensagens de erro
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Configurações do e-mail
        $para = "contato@aabinitio.com.br";
        $assunto = "Novo Contato pelo Site";

        // Coleta os dados do formulário e valida
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['telefone']);
        $mensagem = trim($_POST['mensagem']);

        if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
            $mensagem_erro = "Por favor, preencha todos os campos.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagem_erro = "E-mail inválido.";
        } else {
            // Cria o corpo do e-mail
            $corpo_email = "
Nome: $nome
E-mail: $email
Telefone (WhatsApp): $telefone
Mensagem:
$mensagem
";

            // Envia o e-mail
            if (mail($para, $assunto, $corpo_email)) {
                $mensagem_sucesso = "Mensagem enviada com sucesso!";
            } else {
                $mensagem_erro = "Falha no envio da mensagem.";
            }
        }
    }
    ?>
    <div class="main">
        <form action="" method="post">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required><br><br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="telefone">Telefone (WhatsApp):</label>
            <input type="tel" id="telefone" name="telefone" required><br><br>
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="10" cols="50" maxlength="2000"></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>

        <!-- Exibir mensagens de erro ou sucesso -->
        <?php if ($mensagem_sucesso): ?>
            <p class="success-message"><?php echo $mensagem_sucesso; ?></p>
        <?php elseif ($mensagem_erro): ?>
            <p class="error-message"><?php echo $mensagem_erro; ?></p>
        <?php endif; ?>
    </div>


    <?php include 'includes/footer.php'; ?>

</body>

</html>
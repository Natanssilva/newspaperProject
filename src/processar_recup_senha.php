<?php
    // session_start();
    require __DIR__ . '/../vendor/autoload.php'; //incluir composer

    require_once 'bd.php';
    include_once '../biblioteca/funcoes.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Receba os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $emailRecupSenha = $dados['email'];

        $query_recuperar_usuario = "SELECT id_user, nome, sobrenome, email FROM usuarios WHERE email = '$emailRecupSenha' LIMIT 1;";

        $resultado = $ligacao->query($query_recuperar_usuario);
        $dadosRecupSenha = $resultado->fetch(PDO::FETCH_ASSOC); 
      
        if (!empty($dadosRecupSenha)) {
            // Gere uma chave de recuperação para a senha
            $chave_recuperar_senha = password_hash($dadosRecupSenha['id_user'] . $dadosRecupSenha['nome'], PASSWORD_DEFAULT);

            $query_chave_recuperar_senha = "UPDATE usuarios SET chave_recuperar_senha = :chave WHERE id_user = :id_user LIMIT 1;";
            $stmt = $ligacao->prepare($query_chave_recuperar_senha);
            $stmt->bindParam(':chave', $chave_recuperar_senha);
            $stmt->bindParam(':id_user', $dadosRecupSenha['id_user']);
            $resultado_recuperar_senha = $stmt->execute();

          

            
            if ($resultado_recuperar_senha) {

                //link atualizar senha
                
                    $link = "http://localhost/newspaperProject/src/atualizar_senha.php?chave=" . urlencode($chave_recuperar_senha);

                    // Criando uma instância do PHPMailer
                    $mail = new PHPMailer(true);

                    try {
                        $mail->CharSet = 'UTF-8';
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'natanssilva10@gmail.com';
                        $mail->Password = 'moyp edpa ogof bqyt';
                        $mail->SMTPSecure = 'tls';  // 'tls' para o Gmail
                        $mail->Port = 587;  // Porta SMTP padrão do Gmail


                        // Remetente e destinatário
                        $mail->setFrom('natanssilva10@gmail.com', 'Equipe de Desenvolvimento');
                        $mail->addAddress("$emailRecupSenha", "{$dadosRecupSenha['nome']}");

                        // Conteúdo do e-mail
                        $mail->isHTML(true);
                        $mail->Subject = 'Recuperação de senha.';
                        $mail->Body = "Olá {$dadosRecupSenha['nome']},<br> foi solicitado uma alteração de senha.<br> Para continuar o processo de alteração, clique no link abaixo: 
                                       <br><br> <a href='" . $link . "'>". $link . "</a><br><br> Caso não foi solicitado a alteração, favor desconsiderar o email e nenhuma ação será realizada.
                                       A senha permanecerá a mesma até o momento em que o link de alteração seja ativado.
                        ";

                        // Envie o e-mail
                        $mail->send();

                        $response = [
                            'status' => 'true',
                            'message' => 'Foi enviado um email com instruções para realizar a recuperacao da senha',
                            'redirect' => 'index.php'
                        ];
                       
                    } catch (Exception $e) {
                        $response = [
                            'status' => 'E2',
                            'message' => 'Erro ao enviar o e-mail',
                            'alert' => $mail->ErrorInfo
                        ];

                       
                    }

               
            } else {
                $response = [
                    'status' => 'erro1',
                    'message' => 'Erro no processamento da query'
                ];
            }
        } else {
            $response = [
                'status' => 'false',
                'message' => 'O email fornecido nao existe no banco de dados'
            ];
        }
        echo json_encode($response);
    }
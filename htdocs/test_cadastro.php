<?php
// Arquivo de teste para o cadastro - dentro de htdocs
echo "<h1>Teste de Cadastro - Portuelho 🐰</h1>";

// Incluir o arquivo de conexão
require_once "php/crud.php";

// Simular dados de teste
$_POST['email'] = 'teste' . time() . '@exemplo.com'; // Email único
$_POST['name'] = 'Usuário Teste';
$_POST['username'] = 'user' . time(); // Username único
$_POST['password'] = '123456';
$_POST['confirm-password'] = '123456';

echo "<h2>Dados de teste:</h2>";
echo "Email: " . $_POST['email'] . "<br>";
echo "Nome: " . $_POST['name'] . "<br>";
echo "Username: " . $_POST['username'] . "<br>";
echo "Senha: " . $_POST['password'] . "<br><br>";

try {
    $cls = new database();
    $mysqli = $cls->GetLinkMySQLI();
    
    echo "✅ Conexão estabelecida!<br>";
    
    // Verificar estrutura da tabela
    $result = $mysqli->query("DESCRIBE ALUNO");
    if ($result) {
        echo "<h3>Estrutura da tabela ALUNO:</h3>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Campo</th><th>Tipo</th><th>Nulo</th><th>Chave</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }
    
    // Testar cadastro
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
        echo "<h2>🔄 Processando cadastro...</h2>";
        
        $nome = addslashes($_POST['name']);
        $email = strtolower(addslashes($_POST['email']));
        $username = str_replace('@', '', addslashes($_POST['username']));
        $pwd = addslashes($_POST['password']);
        $cpwd = addslashes($_POST['confirm-password']);
        
        // Validações
        if (!empty($nome) && !empty($email) && !empty($username) && !empty($pwd) && !empty($cpwd)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($pwd == $cpwd) {
                    // Verificar se email já existe
                    $sql = "SELECT EMAIL_ALUNO FROM ALUNO WHERE EMAIL_ALUNO = '" . base64_encode($email) . "'";
                    $result = $mysqli->query($sql);
                    
                    if ($result->num_rows > 0) {
                        echo "⚠️ Email já cadastrado!<br>";
                    } else {
                        // Verificar se username já existe
                        $sql = "SELECT ARROBA_ALUNO FROM ALUNO WHERE ARROBA_ALUNO = '" . base64_encode($username) . "'";
                        $result = $mysqli->query($sql);
                        
                        if ($result->num_rows > 0) {
                            echo "⚠️ Username já existe!<br>";
                        } else {
                            // Definir data de cadastro
                            $timezone = new DateTimeZone('America/Sao_Paulo');
                            $now = new DateTime('now', $timezone);
                            $data_cadastro = $now->format('Y-m-d');
                            
                            // Valores padrão
                            $nivel = 1;
                            $nivel_escrita = 1;
                            $ofensiva = 0;
                            $qi = 100;
                            $vocabulario = 1;
                            
                            // Hash da senha
                            $hash = password_hash($pwd, PASSWORD_DEFAULT);
                            
                            echo "🔒 Hash da senha criado: " . substr($hash, 0, 20) . "...<br>";
                            
                            // Inserir no banco
                            $stmt = $mysqli->prepare("INSERT INTO ALUNO (NOME_ALUNO, EMAIL_ALUNO, ARROBA_ALUNO, SENHA_ALUNO, DATA_CADASTRO, NIVEL, NIVEL_ESCRITA, OFENSIVA, QI, VOCABULARIO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            
                            if ($stmt) {
                                $stmt->bind_param("sssssiiii", 
                                    base64_encode($nome), 
                                    base64_encode($email), 
                                    base64_encode($username), 
                                    $hash, 
                                    $data_cadastro, 
                                    $nivel, 
                                    $nivel_escrita, 
                                    $ofensiva, 
                                    $qi, 
                                    $vocabulario
                                );
                                
                                if ($stmt->execute()) {
                                    echo "✅ <strong>Usuário cadastrado com sucesso!</strong><br>";
                                    echo "🆔 ID do usuário: " . $mysqli->insert_id . "<br>";
                                    
                                    // Verificar se foi inserido
                                    $sql = "SELECT * FROM ALUNO WHERE ID_ALUNO = " . $mysqli->insert_id;
                                    $result = $mysqli->query($sql);
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        echo "<h3>📋 Dados inseridos no banco:</h3>";
                                        echo "<table border='1' style='border-collapse: collapse;'>";
                                        echo "<tr><th>Campo</th><th>Valor</th></tr>";
                                        echo "<tr><td>ID</td><td>" . $row['ID_ALUNO'] . "</td></tr>";
                                        echo "<tr><td>Nome</td><td>" . base64_decode($row['NOME_ALUNO']) . "</td></tr>";
                                        echo "<tr><td>Email</td><td>" . base64_decode($row['EMAIL_ALUNO']) . "</td></tr>";
                                        echo "<tr><td>Username</td><td>" . base64_decode($row['ARROBA_ALUNO']) . "</td></tr>";
                                        echo "<tr><td>Data</td><td>" . $row['DATA_CADASTRO'] . "</td></tr>";
                                        echo "<tr><td>Nível</td><td>" . $row['NIVEL'] . "</td></tr>";
                                        echo "<tr><td>Senha Hash</td><td>" . substr($row['SENHA_ALUNO'], 0, 30) . "...</td></tr>";
                                        echo "</table>";
                                        
                                        echo "<h3>🎉 SUCESSO! O sistema de cadastro está funcionando perfeitamente!</h3>";
                                    }
                                } else {
                                    echo "❌ Erro ao inserir: " . $stmt->error . "<br>";
                                }
                                $stmt->close();
                            } else {
                                echo "❌ Erro ao preparar statement: " . $mysqli->error . "<br>";
                            }
                        }
                    }
                } else {
                    echo "❌ Senhas não conferem!<br>";
                }
            } else {
                echo "❌ Email inválido!<br>";
            }
        } else {
            echo "❌ Preencha todos os campos!<br>";
        }
    }
    
    $mysqli->close();
    
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "<br>";
}
?>

<br><br>
<a href="singup/" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    🔙 Voltar para o formulário de cadastro
</a>

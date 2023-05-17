<?php
	$lista_contatos = [];
?>

<html>
    <head>
        <title>Gerenciador de Contatos</title>
    </head>
    <body>
        <h1>Gerenciador de contatos</h1>
        <form>
            <fieldset>
                <legend>Novo contato</legend>

                <!--Criação dos labels e dos inputs-->

                <label> 
                    Nome:
                    <input type="text" name="nome" />
                </label>

                <br><br>

                <label>
                    Telefone:
                    <input type="text" name="telefone">
                </label>

                <br><br>

                <label>
                    E-mail:
                    <input type="email" name="email">
                </label>

                <br><br>

                <label>
                    Descrição:
                    <input type="text" name="descricao">
                </label>

                <br><br>

                <label>
                    Data de Nascimento:
                    <input type="date" name="data_nascimento">
                </label>

                <label>

                <br><br>
    				Favorito:
    				<input type="radio" name="favorito" value="sim"> Sim
    				<input type="radio" name="favorito" value="nao"> Não
				</label>

                <br><br>
                <input type="submit" value="Cadastrar" />

            </fieldset>
        </form>
      
        <?php
        if (isset($_GET['nome'])) {
            $lista_contatos[] = array(
                "nome" => $_GET['nome'],
                "telefone" => $_GET['telefone'],
                "email" => $_GET['email'],
                "descricao" => $_GET['descricao'],
                "data_nascimento" => $_GET['data_nascimento'],
                "favorito" => $_GET['favorito']
            );
        }
        ?>

        <table>     
            <?php foreach ($lista_contatos as $contato) : 
            ?>
                <tr>
                    <td><?php echo $contato['nome']; ?> </td>
                    <td><?php echo $contato['telefone']; ?> </td>
                    <td><?php echo $contato['email']; ?> </td>
                    <td><?php echo $contato['descricao']; ?> </td>
                    <td><?php echo $contato['data_nascimento']; ?> </td>
                    <td><?php echo $contato['favorito']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php session_start(); ?>
        <?php
        if (isset($_GET['nome'])) {
            $_SESSION['lista_contatos'][] = array(
                "nome" => $_GET['nome'],
                "telefone" => $_GET['telefone'],
                "email" => $_GET['email'],
                "descricao" => $_GET['descricao'],
                "data_nascimento" => $_GET['data_nascimento']
            );
        }

        $lista_contatos = array();
        if (isset($_SESSION['lista_contatos'])) {
            $lista_contatos = $_SESSION['lista_contatos'];
        }
        ?>
        
    </body>
</html>

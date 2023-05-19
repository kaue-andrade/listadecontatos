<!DOCTYPE html>
<html lang="pt-br">

    <!--Algoritmo feito por: 
    Antonio Carlos Borges de Souza;
    Kauê Andrade dos Santos.
    -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gerenciador de Contatos</title>
    </head>
    <body>

        <!--Título-->
        <h1>Gerenciador de contatos</h1>

        <!--Criação do formulário -->

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
                    <textarea type="text" name="descricao" style="height: 20px"></textarea>
                </label>

                <br><br>

                <label>
                    Data de Nascimento:
                    <input type="date" name="data_nascimento">
                </label>

                <br><br>

                <label>
    				Favorito:
    				<input type="radio" name="favorito" value="Sim"> Sim
    				<input type="radio" name="favorito" value="Não"> Não
				</label>

                <br><br>
                <input type="submit" value="Cadastrar" />

            </fieldset>
        </form>
      
        <?php 

        //Algoritmo feito por: Antonio Carlos Borges de Souza e Kauê Andrade dos Santos.

        // Inicia sessão, verifica se o nome foi enviado e se ele não está vazio, cria um array do tipo contato que armazena dados e ele é armazenas ao final do array '$_SESSION['lista_contatos']'

        session_start();

        if (isset($_GET['nome']) && $_GET['nome'] != '') {
            $contato = array();
        
            $contato['nome'] = $_GET['nome'];
        
            if(isset($_GET['telefone'])){
                $contato['telefone'] = $_GET['telefone'];
            } else {
                $contato['telefone'] = '';
            }
        
            if(isset($_GET['email'])){
                $contato['email'] = $_GET['email'];
            } else {
                $contato['email'] = '';
            }
        
            if(isset($_GET['descricao'])){
                $contato['descricao'] = $_GET['descricao'];
            } else {
                $contato['descricao'] = '';
            }
        
            if(isset($_GET['data_nascimento'])){
                $contato['data_nascimento'] = $_GET['data_nascimento'];
            } else {
                $contato['data_nascimento'] = '';
            }
        
            if(isset($_GET['favorito'])){
                $contato['favorito'] = $_GET['favorito'];
            } else {
                $contato['favorito'] = '';
            }
        
            $_SESSION['lista_contatos'][] = $contato;
        }
        ?>

        <!--Cria tabela com seus respectivos estilos para o cabeçalho e mostra o cabeçalho-->

        <table> 
			
			<tr>
				<style>
                    
					th {
						text-align: left;
						border-bottom: 1px solid black;
						border-right: 2px solid black;
					}

					th: last-child {
						border-right: none;
					}
				</style>
				<th>Nome</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Descrição</th>
				<th>Data de nascimento</th>
				<th>Favorito</th>
			</tr>
			
			</tr>

            <?php 

            // Verifica se a variável existe e tem elementos, percorre por meio de um loop (foreach) e armazena cada elemento na variável. Em seguida, cada um dos elementos é exibido em uma célula da tabela HTML. Assim, cada um vai sendo exibido embaixo do outro
			
			if(isset($_SESSION['lista_contatos'])){
				foreach ($_SESSION['lista_contatos'] as $contato) : 
            ?>
                <tr>
                    <td><?php echo $contato['nome']; ?> </td>
                    <td><?php echo $contato['telefone']; ?> </td>
                    <td><?php echo $contato['email']; ?> </td>
                    <td><?php echo $contato['descricao']; ?> </td>
                    <td><?php echo $contato['data_nascimento']; ?> </td>
                    <td><?php echo $contato['favorito']; ?> </td>
                </tr>

            <?php //Fim do loop
            endforeach; }
            ?>
            <!--Fim da tabela-->
        </table>
        
    </body>
</html>

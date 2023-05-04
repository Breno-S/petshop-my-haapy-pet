<?php
    session_start();
    include_once('petshop.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo ("<script>
                alert('". $_SESSION['msg'] ."')
               </script>");
        unset($_SESSION['msg']);
    }
    ?>
    <form action="proc_cad_cliente.php" method="post" enctype="multipart/form-data">
        <label for="">Nome
            <input required type="text" name="nome" id="nome">
        </label><br><br>
        <label for="">CPF
            <input required type="number" name="cpf" id="cpf">
        </label><br><br>
        <label for="">RG
            <input required type="number" name="rg" id="rg">
        </label><br><br>
        <label for="">Data de Nascimento
            <input required type="date" name="data_nasc" id="data_nasc">
        </label><br><br>
        <label for="">Email
            <input required type="email" name="email" id="email">
        </label><br><br>
        <label for="">Celular
            <input required type="number" name="celular" id="celular">
        </label><br><br>
        <label for="">Senha
            <input required type="text" name="senha" id="senha">
        </label><br><br>
        <label for="">CEP
            <input required type="number" name="cep" id="cep" onblur="pesquisacep(this.value);" size="10" maxlength="9">
        </label><br><br>
        <label for="">Estado
            <input required type="text" name="estado" id="estado" size="2">
        </label><br><br>
        <label for="">Município
            <input required type="text" name="municipio" id="municipio">
        </label><br><br>
        <label for="">Bairro
            <input required type="text" name="bairro" id="bairro">
        </label><br><br>
        <label for="">Logradouro
            <input required type="text" name="logradouro" id="logradouro">
        </label><br><br>
        <label for="">Número
            <input required type="number" name="numero" id="numero">
        </label><br><br>
        <label for="">Foto
            <input type="file" name="image" id="image">
        </label><br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <script>
    
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('cep').value=("");
                document.getElementById('logradouro').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('municipio').value=("");
                document.getElementById('estado').value=("");
        }
    
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('logradouro').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('municipio').value=(conteudo.localidade);
                document.getElementById('estado').value=(conteudo.uf);

                // trava os campos
                document.getElementById('logradouro').setAttribute("readonly","");
                document.getElementById('bairro').setAttribute("readonly","");
                document.getElementById('municipio').setAttribute("readonly","");
                document.getElementById('estado').setAttribute("readonly","");
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {
    
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('logradouro').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('municipio').value="...";
                    document.getElementById('estado').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    
        </script>
</body>
</html>
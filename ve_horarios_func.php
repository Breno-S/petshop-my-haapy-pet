
<?php
    include_once('php/conexao.php');

	if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION['idFuncionario'])) {
		header('Location:login.php');
	}
	else{
		if($_SESSION['cargo'] != 'Veterinário' && $_SESSION['cargo'] != 'Tosador'){
			header('Location:login.php');
		}
	}
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Atendimentos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/joao.css">
<!--===============================================================================================-->

<!-- Biblioteca de Animações CSS | START -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Biblioteca de Animações CSS | END -->

<!-- Arquivos CSS | START -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/boot.css" />
<link rel="stylesheet" href="./css/style.css" />
<!-- Arquivos CSS | END -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.collapse/1.6.0/jquery.collapse.js"></script>


</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					Frete grátis para pedidos padrão acima de R$50
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="ajuda.html" class="flex-c-m trans-04 p-lr-25">
						Ajuda & FAQs
					</a>

					<a href="php/checa_login.php" class="flex-c-m trans-04 p-lr-25">
						Minha conta
					</a>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">
				
				<!-- Logo desktop -->		
				<a href="index.html" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li>
							<a href="index.html">Home</a>
						</li>

						<li class="active-menu">
							<a href="sobre.html">Sobre</a>
						</li>

						<li>
							<a href="comprar.html">Comprar</a>
						</li>

						<li>
							<a href="carrinho.html">Carrinho</a>
						</li>

						<li>
							<a href="agendamento.php">Agendamento</a>
						</li>


						<li>
							<a href="blog.html">Blog</a>
						</li>

						<li>
							<a href="contato.html">Contato</a>
						</li>
					</ul>
				</div>	

			</nav>
		</div>	
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->		
		<div class="logo-mobile">
			<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>

			<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
					Frete grátis para pedidos padrão acima de R$50
				</div>
			</li>

			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="ajuda.html" class="flex-c-m p-lr-10 trans-04">
						Ajuda & FAQs
					</a>

					<a href="php/checa_login.php" class="flex-c-m p-lr-10 trans-04">
						Minha Conta
					</a>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<li class="active-menu">
				<a href="index.html">Home</a>
			</li>

			<li>
				<a href="sobre.html">Sobre</a>
			</li>

			<li>
				<a href="comprar.html">Comprar</a>
			</li>

			<li>
				<a href="carrinho.html">Carrinho</a>
			</li>

			<li>
				<a href="agendamento.php">Agendamento</a>
			</li>


			<li>
				<a href="blog.html">Blog</a>
			</li>

			<li>
				<a href="contato.html">Contato</a>
			</li>
		</ul>
	</div>

</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Seu carrinho
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		
			
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Total: R$ 00.00
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="carrinho.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Carrinho
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-120" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Lista de Atendimentos
	</h2>
</section>	

 <!-- ======= Header ======= -->
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="order-last" class="img" style="background-image: url(images/bg_1.jpg);">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
			</button>
		</div>

		<div class="">
			<h1><a href="index.html" class="logo"><span>Conta</span></a></h1>
				<ul class="list-unstyled components mb-5">
					<?php
						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Tosador' || $_SESSION['cargo'] == 'Veterinário'){
							echo '<li class="active">
							<a href="horario.php"><span class="fa fa-clock-o mr-3"></span> Horários</a>
							</li>';
							echo '<li class="active">
							<a href="ve_horarios_func.php"><span class="fa fa-user mr-3"></span> Atendimentos</a>
							</li>';
						}
					?>
					<li>
						<a href="relatorio.php"><span class="fa fa-book mr-3"></span>Relatórios</a>
					</li>
					<li>
						<a href="pesquisa.php"><span class="fa fa-search mr-3"></span>Pesquisa</a>
					</li>
					<?php

						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Secretária' || $_SESSION['cargo'] == 'Administrador'){
							echo '<li class="active">
							<a href="cadastro_clientes.php"><span class="fa fa-user mr-3"></span> Cadastrar clientes</a>
							</li>';
							echo '<li class="active">
							<a href="cadastro_pets.php"><span class="fa fa-user mr-3"></span> Cadastrar pets</a>
							</li>';
						}
						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Administrador'){
							echo '<li class="active">
								<a href="cadastro_funcionario.php"><span class="fa fa-user mr-3"></span> Cadastrar funcionários</a>
								</li>';

						}

						?>

				</ul>

				<div class="mb-5 px-4">
					<a href="php/proc_logout.php" class="subscribe-form">
						<h3 class="h6 mb-3">Sair</h3>
					</a>
				</div>
		</div>

	</nav><br><br><br>

		
		<div class="wrapper d-flex justify-content-center" style="padding: 25px">
			
			
					<?php
					date_default_timezone_set('America/Sao_Paulo');

					$myvalue = date('Y-m-d H:i:s');
					$datetime = new DateTime($myvalue);
					$data = $datetime->format('Y-m-d');
					$hora = $datetime->format('H:i:s');

					$pega_hora_ant = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data <= '$data' AND horario < '$hora' AND id_funcionario = ".$_SESSION['idFuncionario']." ORDER BY data ASC;");
					$pega_hora_hoj = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data = '$data' AND horario >= '$hora' AND id_funcionario = ".$_SESSION['idFuncionario']." ORDER BY data ASC;");
					$pega_hora_dep = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data > '$data' AND id_funcionario = ".$_SESSION['idFuncionario']." ORDER BY data ASC;");

				echo("<div id='div' style='width: 515px !important; margin-left: 0% !important'><br>");

				echo "<h2 id= agend>Agendamentos Hoje:</h2><br>";
				echo "<table class='table-responsive'>
					<thead>
						<tr class='accordion'>
							<th>Data</th>
							<th>Horário</th>
							<th>Serviço</th>
							<th>Cliente</th>
							<th>Animal</th>
							<th class='toggle-arrow'>▼</th>
						</tr>
				  </thead>	
				";
				while ($row_hoje = mysqli_fetch_assoc($pega_hora_hoj)) {
					$data_hoje = date_create($row_hoje['data']);
					$data_hoje = date_format($data_hoje, 'd/m/Y');
					$agendado_hoj = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario = ".$row_hoje['idHorario']);
					$agendado_hoje = mysqli_fetch_assoc($agendado_hoj);
					if (isset($agendado_hoje)) {
						$pet_agend_hoj = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet = ".$agendado_hoje['id_animal']);
						$pet_agend_hoje = mysqli_fetch_assoc($pet_agend_hoj);
						$cliente_agend_hoj = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente = ".$agendado_hoje['id_cliente']);
						$cliente_agend_hoje = mysqli_fetch_assoc($cliente_agend_hoj);
						// echo ("<p>Cliente ".$cliente_agend_hoje['nome']." agendou ".$row_hoje['servico']." para ".$pet_agend_hoje['nome_pet']." às ".$row_hoje['horario']."</p>");
						echo('
						<tbody class="visible">
							<tr>
								<td>'. $data_hoje .'</td>
								<td>'. $row_hoje["horario"] .'</td>
								<td>'. $row_hoje["servico"] .'</td>
								<td>'. $cliente_agend_hoje["nome"] .'</td>
								<td>'. $pet_agend_hoje["nome_pet"] .'</td>
								<td></td>
							</tr>
						</tbody>
							');
					}
				};
				echo "</table>
				<br><br>";
				echo "<hr>";




				echo "<h2 id= agend>Agendamentos Futuros:</h2><br>";
				echo "<table class='table-responsive'>
					<thead>
						<tr class='accordion'>
							<th>Data</th>
							<th>Horário</th>
							<th>Serviço</th>
							<th>Cliente</th>
							<th>Animal</th>
							<th class='toggle-arrow'>▼</th>
						</tr>
				  	</thead>
				";
				while ($row_depois = mysqli_fetch_assoc($pega_hora_dep)) {
					$data_depois = date_create($row_depois['data']);
					$data_depois = date_format($data_depois, 'd/m/Y');
					$agendado_dep = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario = ".$row_depois['idHorario']);
					$agendado_depois = mysqli_fetch_assoc($agendado_dep);
					if (isset($agendado_depois)) {
						$pet_agend_dep = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet = ".$agendado_depois['id_animal']);
						$pet_agend_depois = mysqli_fetch_assoc($pet_agend_dep);
						$cliente_agend_dep = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente = ".$agendado_depois['id_cliente']);
						$cliente_agend_depois = mysqli_fetch_assoc($cliente_agend_dep);
						// echo "<p>Cliente ".$cliente_agend_depois['nome']." agendou ".$row_depois['servico']." para ".$pet_agend_depois['nome_pet']." em ".$data_depois." às ".$row_depois['horario']."</p>";
						echo('
						<tbody class="visible">
							<tr>
								<td>'. $data_depois .'</td>
								<td>'. $row_depois["horario"] .'</td>
								<td>'. $row_depois["servico"] .'</td>
								<td>'. $cliente_agend_depois["nome"] .'</td>
								<td>'. $pet_agend_depois["nome_pet"] .'</td>
								<td></td>
							</tr>
						</tbody>
							');
					}
				}
				echo "</table>
				<br><br>";
				echo "<hr>";




					echo "<h2 id= agend>Agendamentos Passados:</h2><br>";
					echo "<table class='table-responsive'>
						<thead>
							<tr class='accordion'>
								<th>Data</th>
								<th>Horário</th>
								<th>Serviço</th>
								<th>Cliente</th>
								<th>Animal</th>
								<th class='toggle-arrow'>▼</th>
							</tr>
						</thead>	
					";
					
					

					
					while ($row_antes = mysqli_fetch_assoc($pega_hora_ant)) {
						$data_antes = date_create($row_antes['data']);
						$data_antes = date_format($data_antes, 'd/m/Y');
						$agendado_ant = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario = ".$row_antes['idHorario']);
						$agendado_antes = mysqli_fetch_assoc($agendado_ant);
						if (isset($agendado_antes)) {
							$pet_agend_ant = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet = ".$agendado_antes['id_animal']);
							$pet_agend_antes = mysqli_fetch_assoc($pet_agend_ant);
							$cliente_agend_ant = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente = ".$agendado_antes['id_cliente']);
							$cliente_agend_antes = mysqli_fetch_assoc($cliente_agend_ant);
							// echo ("<p>Cliente ".$cliente_agend_antes['nome']." agendou ".$row_antes['servico']." para ".$pet_agend_antes['nome_pet']." em ".$data_antes." às ".$row_antes['horario']."</p>");
							echo('
							<tbody class="visible">
								<tr>
									<td>'. $data_antes .'</td>
									<td>'. $row_antes["horario"] .'</td>
									<td>'. $row_antes["servico"] .'</td>
									<td>'. $cliente_agend_antes["nome"] .'</td>
									<td>'. $pet_agend_antes["nome_pet"] .'</td>
									<td></td>
								</tr>
							</tbody>
								');
						}
					};
					echo "</table>
					<br><br>";

				echo("</div>");
				?>
				</div>
			</div>


<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Categorias
				</h4>

				<ul>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Cachorro
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Gato
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Pássaro
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Peixe
						</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Ajuda
				</h4>

				<ul>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Acompanhar Pedidos
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Comprar
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Carrinho
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Entrar em contato
				</h4>

				<p class="stext-107 cl7 size-201">
					Alguma Pergunta? Informe-nos na Av. Santo Amaro, 6829 - Santo Amaro, São Paulo, SP ou ligue para +55 11 9808 04532
				</p>

				<div class="p-t-27">
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-instagram"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Parceiro Myhappypet
				</h4>

				<form>
					<div class="wrap-input1 w-full p-b-4">
						<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
						<div class="focus-input1 trans-04"></div>
					</div>

					<div class="p-t-18">
						<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
							Increva-se
						</button>
					</div>
				</form>
			</div>
		</div>

		<div class="p-t-40">
			<div class="flex-c-m flex-w p-b-18">
				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
				</a>
			</div>

			<p class="stext-107 cl6 txt-center">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os Direitos Reservados | by Myhappypet</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</p>
		</div>
	</div>
</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>



<!-- Aqui é pra comprimir e aumentar -->
<script>


$(document).on('click', '.toggle-arrow', function() {
var table = $(this).closest('table');
var tbody = table.find('tbody');
tbody.toggleClass('hidden');
$(this).toggleClass('rotate');
});

    // seleciona todos os botões toggle-arrow
    const toggleButtons = document.querySelectorAll(".toggle-arrow");
    
    // para cada botão, adiciona um ouvinte de evento para cliques
    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            // seleciona o tbody correspondente usando o data-table personalizado
            const tableBody = this.parentElement.nextElementSibling;
            
            // alterna a classe .hidden no tbody para mostrar / ocultar
            if (tableBody.classList.contains("hidden")) {
                tableBody.classList.remove("hidden");
                tableBody.classList.add("visible");
            } else {
                tableBody.classList.remove("visible");
                tableBody.classList.add("hidden");
            }
        });
    });
</script>



<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.collapse/1.6.0/jquery.collapse.js"></script>
</head>


</body>
</html>
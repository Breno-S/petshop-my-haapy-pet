<?php
    include_once('php/conexao.php');

	if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION['idCliente'])) {
		header('Location:login.php');
	}

    $funcionarios = mysqli_query($conn, "SELECT * FROM funcionarios");
    // $pega_funcionarios = mysqli_fetch_assoc($funcionarios);
    $num_funcionarios = mysqli_query($conn, "SELECT COUNT(idFuncionario) AS qtFunc FROM funcionarios");
    $qt_funcionarios = mysqli_fetch_assoc($num_funcionarios);

	$info_cliente = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente = ". $_SESSION['idCliente']);
	$informacoes_cliente = mysqli_fetch_assoc($info_cliente);
	$info_cad_cliente = mysqli_query($conn, "SELECT * FROM cadastro_cliente WHERE id_cliente = ". $_SESSION['idCliente']);
	$informacoes_cadastro = mysqli_fetch_assoc($info_cad_cliente);

	$animais_cliente = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE id_cliente = ". $_SESSION['idCliente']);

	$qt_animais_total = 1;

    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    $data = $datetime->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agendamento</title>
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
	<link rel="stylesheet" type="text/css" href="css/joao.css">
<!--===============================================================================================-->
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
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Agendamento
		</h2>
	</section>	
	
	 <!-- ======= Header ======= -->
	 <header id="header" class="header d-flex align-items-center fixed-top">
  		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    		<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    		<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  		</div>
	</header>
<!-- End Header -->

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/banner_secundario.avif');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center"></div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->
  <br><br>
</main>
<body class="my-login-page"></body>
		<section class="h-90">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						
						<div class="card fat">
							<div class="card-body" >
								<form method="POST" action="agendamento-pt2.php" class="my-login-validation">
									<input name="idCliente" id="idCliente" type="text" hidden readonly value="<?php echo($_SESSION['idCliente']); ?>">
                                    <div class="form-header">
                                        <h1 id="cor_agenda1" >Agende seu Pet</h1><br>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="nomeCompleto" id="cor_agenda">Nome:</label>
                                                <input id="nomeCompleto" type="text" class="form-control" name="nomeCompleto" value="<?php echo($informacoes_cliente['nome'] .' '. $informacoes_cliente['sobrenome']) ?>" required readonly autofocus>
                                                <div class="invalid-feedback">
                                                    Por favor, preencha seu nome.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="celular" id="cor_agenda">Celular:</label>
                                                <input id="celular" type="tel" class="form-control" name="celular" placeholder="(00) 00000-0000" value="<?php echo($informacoes_cadastro['celular']); ?>" readonly required>
                                                <div class="invalid-feedback">
                                                    Por favor, preencha seu celular corretamente.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" id="cor_agenda">E-mail:</label>
                                                <input id="email" type="email" class="form-control" name="email" value="<?php echo($informacoes_cadastro['email']); ?>" readonly required>
                                                <div class="invalid-feedback">
                                                    Por favor, preencha seu e-mail corretamente.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
											<label for="funcionarios" id="cor_agenda">Funcionário:</label>
													<select id="funcionarios" name="funcionarios" oninput="libera_servico(this.value)" onload="libera_servico(this.value)">
														<option value=''>Escolha o profissional</option>
														<?php 
														while ($row_funcionario = mysqli_fetch_assoc($funcionarios)) {
															$funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE idFuncionario = ". $row_funcionario['idFuncionario'] ." AND (cargo = 'veterinario' OR cargo = 'tosador')");
															$pega_funcionario = mysqli_fetch_assoc($funcionario);
															if (isset($pega_funcionario['nome_funcionario'])) {
																echo("<option value='". $pega_funcionario['cargo'] ." ". $pega_funcionario['idFuncionario'] ."'>". $pega_funcionario['nome_funcionario'] ." - ". $pega_funcionario['cargo'] ."</option>");
															}
														}
														  ?>
													</select>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="servico" id="cor_agenda">Serviço:</label>
                                                <select id="servico" name="servico"  required disabled>
													<option value="" id="cor_agenda">Selecione o serviço</option>
                                                </select>
												
												
                                            </div>
											
                                        </div>
										<!-- Checkbox feito para verificar se o cliente quer que busque e entregue novamente o animal -->
										<div class="form-row">
										<div class="form-group row " id="teste">
											
											<p>ㅤ</p><input type="checkbox" value="busca" id="checkbox" name="busca_animal">
											<label for="checkbox" id="cor">Busca e entrega do animal</label>
										</div>
									</div>
									<h6 class="form-row text-justify text-left" id="formato_texto">Caso queira que seja feita a busca e entrega do animal em sua residência</h6>
										<div class="form-row pet-form">
											<div class="form-group col-md-12">
												<label class="cor-agenda">Escolha o(s) seu(s) pet(s):</label>
												<div class="row" id="row-animais">
												<?php
												while ($row_animal = mysqli_fetch_assoc($animais_cliente)) {
													$img_pet = mysqli_query($conn, "SELECT * FROM imagem_pet WHERE id_pet = ". $row_animal['idPet']);
													$pega_img_pet = mysqli_fetch_assoc($img_pet);
													if (($qt_animais_total % 2) != 0) {
													echo('
													<div class="d-flex align-items-center">
														<label class="btn btn-outline-secondary pet-option mr-3">
														<input type="checkbox" name="animal' . $qt_animais_total . '"value="'. $row_animal['idPet'] .'" autocomplete="off" class="opcao1">
														<img src="'. ($pega_img_pet['dir_img_pet'] ?? 'images/imgPet/placeholder_pet.png') .'" alt="'. $row_animal['nome_pet'] .'" class="pet-img" style="vertical-align: middle; display: inline-block;">
														<span class="pet-name">'. $row_animal['nome_pet'] .'</span>
														</label>
													</div>');
													} else {
													echo('
													<label class="btn btn-outline-secondary pet-option mr-3">
														<input type="checkbox" name="animal' . $qt_animais_total . '"value="'. $row_animal['idPet'] .'" autocomplete="off" class="opcao2">
														<img src="'. ($pega_img_pet['dir_img_pet'] ?? 'images/imgPet/placeholder_pet.png') .'" alt="'. $row_animal['nome_pet'] .'" class="pet-img flex-fill" style="display: inline-block;">
														<span class="pet-name">'. $row_animal['nome_pet'] .'</span>
													</label>');
													}
													$qt_animais_total++;
												}
												if (($qt_animais_total % 2) != 0) {
													echo('
													</div>
												</div>');
												}
												?>
												</div>
											</div>
										</div>


										  
										  
										<div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block"id="botão">
                                                    Continuar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            Não cadastrou um pet? <a href="cadastropet.php">Cadastre agora</a>
                                        </div>
                                    </div>
                                </form>
                                
							</div>
						</div>
					</div>
				</div>
			</div><br><br>
	
		</section>
	
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
								Inscreva-se
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
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/cep.js"></script>

<!--===============================================================================================-->

<script>
		function libera_servico(funcionario) {
			let cargo = funcionario.split(" ", 2)
			if (cargo[0] != '') {
				document.getElementById("servico").removeAttribute("disabled")
				if (cargo[0] == "Veterinário") {
					document.getElementById("servico").innerHTML= 
					`
					<option value=''>Escolha o serviço</option>
					<option value="Consulta">Consulta</option>
					<option value="Cirurgia">Cirurgia</option>
					<option value="Especialidade">Especialidade</option>
					`
				}
				else if (cargo[0] == "Tosador") {
					document.getElementById("servico").innerHTML= 
					`
					<option value=''>Escolha o serviço</option>
					<option value="Banho">Banho</option>
					<option value="Tosa">Tosa</option>
					<option value="Hotel">Hotel</option>
					`
				}
			}
		}
		
	</script>

</body>
</html>

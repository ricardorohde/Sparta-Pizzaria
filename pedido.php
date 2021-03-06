<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php

require 'classes/Pizza.php';
require 'classes/PizzaDAO.php';
require 'classes/Bebida.php';
require 'classes/BebidaDAO.php';

$pizzaDAO = new PizzaDAO();
$pizzas = $pizzaDAO->listar();

$bebidaDAO = new BebidaDAO();
$bebidas = $bebidaDAO->listar();


?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>


	<div class="pedido">
		<div class="medidas">
			<div class="">
				<div class="container ">
					<h4 align="center"><b>FAÇA SEU PEDIDO</b></h4>
				</div>
			</div>
		</div>
		<div class="pizza-tamanho">
			<div class="parte1">
				
			</div>
			<div class="parte2">
				<div class="parte2-topo">
					<div class="metade-texto">
						<select class="select-css" onchange="(alteraMetade(this.value), alteraDescricao(this.value), alteraPreco(this.value));">

							    <option>Escolha sua primeira metade</option>
							    <?php foreach($pizzas as $pizza){ ?>
							    <option value="<?= $pizza->getId() ?>"><?= $pizza->getSabor() ?></option>
							    <?php } ?>    
							</select>
					</div>
					<div class="metade-texto">
						<select class="select-css select-css4 " onchange="(alteraMetade2(this.value), alteraDescricao2(this.value), alteraPreco(this.value));">
							    <option>Escolha sua segunda metade</option>
							    <?php foreach($pizzas as $pizza){ ?>
							    <option value="<?= $pizza->getId() ?>"><?= $pizza->getSabor() ?></option>
							    <?php } ?>
							</select>
					</div>
				</div>
				<div class="parte2-meio">
					<div class="pizza-metade">

						<div class="sabor">
							<div class="molde">
								<h2>Descrição:</h2>
								<span id="descricao1"><h5 class="pizzatexto">Os melhores sabores de pizza você encontra aqui!</h5></span>
							</div>
							<div class="molde-classe"  id="sabor1">
							<img src="assets\img\pizzas\capa.png" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);right: -107%;position: relative;">
							</div>
						</div>
					</div>
					<div class="pizza-metade">
						<div class="sabor2">
						<div class="molde2">
							<h2>Descrição:</h2>
							<span id="descricao2"><h5 class="pizzatexto">Faça sua escolha.</h5></span>
						</div>
						<div class="molde-classe2" id="sabor2" >
							<img src="assets\img\pizzas\capa.png" style="clip-path: polygon(50% 0, 100% 0, 100% 100%, 50% 100%);left: -107%;position: relative;">
						</div>
						</div>
					</div>
				</div
				</div>
				<div class="preco-pizza">
				<div class="total-conta2" id="preco">
					<h4 align="center"><b>R$ 00,00</b></h4>
				</div>
				 </div>

			</div>
			<div class="parte3">
				
			</div>
		</div>
		<div class="bebida">
			<div class="container bebidas">
				<div class="total">
					<div class=" container">
						<h4 align="center"><b>BEBIDAS</b></h4>
					</div>
				</div>
				<div class=" promocao8">
					<div class="terceiro">
						<div include="div-select">
							<select class="select-css2" onchange="alterabebidaPreco(this.value)"  >
							    <option>Escolha sua bebida</option>
							    <?php foreach($bebidas as $bebida){ ?>
							    <option value="<?= $bebida->getId() ?>"><?= $bebida->getNome() ?></option>
							    <?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="promocao9">
					<div class="compra">
						<button type="button" class="btn btn-success comprar"><i class="fas fa-shopping-cart"></i></button>
					</div>
					<div class="preco3" id="bebidaPreco">
						<h4 align="center"><b>R$ 00,00</b></h4>
					</div>
				</div>
				<div class="rolagem"> 
				    <table class="tabela rolagem2">
				        <thead>
				            <tr>
				                <th class="tabela5"></th>
				                <th class="tabela6"></th>
				                <th class="tabela7"></th>
				                <th class="tabela8"></th>
				            </tr>
				        </thead>
				        <tbody>
				        	<tr>
				                <td></td>
				                <td></td>
				                <td></td>	
				                <td>
				                </td>
				            </tr>
				        </tbody>
				    </table>
				</div>

			</div>
		</div>
		<div class="total7">
			<div class="container total-pagar">
				<h1>TOTAL</h1>
			</div>
			<div class="preco-conta">
				<div class="total-conta container">
					<h4 align="center"><b>R$ 99,99</b></h4>
				</div>
			</div>
			<div class="preco-conta2">
				
					<div class="compra-conta container">
						<a href="carrinho.php">
						<button type="button" class="btn btn-success comprar-conta"><p>CARRINHO<p></i></button>
						</a>
					</div>
			</div>

		</div>
	</div>	




<?php include './layout/footer.php'; ?>

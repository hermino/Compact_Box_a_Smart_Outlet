<?php include ('includes/headerAdmin.php');?>

<section>
	<div class="container pg-cadastro">
		<div  class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<div class="card formulario-cadastro">
					<h5 class="card-header">Cadastro</h5>
					<div class="card-body">

						<form method="get" action="" > <!--Colocar a URL do arquivo-->

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text " id="basic-addon1"><i class="fas fa-user"></i></span>
								</div>
								<input required="required" title="Informe seu nome Completo" type="text" name="nome" class="form-control" placeholder="Seu nome" aria-label="Username" aria-describedby="basic-addon1">
							</div>

							<!-- senha do usuario -->
							<div class="input-group mb-3">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input required="required" title="Informe sua senha" type="password" name="senha" class="form-control" placeholder="Sua senha" aria-label="Username" aria-describedby="basic-addon1">
							</div>

							<!-- confirmar senha -->
							<div class="input-group mb-3">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input required="" title="Confirme a sua senha" type="password" name="confSenha" class="form-control" placeholder="Confirmar senha" aria-label="Username" aria-describedby="basic-addon1">
							</div>

							<!-- CPF do usuario -->
							<div class="input-group mb-3">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon1"><i class="fas fa-address-card"></i></span>
								</div>
								<input required="" title="Informe seu CPF" type="text" name="cpf" class="form-control" placeholder="seu CPF" aria-label="Username" aria-describedby="basic-addon1">
							</div>

							<!-- Email do usuario -->
							<div class="input-group mb-3">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon1"><i class="fas fa-at"></i></span>
								</div>
								<input required="" title="Informe seu E-mail" type="email" name="email" class="form-control" placeholder="seu E-mail" aria-label="Username" aria-describedby="basic-addon1">
							</div>

							<!-- botoes de limpar e cadastrar -->
							<div>
								<input type="submit" title="Clique para cadastrar" value="Cadastrar" class="btn btn-success btn-entrar btn-entrar">
								<input type="reset"  title="Clique para limpar os campos" value="Limpar" class="btn btn-success btn-entrar btn-limpar">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>


<?php include ('includes/footer.php');?>

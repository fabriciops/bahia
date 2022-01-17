$("#next").click(function () {

	var name = $("#person").val();
	var phone = $("#telefone").val();
	var email = $("#addressMail").val();
	var tipo_uso = $("#tipo_uso").val();
	var tipo_veiculo = $("#tipo_veiculo").val();
	var categoria = $("#categoria").val();
	var veiculoJson = JSON.stringify(veiculo);
	var enderecoJson = JSON.stringify(endereco);
	var button = document.querySelectorAll("#next *");

	button[0].style.display = "none"; 
	button[1].style.display = "inherit";

	//PESCAGEM MARKETING
	if (name, phone, email) {

		
		$.ajax({
			type: "POST",
			url: "php/services/email/emailMarketing.php",
			data: "name=" + name + "&email=" + email +"&phone=" + phone,

			success: function () {
				console.log("email marketing");
			}
			
		});

		
	}

	

	if (name === "" || phone === "" || email === "" || tipo_uso === "" || veiculoJson === "" || enderecoJson === "" || tipo_veiculo === "") {
		swal("Ops!", "Você deixou de preencher algum campo", "error");
		button[0].style.display = "inherit"; 
		button[1].style.display = "none";
		return;
	}

	$.ajax({
		type: "POST",
		url: "php/services/apiModal.php",
		data: "name=" + name + "&phone=" + phone + "&tipo_veiculo=" + tipo_veiculo + "&email=" + email + "&tipo_uso=" + tipo_uso + "&veiculo=" + veiculoJson + "&endereco=" + enderecoJson + "&categoria=" + categoria,

		success: function (data) {

			console.log(data);

			if (data) {
				window.location.replace("resultCalculatorCotation.php");

			}
			else {
				alert("error");
			}



		},

		error: function () {
			swal("Ops!", "", "error");
		}

	});
	button[0].style.display = "inherit"; 
	button[1].style.display = "none"; 
});

var chosenVehicle,
	chosenBrand,
	chosenModel,
	chosenYear,
	chosenFuel;

let veiculo = [];
let endereco = [];

//$("#placa").mask('AAA-9999');//, {	 	//reverse: false	 });
// $("#cep").mask("99999-999");
// var base_url = '';
// $('#enviar').on('click', function () {
// 	$('.lb-load').fadeIn();
// 	var data = $("form").serialize();
// 	$.ajax({
// 		url: base_url + "valida/validarPasso2",
// 		type: 'POST',
// 		data: data,
// 		dataType: 'json',
// 		complete: function (data) {
// 			if ($.trim(data.responseText) == 'true') {
// 				$('form').submit();
// 			} else {
// 				$('.msg').html(data.responseText);
// 				$('.lb-load').fadeOut();
// 			}
// 		}
// 	});
// });
$("#cep").blur(function () {
	$('.lb-load').fadeIn();
	//Nova variável "cep" somente com dígitos.
	var cep = $(this).val().replace(/\D/g, '');
	//Verifica se campo cep possui valor informado.
	if (cep !== "") {
		//Expressão regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;
		//Valida o formato do CEP.
		if (validacep.test(cep)) {
			//Consulta o webservice viacep.com.br/

			$.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
				if (!("erro" in dados)) {
					//Atualiza os campos com os valores da consulta.
					$("#rua").val(dados.logradouro);
					$("#bairro").val(dados.bairro);
					$("#cidade").val(dados.localidade);
					$("#uf").val(dados.uf);
					$("#ibge").val(dados.ibge);
					$('.alert').css('opacity', '0');

					endereco = dados;
					// $('.msg-validate').addClass('ok');
					// $('.msg-validate').html('CEP VALIDO');
					// $('.msg-validate').fadeIn();
					$('.lb-load').fadeOut();
				} //end if.
				else {
					//CEP pesquisado não foi encontrado.
					// limpa_formulário_cep();
					$('.alert').css('opacity', '1');
					$('.alert').html('CEP NÃO ENCONTRADO');
					$('.lb-load').fadeOut();
				}
			});
		} //end if.
		else {
			//cep é inválido.
			// limpa_formulário_cep();
			$('.alert').css('opacity', '1');
			$('.alert').html('CEP INVALIDO');
		}
	} //end if.
	$('.lb-load').fadeOut();

});

function getMarcas(tipo) {
	$("#sel_marca").html("");
	$("#sel_modelo").html("");
	$("#sel_ano_modelo").html("");
	$("#sel_marca").prop( "disabled", true );
	$("#sel_modelo").prop( "disabled", true );
	$("#sel_ano_modelo").prop( "disabled", true );
	$("#sel_marca").hide();
	$("#sel_marca+div").show();
	$('.lb-load').fadeIn();
	var tipo_veiculo = tipo;

	switch (tipo_veiculo) {
		case "1": {
			chosenVehicle = 1;
			break;
		}

		case "2": {
			chosenVehicle = 2;
			break;
		}

		case "3": {
			chosenVehicle = 3;
			break;
		}

		case "": return; // if the tipo_veiculo is empty, should not fetch brands
		default: break;
	}
	var url = "/php/services/fipe2/marcas.php?tipo=" + chosenVehicle;

	$.getJSON(url, function (marcas) {
		var dados = '<option value="">Selecione uma Marca</option>';

		for (var i = 0; i < marcas.length; i++) {
			dados += `<option value=${marcas[i].Value}> ${marcas[i].Label} </option>`;
		}

		window.setTimeout(function () {
			console.log("settime");
		}, 1000);
		$("#sel_modelo").html("");
		$("#sel_modelo").prop( "disabled", true );
		$("#sel_ano_modelo").html("");
		$("#sel_ano_modelo").prop( "disabled", true );
		$("#sel_marca").html(dados);
		$("#sel_marca").prop( "disabled", false );
		$("#sel_marca").show();
		$("#sel_marca+div").hide();
	});
	$('.lb-load').fadeOut();
}

function getModelos(marca) {
	$("#sel_modelo").html("");
	$("#sel_ano_modelo").html("");
	$("#sel_modelo").prop( "disabled", true );
	$("#sel_ano_modelo").prop( "disabled", true );
	$("#sel_modelo").hide();
	$("#sel_modelo+div").show();

	$('.lb-load').fadeIn();

	chosenBrand = marca;

	var url = `/php/services/fipe2/modelos.php?tipo=${chosenVehicle}&marca=${chosenBrand}`;

	$.getJSON(url, function (data) {
		var modelos = data.Modelos;
		var dados = '<option value="">Selecione um Modelo</option>';

		for (var i = 0; i < modelos.length; i++) {
			dados += `<option value=${modelos[i].Value}> ${modelos[i].Label} </option>`;
		}


		window.setTimeout(function () {
			console.log("settime");
		}, 1000);
		$("#sel_ano_modelo").html("");
		$("#sel_ano_modelo").prop( "disabled", true );
		$('#sel_modelo').html(dados);
		$("#sel_modelo").prop( "disabled", false );
		$("#sel_modelo").show();
		$("#sel_modelo+div").hide();
	});
	$('.lb-load').fadeOut();
}

function getAnoModelo(modelo) {
	$("#sel_ano_modelo").html("");
	$("#sel_ano_modelo").prop( "disabled", true );
	$("#sel_ano_modelo").hide();
	$("#sel_ano_modelo+div").show();

	$('.lb-load').fadeIn();

	chosenModel = modelo

	var url = `/php/services/fipe2/anomodelos.php?tipo=${chosenVehicle}&marca=${chosenBrand}&modelo=${chosenModel}`;

	$.getJSON(url, function (ano) {
		var dados = '<option value="">Selecione um Ano</option>';

		for (var i = 0; i < ano.length; i++) {
			dados += `<option value=${ano[i].Value}> ${ano[i].Label} </option>`;
		}

		window.setTimeout(function () {
			console.log("settime");
		}, 1000);

		$('#sel_ano_modelo').html(dados);
		$("#sel_ano_modelo").prop( "disabled", false );
		$("#sel_ano_modelo").show();
		$("#sel_ano_modelo+div").hide();
	});
	$('.lb-load').fadeOut();
}

function getDados(anocombustivel) {
	$('.lb-load').fadeIn();

	chosenYear = anocombustivel.split("-")[0];
	chosenFuel = anocombustivel.split("-")[1];

	var url = `/php/services/fipe2/valor.php?tipo=${chosenVehicle}&marca=${chosenBrand}&modelo=${chosenModel}&ano=${chosenYear}&combustível=${chosenFuel}`;

	$.getJSON(url, function (data) {
		// Desestruturar data para pegar os valores que preciso
		var {
			AnoModelo,
			CodigoFipe,
			Combustivel,
			Marca,
			MesReferencia,
			Modelo,
			SiglaCombustivel,
			TipoVeiculo,
			Valor
		} = data;

		veiculo = data;

		// console.log(data);

		/**
		* Enviar os dados para os respectivos elementos (TODO: PREENCHER OS DADOS)
		* Exemplo: 
		* 
		* $('#codigo_fipe').val(CodigoFipe);
		* $('#marca').val(Marca)
	* $('#modelo').val(Modelo)
		*/

		// $('#codigo_fipe').val(VALOR AQUI);
		// $('#valor_fipe').val(VALOR AQUI)
		// $('#valor_veiculo').val(VALOR AQUI)
		// $('#marca').val(VALOR AQUI)
		// $('#modelo').val(VALOR AQUI)
		// $('#ano_mod').val(VALOR AQUI)
		// $('#id_categoria').val(VALOR AQUI)
		// $('#aceitacao').val(VALOR AQUI)
		// $('#percentual_cobertura').val(VALOR AQUI)
		// $('#categoria').val(VALOR AQUI)
		// $('#franquia_percentual').val(VALOR AQUI)
		// $('#franquia_minimo').val(VALOR AQUI)
	});
}

//www.amplabrasil.com/site/ajaxFipe.php?funcao=modelo&marca=Citroen&tipo=auto
function getModelos1(marca) {
	//Limpa os campos,caso o usuario estaja fazendo uma segunda consulta
	$("#modelo").val("");
	$("#ano_modelo").val("");
	var tipoCotacao = $('#tipoCotacao').val();
	$('#msg-marca').css('display', 'none');
	$('#msg-modelo').css('display', 'none');
	$('#msg-anoModelo').css('display', 'none');
	$('#msg-marca').fadeOut();
	$('.lb-load').fadeIn();
	$.post(base_url + "cotacao/getModelos", {
		marca: marca,
		tipoCotacao: tipoCotacao
	}, function (data) {
		if (data == false) {
			$('#msg-marca').fadeIn();
			$('#msg-marca').html("Infelizmente não temos planos de proteção para este veículo.");
			$('#msg-marca').css('display', 'block');
		} else {
			$('#modelo').html(data);
		}
		$('.lb-load').fadeOut();
	});
}

function getAnoModelos(modelo) {
	var tipoCotacao = $('#tipoCotacao').val();
	var marca = $('#marca').val();
	$('#msg-modelo').css('display', 'none');
	$('#msg-modelo').fadeOut();
	$('.lb-load').fadeIn();
	$.post(base_url + "cotacao/getAnoModelos", {
		marca: marca,
		tipoCotacao: tipoCotacao,
		modelo: modelo
	}, function (data) {
		if (data == false) {
			$('#msg-modelo').fadeIn();
			$('#msg-modelo').html("Infelizmente não temos planos de proteção para este veículo.");
			$('#msg-modelo').css('display', 'block');
		} else {
			$('#ano_modelo').html(data);
		}
		$('.lb-load').fadeOut();
	});
}

function getDados1(ano_modelo) {
	var tipoCotacao = $('#tipoCotacao').val();
	var marca = $('#marca').val();
	var modelo = $('#modelo').val();
	$('#msg-anoModelo').css('display', 'none');
	$('#msg-anoModelo').fadeOut();
	$('.lb-load').fadeIn();
	$.post(base_url + "cotacao/getDados", {
		marca: marca,
		tipoCotacao: tipoCotacao,
		modelo: modelo,
		anoModelo: ano_modelo
	}, function (data) {
		if (data == false) {
			$('#msg-anoModelo').fadeIn();
			$('#msg-anoModelo').html("Infelizmente não temos planos de proteção para este veículo. ");
			$('#msg-anoModelo').css('display', 'block');
		} else {
			$('#dados').html(data);
		}
		$('.lb-load').fadeOut();
	});
}
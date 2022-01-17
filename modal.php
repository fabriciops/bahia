<!-- Modal site -->
<form id="formModal" method="POST">

  <!-- Dados Pessoais -->
  <div id="modalDados">
  <div class="modal fade" id="site" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Olá, gostariamos de te conhecer melhor ;)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>

      <div class="modal-body">

			  <div class="input">
                  <label for="telefone">Nome</label>
                  <input type="text" name="person" id="person" placeholder="Nome"  class="form-control">
              </div><br />

              <div class="input">
                  <label for="addressMail">E-mail</label>
                  <input type="email" name="addressMail" id="addressMail" placeholder="nome@gmail.com"  class="form-control" required>
			  </div><br />
			  
			  <div class="input">
                  <label for="telefone">Se precisar entrar em contato, qual o seu telefone?</label>
                  <input type="text" name="telefone" id="telefone" placeholder="Whatsapp"  class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" required>
			  </div><br />

              <div class="input">
                      <label for="possui_carro">Seu veículo é do tipo </label>
                      <select class="custom-select" id="tipo" name="tipo" onchange="getMarcas($(this).val());" >
                          <option></option>
                          <option value="1">Carro</option>
                          <option value="2">Moto </option>
                          <option value="3">Caminhao </option>
                    </select>
              </div><br />

              <div class="input">
                      <label for="marca">Qual é a marca?</label>
                      <select disabled class="custom-select" id="sel_marca" name="sel_marca" onchange="getModelos($(this).val());"></select>
                      <div style="display: none" class="loader loader2"></div>
                      <input type="hidden" name="marca" id="marca" value="" />
                      <span id="msg-marca" class="msg-error alert alert-danger" role="alert" style="display:none"></span>
                  </div><br />
          
                  <div class="input">
                      <label for="modelo">Modelo?</label>
                      <select disabled class="custom-select" id="sel_modelo" name="sel_modelo" onchange="getAnoModelo($(this).val());"></select>
                      <div style="display: none" class="loader loader2"></div>
                      <span id="msg-modelo" class="msg-error alert alert-danger" role="alert" style="display:none"></span>
                  </div><br />
          
                  <div class="input">
                      <label for="ano_modelo">Ano Modelo do veiculo?</label>
                      <select disabled class="custom-select" id="sel_ano_modelo" name="sel_ano_modelo" onchange="getDados($(this).val());"> </select>
                      <div style="display: none" class="loader loader2"></div>
                      <span id="msg-anoModelo" class="msg-error alert alert-danger" role="alert" style="display:none"></span>
                  </div><br />
          
                  <!--<div class="input">
              <label for="versao">Versão?</label>
              <input type="text" id="versao" name="versao" />
          </div>-->
                  <div class="input">
                      <label for="tipo_uso">Você utiliza o veículo com finalidade </label>
                      <select id="tipo_uso" name="tipo_uso" class="custom-select" id="validationCustom04">
                          <option></option>
                          <option value="particular">Passeio</option>
                          <option value="aluguel">Taxi / Aplicativo / Auto Escola / Trabalho</option>
                        </select>
                  </div><br />

                  <div class="input">
                      <label for="categoria">Categoria do veículo </label>
                      <p>Caso não se enquadre nessa categoria, pode deixar em branco.</p>
                      <select id="categoria" name="categoria" class="custom-select" id="validationCustom04">
                          <option></option>
                          <option value="especial">Diesel / Vans / Sprinter / SUV</option>
                          <option value="g">Gasolina / Gás</option>
                          
                        </select>
                  </div><br />

                  <div class="input">
                      <label for="tipo_veiculo">Tipo de veículo </label>
                      <select id="tipo_veiculo" name="tipo_veiculo" class="custom-select" id="validationCustom04">
                          <option></option>
                          <option value="nacional">Nacional</option>
                          <option value="importado">Importado</option>
                        </select>
                  </div><br />

                  <!-- <div class="input">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Whatsapp"  class="form-control" required>
                  </div> -->
                  <hr>
                  <div class="input">
                      <label for="cep">Qual o seu CEP? </label>
                      <input type="tel" id="cep" class="cep" name="cep" class="form-control" value="" onkeypress="$(this).mask('00000-000')" required />
                      <div id="#cepError" class="alert alert-danger" role="alert" style="opacity:0"></div>
                  </div><br />
          
                  <input name="rua" type="hidden" id="rua" size="60">
                  <input name="bairro" type="hidden" id="bairro" size="40">
                  <input name="cidade" type="hidden" id="cidade" size="40">
                  <input name="uf" type="hidden" id="uf" size="2">
                  <input name="ibge" type="hidden" id="ibge" size="8">
          
                  <input type="hidden" name="codigo_fipe" id="codigo_fipe" value="" />
                  <input type="hidden" name="marca" id="marca" value="" size="">
                  <input type="hidden" name="modelo" id="modelo" value="" size="">
                  <input type="hidden" name="ano_mod" id="ano_mod" value="" size="">
                  <input type="hidden" name="coletadados" id="coletadados" value="">
                  <input type="hidden" name="id_categoria" id="id_categoria" value="">
                  <input type="hidden" name="categoria" id="categoria" value="">
                  <input type="hidden" name="aceitacao" id="aceitacao" value="">
                  <input type="hidden" name="percentual_cobertura" id="percentual_cobertura" value="">
                  <input type="hidden" name="franquia_minimo" id="franquia_minimo" value="">
                  <input type="hidden" name="franquia_percentual" id="franquia_percentual" value="">
                  <input type="hidden" name="valor_fipe" id="valor_fipe" value="">
                  <input type="hidden" name="nome" value="">
                  <input type="hidden" name="telefone" value="">
                  <input type="hidden" name="email" value="">
                  <input type="hidden" name="cotacao_tipo_id" Value="1">						
                  <div id="dados"></div>
      </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            
            <button type="button" class="btn btn-primary" id="next">
            <div>Próximo</div>
            <div style="display: none" class="loader"></div>
            </button>
        </div>

    </div>
    </div>
    </div>
    </div>
</div>

    <!-- Dados do Carro -->
  </form> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="lib/jquery/jquery.min.js"></script>
<script src="js/modal.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


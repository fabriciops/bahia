<section id="contact" id="contact">
  <div class="container-fluid">

    <div class="section-header">
      <h3>Entrar em contato</h3>
    </div>

    <div class="row wow fadeInUp">

      <div class="col-lg-6">
        <div class="map mb-4 mb-lg-0">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.74322014163!2d-38.472010184637924!3d-12.988268663664657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161b38cf66d029%3A0x2fb3c6c9dd54b62!2sAv.%20Ant%C3%B4nio%20Carlos%20Magalh%C3%A3es%2C%202953%20-%20Itaigara%2C%20Salvador%20-%20BA%2C%2040279-290!5e0!3m2!1spt-BR!2sbr!4v1611352738058!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>

        </div>
      </div>

      <div class="col-lg-6">
        <div class="row">
          <div class="col-md-5 info">
            <i class="ion-ios-location-outline"></i>
            <p>Endereço</p>
          </div>
          <div class="col-md-4 info">
            <i class="ion-ios-email-outline"></i>
            <p>info@example.com</p>
          </div>
          <div class="col-md-3 info">
            <i class="ion-ios-telephone-outline"></i>
            <a href="https://api.whatsapp.com/send?l=pt&amp;phone=550719855110" target="_blank">+55 071 9855110 </a>
          </div>
        </div>

        <div class="form">

          <div id="sendmessage">Sua mensagem foi enviada. Muito Obrigado!</div>
          <div id="errormessage"></div>

          <form id="contactForm">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Seu nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-lg-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Título" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center">
              <button type="button" class="btn btn-primary" id="enviar">Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section>

<script>
  $("#enviar").click(function() {

    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var message = $("#message").val();

    //PESCAGEM MARKETING
    if (name, phone, email, message) {


      $.ajax({
        type: "POST",
        url: "php/services/email/emailMarketing.php",
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&message=" + message,

        success: function() {
          swal('Parabéns', "Estamos muito felizes em poder contribuir, em breve entraremos em contato", 'success');
          sleep(3);
          window.location.href = "https://www.tottalbahiabr.com.br/";


        },

        error: function() {
          swal("Ops!", "VocêG deixou de preencher algum campo", "error");
        }

      });


    } else {


      swal("Ops!", "Você deixou de preencher algum campo", "error");

    }

    function sleep(milliseconds) {
      var start = new Date().getTime();
      for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
          break;
        }
      }
    }


  });
</script>
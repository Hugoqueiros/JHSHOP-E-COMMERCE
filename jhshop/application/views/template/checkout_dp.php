<style>


    .quantity {
        float: left;
        margin-right: 15px;
        background-color: #eee;
        position: relative;
        width: 80px;
        overflow: hidden
    }

    .quantity input {
        margin: 0;
        text-align: center;
        width: 15px;
        height: 15px;
        padding: 0;
        float: right;
        color: #000;
        font-size: 20px;
        border: 0;
        outline: 0;
        background-color: #F6F6F6
    }

    .quantity input.qty {
        position: relative;
        border: 0;
        width: 100%;
        height: 40px;
        padding: 10px;
        text-align: center;
        font-weight: 400;
        font-size: 15px;
        border-radius: 0;
        background-clip: padding-box
    }
    .shopping-cart {
        margin-top: 20px;
    }

    .adress-details {
        margin-top: 20px;
    }
    .confirmed_div-methods-delivery, .confirmed_div-methods-payment {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }
    .message_no_payment{
        font-size:13px;
        color: red;
        padding-left: 15px;
    }
    .message_delivery{
        font-size:13px;
        color: #000;
        padding-left: 15px;
    }
    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
        display: flex;
    }
    #progressbar li {
        list-style-type: none;
        color: #000;
        text-transform: uppercase;
        font-size: 9px;
        width: 33.33%;
        float: left;
        position: relative;
    }
    #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 20px;
        line-height: 20px;
        display: block;
        font-size: 10px;
        color: #333;
        background: white;
        border-radius: 3px;
        margin: 0 auto 5px auto;
    }
    /*progressbar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: white;
        position: absolute;
        left: -50%;
        top: 9px;
        z-index: -1; /*put it behind the numbers*/
    }
    #progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none; 
    }
    /*marking active/completed steps green*/
    /*The number of the step and the connector before it = green*/
    #progressbar li.active:before,  #progressbar li.active:after{
        background: #FF7315;
        color: white;
    }
    #ms {
        margin: 50px auto;
        text-align: center;
        position: relative;

    }
</style>
<nav style="background-color:#232020;color:#fff;height: 100px;" class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <h3><a class="navbar-brand logo-footer" href="https://localhost/jhshop/"><span class="lohny">JH</span>Shop</a></h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="float:right;padding-right: 20px;">
            <ul class="navbar-nav">
                <li style="padding-right: 20px;" class="nav-item">
                    <a style="color:#fff;" class="nav-link active" aria-current="page" href="https://localhost/jhshop/">Página Inicial</a>
                </li>
                <li style="padding-right: 20px;" class="nav-item">
                    <a style="color:#fff;" href="<?php echo base_url(); ?>index.php/Login/deslogar"><span style="font-size: 25px;padding-top: 7px;" class="fa fa-sign-out" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" id="ms">
    <ul id="progressbar">
        <li class="active" id="cart_data_bar">Carrinho</li>
        <li class="active" id="delivery_data_bar">Dados de Envio</li>
        <li id="delivery_method_bar" class="active">Método de Envio</li>
        <li id="payment_method_bar">Método de Pagamento</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 div_cart_checkout">
            <h3><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;Métodos de Envio</h3>
            <div class="confirmed_div-methods-delivery">
                <h5><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;Método de Envio confirmado com sucesso!</h5>
            </div>
            <div class="card method_delivery">
                <div class="card-header text-light">   
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <input type="radio" id="cobranca_delivery" name="delivery" value="0.00">
                        <span class="fa fa-home pay-method" aria-hidden="true"></span><h6 class="message_delivery">Portes de Envio Grátis (3-5 dias úteis)</h6>
                    </div>
                    <div class="col-12">
                        <input type="radio" id="ctt_delivery" name="delivery" value="2.95">
                        <img src="https://localhost/jhshop/assets/images/ctt-expresso-Converted.png" width="80" class="pay-method" aria-hidden="true"><h6 class="message_delivery" >+ 2,95€ de Portes de Envio (2-3 dias úteis)</h6>
                    </div>
                    <div class="col-12">
                        <input type="radio" id="dhl_delivery" name="delivery" value="7.90">
                        <img src="https://localhost/jhshop/assets/images/DHL-Logo.png" width="80" class="pay-method" aria-hidden="true"><h6 class="message_delivery" >+ 7,90€ de Portes de Envio (1-2 dias úteis)</h6>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <button style = "background-color: #ff7315;border-color: #ff7315;" class="btn btn-success pull-right confirm-methods-delivery"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Confirmar Método de Envio</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="vertical_line"></div>
        <div class="col-md-6 div_data_checkout">
            <h3><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Métodos de Pagamento</h3>
            <div class="confirmed_div-methods-payment">
                <h5><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;Método de Pagamento confirmado com sucesso!</h5>
            </div>
            <div class="card method_payment">
                <div class="card-header text-light">   
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <input type="radio" id="cobranca_payment" name="cobranca_payment" value="cobranca" checked="">
                        <img src="https://localhost/jhshop/assets/images/img_457520.png" width="40" class="pay-method" aria-hidden="true">
                    </div>
                    <div class="col-12">
                        <input type="radio" id="visa_master" name="visa_master" value="visa_master" disabled>
                        <span class="fa fa-cc-visa pay-method"aria-hidden="true"></span>/&nbsp;&nbsp;<span class="fa fa-cc-mastercard pay-method"aria-hidden="true"></span>
                    </div>
                    <label class="message_no_payment">Este método de pagamento está indisponivel de momento</label>
                    <div class="col-12">
                        <input type="radio" id="paypal" name="paypal" value="paypal" disabled>
                        <span class="fa fa-cc-paypal pay-method"aria-hidden="true"></span>
                    </div>
                    <label class="message_no_payment" >Este método de pagamento está indisponivel de momento</label>
                    <div class="col-12">
                        <input type="radio" id="amex" name="amex" value="amex" disabled>
                        <span class="fa fa-cc-amex pay-method"aria-hidden="true" ></span>       
                    </div>
                    <label class="message_no_payment" >Este método de pagamento está indisponivel de momento</label>
                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <button style = "background-color: #ff7315;border-color: #ff7315;" class="btn btn-success pull-right confirm-methods-payment"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Confirmar Método de Pagamento</button>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div class="row go_complete">
        <div class="col-md-6">
            <button class="btn btn-success pull-right go_back" style = "background-color: #ff7315;border-color: #ff7315;margin-right: 4%;padding: 15px;"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Anterior</button>
        </div>
        <div class="col-md-6">
            <input type="button" class="btn btn-success pull-right go_complete_btn1" style = "background-color: #ff7315;border-color: #ff7315;margin-right: 73%;padding: 15px;" disabled="" value="Efetuar Pagamento&nbsp;<?php echo $soma ?>€"><input class="btn btn-success pull-right go_complete_btn2" style="display:none;" value="<?php echo $soma ?>">
        </div>   
    </div>
</div>

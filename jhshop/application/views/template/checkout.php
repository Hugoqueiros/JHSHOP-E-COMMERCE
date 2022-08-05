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
    .confirmed_div-cart, .confirmed_div-address {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
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
        <li id="delivery_data_bar">Dados de Envio</li>
        <li id="delivery_method_bar">Método de Envio</li>
        <li id="payment_method_bar">Método de Pagamento</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 div_cart_checkout">
            <h3><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Carrinho</h3>
            <div class="confirmed_div-cart">
                <h4><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;Carrinho confirmado com sucesso!</h4>
            </div>
            <div class="card shopping-cart">
                <div class="card-header text-light">   
                </div>
                <div class="card-body">
                    <!-- PRODUCT -->
                    <?php
                    if ($get_cart->num_rows() > 0) {
                        foreach ($get_cart->result()as $row) {
                            ?>
                            <?php
                            echo'<div class = "row">';
                            echo'<div class = "col-12 col-sm-12 col-md-2 text-center">';
                            echo'<img class = "img-responsive" src = "https://localhost/jhshop/' . $row->product_image . '" alt = "prewiew" width = "60" height = "70">';
                            echo'</div>';
                            echo'<div class = "col-12 text-sm-center col-sm-12 text-md-left col-md-6">';
                            echo'<h4 class = "product-name"><strong>' . $row->product_name . '</strong></h4>';
                            echo'</div>';
                            echo'<div class = "col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">';
                            echo'<div class = "col-3 col-sm-3 col-md-6 text-md-right" style = "padding-top: 5px">';
                            echo'<h6><strong>' . $row->product_price * $row->quantity . ' <span class = "text-muted">€</span></strong></h6>';
                            echo'</div>';
                            echo'<div class = "col-4 col-sm-4 col-md-4">';
                            echo'<div class = "quantity">';
                            echo'<input type = "number" step = "1" max = "99" min = "1" data-cart-id="' . $row->cart_id . '" value = "' . $row->quantity . '" name = "Qty" class = "qty"';
                            echo'size = "4">';
                            echo'</div>';
                            echo'</div>';
                            echo'<div class = "col-2 col-sm-2 col-md-2 text-right">';
                            echo'<button type = "button" data-id="' . $row->cart_id . '" class = "btn btn-outline-danger btn-xs delete_product_cart_checkout">';
                            echo'<i class = "fa fa-trash" aria-hidden = "true"></i>';
                            echo'</button>';
                            echo'</div>';
                            echo'</div>';
                            echo'</div>';
                            echo'<hr>';
                        }
                    } else {
                        echo'<a style = "cursor:default;color: #000;" class = "dropdown-item">O carrinho está vazio</a>';
                    }
                    ?>
                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <?php if ($get_cart->num_rows() > 0) { ?>
                            <button style = "background-color: #ff7315;border-color: #ff7315;" href="" class="btn btn-success pull-right confirm-cart"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Confirmar Carrinho</button>
                        <?php } else { ?>

                        <?php } ?>
                        <div class="pull-right" style="margin: 5px">
                            Total: <b><?php echo $soma ?>€</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vertical_line"></div>
        <div class="col-md-6 div_data_checkout">
            <h3><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;Dados de Envio</h3>
            <div class="confirmed_div-address">
                <h4><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;Dados de envio confirmados com sucesso!</h4>
            </div>
            <div class="card adress-details">
                <div class="card-header text-light">   
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="inputName" name="inputName" required="true" value="<?php echo $this->session->userdata('user_name') ?>" disabled="">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required="true" value="<?php echo $this->session->userdata('user_email') ?>" disabled="">
                        </div> 
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Morada</label>
                            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Rua, Nº, Andar" required="true" value="<?php echo $this->session->userdata('user_address') ?>">
                        </div>    
                        <div class="col-md-6">
                            <label for="inputPlace" class="form-label">Localidade</label>
                            <input type="text" class="form-control" id="inputPlace" name="inputPlace" required="true" value="<?php echo $this->session->userdata('user_place') ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="inputZip1" class="form-label">Código-Postal</label>
                            <input type="text" class="form-control" id="inputZip1" name="inputZip1" minlength="4" maxlength="4" required="true" value="<?php echo $this->session->userdata('user_postal_code1') ?>">
                        </div>
                        <div class="col-md-3">
                            <label style="margin-bottom: 25px;" for="inputZip2" class="form-label"></label>
                            <input type="text" class="form-control" id="inputZip2" name="inputZip2" minlength="3" maxlength="3" required="true" value="<?php echo $this->session->userdata('user_postal_code2') ?>">
                        </div>
                        <?php if ($this->session->userdata('user_nif')) { ?>   
                            <div class="col-md-6">
                                <label for="inputNIF" class="form-label">NIF</label>
                                <input type="text" class="form-control" id="inputNIF" name="inputNIF" minlength="9" maxlength="9" required="true" value="<?php echo $this->session->userdata('user_nif') ?>" disabled="">
                            </div>
                        <?php } else { ?>
                            <div class="col-md-6">
                                <label for="inputNIF" class="form-label">NIF</label>
                                <input type="text" class="form-control" id="inputNIF" name="inputNIF" minlength="9" maxlength="9" required="true" value="<?php echo $this->session->userdata('user_nif') ?>">
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Nº de Telemóvel</label>
                            <input type="text" class="form-control" id="inputPhone" name="inputPhone" minlength="9" maxlength="9" required="true" value="<?php echo $this->session->userdata('user_phone') ?>">
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <button type="button" style = "background-color: #ff7315;border-color: #ff7315;" class="btn btn-success pull-right confirm-address"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Confirmar Dados de Envio</button>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div class="row go_methods">
        <button class="btn btn-success pull-right go_methods" style = "background-color: #ff7315;border-color: #ff7315;margin-left: 46%;padding: 15px;" disabled="">Próximo Passo&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
    </div>
</div>

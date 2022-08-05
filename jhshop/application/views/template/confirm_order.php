<nav style="background-color:#232020;color:#fff;height: 100px;" class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <h3><a class="navbar-brand logo-footer" href="https://localhost/jhshop/"><span class="lohny">JH</span>Shop</a></h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="float:right;padding-right: 20px;">
            <ul class="navbar-nav">
                <li style="padding-right: 20px;" class="nav-item">
                    <a style="color:#fff;" class="nav-link active" aria-current="page" href="https://localhost/jhshop/">Pagina Inicial</a>
                </li>
                <li style="padding-right: 20px;" class="nav-item">
                    <a style="color:#fff;" href="<?php echo base_url(); ?>index.php/Login/deslogar"><span style="font-size: 25px;padding-top: 7px;" class="fa fa-sign-out" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div id="impress_div">
            <h3><a style="color: #000;font-size: 50px;padding-top: 20px;" class="navbar-brand logo-footer" href="https://localhost/jhshop/"><span class="lohny">JH</span>Shop</a></h3>
            <div class="card confirm_order_div">
                <?php
                if ($get_confirmed_order->num_rows() > 0) {
                    foreach ($get_confirmed_order->result()as $row) {
                        ?>
                        <?php
                    }
                }
                ?>
                <div class = "card-header">
                    <h3><i class = "fa fa-clipboard" aria-hidden = "true"></i>&nbsp; Encomenda #<?php echo $row->order_id ?> confirmada com sucesso!</h3>
                </div>
                <div class = "card-body ">
                    <div class = "row g-3">
                        <div class = "col-12">
                            <label class = "form-label"><b>Nome:</b>&nbsp;&nbsp;<?php echo $row->user_name ?></label>               
                        </div>
                        <div class = "col-12">
                            <label class = "form-label"><b>Email:</b>&nbsp;&nbsp;<?php echo $row->user_email ?> </label>
                        </div>
                        <div class = "col-12">
                            <label class = "form-label"><b>Morada:</b>&nbsp;&nbsp;<?php echo $row->user_address ?>,&nbsp;<?php echo $row->user_place ?>&nbsp;<?php echo $row->user_postal_code1 ?>-<?php echo $row->user_postal_code2 ?></label> 
                        </div>
                        <div class = "col-12">
                            <label class = "form-label"><b>NIF:</b>&nbsp;&nbsp;<?php echo $row->user_nif ?> </label>
                        </div>
                        <div class = "col-12">
                            <label class = "form-label"><b>Nº Telemóvel:</b>&nbsp;&nbsp;<?php echo $row->user_phone ?> </label>
                        </div>
                        <hr style="border-top: 1px solid rgb(0 0 0 / 19%);width: 80%;">
                        <div class = "col-md-6">
                            <label class = "form-label"><b>Artigos na Encomenda</b></label>               
                        </div>
                        <div class = "col-md-6">
                            <label style="float:right;" class = "form-label"><b>Valor do Artigo</b></label>               
                        </div>
                        <?php
                        if ($get_confirmed_order->num_rows() > 0) {
                            foreach ($get_confirmed_order->result()as $row) {
                                ?>
                                <?php
                                echo'<div class = "col-md-6">';
                                echo'<label class = "form-label">' . $row->quantity_product . 'x&nbsp;&nbsp;' . $row->product_brand . '&nbsp;-&nbsp;' . $row->product_name . '&nbsp;(' . $row->product_size . ')</label>';
                                echo'</div>';
                                echo'<div class="col-md-6">';
                                echo'<label style="float:right;" class = "form-label">' . $row->subtotal_product . '€</label>';
                                echo'</div>';
                            }
                        }
                        ?>
                        <hr style="border-top: 1px solid rgb(0 0 0 / 19%);width: 80%;">
                        <div class="col-md-6">
                            <label class = "form-label"><b>Método de Envio:</b>&nbsp;&nbsp;<?php echo $row->type_delivery ?> </label>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label class = "form-label"><b>Método de Pagamento:</b>&nbsp;&nbsp;<?php echo $row->type_payment ?> </label>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <?php if ($row->type_delivery == 'Cobrança') { ?>
                                <label style="float:right;" class = "form-label"><b>Portes de Envio:</b>&nbsp;&nbsp;0.00€</label>
                            <?php } else if ($row->type_delivery == 'CTT Express') { ?>
                                <label style="float:right;" class = "form-label"><b>Portes de Envio:</b>&nbsp;&nbsp;2.95€</label>
                            <?php } else { ?>
                                <label style="float:right;" class = "form-label"><b>Portes de Envio:</b>&nbsp;&nbsp;7.90€</label>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label style="float:right;" class = "form-label"><b>Total:</b>&nbsp;&nbsp;<?php echo $row->total_price ?>€</label>
                        </div>
                    </div>
                </div>
                <div class = "card-footer no_impress">
                    <div class = "pull-right" style = "margin: 10px">
                        <button onclick="printContent('impress_div')" type = "button" style = "background-color: #ff7315;border-color: #ff7315;" class = "btn btn-success pull-right"><i class = "fa fa-print"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    
<body>
    <!--w3l-banner-slider-main-->
    <section class="w3l-banner-slider-main">
        <div class="top-header-content">
            <header class="tophny-header">
                <div class="container-fluid">
                    <div class="top-right-strip row">
                        <div class="top-hny-left-content col-lg-6 pl-lg-0">
                            <div class="w3l-footer-22">
                                <ul class="social-footerhny">
                                    <li><a class="facebook" href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="twitter" href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="instagram" href="#"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>   
                        </div>

                        <?php if ($this->session->userdata('user_name')) { ?>
                            <ul class="top-hnt-right-content col-lg-6">
                                <li class="button-log usernhy">
                                    <a class="btn-open user-btn">
                                        <span  class="fa fa-user" aria-hidden="true">&nbsp;Olá <?php echo $this->session->userdata('user_name'); ?>&nbsp;</span>
                                    </a>
                                </li>
                                <li class="transmitvcart galssescart2 cart cart box_1">    
                                    <div class="dropdown">
                                        <button class="top_transmitv_cart dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carrinho
                                            <span class="fa fa-shopping-cart"></span>
                                        </button>
                                        <div style="background-color: #fff;margin-left: -163px!important;width: 300px;" id="cart_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php
                                            echo'<div id="minicart_dropdown">';
                                            if ($get_cart->num_rows() > 0) {
                                                echo'<div class = "alert alert-warning" role = "alert"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Se pretender eliminar um artigo, clique em Finalizar!</div>';
                                                foreach ($get_cart->result()as $row) {
                                                    ?>
                                                    <?php
                                                    echo'<div class="row cart-products">';
                                                    echo'<div class="col-md-2">';
                                                    echo'<img style="padding-left: 15px;" src="https://localhost/jhshop/' . $row->product_image . '" alt="image_product" width="40">';
                                                    echo'</div>';
                                                    echo'<div class="col-md-6">';
                                                    echo'<a style = "cursor:default;color: #000;padding: 0.15rem 0.5rem;" class = "dropdown-item">' . $row->quantity . 'x&nbsp;' . $row->product_name . '&nbsp;&nbsp;(' . $row->product_size . ')</a>';
                                                    echo'</div>';
                                                    echo'<div class="col-md-4">';
                                                    echo'<a style = "cursor:default;color: #000;padding: 0.15rem 0.5rem" class = "dropdown-item">' . $row->product_price * $row->quantity . '</a>';
                                                    echo'</div>';
                                                    echo'</div>';
                                                }
                                            } else {
                                                echo'<a style = "cursor:default;color: #000;" class = "dropdown-item">O carrinho está vazio</a>';
                                            }
                                            echo'</div>';
                                            ?>
                                            <div class = "dropdown-divider"></div>
                                            <div id="minicart_totalbtn">
                                                <div class="row">
                                                    <div class="col-md-6" id="btn_total_cart">
                                                        <a style = "cursor:default;color: #000;" class = "dropdown-item">Total:&nbsp;&nbsp;<?php echo $soma ?>€</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="https://localhost/jhshop/ShoppingCart/checkout"><button style = "background-color: #ff7315;border-color: #ff7315;float: right;margin-right: 5px;" type = "button" class = "btn btn-primary">Finalizar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class = "button-log usernhy">
                                    <a href = "<?php echo base_url(); ?>index.php/Login/deslogar" class = "btn-open">
                                        <span class = "fa fa-sign-out" aria-hidden = "true"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        } else {
                            ?>
                            <ul class="top-hnt-right-content col-lg-6">
                                <li class="button-log usernhy">
                                    <a class="btn-open">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="transmitvcart galssescart2 cart cart box_1">    
                                    <div class="dropdown">
                                        <button class="top_transmitv_cart dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Carrinho
                                            <span class="fa fa-shopping-cart"></span>
                                        </button>
                                        <div style="background-color: #fff;margin-left: -163px!important;width: 300px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php
                                            if ($get_cart->num_rows() > 0) {
                                                foreach ($get_cart->result()as $row) {
                                                    ?>
                                                    <?php
                                                    echo'<a style = "cursor:default;color: #000;" class = "dropdown-item">' . $row->product_name . '</a>';
                                                }
                                            } else {
                                                echo'<a style = "cursor:default;color: #000;" class = "dropdown-item">O carrinho está vazio</a>';
                                            }
                                            ?>
                                            <div class="dropdown-divider"></div>
                                            <a style="cursor:default;color: #000;" class="dropdown-item">Total:</a><button style="background-color: #ff7315;border-color: #ff7315;float: right;margin-right: 5px;" type="button" class="btn btn-primary">Finalizar</button>  
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!--//right login-->
                            <div class="overlay-login text-left">
                                <button type="button" class="overlay-close-login">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <div class="wrap">
                                    <h5 class="text-center mb-4">Entrar na conta</h5>
                                    <div class="login-bghny p-md-5 p-4 mx-auto mw-100">
                                        <!--/login-form-->
                                        <?php
                                        echo form_open(base_url() . 'index.php/login/logar', array(
                                            'id' => 'logar'
                                        ));
                                        ?>
                                        <div class="form-group">
                                            <p class="login-texthny mb-2">Insira o seu Email</p>
                                            <input type="email" class="form-control" id="email_login" name="email_login"
                                                   aria-describedby="emailHelp" placeholder="" required="">                        
                                        </div>
                                        <div class="form-group">
                                            <p class="login-texthny mb-2">Insira a sua Password</p>
                                            <input type="password" class="form-control" id="password_login" name="password_login"
                                                   placeholder="" required="">
                                        </div>
                                        <div class="form-check mb-2">
                                            <div class="userhny-check">
                                                <label class="check-remember container">

                                                    <a class="button-register"><p class="privacy-policy">Ainda não está registado?</p></a>
                                                </label>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="submit-login btn mb-4">Entrar</button>
                                        <?php echo form_close(); ?>
                                        <!--//login-form-->
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <!--//right register-->
                            <div class="overlay-register text-left">
                                <button type="button" class="overlay-close-register">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <div class="wrap">
                                    <h5 class="text-center mb-4">Criar conta</h5>
                                    <div class="login-bghny p-md-5 p-4 mx-auto mw-100">
                                        <!--/login-form-->
                                        <?php
                                        echo form_open(base_url() . 'index.php/login/createaccount', array(
                                            'id' => 'create-account'
                                        ));
                                        ?>
                                        <div class="form-group">
                                            <p class="login-texthny mb-2">Insira o seu Nome</p>
                                            <input type="text" class="form-control" id="name_register" name="name_register"
                                                   aria-describedby="emailHelp" placeholder="" required="">                        
                                        </div>
                                        <div class="form-group">
                                            <p class="login-texthny mb-2">Insira o seu Email</p>
                                            <input type="email" class="form-control" id="email_register" name="email_register"
                                                   aria-describedby="emailHelp" placeholder="" required="">                        
                                        </div>
                                        <div class="form-group">
                                            <p class="login-texthny mb-2">Insira a sua Password</p>
                                            <input type="password" class="form-control" id="password_register" name="password_register"
                                                   placeholder="" required="">
                                        </div>
                                        <button type="submit" class="submit-login btn mb-4">Criar Conta</button>
                                        <?php echo form_close(); ?>
                                        <!--//login-form-->
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <!--/nav-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid serarc-fluid">
                        <a class="navbar-brand" href="<?php base_url() ?>">
                            Jh<span class="lohny">S</span>hop</a>
                        <!-- if logo is image enable this   
                                        <a class="navbar-brand" href="#index.html">
                                                <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                        </a> -->
                        <!--/search-right-->
                        <div class="search-right">

                            <a href="#search" title="search"><span class="fa fa-search mr-2" aria-hidden="true"></span>
                                <span class="search-text">Pesquisar..</span></a>
                            <!-- search popup -->
                            <div id="search" class="pop-overlay">
                                <div class="popup">

                                    <form action="#" method="post" class="search-box">
                                        <input type="search" placeholder="O que deseja comprar?" name="search" required="required"
                                               autofocus="">
                                        <button type="submit" class="btn">Pesquisar</button>
                                    </form>

                                </div>
                                <a class="close" href="#">×</a>
                            </div>
                            <!-- /search popup -->
                        </div>
                        <!--//search-right-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fa fa-bars"> </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php base_url() ?>">Página Inicial</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
                <!--//nav-->
            </header>








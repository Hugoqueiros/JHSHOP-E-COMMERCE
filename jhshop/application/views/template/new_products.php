<!-- //video-6-->
<section class="w3l-ecommerce-main">
    <!-- /products-->
    <div class="ecom-contenthny py-5">
        <div class="container py-lg-5">
            <h3 class="hny-title mb-0 text-center"><span>Novos</span> Produtos</h3>
            <p class="text-center">Os produtos mais recentes da nossa loja</p>
            <!-- /row-->
            <div class="ecom-products-grids row mt-lg-5 mt-3">
                <?php
                if ($get_products->num_rows() > 0) {
                    foreach ($get_products->result()as $row) {
                        ?>
                        <?php
                        echo '<div class = "col-lg-3 col-6 product-incfhny mt-4">';
                        echo '<div class = "product-grid2 transmitv">';
                        echo '<div class = "product-image2">';
                        echo '<img class = "img-fluid" src = "' . $row->product_image . '">';
                        echo '<div class = "transmitv single-item">';
                        echo '<input type = "hidden" name = "cmd" value = "_cart">';
                        echo '<input type = "hidden" name = "add" value = "1">';
                        echo '<input type = "hidden" name = "transmitv_item" value = "' . $row->product_name . '">';
                        echo '<input type = "hidden" name = "amount" value = "' . $row->product_price . '">';
                        if ($this->session->userdata('user_name')) {
                            echo '<button type="button" data-id="' . $row->product_id . '" data-name="' . $row->product_name . '" data-price="' . $row->product_price . '" data-brand="' . $row->product_brand . '" data-size="' . $row->product_size . '" data-color="' . $row->product_color . '" data-image="' . $row->product_image . '" class = "transmitv-cart ptransmitv-cart add-to-cart btn_open_btn_cart">Adicionar ao carrinho</button>';
                        } else {
                            echo '<button type="button" data-toggle="modal" data-target="#create_account" class = "transmitv-cart ptransmitv-cart add-to-cart">Adicionar ao Carrinho</button>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '<div class = "product-content">';
                        echo '<button style="background-color:' . $row->product_color . ';border:1px ' . $row->product_color . ';width: 20px;border-radius: 20px;height: 20px;" class="button button5" disabled></button><h3 class = "title">' . $row->product_name . ' (' . $row->product_size . ')</h3>';
                        echo '<h6>' . $row->product_brand . '</h6>';
                        echo '<span class = "price">' . $row->product_price . '€</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <!-- //row-->
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Criar Conta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Para adicionar produtos ao carrinho necessita de criar conta!
                </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Fechar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Criar Conta</button>            
            </div>
            <?php echo form_close(); ?>
            <!--//login-form-->
        </div>
    </div>
</div>

<div id="backoffice_mid">
    <h1 style="padding-bottom: 20px;"><i class="fa fa-tachometer"></i>&nbsp;&nbsp;DASHBOARD</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card_admin" style="width: 18rem;">
                <div class="image">
                    <img src="https://localhost/jhshop/assets/images/box.png" class="card-img-top image__img" alt="...">
                    <div class="image__overlay image__overlay--primary">
                        <?php
                        if ($get_count_products->num_rows() > 0) {
                            foreach ($get_count_products->result()as $row) {
                                ?>
                                <?php
                                echo '<div class="image__title">'.$row->nproducts.'</div>';
                            }
                        }
                        ?>
                        <p class="image__description">Produtos</p>
                    </div>
                </div>              
            </div>
        </div>
        <div class="col-md-4">
            <div class="card_admin" style="width: 18rem;">
                <div class="image">
                    <img src="https://localhost/jhshop/assets/images/group.png" class="card-img-top image__img" alt="...">
                    <div class="image__overlay image__overlay--primary">
                        <?php
                        if ($get_count_clients->num_rows() > 0) {
                            foreach ($get_count_clients->result()as $row) {
                                ?>
                                <?php
                                echo '<div class="image__title">'.$row->nclients.'</div>';
                            }
                        }
                        ?>
                        <p class="image__description">Clientes</p>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-4">
            <div class="card_admin" style="width: 18rem;">
                <div class="image">
                    <img src="https://localhost/jhshop/assets/images/clipboard.png" class="card-img-top" alt="...">
                    <div class="image__overlay image__overlay--primary">
                        <?php
                        if ($get_count_orders->num_rows() > 0) {
                            foreach ($get_count_orders->result()as $row) {
                                ?>
                                <?php
                                echo '<div class="image__title">'.$row->norders.'</div>';
                            }
                        }
                        ?>
                        <p class="image__description">Encomendas</p>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

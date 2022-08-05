<div id="backoffice_mid">
    <h1 style="padding-bottom: 20px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADICIONAR PRODUTOS</h1>
    <?php
    echo form_open(base_url() . 'index.php/backoffice/add_products', array(
        'id' => 'add_products'
    ));
    ?>
    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" id="name-label">Nome </label>&nbsp; 
                    <input id="name_product_admin" name="name_product_admin" required="" type="text" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="price-label">Preço </label>&nbsp;
                    <input id="price_product_admin" name="price_product_admin"  required="" type="number" min="0,00" step="0.01" class="form-control">
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group mb-3">
                    <label id="detail-label" class="input-group-text">Tamanho </label>&nbsp;
                    <select class="form-select" id="size_product_admin" name="size_product_admin">
                        <option disabled selected value="">Selecione o Tamanho..</option>
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL </option>
                        <option>XXXL </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" id="detail-label">Cor </label>&nbsp;
                    <input class="form-control"  id="color_product_admin" name="color_product_admin"  required="" type="color">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="detail-label">Marca </label>&nbsp; 
                    <input class="form-control" id="brand_product_admin" name="brand_product_admin"  required="" type="text">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text">Imagem </label>&nbsp; 
                    <input style="padding-top: 4px;" type="file" name="my_file"  id="my_file">
                </div>
            </div>
            <div style="padding-top: 20px;">
                <input style="display: none;" name="url" value='https://localhost/jhshop/assets/'>
                <button class="btn btn-success" id="submit">Adicionar Produto</button>
            </div>

        </div>
    </form>
    <?php echo form_close(); ?>



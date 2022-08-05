<nav>
    <div class="toggle-wrap" onclick="toggleMenu(this)">
        <span class="toggle-bar"></span>
    </div>
    <hgroup>
        <h3>Menu</h3>
    </hgroup>
    <div class="admin_right">
        <a href="<?php echo base_url(); ?>index.php/Login/deslogar_admin"><span class="fa fa-sign-out" aria-hidden="true"></span></a>
    </div>
</nav>
<aside>
    <a href="<?php echo base_url(); ?>Backoffice/dashboard"><i class="fa fa-tachometer"></i>&nbsp;&nbsp;Dashboard</a>
    <a href="<?php echo base_url(); ?>Backoffice/add_products_view"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Produtos</a>
    <a href="<?php echo base_url(); ?>Backoffice/manage_clients"><i class="fa fa-users"></i>&nbsp;&nbsp;Gerir Clientes</a>
    <a href="<?php echo base_url(); ?>Backoffice/manage_orders"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Gerir Encomendas</a>
</aside>


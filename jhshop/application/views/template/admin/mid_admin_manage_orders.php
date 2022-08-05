<div id="backoffice_mid">
    <h1 style="padding-bottom: 20px;"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;GERIR ENCOMENDAS</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número da Encomenda</th>
                <th scope="col">Nome do Cliente</th>
                <th scope="col">Data e Hora</th>
                <th scope="col">Tipo de Pagamento</th>
                <th scope="col">Tipo de Envio</th>
                <th scope="col">Preço Total</th>
            </tr>
        </thead>
        <?php
        if ($get_orders->num_rows() > 0) {
            foreach ($get_orders->result()as $row) {
                ?>
                <?php
                echo '<tbody>';
                echo'<tr>';
                echo '<th>' . $row->order_id . '</th>';
                echo '<td scope="row">' . $row->user_name . '</td>';
                echo '<td>' . $row->date . '&nbsp;&nbsp;' . $row->hour . '</td>';
                echo '<td>' . $row->type_payment . '</td>';
                echo '<td>' . $row->type_delivery . '</td>';
                echo '<td>' . $row->total_price . '</td>';
                echo '</tr>';
                echo '</tbody>';
            }
        }
        ?>

    </table>
</div>

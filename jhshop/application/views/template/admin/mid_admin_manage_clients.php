<div id="backoffice_mid">
    <h1 style="padding-bottom: 20px;"><i class="fa fa-users"></i>&nbsp;&nbsp;GERIR CLIENTES</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número do Cliente</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Morada</th>
                <th scope="col">Telefone</th>
                <th scope="col">NIF</th>
            </tr>
        </thead>
        <?php
        if ($get_clients->num_rows() > 0) {
            foreach ($get_clients->result()as $row) {
                ?>
                <?php
                echo '<tbody>';
                echo'<tr>';
                echo '<th>' . $row->user_id . '</th>';
                echo '<td scope="row">' . $row->user_name . '</td>';
                echo '<td>' . $row->user_email . '</td>';
                echo '<td>' . $row->user_address . '&nbsp;&nbsp;' . $row->user_postal_code1 . '-' . $row->user_postal_code2 . '</td>';
                echo '<td>' . $row->user_phone . '</td>';
                echo '<td>' . $row->user_nif . '</td>';
                echo '</tr>';
                echo '</tbody>';
            }
        }
        ?>

    </table>

</div>

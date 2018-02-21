<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>picture</th>
        <th>product id</th>
        <th>info</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody class="table_prods">
    <?php
        foreach($prods as $prod){
            echo '<tr>';

            echo '<td> <img src="'.$prod['image'].'" alt="pic_'.$prod['product_id'].'"> </td>';

            echo '<td>'.$prod['product_id'].'</td>';

            echo '<td>'.$prod['name'].'<br>'.$prod['model'].'</td>';

            if($prod['enable'] === "1"){
                echo '<td><span class="badge badge-success">Enable</span></td>';
            }else{
                echo '<td><span class="badge badge-warning">Disable</span></td>';
            }
            echo '</tr>';
        }
    ?>
    </tbody>
</table>
<?php

foreach($stores as $store){

}

foreach($google_data as $store_data){?>

    <form  action='../php/Utilities/Google/script_google.php' method='POST'>
        <ul class='store'>
            <li><p><b>Google Analytics Code </b></p></li>
            <li>
                <textarea class='google_setting' name='analytic' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_analytic'][0])){
                        echo $store_data['setting_analytic'][0];
                    }?>
                </textarea>
            </li>

            <li><p><b>entry_google_ecommerce</b></p></li>
            <li>
                <textarea class='google_setting' name='ecommerce' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_ecommerce'][0])){
                        echo $store_data['setting_ecommerce'][0];
                    }?>
                </textarea>
            </li>

            <li><p><b>code on every page</b></p></li>
            <li>
                <textarea class='google_setting' name='conversion' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_setting'][0])){
                        echo $store_data['setting_setting'][0];
                    }?>
                </textarea>
            </li>

            <li><p><b>code after singup</b></p></li>
            <li>
                <textarea class='google_setting' name='singup' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_singup'][0])){
                        echo $store_data['setting_singup'][0];
                    }?>
                </textarea>
            </li>

            <li><p><b>code after contact email</b></p></li>
            <li>
                <textarea class='google_setting' name='contact' id='' cols='30' rows='10'>
                    <?php if(isset($store_data['setting_contact'][0])){
                        echo $store_data['setting_contact'][0];
                    }?>
                </textarea>
            </li>
            <hr>

            <p>Here e-commerce code</p>
            <li><p><b>Transaction</b></p></li>
            <li>
                <textarea class='google_setting' name='transaction' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_transaction'][0])){
                        echo $store_data['setting_transaction'][0];
                    }?>
                </textarea>
            </li>

            <li><p><b>product</b></p></li>
            <li>
                <textarea class='google_setting' name='product' id='' cols='30' rows='10'>
                    <?php
                    if(isset($store_data['setting_product'][0])){
                        echo $store_data['setting_product'][0];
                    }?>
                </textarea>
            </li>
        </ul>

        <input type='text' class='hide' name='store_id' value='<?=$store_id?>'/>
        <input value='save' class='btn btn-info' type='submit'/>
    </form>

<?php
}
?>

<?php
function view($file, $arr_data = array(), $kembalikan_string = false){
    if (!file_exists($file)) die ("Tidak dapat memanggil file view : " . $file);

    if(sizeof($arr_data) > 0){
        extract($arr_data, EXTR_SKIP);
    }
    ob_start();
    include ($file);
    if($kembalikan_string == true){
        $content = ob_get_contents();
        @ob_end_clean();
        return $content;
    }
    $content = ob_get_contents();
    @ob_end_clean();
    echo $content;
}
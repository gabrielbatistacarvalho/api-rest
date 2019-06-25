<h2>Dados buscados na API REST</h2>
<hr>
<?php

$url  = "http://localhost/cursoapi/produtos/";

$x = curl_init();

curL_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curL_setopt($x, CURLOPT_RETURNTRANSFER, true);
curL_setopt($x, CURLOPT_URL, $url);
$res = curL_exec($x);

curL_close($x);

$dados = json_decode($res);


foreach ($dados as $d):

    echo '<br>';
    echo $d->pro_id . ' ' . $d->pro_nome;

endforeach;
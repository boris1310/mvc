<script src="https://unpkg.com/imask"></script>

<div class="row container mx-auto my-3">
    <?php

    foreach ($data as $row) {
    echo '<div  class="col-3">
        <div class="card shadow-sm hover-card p-1">';

            if ( strlen($row['photo'])!==0) {

            echo '<img height="120px" width="150px" class="float-center mx-auto p-1"   src="../../../' . $row['photo'] . '" alt="item">';
            } else {
            echo '<img height="120px" width="150px" class="float-center mx-auto p-1"   src="https://brilliant24.ru/files/cat/template_01.png" alt="item">';
            }

            echo '<div class="card-body">
                <h5 class="card-text fs-6 lh-1">' . $row["name"] . '</h5>

                <h5 class="my-3">Цена: <span class="text-success ">' . $row["price"] . '</span></h5>
               
            </div>
        </div>
    </div>';
    }

    $fullprice=0;

    foreach ($data as $row){
        $fullprice=$fullprice+$row['price'];
    }

    echo "<div class='alert alert-success my-3'>Вы оплачиваете ".count($data)." товаров, общей стоимостью ".$fullprice." грн</div>";
    ?>
</div>

<div class="container alert alert-primary">
<h4 class="text-center">Оплата</h4>
<div class="row w-50 mx-auto justify-content-between">
    <div class="col-12 my-3">
        <label class="text-black my-1" for="card">Номер карты</label>
        <input class="form-control" type="text" placeholder="0000 0000 0000 0000" id="card"/>
        </div>
    <div class="col-4 my-3">
        <label class="text-black my-1" for="period">Срок действия</label>
        <input class="form-control" type="text" placeholder="00/00" id="period"/>
        </div>
    <div class="col-4 my-3">
     <label class="text-black my-1" for="cvv">CVV</label>
        <input class="form-control" type="text" placeholder="000" id="cvv"/>
        </div>
    <button class="my-5 w-50 btn btn-success mx-auto" type="button" id="btn-pay">Оплатить</button>
    </div>

</div>

<script>
    new IMask(card, {
        mask: '0000 0000 0000 0000'
    });

    new IMask(period, {
        mask: '00{/}00'
    });

    new IMask(cvv, {
        mask: '000'
    });
</script>
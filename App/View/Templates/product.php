<div class="container">
    <div class="row">
        
        <?php
        foreach ($data as $row){
            echo "<div class='col-5'>
                     <img src='../../../".$row['photo']."' width='100%' alt=''>
                  </div>
                  <div class='col-6'>
                     <h5>".$row['name']."</h5>
                     <p class='my-3'>Описание: ".$row['description']."</p>
                     
                        <h5 class='my-5'>Цена: <span class='text-success'>".$row['price']." </span> грн</h5>
                        <div class='row my-5 mx-auto'>
                          <div class='col-4 text-center'>
                          <img width='50%' src='https://img.icons8.com/ios/50/000000/prize--v1.png' alt='garant'/>
                          <br>
                          <b>Официальная гарантия</b>
                          </div>
                          
                          <div class='col-4 text-center'>
                          <img width='50%' src='https://img.icons8.com/ios/50/000000/split-transaction.png' alt='pay'/>
                          <br>
                          <b>Удобная оплата</b>                         
                          </div>   
                          <div class='row mx-auto my-5 basket'>
                                <button class='col-5 btn mx-1 btn-primary' value='".$row['idProduct']."'>
                                    <img src='../../../public/img/basket-btn.png' alt='Корзина'>                                 
                                </button>      
                                <button class='col-5 mx-1 btn btn-primary'>
                                    Купить сейчас                               
                                </button>                         
                            </div>                  
                          </div>                        
                        </div>
                  </div>
                  ";
        }
        ?>

    </div>
</div>
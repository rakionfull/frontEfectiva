<?=$this->extend('Layout/main')?> 
<?=$this->section('content');
  $session = session();
  
  ?> 

        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <?php 
                               
                                    if($session->getFlashdata('error') != '')
                                    {
                                    echo $session->getFlashdata('error');;
                                    }
                                ?>
                            <h2><?=$mensaje?> </h2>
                          
                           
                        </div>
                    </div>
                </div>
        </div>
<?=$this->endSection()?> 
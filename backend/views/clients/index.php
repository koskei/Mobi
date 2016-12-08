<?php
use yii\helpers\Html;

?>



          <div class="box">
         
            <div class="box-header">
             
              
            </div>
              <div class="table">
                 <p>
        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
    </p> 
              </div>         
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Client Country</th>
                  <th>Edit</th>
                  
                </tr>
                </thead>
                
 
                    
                    
                   
              <tbody>
                                 <?php
foreach ($cl as $dp):
    
{
?>
                <tr>
                 <td><?= $dp->clientName;?></td>
                 <td><?= $dp->countryCountries->name;?> </td>
                 <td> <?= Html::a('Update', ['update', 'id' => $dp->client_id]) ?> </td>
                
               </tr>
                <?php } endforeach;  ?>   
               </tbody>
                

                </tfoot>
              </table>
            </div>
            
            
            
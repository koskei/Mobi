
<?php
    

use yii\widgets\ActiveForm;


?>


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload File</h3>
            
            </div>
            <!-- /.box-header -->
            <!-- form start -->
       <?php    $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

              <div class="box-body">
            
              
                <div class="form-group">
    
       <?= $form->field($model, 'filename')->fileInput() ?>

                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            <?php $form=ActiveForm::end();?>
          </div>
          <!-- /.box -->

       
       
   
          </div>
          <!-- /.box -->

        </div>
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
<?php

use yii\helpers\Html;
?>



<div class="box">

    <div class="box-header">


    </div>
    <div class="table">
       
    </div>         
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="display:none;">#</th>
                    <th>Next Action</th>
                    <th>Question Name</th>
                    <th>Question</th>
                    <th>Length</th>
                    <th>Question Type</th>
                    <th>Rotation</th>
                    <th>Skip Pattern</th>
                    <th>Edit</th>

                </tr>
            </thead>





            <tbody>
                <?php
                foreach ($model as $dp): {
                        ?>
                        <tr>
                            <td style="display:none;"><?= $dp->id ; ?></td>
                            <td><?= $dp->xls ; ?></td>
                            <td><?=  $dp->name ;?></td> 
                            <td><?=  $dp->qns  ;?></td>
                            <td><?=  $dp->length ;?></td>
                            <td><?=  $dp->type ;?></td>
                            <td><?=  $dp->rotation  ;?></td>
                            <td><?=  $dp->skip ;?></td>
                            <td> <?= Html::a('<span class="btn-label">Update</span>', ['surveys/cqns', 'id' => $dp->id,'sid'=>$dp->survey_id]) ?>
</td>

                       </tr>
    <?php } endforeach; ?>   
            </tbody>


            </tfoot>
        </table>
    </div>



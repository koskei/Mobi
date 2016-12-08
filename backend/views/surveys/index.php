<?php

use yii\helpers\Html;
?>



<div class="box">

    <div class="box-header">


    </div>
    <div class="table">
        <p>
            <?= Html::a('Create Poll', ['create'], ['class' => 'btn btn-success']) ?>

        </p> 
    </div>         
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="display:none;">Poll ID</th>
                    <th>Poll Name</th>
                    <th>Client Name</th>
                    <th>Poll Country</th>
                    <th>Poll Language</th>
                    <th>Created</th>
                    <th>Start Date</th>
                    <th>Edit</th>

                </tr>
            </thead>





            <tbody>
                <?php
                foreach ($surv as $dp): {
                        ?>
                        <tr>
                            <td style="display:none;"><?= $dp->survey_id; ?></td>
                            <td><?= $dp->title; ?></td>
                            <td><?= $dp->clientClients->clientName; ?> </td>
                            <td><?= $dp->countryCountries->name; ?> </td>
                            <td><?= $dp->languageLanguages->language; ?> </td>
                            <td><?= $dp->created_at; ?> </td>
                            <td><?= $dp->end_at; ?> </td>
                            <td> <?= Html::a('Update', ['update', 'id' => $dp->survey_id]) ?> 
                                ||<?= Html::a('<b>Questions</b>',['surveys/question', 'id' =>$dp->survey_id]) ?>
                                || <?= Html::a('Clone', ['update', 'id' => $dp->survey_id]) ?></td>

                        </tr>
    <?php } endforeach; ?>   
            </tbody>


            </tfoot>
        </table>
    </div>



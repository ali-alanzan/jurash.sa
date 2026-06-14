<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
<div class="page-content-wrapper">

<!--Main Content-->

<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
            <h5 class="text-truncate"><?php echo _SERVICES; ?></h5>
        </div>

        <div class="row">
          
            <div class="col-12 c-col-12">
                <a class="btn btn-primary" href="../controller/new_service.php">
                    <i class="fa fa-plus add-new-i"></i> <?php echo _ADDITEM; ?>
                </a>
            </div>

            <div class="col-12">
                <div class="block table-block mb-4 c-4">

                    <div class="row">
                        <div class="table-responsive">
                  <table class="display table table-striped">
                                <thead>
                                    <tr>
                                       <th><?php echo _TABLEFIELDID; ?></th>
                                       <th><?php echo _TABLEFIELDIMAGE; ?></th>
                                       <th><?php echo _TABLEFIELDNAME; ?></th>
                                       <th><?php echo _TABLEFIELDSTATUS; ?></th>
                                       <th></th>
                                       <th></th>
                                   </tr>
                               </thead>
                            <tbody>
                                <?php foreach($services as $service): ?>
                                    <tr>
                                       <td><?php echo $service['service_id']; ?></td>
                                       <td class="product">
                                        <?php
                                        if (!empty($service['service_image'])) {
                                            echo '<img class="product-img product-img-p" src="../../images/'.$service['service_image'].'">';
                                        }else{
                                            echo '<img class="product-img product-img-p" src="../assets/images/avatar.png">';
                                        }
                                        ?>
                                    </td>
                                       <td><?php echo $service['tr_name']; ?></td>
                                    <td class="status td-justify">
                                        <?php
                                        if ($service['service_status'] == 1) {
                                            echo '<span class="badge badge-pill bg-success">'._ACTIVE.'</span>';
                                        }else{
                                            echo '<span class="badge badge-pill bg-warning">'._INACTIVE.'</span>';
                                        }
                                        ?>
                                    </td>
                                    <td align="right" width="50px" class="padding-right-5">

                                        <div class="dropdown listing-page">
                                          <button class="btn btn-small btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo _EDITITEM; ?>
                                        </button>
                                        <div class="dropdown-menu" aria-label="dropdownMenuButton">
                                            
                                            <?php
                                            $languages = get_languages_by_service($connect, $service['service_id']);
                                            foreach ($languages as $language){
                                                ?> 
                                                <a class="dropdown-item" href="../controller/edit_service.php?lang=<?php echo $language['language_code']; ?>&id=<?php echo $service['service_id']; ?>"><?php echo $language['language_name']; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </td>
                                <td align="left" width="50px" class="padding-left-0">
                                  <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_service.php?id=<?php echo $service['service_id']; ?>">
                                    <?php echo _DELETEITEM; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php if (!empty($services)):?>
<?php require 'pagination.php'; ?>
<?php endif; ?>

</div>
</div>
</div>
</div>
</div>
</section>
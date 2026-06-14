<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                    <h5 class="text-truncate"><?php echo _PARTNERS; ?></h5>
                            
                        </div>
                    </div>

                    <div class="col-12 c-col-12">
                        <a class="btn btn-primary" href="../controller/new_partner.php">
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
        <?php foreach($partners as $partner): ?>
            <tr>
            	<td><?php echo $partner['partner_id']; ?></td>
                              <td class="product">
                <img class="product-img product-img-p" src="../../images/<?php echo $partner['partner_image']; ?>">
                </td>
                <td><?php echo echoOutput($partner['partner_name']); ?></td>
                <td class="status td-justify">
                <?php
                if ($partner['partner_status'] == 1) {
                    echo '<span class="badge badge-pill bg-success">'._ACTIVE.'</span>';
                }else{
                    echo '<span class="badge badge-pill bg-warning">'._INACTIVE.'</span>';
                }
                ?>
                </td>
                <td align="right" width="50px" class="padding-right-5">

<a class="btn btn-small btn-primary" href="../controller/edit_partner.php?id=<?php echo $partner['partner_id']; ?>">
                    <?php echo _EDITITEM; ?>
                </a>

                </td>
                <td align="left" width="50px" class="padding-left-0">
                        <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_partner.php?id=<?php echo $partner['partner_id']; ?>">
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

<?php if (!empty($partners)):?>
<?php require 'pagination.php'; ?>
<?php endif; ?>

    </div>
</div>
</div>
</div>
</div>
</section>
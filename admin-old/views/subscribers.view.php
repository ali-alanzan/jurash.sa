<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
          <h5 class="text-truncate"><?php echo _SUBSCRIBERS; ?></h5>
        </div>

        <div class="row">
          
          <div class="col-12 c-col-12">
            <?php echo _TOTALITEMS; ?> <?php echo $number_total; ?>
          </div>

                    <div class="col-12">
                        <div class="block table-block mb-4 c-4">

                            <div class="row">
                                <div class="table-responsive">
                                    <table class="display table table-striped">
                                        <thead>
                                            <tr>
                                               <th><?php echo _TABLEFIELDID; ?></th>
                                               <th><?php echo _TABLEFIELDUSEREMAIL; ?></th>
                                               <th></th>
                                           </tr>
                                       </thead>
                                    <tbody>
                                        <?php foreach($subscribers as $subscriber): ?>
                                            <tr>
                                               <td><?php echo $subscriber['subscriber_id']; ?></td>
                                               <td><?php echo echoOutput($subscriber['subscriber_email']); ?></td>
                                            <td align="left" width="50px" class="padding-left-0">
                                                <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_subscriber.php?id=<?php echo $subscriber['subscriber_id']; ?>">
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

        <?php if (!empty($subscribers)):?>
            <?php require 'pagination.php'; ?>
        <?php endif; ?>

          </div>
      </div>
  </div>
</div>
</div>
</section>
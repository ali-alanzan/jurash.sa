<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
<div class="page-content-wrapper">

<!--Main Content-->

<div class="content sm-gutter">
<div class="container-fluid padding-25 sm-padding-10">

    <div class="section-title">
        <h5 class="text-truncate"><?php echo _PAGES; ?></h5>
    </div>

    <div class="row">
      
        <div class="col-12 c-col-12">
            <a class="btn btn-primary" href="../controller/new_page.php">
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
                                    <th><?php echo _TABLEFIELDTITLE; ?></th>
                                    <th><?php echo _TABLEFIELDSTATUS; ?></th>
                                    <th><?php echo _TABLEFIELDVISIBILITY; ?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pages as $page): ?>
                                    <tr>
                                       <td><?php echo $page['page_id']; ?></td>
                                       <td>
                                        <?php echo echoOutput($page['tr_title']); ?>
                                        <?php echo !(is_default_page($connect, $page['page_id'])) ? NULL : '<small> - '._PAGEISDEFAULT.'</small>' ?>
                                       </td>
                                       <td class="status td-justify">
                                        <?php
                                        if ($page['page_visibility'] == 1) {
                                            echo '<span class="badge badge-pill bg-success">'._ACTIVE.'</span>';
                                        }else{
                                            echo '<span class="badge badge-pill bg-warning">'._INACTIVE.'</span>';
                                        }
                                        ?>
                                    </td>
                                       <td>
                                      <?php
                                      if ($page['page_private'] == 1) {
                                      echo '<span>'._PAGEHIDDEN.'</span>';
                                      }else{
                                      echo '<span>'._PAGEPUBLIC.'</span>';
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
                                            $languages = get_languages_by_page($connect, $page['page_id']);

                                            foreach ($languages as $language){
                                                ?> 
                                                <a class="dropdown-item" href="../controller/edit_page.php?lang=<?php echo $language['language_code']; ?>&id=<?php echo $page['page_id']; ?>"><?php echo $language['language_name']; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </td>
                                <td align="left" width="50px" class="padding-left-0">

                                <?php if (is_default_page($connect, $page['page_id'])) { ?>

                                    <a class="btn btn-small btn-danger btn-delete cursor-not" disabled="">
                                      <?php echo _DELETEITEM; ?>
                                  </a>

                                <?php } else{ ?>

                                    <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_page.php?id=<?php echo $page['page_id']; ?>">
                                      <?php echo _DELETEITEM; ?>
                                  </a>

                                <?php } ?>

                              </td>
                          </tr>
                      <?php endforeach; ?>

                  </tbody>
              </table>

          </div>
      </div>
  </div>

<?php if (!empty($pages)):?>
<?php require 'pagination.php'; ?>
<?php endif; ?>

</div>
</div>
</div>
</div>
</div>
</section>
<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
          <h5 class="text-truncate"><?php echo _CITIES; ?></h5>
        </div>

        <div class="row">

          <div class="col-12 c-col-12">
            <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> <?php echo _ADDITEM; ?></button>
          </div>

          <div class="col-12">
            <div class="block table-block mb-4 c-4">

              <div class="row">
                <div class="table-responsive">
                  <table class="display table table-striped">
                    <thead>
                      <tr>
                       <th><?php echo _TABLEFIELDID; ?></th>
                       <th><?php echo _TABLEFIELDNAME; ?></th>
                       <th><?php echo _TABLEFIELDFEATURED; ?></th>
                       <th></th>
                       <th></th>
                     </tr>
                   </thead>

                  <tbody>
                    <?php foreach($cities as $city): ?>
                      <tr>
                       <td><?php echo $city['pt_city_id']; ?></td>
                       <td><?php echo echoOutput($city['tr_name']); ?></td>
                       <td class="status td-justify">
                        <?php
                        $status = $city['pt_city_featured'];
                        if ($status == 1) {
                          echo '<span class="badge badge-pill bg-success">'._YESTEXT.'</span>';
                        }else{
                          echo '<span class="badge badge-pill bg-warning">'._NOTEXT.'</span>';
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
                            $languages = get_languages_by_city($connect, $city['pt_city_id']);
                            foreach ($languages as $language){
                            ?> 
                            
                              <a class="dropdown-item" href="../controller/edit_city.php?lang=<?php echo $language['language_code']; ?>&id=<?php echo $city['pt_city_id']; ?>"><?php echo $language['language_name']; ?></a>
                            <?php } ?>
                          </div>
                        </div>

                      </td>
                      <td align="left" width="50px" class="padding-left-0">
                        <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_city.php?id=<?php echo $city['pt_city_id']; ?>">
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

        <?php if (!empty($cities)):?>
            <?php require 'pagination.php'; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
</div>
</section>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><?php echo _ADDITEM; ?></h4>
  </div>
  <div class="modal-body">
    <form enctype="multipart/form-data" method="post" id="insertCities">
     <label class="control-label"><?php echo _TABLEFIELDNAME; ?></label>
     <input type="text" name="tr_name" id="tr_name" class="form-control" required="" />
     <br />
     <br>
     <label class="control-label"><?php echo _TABLEFIELDLANG; ?></label>

     <select class="custom-select form-control" name="tr_lang" required="">
       <?php foreach($activelanguages as $language): ?>
         <option value="<?php echo $language['language_code']; ?>"><?php echo $language['language_name']; ?></option>
       <?php endforeach; ?>
     </select>
     <br>
     <br>

     <input type="submit" name="insert" id="insert" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" />

   </form>
 </div>
</div>
</div>
</div>
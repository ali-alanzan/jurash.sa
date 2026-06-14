<?php require 'sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
          <h5 class="text-truncate"><?php echo _PROPERTIES; ?></h5>
           
        </div>

        <div class="row">
          
          <div class="col-12 padding-right-20">
            <div class="inline-block">

              <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-download add-new-i"></i> <?php echo _EXPORT; ?>
                </button>
                <div class="dropdown-menu min-width" aria-label="dropdownMenuButton">
                  <a class="dropdown-item" data-toggle="modal" data-target="#xls_modal" class="pointer">Excel</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#json_modal" class="pointer">Json</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#xml_modal" class="pointer">Xml</a>
                  
                </div>
              </div>
              
            </div>
            <div class="float-r">
              <a class="btn btn-primary" href="../controller/new_property.php">
                <i class="fa fa-plus add-new-i"></i> <?php echo _ADDITEM; ?>
              </a>
            </div>
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
                        <th><?php echo _TABLEFIELDTITLE; ?></th>
                        <th><?php echo _TABLEFIELDPRICE; ?></th>
                        <th><?php echo _TABLEFIELDAREA; ?></th>
                        <th><?php echo _TABLEFIELDSTATUS; ?></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach($properties as $property): ?>
                        <tr>
                         <td><?php echo echoOutput($property['pt_id']); ?></td>
                         <td class="product">
                          <img class="product-img product-img-p" src="../../images/<?php echo $property['pt_image']; ?>">
                        </td>
                        <td><?php echo echoOutput($property['tr_title']); ?></td>
                        <td><?php echo getPrice($property['pt_price'], $siteSettings); ?></td>
                        <td><?php echo echoOutput($property['pt_size']); ?> <span class="text-capitalize"><?php echo $siteSettings['st_unit']; ?></span></td>
                        <td class="status td-justify">
                        <?php
                        if ($property['pt_visibility'] == 1) {
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
                              
                              <?php $languages = get_languages_by_property($connect, $property['pt_id']); ?>
                              <?php foreach($languages as $language): ?>

                                <a class="dropdown-item" href="../controller/edit_property.php?lang=<?php echo $language['language_code']; ?>&id=<?php echo $property['pt_id']; ?>"><?php echo $language['language_name']; ?></a>
                              <?php endforeach; ?>
                              
                            </div>
                          </div>

                        </td>
                        <td align="left" width="50px" class="padding-left-0">
                          <a class="btn btn-small btn-danger btn-delete deleteItem" data-url="../controller/delete_property.php?id=<?php echo $property['pt_id']; ?>">
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

        <?php if (!empty($properties)):?>
            <?php require 'pagination.php'; ?>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
</section>


<div id="xls_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Excel</h4>
  </div>
  <div class="modal-body">
    
    <table class="table">

      <?php foreach($properties_languages as $plang): ?>

        <tr>
          <td class="td-middle"><?php echo $plang['language_name']; ?></td>
          <td align="right">
            <a class="btn btn-small btn-success" href="../export/xls/properties.php?lang=<?php echo $plang['language_code']; ?>">
              <?php echo _DOWNLOAD; ?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (!$properties_languages): ?>
        <p class="text-center"><?php echo _NOITEMSFOUND; ?></p>
      <?php endif; ?>

    </table>

  </div>
</div>
</div>
</div>


<div id="json_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">JSON</h4>
  </div>
  <div class="modal-body">
    
    <table class="table">

      <?php foreach($properties_languages as $plang): ?>

        <tr>
          <td class="td-middle"><?php echo $plang['language_name']; ?></td>
          <td align="right">
            <a class="btn btn-small btn-success" href="../export/json/properties.php?lang=<?php echo $plang['language_code']; ?>">
              <?php echo _DOWNLOAD; ?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (!$properties_languages): ?>
        <p class="text-center"><?php echo _NOITEMSFOUND; ?></p>
      <?php endif; ?>

    </table>

  </div>
</div>
</div>
</div>

<div id="xml_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">XML</h4>
  </div>
  <div class="modal-body">
    
    <table class="table">

      <?php foreach($properties_languages as $plang): ?>

        <tr>
          <td class="td-middle"><?php echo $plang['language_name']; ?></td>
          <td align="right">
            <a class="btn btn-small btn-success" href="../export/xml/properties.php?lang=<?php echo $plang['language_code']; ?>">
              <?php echo _DOWNLOAD; ?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (!$properties_languages): ?>
        <p class="text-center"><?php echo _NOITEMSFOUND; ?></p>
      <?php endif; ?>

    </table>

  </div>
</div>
</div>
</div>
<?php
echo '<div class="modal fade" id="view'.$c->getId().'" tabindex="-1" role="dialog" aria-labelledby="'.$c->getId().'viewlabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="'.$c->getId().'label">' . $strings["service_data"] . ': </h4>
            </div>
            <div class="modal-body">';

//DATOS DO CLIENTE
echo '  
            <div class="row">
                <div class="col-xs-12 col-md-12">
                        <label for="">' . $strings["date"] . ': </label>
                        <span class="">' . $c->getFecha() . '</span>

                    <!--Campo date-->
                </div>
                <div class="col-xs-12 col-md-12">
                        <label for="">' . $strings["cost"] . ': </label>
                        <span class="">' . $c->getCoste(). '</span>

                    <!--Campo cost-->
                </div>
              
                <div class="col-xs-12 col-md-12">
                        <label for="">' . $strings["description"] . ': </label>
                        <span class="">' . $c->getDescripcion() . '</span>

                    <!--Campo description-->
                </div>
                
                <div class="col-xs-12 col-md-12">
                        <label for="">' . $strings["dni"] . ': </label>
                        <span class="">' . $c->getDniClienteExterno() . '</span>

                    <!--Campo dni-->
                </div>

            </div><div class="modal-footer">
                
                <button type="button" class="btn btn-success" data-dismiss="modal">
                <i class="fa fa-tick"></i>'.$strings["okay"].'</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>';

?>

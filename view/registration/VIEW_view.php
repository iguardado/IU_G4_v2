<?php
echo '
    <div class="modal fade" id="view'. $c->getCodRegistration(). '" tabindex="-1" role="dialog" aria-labelledby="'. $c->getCodRegistration() .'viewlabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="'.$c->getCodRegistration().'label">' . $strings["registration_data"] . ': </h4>
                </div>
            <div class="modal-body">';
//DATOS DO USUARIO A BORRAR
echo '
        <div class="row">
            <label for="">' . $strings["code"] . ': </label>
            <span class="">' . $c->getCodRegistration() . '</span>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                    <label for="">' . $strings["one_reserve"] . ': </label>
                    <span class="">' . $c->getCodReserve() . '</span>                                                                
                <!--Campo reserve-->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                    <label for="">' . $strings["one_payment"] . ': </label>
                    <span class="">' . $c->getIdPago() . '</span>                                                                
                <!--Campo payment-->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                    <label for="">' . $strings["date"] . ': </label>
                    <span class="">' . $c->getDate() .'</span>                                                                                                                                 
                <!--Campo date-->
            </div>
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
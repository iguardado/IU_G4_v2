 <?php  
 echo '
                                    <div class="modal fade" id="confirmar'.$c->getIdSession().'" tabindex="-1" role="dialog" aria-labelledby="'.$c->getIdSession().'label" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="'.$c->getIdSession().'label">'.$strings["confirm_message"].' '.$c->getIdSession().'?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                     <label for="">' . $strings["action_data"] . ': </label>';
                                                                //DATOS DO USUARIO A BORRAR
                                                               echo '  
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-md-12">
                                                                            <label for="">' . $strings["name"] . ': </label>
                                                                            <span class="">' . $c->getIdSession() . '</span>

                                                                        <!--Campo ususario-->
                                                                    </div></div></div><div class="modal-footer">
                                                                    
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">'.$strings["cancel"].'</button>
                                                                    
                                                                    <a href="index.php?controller=session&action=delete&sessionid=' . $c->getIdSession().'">
                                                                    <button type="button" class="btn btn-danger">'.$strings["DELETE"].'</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>';

                                                    ?>
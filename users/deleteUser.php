<!--Eliminar usuario-->
<div class="text-center buttonEditWrapper">
                                        <button class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit"
                                          disabled>Editar registro<i class="fas fa-pencil-square-o ml-1"></i></a>
                                      </div>
                                  
                                      <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">Eliminar</h4>
                                              <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                              <p class="text-center h4">¿Está seguro de que desea eliminar el registro del usuario xxxxx?</p>
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                                              <button type="button" class="btn btn-danger btnYesClass" id="btnYes" data-dismiss="modal">Sí</button>
                                              <button type="button" class="btn btn-primary btnNoClass" id="btnNo" data-dismiss="modal">No</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    
                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonDelete" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Eliminar<i class="fas fa-times ml-1"></i></a>
                                      </div>

                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonView" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Ver Registro<i class="fas fa-times ml-1"></i></a>
                                      </div>
                                    </div>
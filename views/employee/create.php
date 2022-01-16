<?php
    include_once("models/employee.php");

    $selectAreas = employee::selectAreas();
    $roles = employee::roles();
?>
<div class="container-gm pt-2" >
            <form action="" method="post" onsubmit=" return validateEmployee()">
                <fieldset>
                    <h1>Crear empleado</h1>
                    <div class="alert alert-primary-gm" role="alert">
                        Los campos con astericos(*) son obligatorios
                    </div>
                    
                    <div class="p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="nombre" class="col-form-label col-sm-2 label-gm label-text-gm">Nombre completo *</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" id="name" class="form-control" placeholder="Nombre completo del empleado" tabindex="1" onkeypress="return soloTexto(event);" require />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group row">
                                    <label for="apellido" class="col-form-label col-sm-2 label-gm label-text-gm">Correo electrónico *</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Correo electrónico" tabindex="2" onkeypress="return soloAlfanumerico(event);" require/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="form-group row">
                                    <label for="apellido" class="col-form-label col-sm-2 label-gm label-text-gm">Sexo *</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input sex" type="radio" name="sex" value="M" />
                                            <label class="form-check-label sex" for="flexRadioDefault1">
                                                Masculino
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" value="F" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Femenino
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                 <?php echo $selectAreas ?>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group row">
                                    <label for="apellido" class="col-form-label col-sm-2 label-gm label-text-gm">Descripción *</label>
                                    <div class="col-sm-10">
                                        <div class="form-floatin">
                                            <textarea class="form-control" placeholder="Descripción de la experiencia del empleado" name ="description" id="description" style="height: 100px" onkeypress="return soloAlfanumerico(event);" require></textarea>
                                        </div>
                                        <div class="form-check pt-4">
                                            <input class="form-check-input" type="checkbox" value="" id="boletin" name="boletin">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                    Deseo recibir boletín informativo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group row">
                                    <label for="rol" class="col-form-label col-sm-2 label-gm label-text-gm">Roles *</label>
                                   <?php echo $roles ?>
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group row">
                    
                                    <div for="apellido" class="col-form-label col-sm-2 label-gm label-text-gm">
                                    </div>
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary-gm"">Guardar</button>
                                    
                                    </div>
                                </div>
                            </div>
         
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
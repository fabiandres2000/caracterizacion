<template lang="">
    <div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">FORMULARIO DE CARACTERIZACIÓN POBLACIÓN AFRODESCENDIENTES</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-underline" role="tablist">
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-user-edit"></i>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-globe-americas"></i>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-school"></i>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab24" data-toggle="tab" aria-controls="tabIcon24" href="#tabIcon24" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-user-tie"></i>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab25" data-toggle="tab" aria-controls="tabIcon25" href="#tabIcon25" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-hospital-user"></i>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab26" data-toggle="tab" aria-controls="tabIcon26" href="#tabIcon26" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-people-carry"></i> 
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab27" data-toggle="tab" aria-controls="tabIcon27" href="#tabIcon27" role="tab" aria-selected="false">
                                    <i style ="font-size: 25px" class="fas fa-house-user"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div class="tab-pane active" id="tabIcon21" role="tabpanel" aria-labelledby="baseIcon-tab21">
                                <br>
                                <h2 style="color: #2f8a96"> INFORMACIÓN PERSONAL </h2>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for=""><strong>Rol del individuo</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.rol" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione el rol del individuo</option>
                                                <option value="Jefe de hogar">Jefe de Hogar</option>
                                                <option value="Madre Soltera">Madre Soltera</option>
                                                <option value="Padre soltero">Padre soltero</option>
                                                <option value="Padre soltero">Integrante de hogar</option>
                                            </select>
                                            <div class="form-control-position">
                                                <i style ="font-size: 14px" class="feather icon-unlock  font-medium-4"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="informacion_personal.rol != 'Jefe de hogar'">
                                        <label for=""><strong>Jefe de Hogar</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.nombre_jefe" style="cursor: pointer" type="text" class="form-control form-control-lg mb-1"  placeholder="Seleccione su jefe de hogar">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-user-tie"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for=""><strong>Dirección</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.direccion" type="text" class="form-control form-control-lg mb-1"  placeholder="Dirección">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-map-marked-alt"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for=""><strong>Nombre completo</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.nombre_completo" type="text" class="form-control form-control-lg mb-1"  placeholder="Nombre Completo">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-id-card"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Fecha de nacimiento</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.fecha_nacimiento" type="date" class="form-control form-control-lg mb-1"  placeholder="Fecha de nacimiento">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-calendar-alt"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Tipo de identificación</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.tipo_identificacion" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Tipo de Identificación</option>
                                                <option value="CC">Cédula de Ciudadanía</option>
                                                <option value="TI">Tarjeta de  Identidad</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                                <option value="Registro Civil">Registro Civil</option>
                                                <option value="Permiso Especial de Permanencia ">Permiso Especial de Permanencia </option>
                                                <option value="No Tiene ">No Tiene </option>
                                            </select>                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-id-card-alt"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Número de identificación</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.numero_identificacion" type="number" class="form-control form-control-lg mb-1"  placeholder="Número de Identificación">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-hashtag"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Dirección de residencia</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.direccion_residencia" type="text" class="form-control form-control-lg mb-1"  placeholder="Dirección de residencia">
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-map-marked-alt"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Sexo</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.sexo" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Otros">Otros</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-venus-mars"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="informacion_personal.sexo == 'Otros'">
                                        <label for=""><strong>¿Cual?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.cual_sexo" type="text" class="form-control form-control-lg mb-1"  placeholder="Cual sexo?">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Identidad de genero</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.identidad_genero" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                                <option value="No binario">No binario</option>
                                                <option value="Génerofluida">Génerofluida</option>
                                                <option value="Bigénero">Bigénero</option>
                                                <option value="Andrógino">Andrógino</option>
                                                <option value="Demiboy">Demiboy</option>
                                                <option value="Demigirl">Demigirl</option>
                                                <option value="Transgénero">Transgénero</option>
                                                <option value="Cisgénero">Cisgénero</option>
                                                <option value="Neutrois">Neutrois</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-users"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Orientación sexual</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.orientacion_sexual" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Heterosexual">Heterosexual</option>
                                                <option value="Homosexual">Homosexual</option>
                                                <option value="Bisexual">Bisexual</option>
                                                <option value="Pansexual">Pansexual</option>
                                                <option value="Asexual">Asexual</option>
                                                <option value="Queer">Queer</option>
                                                <option value="Cuarsosexual">Cuarsosexual </option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-users"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Estado civil</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.estado_civil" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Soltero">Soltero</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Divorciado">Divorciado</option>
                                                <option value=">Viudo(a)">Viudo(a)</option>
                                                <option value="Unión Libre">Unión Libre</option>
                                                <option value="Otro">Otro</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-user-friends"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="informacion_personal.estado_civil == 'Otro'">
                                        <label for=""><strong>¿Cual?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.cual_estado_civil" type="text" class="form-control form-control-lg mb-1"  placeholder="Cual estado civil?">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Creencia religiosa</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.creencia_religiosa" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Cristianos evangélicos">Cristianos evangélicos</option>
                                                <option value="Católicos">Católicos</option>
                                                <option value="Testigos de Jehova">Testigos de Jehova</option>
                                                <option value="Protestantes">Protestantes</option>
                                                <option value="Ateos">Ateos</option>
                                                <option value="Otros">Otros</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-church"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="informacion_personal.creencia_religiosa == 'Otros'">
                                        <label for=""><strong>¿Cual?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.cual_creencia_religiosa" type="text" class="form-control form-control-lg mb-1"  placeholder="Cual religión?">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>¿Tiene usted adicciones?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.adicciones" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Cigarrillo">Cigarrillo</option>
                                                <option value="Alcohol">Alcohol</option>
                                                <option value="Juegos">Juegos</option>
                                                <option value="Drogas">Drogas</option>
                                                <option value="Otros">Otros</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-people-arrows"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="informacion_personal.adicciones == 'Otros'">
                                        <label for=""><strong>¿Cual?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.cual_adicciones" type="text" class="form-control form-control-lg mb-1"  placeholder="Cual adicción?">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>Hace cuanto tiempo vive en el municipio? (Meses)</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="informacion_personal.tiempo_municipo" type="number" class="form-control form-control-lg mb-1"  placeholder="Tiempo en meses">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-calendar-day"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>¿Es usted desplazado?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="informacion_personal.desplazado" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-people-arrows"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 text-right" style="padding-top: 20px">
                                        <button @click="validarCamposInformacionPersonal()" class="btn btn-success">Guardar y continuar <i style="font-size: 13px" class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabIcon22" role="tabpanel" aria-labelledby="baseIcon-tab22">
                                <br>
                                <h2 style="color: #2f8a96"> ORIGEN E IDENTIDAD </h2>
                                <hr>
                                <br>
                                <label for=""><strong>1. Lugar de Nacimiento </strong></label>
                                <div class="row" style="margin-top: 37px">
                                    <div class="col-lg-4">
                                        <label for=""><strong>País</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="origen_identidad.pais" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="COLOMBIA">COLOMBIA</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-globe-africa"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for=""><strong>Departamento</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select @change="consultarMunicipios()" v-model="origen_identidad.departamento" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option v-for="(item, index) in departamentos" :key="index" :value="item.codigo">{{ item.descripcion }}</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-map-marked-alt"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for=""><strong>Municipio</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="origen_identidad.municipio" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option v-for="(item, index) in municipios" :key="index" :value="item.codmun">{{ item.descripcion }}</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-city"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <br><br>
                                <label for=""><strong>2. Selecciona la etnia a la que pertenece</strong></label>
                                <div class="row" style="margin-top: 37px">
                                    <div class="col-lg-3" style="margin-bottom: 20px">
                                        <input v-model="origen_identidad.etnia" type="radio" id="control_01" name="select" value="Palenqueros" >
                                        <label class="lradio" for="control_01">
                                            <p>Palenqueros</p>
                                        </label>
                                    </div>
                                    <div class="col-lg-3" style="margin-bottom: 20px">
                                        <input v-model="origen_identidad.etnia" type="radio" id="control_02" name="select" value="Raizales">
                                        <label class="lradio" for="control_02">
                                            <p>Raizales</p>
                                        </label>
                                    </div>
                                    <div class="col-lg-3" style="margin-bottom: 20px">
                                        <input v-model="origen_identidad.etnia" type="radio" id="control_03" name="select" value="Afrocolombianos del pacifico">
                                        <label class="lradio" for="control_03">
                                            <p>Afrocolombianos del pacifico (Chocó, Valle del Cauca, Cauca y Antioquia )</p>
                                        </label>
                                    </div>
                                    <div class="col-lg-3" style="margin-bottom: 20px">
                                        <input v-model="origen_identidad.etnia" type="radio" id="control_05" name="select" value="Afrocolombianos de la región caribe">
                                        <label class="lradio" for="control_05">
                                            <p>Afrocolombianos de la región caribe.</p>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 text-right" style="padding-top: 20px">
                                        <button @click="eliminarActive('baseIcon-tab21', 'tabIcon21')" class="btn btn-danger" style="margin-right: 20px"><i style="font-size: 13px" class="fas fa-arrow-left"></i> Anterior</button>
                                        <button @click="validarCamposOrigenIdentidad()" class="btn btn-success">Guardar y continuar <i style="font-size: 13px" class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabIcon23" role="tabpanel" aria-labelledby="baseIcon-tab23">
                                <br>
                                <h2 style="color: #2f8a96"> EDUCACIÓN </h2>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for=""><strong>1. Nivel educativo </strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select v-model="educacion.nivel_educativo" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option v-for="(item, index) in escolaridades" :key="index" :value="item.id">{{ item.descripcion }}</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-school"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6" v-if="educacion.nivel_educativo == 23">
                                        <label for=""><strong>¿Cual?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input v-model="educacion.cual_nivel_educativo" type="text" class="form-control form-control-lg mb-1"  placeholder="Cual nivel educativo?">                                    
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>2. ¿ha recibido educación específica sobre la cultura afrocolombiana?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select  v-model="educacion.educacion_especifica" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>3. ¿ha enfrentado barreras para acceder a la educación?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select  v-model="educacion.barreras_educacion" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>4. ¿ha experimentado discriminación racial o étnica en el entorno educativo? </strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select  v-model="educacion.descriminacion_racial" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                                <option value="N.A">N.A</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><strong>5. ¿recibe algún tipo de apoyo educativo adicional?</strong></label>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select  v-model="educacion.apoyo_educativo" class="form-control form-control-lg mb-1" name="" id="">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                                <option value="N.A">N.A</option>
                                            </select>                                            
                                            <div class="form-control-position">
                                                <i style="font-size: 19px" class="fas fa-question"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 text-right" style="padding-top: 20px">
                                        <button @click="eliminarActive('baseIcon-tab22', 'tabIcon22')" class="btn btn-danger" style="margin-right: 20px"><i style="font-size: 13px" class="fas fa-arrow-left"></i> Anterior</button>
                                        <button @click="validarCamposOrigenEducacion()" class="btn btn-success">Guardar y continuar <i style="font-size: 13px" class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabIcon24" role="tabpanel" aria-labelledby="baseIcon-tab24">
                                <br>
                                <h2 style="color: #2f8a96"> SITUACIÓN LABORAL </h2>
                                <hr>
                                <br>                            
                            </div>
                            <div class="tab-pane" id="tabIcon25" role="tabpanel" aria-labelledby="baseIcon-tab25">
                                <br>
                                <h2 style="color: #2f8a96"> SALUD </h2>
                                <hr>
                                <br>
                            </div>
                            <div class="tab-pane" id="tabIcon26" role="tabpanel" aria-labelledby="baseIcon-tab26">
                                <br>
                                <h2 style="color: #2f8a96"> CULTURA Y TRADICIONES </h2>
                                <hr>
                                <br>
                            </div>
                            <div class="tab-pane" id="tabIcon27" role="tabpanel" aria-labelledby="baseIcon-tab27">
                                <br>
                                <h2 style="color: #2f8a96"> VIVIENDA Y HOGAR </h2>
                                <hr>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import * as usuarioService from "../services/usuario_service.js";
import * as caracterizacionService from "../services/caracterizacion_service";
import Swal from 'sweetalert2';

export default {
    components: {
    },
    mounted() {
        this.misDatos();
        this.verificarLogin();
        this.consultarDepartamentos();
        this.consultarEscolaridades();
    },
    data() {
        return {
            informacion_personal: {
                rol: "",
                id_jefe: "",
                nombre_jefe: "",
                direccion: "",
                nombre_completo: "",
                fecha_nacimiento: "",
                tipo_identificacion: "",
                numero_identificacion: "",
                direccion_residencia: "",
                sexo: "",
                cual_sexo: "",
                identidad_genero: "",
                orientacion_sexual: "",
                estado_civil: "",
                cual_estado_civil: "",
                creencia_religiosa: "",
                cual_creencia_religiosa: "",
                adicciones: "",
                cual_adicciones: "",
                tiempo_municipo: "",
                desplazado: ""
            },
            errores: "",
            loading: false,
            departamentos: [],
            municipios: [],
            origen_identidad: {
                identificacion_individuo: null,
                pais: "COLOMBIA",
                departamento: "",
                municipio: "",
                etnia: ""
            },
            escolaridades: [],
            educacion: {
                identificacion_individuo: null,
                nivel_educativo: "",
                cual_nivel_educativo: "",
                educacion_especifica: "",
                barreras_educacion: "",
                descriminacion_racial: "",
                apoyo_educativo: ""
            }
        }
    },
    methods: {
        async verificarLogin(){
            var navigate = this.$router;
            await usuarioService.verificarLogin().then(respuesta => {
                if(respuesta.data == 0){
                    navigate.push({ name: 'loginPage'})
                }
            });
        },
        misDatos: async function () {
            this.loading = true;
            try {
                await usuarioService.misDatos().then(respuesta => {
                    this.datos = respuesta.data;
                    this.loading = false;
                });
            } catch (error) {
                console.log(error);
            }
        },
        eliminarActive(id, id2){
            document.getElementById("baseIcon-tab21").classList.remove("active");
            document.getElementById("baseIcon-tab22").classList.remove("active");
            document.getElementById("baseIcon-tab23").classList.remove("active");
            document.getElementById("baseIcon-tab24").classList.remove("active");
            document.getElementById("baseIcon-tab25").classList.remove("active");
            document.getElementById("baseIcon-tab26").classList.remove("active");
            document.getElementById("baseIcon-tab27").classList.remove("active");

            document.getElementById("tabIcon21").classList.remove("active");
            document.getElementById("tabIcon22").classList.remove("active");
            document.getElementById("tabIcon23").classList.remove("active");
            document.getElementById("tabIcon24").classList.remove("active");
            document.getElementById("tabIcon25").classList.remove("active");
            document.getElementById("tabIcon26").classList.remove("active");
            document.getElementById("tabIcon27").classList.remove("active");

            document.getElementById(id).classList.add("active");
            document.getElementById(id2).classList.add("active");
        },
        validarCamposInformacionPersonal() {
            this.errores = "";

            if (!this.informacion_personal.rol) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  rol </strong> no puede estar vacío <br>`;
            }


            if (!this.informacion_personal.direccion) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  dirección </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.nombre_completo) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  nombre </strong> no puede estar vacío <br>`;
            }

            if (this.informacion_personal.fecha_nacimiento == "") {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  fecha de nacimiento </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.tipo_identificacion) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  tipo de identificación </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.numero_identificacion) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  número de identificación </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.direccion_residencia) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  dirección de residencia </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.sexo) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  sexo </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.identidad_genero) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  identidad de genero </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.orientacion_sexual) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  orientación sexual </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.estado_civil) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  estado civil </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.creencia_religiosa) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  creencia religiosa </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.adicciones) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  adicciones </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.tiempo_municipo) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  tiempo de residencia </strong> no puede estar vacío <br>`;
            }

            if (!this.informacion_personal.desplazado) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  desplazado </strong> no puede estar vacío <br>`;
            }


            if (this.informacion_personal.rol != "Jefe de hogar" && this.informacion_personal.id_jefe == "") {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  jefe de hogar </strong> no puede estar vacío <br>`;
            }



            if (this.errores.length === 0) {
                this.guardarInformacionPersonal();
            } else {
                Swal.fire({
                    width: 600,
                    icon: "error",
                    title: "Información Importante",
                    html: this.errores,
                });
            }
        },
        async guardarInformacionPersonal(){
            this.loading = true;
            try {
                await caracterizacionService.guardarInformacionTemporal(this.informacion_personal).then(respuesta => {
                    var response = respuesta.data;
                    this.loading = false;
                    if(response.code == 1){
                        toastr.success(response.mensaje);
                        this.eliminarActive("baseIcon-tab22", "tabIcon22");
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Información Importante",
                            text: response.mensaje,
                        });
                    }
                });
            } catch (error) {
                console.log(error);
            }
        },
        async consultarDepartamentos(){
            await caracterizacionService.departamentos().then(respuesta => {
                this.departamentos = respuesta.data;
            });
        },
        async consultarMunicipios(){
            this.origen_identidad.municipio = "";
            await caracterizacionService.municipios(this.origen_identidad.departamento).then(respuesta => {
                this.municipios = respuesta.data;
            });
        },
        validarCamposOrigenIdentidad(){
            this.errores = "";

            if (!this.origen_identidad.departamento) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  departamento </strong> no puede estar vacío <br>`;
            }


            if (!this.origen_identidad.municipio) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  municipio </strong> no puede estar vacío <br>`;
            }

            if (!this.origen_identidad.etnia) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  etnia </strong> no puede estar vacío <br>`;
            }

            if (this.errores.length === 0) {
                this.origen_identidad.identificacion_individuo = this.informacion_personal.numero_identificacion;
                this.guardarOrigenIdentidad();
            } else {
                Swal.fire({
                    width: 600,
                    icon: "error",
                    title: "Información Importante",
                    html: this.errores,
                });
            }
        },
        async guardarOrigenIdentidad(){
            this.loading = true;
            try {
                await caracterizacionService.guardarOrigenIdentidad(this.origen_identidad).then(respuesta => {
                    var response = respuesta.data;
                    this.loading = false;
                    if(response.code == 1){
                        toastr.success(response.mensaje);
                        this.eliminarActive("baseIcon-tab23", "tabIcon23");
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Información Importante",
                            text: response.mensaje,
                        });
                    }
                });
            } catch (error) {
                console.log(error);
            }
        },
        async consultarEscolaridades(){
            await caracterizacionService.escolaridad().then(respuesta => {
                this.escolaridades = respuesta.data;
            });
        },
        validarCamposOrigenEducacion(){
            this.errores = "";

            if (!this.educacion.apoyo_educativo) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  apoyo educativo </strong> no puede estar vacío <br>`;
            }

            if (!this.educacion.barreras_educacion) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">   barreras para acceder a la educación </strong> no puede estar vacío <br>`;
            }

            if (!this.educacion.descriminacion_racial) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  discriminación racial  </strong> no puede estar vacío <br>`;
            }

            if (!this.educacion.educacion_especifica) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  educación específica sobre la cultura  </strong> no puede estar vacío <br>`;
            }

            if (!this.educacion.nivel_educativo) {
                this.errores += `<i style ="font-size: 12px" class="fas fa-circle"></i> El campo <strong style="color: #2f95a2">  nivel educativo </strong> no puede estar vacío <br>`;
            }

            if (this.errores.length === 0) {
                this.educacion.identificacion_individuo = this.informacion_personal.numero_identificacion;
                this.guardarEducacion();
            } else {
                Swal.fire({
                    width: 600,
                    icon: "error",
                    title: "Información Importante",
                    html: this.errores,
                });
            }

        },
        async guardarEducacion(){
            this.loading = true;
            try {
                await caracterizacionService.guardarEducacion(this.educacion).then(respuesta => {
                    var response = respuesta.data;
                    this.loading = false;
                    if(response.code == 1){
                        toastr.success(response.mensaje);
                        this.eliminarActive("baseIcon-tab24", "tabIcon24");
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Información Importante",
                            text: response.mensaje,
                        });
                    }
                });
            } catch (error) {
                console.log(error);
            }
        }
    },
}
</script>
<style scoped>
    .nav-item a.nav-link.active {
        color: #2dcee3 !important;
    }
    .nav-item a.nav-link {
        color: #4e5154 !important;
    }

  
    input[type="radio"] {
        display: none;
        &:not(:disabled) ~ label {
            cursor: pointer;
        }
        &:disabled ~ label {
            color: hsla(150, 5%, 75%, 1);
            border-color: hsla(150, 5%, 75%, 1);
            box-shadow: none;
            cursor: not-allowed;
        }
    }

    label.lradio {
        height: 100%;
        display: block;
        background: white;
        border: 2px solid hsla(150, 75%, 50%, 1);
        border-radius: 20px;
        padding: 1rem;
        margin-bottom: 1rem;
        text-align: center;
        box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
        position: relative;
        padding-top: 19px;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .lradio p {
        margin-bottom: 0px !important;
    }

    input[type="radio"]:checked + label {
        background: hsla(150, 75%, 50%, 1);
        color: hsla(215, 0%, 100%, 1);
        box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
        &::after {
            color: hsla(215, 5%, 25%, 1);
            font-family: FontAwesome;
            border: 2px solid hsla(150, 75%, 45%, 1);
            content: "\f00c";
            font-size: 24px;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            height: 50px;
            width: 50px;
            line-height: 50px;
            text-align: center;
            border-radius: 50%;
            background: white;
            box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
        }
    }

</style>
<?php
    class Employee{

        public $id;
        public $name;
        public $email;
        public $sex;
        public $area_id;
        public $boletin;
        public $description;

        public function __construct($id,$name,$email,$sex,$area_id,$boletin,$description){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->sex = $sex;
            $this->area_id = $area_id;
            $this->boletin = $boletin;
            $this->description = $description;
        }

        public static function toList(){
            $listEmployee = [];
            $connetion = BD::createInstance();
            $sql = $connetion->query("SELECT * FROM empleado");
            
            foreach($sql->fetchAll() as $employee){
                $areaId = $employee["area_id"];
                $abrSex = $employee["sexo"];
                $boletin = $employee["boletin"];
                $conditionBoletin= $boletin == 1 ? 'Si' : 'No';
                $conditionSex = $abrSex == 'M' ? 'Masculino' : 'Femenino';
                $areaName = self::areaId($areaId);
                $listEmployee[]= new Employee(
                    $employee["id"],
                    $employee["nombre"],
                    $employee["email"],
                    $conditionSex,
                    $areaName,
                    $conditionBoletin,
                    $employee["descripcion"]
                );
            }


            return $listEmployee;

        }
        
        public static function create($name,$email,$area,$sex,$description,$boletin,$roles){

            $date = date("Y-m-d"); 
            $connetion = BD::createInstance();

            $sql = $connetion->prepare("INSERT INTO empleado(nombre, email, sexo, area_id, boletin, descripcion) VALUES (?,?,?,?,?,?)");
            $sql->execute(array($name,$email,$sex,$area,$boletin,$description));

            $idEmployee = $connetion->lastInsertId();

            $rolEmployee = self::createEmployeeRol($roles,$idEmployee);


        }

        public static function update($id,$name,$reference,$price,$weight,$category,$stock){
            $date = date("Y-m-d"); 
            $connetion = BD::createInstance();
        }

        public static function delete($id){

            $date = date("Y-m-d"); 
            $connetion = BD::createInstance();

            $sql = $connetion->prepare("DELETE FROM  empleado WHERE id=?");
            $sql->execute(array($id));
        }


        

        public static function areaId($id){
            $connetion = BD::createInstance();
            $sql = $connetion->prepare("SELECT * FROM areas WHERE id=?");
            $sql->execute(array($id));
            $areas = $sql->fetchAll();
            $name = $areas[0]["nombre"];
            
            return $name;
        }

        public static function selectAreas(){
            $connetion = BD::createInstance();
            $sql = $connetion->query("SELECT * FROM areas");
            $divs = "";

            foreach($sql as $v){
                $id = $v["id"];
                $name = $v["nombre"];

                $divs .=<<<HTML
                <option value="$id">$name</option>
HTML;
            }


                $html = <<<HTML
                <div class="form-group row">
                    <label for="area" class="col-form-label col-sm-2 label-gm label-text-gm">Area *</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="area" name="area" require>
                                <option value="0">Seleccione...</option>
                                $divs
                        </select>
                    </div>
                </div>
HTML;


            return $html;

        }

        public static function roles(){
            $connetion = BD::createInstance();
            $sql = $connetion->query("SELECT * FROM areas");
            $divs = "";
    
            foreach($sql as $v){
                $id = $v["id"];
                $name = $v["nombre"];
    
                $divs .=<<<HTML
                <div class="form-check pt-2">
                    <input class="form-check-input role" type="checkbox" name="role[]" id="$id" value="$id">
                    <label class="form-check-label" for="flexCheckDefault">
                        $name
                    </label>
                </div>
HTML;
            }
    
    
                $html = <<<HTML
               <div class="col-sm-10">
                    $divs                                              
                </div>
HTML;
    
    
            return $html;
    
        }

        public static function createEmployeeRol($roles,$idEmployee){
            $connetion = BD::createInstance();

            foreach($roles as $v){
                $sql = $connetion->prepare("INSERT INTO empleado_rol(empleado_id,rol_id ) VALUES (?,?)");
                $sql->execute(array($idEmployee,$v));
            }
            
        }
    }


?>
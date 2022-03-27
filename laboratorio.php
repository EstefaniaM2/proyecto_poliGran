<?php 
    require_once "models/laboratorio.model.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id_laboratorio'])) {

                echo json_encode(r_laboratorio::getWhere($_GET['id_laboratorio']));

            }else {

                echo json_encode(r_laboratorio::getAll());
            }
               
              
            break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (r_laboratorio::insert($datos->usuarios_id, $datos->Descriccion, $datos->Imagen)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else

             break;

             case 'PUT':   
                $datos = json_decode(file_get_contents('php://input')); //json->array
                if ($datos != NULL) {
                    if (r_laboratorio::update($datos->id_laboratorio,$datos->usuarios_id, $datos->Descriccion, $datos->Imagen)) {
                        http_response_code(200);
                    }//end if
                    else {
                        http_response_code(400);
                    }//end else
                }//end if
                else {
                    http_response_code(405);
                }//end else
    
                 break;

            
     
            
    
            case 'DELETE':
                if(isset($_GET['idlaboratorio'])) {
                    if (r_laboratorio::delete($_GET['idlaboratorio'])) {
                        http_response_code(200);
                    }//end if
                    else {
                        http_response_code(400);
                    }//end else
                }//end if
                else {
                    http_response_code(405);
                }//end elseeee
    
                 break;
    
            
        

      

        



        
    default:
    http_response_code(405);
    break;
    

}
?>
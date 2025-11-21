<?php

class Roles extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function roles()
	{
		$data['page_id'] = 3;
		$data['page_tag'] = "Roles Usuarios";
		$data['page_name'] = "rol_usuario";
		$data['page_title'] = "Roles de Usuarios <small>VACTIVA</small>";
		//$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "roles", $data);
	}

	public function getRoles()
	{
		$arrData = $this->model->selectRoles();
		for ($i = 0; $i < count($arrData); $i++) {
			if ($arrData[$i]['statusRol'] == 1) {
				$arrData[$i]['statusRol'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['statusRol'] = '<span class="badge badge-danger">Inactivo</span>';
			}
			$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-secondary btn-sm btnPermisosRol" rl="' . $arrData[$i]['idRol'] . '" title="Permisos"><i class="fas fa-key"></i></button>
				<button class="btn btn-info btn-sm btnEditRol" rl="' . $arrData[$i]['idRol'] . '" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelRol" rl="' . $arrData[$i]['idRol'] . '" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
				</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getRol(int $idRol)
	{
		$intIdRol = intval(strClean($idRol));
		if ($intIdRol > 0) {
			$arrData = $this->model->selectRol($intIdRol);
			if (empty($arrData)) {
				$arrResponse = array("status" => false, "msg" => 'Datos no encontrados.');
			} else {
				$arrResponse = array("status" => true, "data" => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setRol()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$intidRol = intval($_POST['idRol']);
				$strNombre = strClean($_POST['txtNombre']);
				$strDescripcion = strClean($_POST['txtDescripcion']);
				$intStatus = intval($_POST['listStatus']);

				if ($intidRol == 0) {
					//Crear
					$request_Rol = $this->model->insertRol($strNombre, $strDescripcion, $intStatus);
					$option = 1;
				} else {
					//Actualizar
					$request_Rol = $this->model->updateRol($intidRol, $strNombre, $strDescripcion, $intStatus);
					$option = 2;
				}

				if ($request_Rol > 0) {
					if ($option == 1) {
						$arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array("status" => true, "msg" => 'Datos actualizados correctamente.');
					}
				} else if ($request_Rol == 'exist') {
					$arrResponse = array("status" => false, "msg" => '¡Atención! El rol ya existe.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delRol()
	{
		if ($_POST) {
			$intIdRol = intval($_POST['idRol']);
			$requestDelete = $this->model->deleteRol($intIdRol);
			if ($requestDelete == "ok") {
				$arrResponse = array("status" => true, "msg" => 'Se ha eliminado el rol');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array("status" => false, "msg" => 'No es posible eliminar un rol asociado a usuarios.');
			} else {
				$arrResponse = array("status" => false, "msg" => 'Error al eliminar el rol.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}

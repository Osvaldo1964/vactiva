<?php 

	class RolesModel extends Mysql
	{
        public $intIdRol;
        public $strNombre;
        public $strDescripcion;
        public $intStatus;

		public function __construct()
		{
			parent::__construct();
		}
        
        public function selectRoles()
        {
            $sql = "SELECT * FROM roles WHERE statusRol != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectRol(int $idRol)
        {
            $this->intIdRol = $idRol;
            $sql = "SELECT * FROM roles WHERE idRol = $this->intIdRol";
            $request = $this->select($sql);
            return $request;
        }

        public function insertRol(string $nombre, string $descripcion, int $status)
        {
            $return = "";
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM roles WHERE nameRol = '{$this->strNombre}' ";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query = "INSERT INTO roles (nameRol, descripRol, statusRol) VALUES (?,?,?)";
                $arrData = array($this->strNombre, $this->strDescripcion, $this->intStatus);
                $request_insert = $this->insert($query, $arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }

        public function updateRol(int $idRol, string $nombre, string $descripcion, int $status)
        {
            $this->intIdRol = $idRol;
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM roles WHERE nameRol = '{$this->strNombre}' AND idRol != $this->intIdRol";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $sql = "UPDATE roles SET nameRol = ?, descripRol = ?, statusRol = ? WHERE idRol = $this->intIdRol";
                $arrData = array($this->strNombre, $this->strDescripcion, $this->intStatus);
                $request = $this->update($sql, $arrData);
            } else {
                $request = "exist";
            }
            return $request;
        }

        public function deleteRol(int $idRol)
        {
            $this->intIdRol = $idRol;
            $sql = "SELECT * FROM usuarios WHERE rolidUser = $this->intIdRol";
            $request = $this->select_all($sql);
            if (!empty($request)) {
                $sql = "UPDATE roles SET statusRol = ? WHERE idRol = $this->intIdRol";
                $arrData = array(0);
                $request = $this->update($sql, $arrData);
                if ($request) {
                    $request = "ok";
                } else {
                    $request = "error";
                }
            }else{
                $request = "exist";
            }
            return $request;
        }
	}
 ?>
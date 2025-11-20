<?php 

	class Roles extends Controllers{
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
			$this->views->getView($this,"roles",$data);
		}
	}
 ?>
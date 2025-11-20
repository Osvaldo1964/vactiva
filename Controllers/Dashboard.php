<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "dashboard";
			//$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"dashboard",$data);
		}
	}
 ?>